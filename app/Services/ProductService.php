<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    protected CmsApiService $cmsApi;

    public function __construct(?CmsApiService $cmsApi = null)
    {
        $this->cmsApi = $cmsApi ?? new CmsApiService();
    }

    /**
     * Ambil produk dari CMS ACMI DB (bisa di-add / edit / delete dari CMS)
     */
    public function getCmsProducts(): array
    {
        return $this->cmsApi->getServices();
    }

    /**
     * Ambil produk anggota dari PostgreSQL ACMI Connect (Read-Only)
     */
    public function getAcmiConnectProducts(): array
    {
        $cacheKey = 'acmi_connect_products_v3';
        $fallbackKey = 'acmi_connect_products_fallback';

        // 1. Kembalikan dari cache aktif jika tersedia
        if (Cache::has($cacheKey)) {
            $cached = Cache::get($cacheKey);
            if (!empty($cached)) {
                return $cached;
            }
        }

        $products = [];

        try {
                // 1. Ambil dari profil bisnis anggota ACMI Connect (user_profiles)
                $profiles = DB::connection('pgsql_acmi')
                    ->table('user_profiles')
                    ->join('users', 'user_profiles.user_id', '=', 'users.id')
                    ->whereNotNull('user_profiles.company_name')
                    ->where('user_profiles.company_name', '!=', '')
                    ->where('user_profiles.company_name', '!=', '-')
                    ->whereNotNull('user_profiles.company_product_detail')
                    ->where('user_profiles.company_product_detail', '!=', '')
                    ->where('user_profiles.company_product_detail', '!=', '-')
                    ->select([
                        'users.id as user_id',
                        'users.full_name as ceo_name',
                        'users.email',
                        'users.phone',
                        'user_profiles.company_name',
                        'user_profiles.company_industry',
                        'user_profiles.company_product_detail',
                        'user_profiles.company_description',
                        'user_profiles.company_website',
                        'user_profiles.company_address',
                        'user_profiles.avatar_url',
                    ])
                    ->orderBy('users.id', 'asc')
                    ->get();

                foreach ($profiles as $row) {
                    $company = trim($row->company_name);
                    $slug = \Illuminate\Support\Str::slug($company . '-' . $row->user_id);
                    $category = trim($row->company_industry ?: 'Umum');

                    // Ekstrak fitur/poin dari deskripsi atau koma
                    $featuresRaw = explode(',', $row->company_product_detail);
                    $features = array_slice(array_filter(array_map('trim', $featuresRaw)), 0, 5);

                    // Gambar / Logo / Avatar
                    $image = $row->avatar_url;
                    if (empty($image)) {
                        $image = 'https://placehold.co/600x400/1e293b/f97316?text=' . urlencode(\Illuminate\Support\Str::limit($company, 22, ''));
                    }

                    // Format URL Website
                    $website = $row->company_website;
                    if (!empty($website) && !str_starts_with($website, 'http://') && !str_starts_with($website, 'https://')) {
                        $website = 'https://' . $website;
                    }

                    $products[] = [
                        'id'           => 'connect_user_' . $row->user_id,
                        'slug'         => $slug,
                        'title'        => $company,
                        'category'     => [$category],
                        'company_name' => $company,
                        'ceo_name'     => $row->ceo_name ?: '-',
                        'description'  => $row->company_product_detail ?: ($row->company_description ?: '-'),
                        'features'     => !empty($features) ? $features : [$category],
                        'website'      => $website ?: '',
                        'address'      => $row->company_address ?: '',
                        'email'        => $row->email ?: '',
                        'phone'        => $row->phone ?: '',
                        'image'        => $image,
                        'images'       => [$image],
                        'gallery'      => [$image],
                        'source'       => 'acmi_connect',
                    ];
                }

                // 2. Cek juga tabel member_product jika kelak ada input produk khusus
                $memberProducts = DB::connection('pgsql_acmi')
                    ->table('member_product')
                    ->leftJoin('product_category', 'member_product.category_id', '=', 'product_category.id')
                    ->leftJoin('media', 'member_product.thumbnail_id', '=', 'media.id')
                    ->leftJoin('users', 'member_product.member_id', '=', 'users.id')
                    ->where('member_product.status', 1)
                    ->select([
                        'member_product.id',
                        'member_product.slug',
                        'member_product.name as title',
                        'member_product.company_name',
                        'users.full_name as ceo_name',
                        'member_product.description',
                        'product_category.name as category_name',
                        'media.file_path as image_path',
                        'member_product.contact_website as website',
                        'member_product.contact_email as email',
                        'member_product.contact_phone as phone',
                        'member_product.contact_address as address',
                    ])
                    ->get();

                if ($memberProducts->isNotEmpty()) {
                    foreach ($memberProducts as $mp) {
                        $products[] = [
                            'id'           => 'connect_mp_' . $mp->id,
                            'slug'         => $mp->slug ?: \Illuminate\Support\Str::slug($mp->title . '-' . $mp->id),
                            'title'        => $mp->title,
                            'category'     => [$mp->category_name ?: 'Umum'],
                            'company_name' => $mp->company_name ?: '-',
                            'ceo_name'     => $mp->ceo_name ?: '-',
                            'description'  => $mp->description ?: '',
                            'features'     => [$mp->category_name ?: 'Umum'],
                            'website'      => $mp->website ?: '',
                            'address'      => $mp->address ?: '',
                            'email'        => $mp->email ?: '',
                            'phone'        => $mp->phone ?: '',
                            'image'        => 'https://placehold.co/600x400/1e293b/f97316?text=' . urlencode($mp->title),
                            'images'       => [],
                            'gallery'      => [],
                            'source'       => 'acmi_connect',
                        ];
                    }
                }

                if (!empty($products)) {
                    Cache::put($cacheKey, $products, 3600); // Simpan di cache normal 1 jam
                    Cache::forever($fallbackKey, $products); // Simpan permanen sebagai backup fallback
                    return $products;
                }
            } catch (\Exception $e) {
                Log::error('Gagal mengambil produk ACMI Connect: ' . $e->getMessage());
            }

            // Jika query gagal/timeout, gunakan data backup fallback agar web tidak pernah kosong
            return Cache::get($fallbackKey, []);
        }

    /**
     * Gabungkan semua produk (CMS ACMI DB + ACMI Connect PostgreSQL)
     */
    public function getAllProducts(): array
    {
        $cmsProducts = $this->getCmsProducts();
        $connectProducts = $this->getAcmiConnectProducts();

        // Tandai sumber CMS jika belum ada
        $cmsProducts = collect($cmsProducts)->map(function ($item) {
            $item['source'] = 'acmi_cms';
            return $item;
        })->all();

        return array_merge($cmsProducts, $connectProducts);
    }

    /**
     * Cari produk berdasarkan slug
     */
    public function findBySlug(string $slug): ?array
    {
        $products = $this->getAllProducts();
        return collect($products)->firstWhere('slug', $slug);
    }
}

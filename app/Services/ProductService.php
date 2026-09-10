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
     * Generator data dummy produk untuk testing grid 8x3 & 10 Halaman Pagination (240 Produk)
     */
    public function getDummyProducts(int $count = 240): array
    {
        $categories = ['Software', 'Teknologi', 'Energi', 'F&B', 'Manufaktur', 'Properti', 'Fintech', 'Konsultan', 'Logistik', 'Edukasi'];

        $companyBases = [
            'Inni Punya Indonesia', 'Surya Putra Swastika', 'Tri-Wall Indonesia', 'SSCX International',
            'Nusantara Digital Teknindo', 'Indo Cloud Solusindo', 'Prima Agro Mandiri', 'Megah Sukses Jaya',
            'Bina Talenta Indonesia', 'Sentra Logistik Medika', 'Sinar Abadi Energi', 'Cipta Harapan Niaga',
            'Mitra Berkah Lestari', 'Graha Bangun Nusantara', 'Wahana Kreatif Asia', 'Indo Pay Sistem',
            'Pangan Nusantara Gemilang', 'Solusi Otomasi Industri', 'Daya Gemilang Utama', 'Ventura Optima Indonesia',
            'Integra Edukasi Bangsa', 'Garda Keamanan Cyber', 'Eco Green Tech', 'Media Utama Komunika',
            'Logistik Ekspres Nusantara', 'Archipelagindo Kapital', 'Sehat Bersama Bangsa', 'Cemerlang Retailindo',
            'Fast Food Indonesia Mandiri', 'BioTech Herbal Nusantara', 'Smart Analytics Asia', 'Halal Food Global',
            'Robotik Nusantara', 'Investasi Karya Bersama', 'Trans Cargo Indonesia', 'EduTech Cerdas Indonesia',
            'Artha Mandiri Sejahtera', 'Design Studio Nusantara', 'Global Export Import', 'Nusantara AI Solusindo',
            'Bintang Asia Medika', 'Prakarsa Digital Utama', 'Cakra Daya Solusindo', 'Bakti Nusantara Energi',
            'Cipta Karya Logistik', 'Samudra Jaya Perdana', 'Harapan Bangsa Edukasi', 'Wira Karya Tekno',
            'Mitra Sejahtera Bersama', 'Kreatif Digital Media'
        ];

        $ceoFirst = ['RILLA', 'YUSUF', 'RIFKI', 'ANDI', 'SITI', 'BUDI', 'HENDRA', 'DEWI', 'AGUS', 'MAYA', 'DONI', 'FADHIL', 'RINA', 'CHANDRA', 'REZA', 'NITA', 'EKO', 'DINI', 'FAJAR', 'TANIA', 'DENI', 'FITRI', 'GITA', 'IRWAN', 'JOHAN', 'KARTIKA', 'LUKMAN', 'MIRA', 'NICHOLAS', 'OCTAVIA'];
        $ceoLast  = ['KUSUMA DEWI', 'ROMADHON', 'RIZAL', 'WIDJAJA', 'NURHALIZA', 'SANTOSO', 'WIJAYA', 'LESTARI', 'SETIAWAN', 'SAPUTRI', 'PRATAMA', 'MUHAMMAD', 'ANGGRAENI', 'KUSUMA', 'RAHARDIAN', 'SARI', 'PURWANTO', 'AMALIA', 'RIZKY', 'HARTO', 'GUNAWAN', 'HANDAYANI', 'GUSTAMA', 'KURNIAWAN', 'SETIABUDI', 'DEWI', 'HAKIM', 'LESMANA', 'SAPUTRA', 'PUTRI'];

        $descriptions = [
            'Penyedia solusi produk berkualitas tinggi dan layanan profesional terintegrasi untuk bisnis modern.',
            'Layanan konsultasi dan pendampingan perusahaan untuk meningkatkan efektivitas, efisiensi, dan produktivitas operasional.',
            'Platform teknologi inovatif berbasis AI untuk mempercepat transformasi digital industri di Indonesia.',
            'Produsen kemasan korugasi dan solusi pembungkusan ramah lingkungan untuk rantai pasok manufaktur.',
            'Layanan pengelolaan keuangan pintar dan pembiayaan usaha terpercaya untuk UMKM dan Korporasi.',
            'Penyedia produk F&B olahan bernutrisi tinggi dengan sertifikasi mutu internasional.',
            'Solusi logistik dan pergudangan terpadu dengan jangkauan pengiriman ke seluruh wilayah Nusantara.',
            'Layanan pengembang properti dan konstruksi bangunan komersial yang berkelanjutan.',
            'Infrastruktur cloud computing berkecapatan tinggi dan solusi keamanan siber terverifikasi aman.',
            'Pengembangan aplikasi bisnis berbasis analitik data terintegrasi dan otomasi industri.'
        ];

        $products = [];
        for ($i = 0; $i < $count; $i++) {
            $baseIndex = $i % count($companyBases);
            $cycle = floor($i / count($companyBases));
            $companyName = 'PT ' . $companyBases[$baseIndex] . ($cycle > 0 ? ' Division ' . chr(65 + (int)($cycle - 1)) : '');
            
            $cat = $categories[$i % count($categories)];
            $ceo = $ceoFirst[$i % count($ceoFirst)] . ' ' . $ceoLast[$i % count($ceoLast)];
            $desc = $descriptions[$i % count($descriptions)];
            $slug = \Illuminate\Support\Str::slug($companyName . '-' . ($i + 1));

            $products[] = [
                'id'           => 'dummy_prod_' . ($i + 1),
                'slug'         => $slug,
                'title'        => $companyName,
                'category'     => [$cat],
                'company_name' => $companyName,
                'ceo_name'     => $ceo,
                'description'  => $desc,
                'features'     => [$cat, 'Inovasi Bisnis', 'Ekosistem ACMI'],
                'website'      => 'https://example.com',
                'address'      => 'Jakarta, Indonesia',
                'email'        => 'info@' . \Illuminate\Support\Str::slug($companyName) . '.co.id',
                'phone'        => '+62 812-3456-' . sprintf('%04d', $i + 1),
                'image'        => 'https://placehold.co/600x400/1e293b/f97316?text=' . urlencode(\Illuminate\Support\Str::limit($companyName, 20, '')),
                'images'       => [],
                'gallery'      => [],
                'source'       => 'dummy',
            ];
        }

        return $products;
    }

    /**
     * Gabungkan semua produk (CMS ACMI DB + ACMI Connect PostgreSQL + Dummy jika testing)
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

        $merged = array_merge($cmsProducts, $connectProducts);

        // Jika total produk aktual kurang dari 240 (10 halaman x 24 produk), gabungkan dummy products agar mencapai total 240 produk
        if (count($merged) < 240) {
            $dummies = $this->getDummyProducts(240 - count($merged));
            $merged = array_merge($merged, $dummies);
        }

        return $merged;
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

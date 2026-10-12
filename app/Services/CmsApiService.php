<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CmsApiService
{
    private $client;
    private bool $isLoopbackDeadlock = false;

    public function __construct()
    {
        $baseUrl = rtrim(config('services.cms.api_url') ?: (config('services.cms.url') ?: env('CMS_API_URL', 'http://localhost:8000/api/public')), '/');

        // otomatis pastikan path /api/public selalu ada jika belum disertakan di .env
        if (!empty($baseUrl) && !str_contains($baseUrl, '/api/public')) {
            $baseUrl .= '/api/public';
        }

        // Deteksi potensi loopback deadlock jika CMS_API_URL diarahkan ke port yang sama dengan web server frontend saat ini
        try {
            $currentPort = (int) (request()->server('SERVER_PORT') ?: request()->getPort());
            $currentHost = request()->getHost();
            $parsed = parse_url($baseUrl);
            $targetPort = (int) ($parsed['port'] ?? (($parsed['scheme'] ?? 'http') === 'https' ? 443 : 80));
            $targetHost = $parsed['host'] ?? 'localhost';

            $isLocalTarget = in_array(strtolower($targetHost), ['127.0.0.1', 'localhost', '::1']);
            $isLocalCurrent = in_array(strtolower($currentHost), ['127.0.0.1', 'localhost', '::1']);

            if ($isLocalTarget && $isLocalCurrent && $currentPort === $targetPort) {
                Log::warning("CMS_API_URL diarahkan ke port yang sama ({$currentPort}) dengan web server saat ini. Panggilan CMS dilewati untuk mencegah deadlock server.");
                $this->isLoopbackDeadlock = true;
            }
        } catch (\Throwable $e) {
            // Ignore jika dieksekusi di luar konteks request HTTP (misal artisan/queue)
        }

        $this->client = Http::baseUrl($baseUrl)
            ->withHeaders(['Connection' => 'close'])
            ->connectTimeout(2) // Batas waktu koneksi TCP cepat (2 detik) agar tidak memicu 30s timeout jika CMS offline
            ->timeout(4);        // Batas waktu respons maksimal (4 detik)
    }

    /**
     * Helper request GET aman agar tidak pernah freeze atau deadlock jika server CMS offline
     */
    private function safeGet(string $endpoint, array $query = [])
    {
        if ($this->isLoopbackDeadlock) {
            return null;
        }

        try {
            return $this->client->get($endpoint, $query);
        } catch (\Throwable $e) {
            Log::warning("CMS API [{$endpoint}] gagal diakses: " . $e->getMessage());
            return null;
        }
    }

    public function getInstagramPosts(): array
    {
        return [];
    }

    public function getArticles(int $page = 1, ?string $category = null): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        $key = "articles:page:{$page}:cat:{$category}";
        return Cache::remember($key, 300, function () use ($page, $category) {
            $params = ['page' => $page];
            if ($category) $params['category'] = $category;

            $response = $this->safeGet('/articles', $params);
            return $response?->successful() ? ($response->json() ?? []) : [];
        });
    }

    public function getArticle(string $slug, ?string $locale = null): ?array
    {
        if ($this->isLoopbackDeadlock) {
            return null;
        }

        $locale = $locale ?? app()->getLocale() ?? 'id';
        $key = "article:{$locale}:{$slug}";

        if (app()->environment('local')) {
            $response = $this->safeGet("/articles/{$locale}/{$slug}");
            return $response?->successful() ? ($response->json('data') ?? null) : null;
        }

        return Cache::remember($key, 600, function () use ($locale, $slug) {
            $response = $this->safeGet("/articles/{$locale}/{$slug}");
            return $response?->successful() ? ($response->json('data') ?? null) : null;
        });
    }

    public function getCategories(): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        return Cache::remember('categories', 600, function () {
            $response = $this->safeGet('/categories');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        });
    }

    public function getFaqs(): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        return Cache::remember('faqs', 600, function () {
            $response = $this->safeGet('/faqs');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        });
    }

    public function getTestimonials()
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        return Cache::remember('testimonials', 600, function () {
            $response = $this->safeGet('/testimonials');
            if ($response?->successful() && isset($response->json()['data'])) {
                return collect($response->json()['data'])->take(6)->all();
            }
            return [];
        });
    }

    public function getServices(): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        if (app()->environment('local')) {
            $response = $this->safeGet('/services');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        }

        return Cache::remember('services', 600, function () {
            $response = $this->safeGet('/services');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        });
    }

    public function getGallery(): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        return Cache::remember('gallery', 600, function () {
            $response = $this->safeGet('/gallery');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        });
    }

    public function getPartners(): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        return Cache::remember('partners', 600, function () {
            $response = $this->safeGet('/partners');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        });
    }

    public function getSponsors(): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        if (app()->environment('local')) {
            $response = $this->safeGet('/sponsors');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        }

        return Cache::remember('sponsors', 300, function () {
            $response = $this->safeGet('/sponsors');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        });
    }

    public function getSponsoredBanners(): array
    {
        if ($this->isLoopbackDeadlock) {
            return [];
        }

        if (app()->environment('local')) {
            $response = $this->safeGet('/sponsored-banners');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        }

        return Cache::remember('sponsored_banners', 300, function () {
            $response = $this->safeGet('/sponsored-banners');
            return $response?->successful() ? ($response->json('data') ?? []) : [];
        });
    }

    public function getHeader(): ?array
    {
        if ($this->isLoopbackDeadlock) {
            return null;
        }

        if (app()->environment('local')) {
            $response = $this->safeGet('/header');
            return $response?->successful() ? ($response->json('data') ?? null) : null;
        }

        return Cache::remember('header_data', 300, function () {
            $response = $this->safeGet('/header');
            return $response?->successful() ? ($response->json('data') ?? null) : null;
        });
    }

    public function submitInbound(array $data): array
    {
        if ($this->isLoopbackDeadlock) {
            return ['success' => false, 'message' => 'CMS API tidak tersedia (loopback deadlock).'];
        }

        try {
            $response = $this->client
                ->connectTimeout(3)
                ->timeout(10)
                ->post('/inbound', [
                    'name'            => $data['name'] ?? null,
                    'email'           => $data['email'] ?? null,
                    'phone'           => $data['phone'] ?? null,
                    'birth_date'      => $data['birth_date'] ?? null,
                    'gender'          => $data['gender'] ?? null,
                    'domicile'        => $data['domicile'] ?? null,
                    'address'         => $data['address'] ?? null,
                    'shirt_size'      => $data['shirt_size'] ?? null,
                    'company'         => $data['company'] ?? null,
                    'position'        => $data['position'] ?? null,
                    'industry'        => $data['industry'] ?? null,
                    'company_url'     => $data['company_url'] ?? null,
                    'company_address' => $data['company_address'] ?? null,
                    'business_detail' => $data['business_detail'] ?? null,
                    'linkedin_url'    => $data['linkedin'] ?? null,
                    'instagram'       => $data['instagram'] ?? null,
                    'tiktok'          => $data['tiktok'] ?? null,
                    'facebook'        => $data['facebook'] ?? null,
                    'employee_size'   => $data['employee_size'] ?? null,
                    'annual_revenue'  => $data['annual_revenue'] ?? null,
                    'message'         => $data['message'] ?? null,
                    'ceo_mm_batch'    => $data['ceo_mm_batch'] ?? null,
                ]);

            if ($response->successful()) {
                return ['success' => true, 'data' => $response->json()];
            }

            return [
                'success' => false,
                'message' => 'Gagal: ' . $response->status(),
                'errors'  => $response->json('errors') ?? []
            ];
        } catch (\Exception $e) {
            Log::error('CMS submitInbound gagal: ' . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}

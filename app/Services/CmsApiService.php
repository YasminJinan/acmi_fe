<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CmsApiService
{
    private $client;

    public function index()
    {
        $cms = new CmsApiService();
        $articles = $cms->getArticles(request('page', 1), request('category'));
        $categories = $cms->getCategories();

        return view('ontopic', compact('articles', 'categories'));
    }

    public function __construct()
    {
        $this->client = Http::baseUrl(config('services.cms.api_url'))
            ->timeout(5)
            ->retry(3, 100);
    }

    public function getInstagramPosts(): array
    {
        return Cache::remember('instagram_posts', 3600, function () {
            try {
                $response = Http::timeout(5)
                    ->get('https://api.apify.com/v2/acts/apify~instagram-scraper/runs/last/dataset/items', [
                        'token' => config('services.apify.token'),
                        'limit' => 6,
                    ]);

                if (!$response->successful()) return [];

                $items = $response->json();

                return collect($items)->take(6)->map(function ($item) {
                    $remoteUrl = $item['displayUrl'] ?? null;
                    $cacheKey = 'ig_image:' . md5($remoteUrl);
                    $localUrl = cache()->get($cacheKey);

                    if (!$localUrl && $remoteUrl) {
                        $localUrl = route('ig.proxy', ['url' => $remoteUrl]);
                        \App\Jobs\DownloadInstagramImage::dispatch($remoteUrl, $cacheKey);
                    }

                    return [
                        'image'         => $localUrl ?? 'https://placehold.co/600x600?text=No+Image',
                        'url'           => $item['url'] ?? '#',
                        'title'         => substr($item['caption'] ?? 'ACMI Post', 0, 80),
                        'likesCount'    => $item['likesCount'] ?? 0,
                        'commentsCount' => $item['commentsCount'] ?? 0,
                    ];
                })->all();
            } catch (\Exception $e) {
                Log::error('Instagram fetch gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getArticles(int $page = 1, ?string $category = null): array
    {
        $key = "articles:page:{$page}:cat:{$category}";
        return Cache::remember($key, 300, function () use ($page, $category) {
            try {
                $params = ['page' => $page];
                if ($category) $params['category'] = $category;

                $response = $this->client->get('/articles', $params);
                return $response->successful() ? $response->json() : [];
            } catch (\Exception $e) {
                Log::error('CMS getArticles gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getArticle(string $slug): ?array
    {
        return Cache::remember("article:{$slug}", 600, function () use ($slug) {
            try {
                $response = $this->client->get("/articles/{$slug}");
                return $response->successful() ? $response->json('data') : null;
            } catch (\Exception $e) {
                Log::error("CMS getArticle [{$slug}] gagal: " . $e->getMessage());
                return null;
            }
        });
    }

    public function getCategories(): array
    {
        return Cache::remember('categories', 600, function () {
            try {
                $response = $this->client->get('/categories');
                return $response->successful() ? $response->json('data') : [];
            } catch (\Exception $e) {
                Log::error('CMS getCategories gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getFaqs(): array
    {
        return Cache::remember('faqs', 600, function () {
            try {
                $response = $this->client->get('/faqs');
                return $response->successful() ? $response->json('data') : [];
            } catch (\Exception $e) {
                Log::error('CMS getFaqs gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getTestimonials()
    {
        return Cache::remember('testimonials', 600, function () {
            try {
                $response = $this->client->get('/testimonials');

                if ($response->successful() && isset($response->json()['data'])) {
                    return collect($response->json()['data'])->take(6)->all();
                }
                
                return [];
            } catch (\Exception $e) {
                Log::error('CMS API Error (getTestimonials): ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getServices(): array
    {
        if (app()->environment('local')) {
            try {
                $response = $this->client->get('/services');
                return $response->successful() ? $response->json('data') : [];
            } catch (\Exception $e) {
                Log::error('CMS getServices gagal: ' . $e->getMessage());
                return [];
            }
        }

        return Cache::remember('services', 600, function () {
            try {
                $response = $this->client->get('/services');
                return $response->successful() ? $response->json('data') : [];
            } catch (\Exception $e) {
                Log::error('CMS getServices gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getGallery(): array
    {
        return Cache::remember('gallery', 600, function () {
            try {
                $response = $this->client->get('/gallery');
                return $response->successful() ? $response->json('data') : [];
            } catch (\Exception $e) {
                Log::error('CMS getGallery gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getPartners(): array
    {
        return Cache::remember('partners', 600, function () {
            try {
                $response = $this->client->get('/partners');
                return $response->successful() ? $response->json('data') : [];
            } catch (\Exception $e) {
                Log::error('CMS getPartners gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function getSponsors(): array
    {
        return Cache::remember('sponsors', 300, function () {
            try {
                $response = $this->client->get('/sponsors');
                return $response->successful() ? $response->json('data') : [];
            } catch (\Exception $e) {
                Log::error('CMS getSponsors gagal: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function submitInbound(array $data): array
    {
        try {
            $response = $this->client->post('/inbound', [
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

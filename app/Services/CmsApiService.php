<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CmsApiService
{
    private $client;

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
                $response = Http::timeout(15)
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

    public function getArticles(int $page = 1): array
    {
        return Cache::remember("articles:page:{$page}", 300, function () use ($page) {
            try {
                $response = $this->client->get('/articles', ['page' => $page]);
                //debug
                Log::info('CMS Response:', [
                    'status' => $response->status(),
                    'url' => $response->effectiveUri(),
                    'body' => $response->body()
                ]);
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

    public function getServices(): array
    {
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
}

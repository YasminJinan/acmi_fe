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

    public function getArticles(int $page = 1): array
    {
        return Cache::remember("articles:page:{$page}", 300, function () use ($page) {
            try {
                $response = $this->client->get('/articles', ['page' => $page]);
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

    public function getPosts()
    {
        return $this->get('/articles');
    }

    public function getPost($slug)
    {
        return $this->get('/articles/' . $slug);
    }
}

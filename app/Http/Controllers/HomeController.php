<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $cms = new CmsApiService();

        $products = $cms->getServices();
        $faqs     = $cms->getFaqs();
        $gallery  = $cms->getGallery();
        $partners = $cms->getPartners();

        $posts = Cache::remember('instagram_posts_apify_v3', 60 * 30, function () {
            try {
                $apiUrl = env('APIFY_INSTAGRAM_URL');
                $response = Http::timeout(10)->get($apiUrl); // ← tambah timeout
        
                if (!$response->successful()) return [];
        
                $items = $response->json();
                if (!is_array($items)) return [];
        
                return collect($items)->take(6)->map(function ($item) {
                    $remoteUrl = $item['displayUrl'] ?? null;
                    $cacheKey  = 'ig_image:' . md5($remoteUrl ?? '');
        
                    // Cek apakah sudah ada versi lokal
                    $localUrl = $remoteUrl ? cache()->get($cacheKey) : null;
        
                    if (!$localUrl && $remoteUrl) {
                        // Pakai proxy dulu, download di background
                        $localUrl = route('ig.proxy', ['url' => $remoteUrl]);
                        \App\Jobs\DownloadInstagramImage::dispatch($remoteUrl, $cacheKey);
                    }
        
                    $mediaType = 'IMAGE';
                    if (isset($item['videoUrl'])) {
                        $mediaType = 'VIDEO';
                    } elseif (!empty($item['childPosts'])) {
                        $mediaType = 'CAROUSEL_ALBUM';
                    }
        
                    return [
                        'mediaUrl'      => $localUrl ?? 'https://placehold.co/600x600?text=No+Image',
                        'likeCount'     => $item['likesCount'] ?? 0,
                        'commentCount'  => $item['commentsCount'] ?? 0,
                        'permalink'     => $item['url'] ?? '#',
                        'mediaType'     => $mediaType,
                        'prunedCaption' => substr($item['caption'] ?? '', 0, 100),
                    ];
                })->all();
        
            } catch (\Exception $e) {
                Log::error('Instagram fetch gagal: ' . $e->getMessage());
                return [];
            }
        });

        $posts = collect($posts);

        return view('welcome', compact('posts', 'products', 'faqs', 'gallery', 'partners'));
    }
}
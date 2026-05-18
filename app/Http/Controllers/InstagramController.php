<?php

namespace App\Http\Controllers;

use App\Jobs\DownloadInstagramImage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('instagram_posts', 60 * 120, function () {
            try {
                $apiUrl = env('APIFY_INSTAGRAM_URL');
                $response = Http::timeout(15)->get($apiUrl);

                if (!$response->successful()) return [];

                $items = $response->json();
                if (!is_array($items)) return [];

                return collect($items)->take(6)->map(function ($item) {
    $remoteUrl = $item['displayUrl'] ?? null;
    $cacheKey = 'ig_image:' . md5($remoteUrl);
    // Cek apakah sudah ada versi lokal di cache
    $localUrl = cache()->get($cacheKey);
    if (!$localUrl && $remoteUrl) {
        // Tampilkan remote dulu, download di background
        $localUrl = route('ig.proxy', ['url' => $remoteUrl]);
        DownloadInstagramImage::dispatch($remoteUrl, $cacheKey);
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
                return [];
            }
        });

        return view('welcome', ['posts' => collect($posts)]);
    }
}
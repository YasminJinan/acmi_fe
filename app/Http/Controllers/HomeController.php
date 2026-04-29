<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
   public function index()
{
    $posts = Cache::remember('instagram_posts_apify', 60 * 120, function () {
        try {
            $apiUrl = env('APIFY_INSTAGRAM_URL');
            $response = Http::get($apiUrl);

            if ($response->successful()) {
                $data = $response->json();

                // Pastikan $data adalah array, jika tidak, jadikan array kosong
                $items = is_array($data) ? $data : [];

                return collect($items)->take(6)->map(function ($item) {
                    // Logic media type
                    $mediaType = 'IMAGE';
                    if (isset($item['videoUrl'])) {
                        $mediaType = 'VIDEO';
                    } elseif (isset($item['childPosts']) && count($item['childPosts']) > 0) {
                        $mediaType = 'CAROUSEL_ALBUM';
                    }

            return [
    // Kita bungkus link displayUrl menggunakan proxy Weserv agar tidak diblokir Instagram
    'mediaUrl'     => isset($item['displayUrl']) 
                        ? "https://images.weserv.nl/?url=" . urlencode($item['displayUrl']) . "&default=https://placehold.co/600x600?text=Instagram+Post"
                        : null,
    'likeCount'    => $item['likesCount'] ?? 0,
    'commentCount' => $item['commentsCount'] ?? 0,
    'permalink'    => $item['url'] ?? "#",
    'mediaType'    => $mediaType,
    'prunedCaption'=> substr($item['caption'] ?? '', 0, 100),
];
                })->all(); // Mengembalikan array murni
            }
            return [];
        } catch (\Exception $e) {
            return [];
        }
    });

    // Tambahan: Pastikan $posts selalu berbentuk collection agar @forelse tidak error
    $posts = collect($posts);

    return view('welcome', compact('posts'));
}
}
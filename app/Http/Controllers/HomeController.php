<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// IMPORT ProductController
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    public function index()
    {
        // 1. LOGIC INSTAGRAM (KODE KAMU)
        $posts = Cache::remember('instagram_posts_apify_v3', 60 * 120, function () {
            try {
                $apiUrl = env('APIFY_INSTAGRAM_URL');
                $response = Http::get($apiUrl);

                if ($response->successful()) {
                    $data = $response->json();
                    $items = is_array($data) ? $data : [];

                    return collect($items)->take(6)->map(function ($item) {
                        $mediaType = 'IMAGE';
                        if (isset($item['videoUrl'])) {
                            $mediaType = 'VIDEO';
                        } elseif (isset($item['childPosts']) && count($item['childPosts']) > 0) {
                            $mediaType = 'CAROUSEL_ALBUM';
                        }

                        $remoteUrl = $item['displayUrl'] ?? null;
                        $finalUrl = "https://placehold.co/600x600?text=Download+Gagal";

                        if ($remoteUrl) {
                            $filename = 'ig_' . ($item['id'] ?? Str::random(10)) . '.jpg';
                            
                            if (!Storage::disk('public')->exists('instagram')) {
                                Storage::disk('public')->makeDirectory('instagram');
                            }

                            $path = 'instagram/' . $filename;

                            if (!Storage::disk('public')->exists($path)) {
                                try {
                                    $imageContent = Http::get($remoteUrl)->body();
                                    if ($imageContent) {
                                        Storage::disk('public')->put($path, $imageContent);
                                    }
                                } catch (\Exception $e) {
                                    // Fail silent
                                }
                            }
                            
                            $finalUrl = asset('storage/' . $path);
                        }

                        return [
                            'mediaUrl'      => $finalUrl,
                            'likeCount'     => $item['likesCount'] ?? 0,
                            'commentCount'  => $item['commentsCount'] ?? 0,
                            'permalink'     => $item['url'] ?? "#",
                            'mediaType'     => $mediaType,
                            'prunedCaption' => substr($item['caption'] ?? '', 0, 100),
                        ];
                    })->all();
                }
                return [];
            } catch (\Exception $e) {
                return [];
            }
        });

        // 2. LOGIC PRODUK (TAMBAHKAN INI)
        // Ambil data produk dari ProductController agar welcome.blade.php tidak error
        $productController = new ProductController();
        $products = $productController->getRawData();

        // 3. RETURN SEMUA DATA KE VIEW
        $posts = collect($posts);
        return view('welcome', compact('posts', 'products'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    public function index()
    {
        // Pakai v5 biar bener-bener fresh setelah ganti .env
        $posts = Cache::remember('instagram_posts_v5', 60 * 120, function () {
            try {
                $apiUrl = env('APIFY_INSTAGRAM_URL');
                $response = Http::timeout(30)->get($apiUrl);

                if ($response->successful()) {
                    $data = $response->json();
                    $items = isset($data['data']) ? $data['data'] : $data;
                    $items = is_array($items) ? $items : [];

                    return collect($items)->take(6)->map(function ($item) {
                        $mediaType = 'IMAGE';
                        if (isset($item['videoUrl'])) {
                            $mediaType = 'VIDEO';
                        } elseif (isset($item['childPosts']) && count($item['childPosts']) > 0) {
                            $mediaType = 'CAROUSEL_ALBUM';
                        }

                        $remoteUrl = $item['displayUrl'] ?? ($item['thumbnailUrl'] ?? null);
                        $finalUrl = "https://ui-avatars.com/api/?name=ACMI&background=f97316&color=fff&size=600";

                        if ($remoteUrl) {
                            $filename = 'ig_' . ($item['id'] ?? Str::random(10)) . '.jpg';
                            $path = 'instagram/' . $filename;

                            // Pastikan folder ada
                            if (!Storage::disk('public')->exists('instagram')) {
                                Storage::disk('public')->makeDirectory('instagram');
                            }

                            // Download jika belum ada
                            if (!Storage::disk('public')->exists($path)) {
                                $ch = curl_init($remoteUrl);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                                $imageData = curl_exec($ch);
                                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                curl_close($ch);

                                if ($httpCode == 200 && $imageData) {
                                    Storage::disk('public')->put($path, $imageData);
                                    $finalUrl = asset('storage/' . $path);
                                } else {
                                    // Jika cURL gagal, pakai remote URL langsung (terakhir kali)
                                    $finalUrl = $remoteUrl;
                                }
                            } else {
                                $finalUrl = asset('storage/' . $path);
                            }
                        }

                        return [
                            'mediaUrl'      => $finalUrl,
                            'likeCount'     => $item['likesCount'] ?? 0,
                            'commentCount'  => $item['commentsCount'] ?? 0,
                            'permalink'     => $item['url'] ?? "#",
                            'mediaType'     => $mediaType,
                            'prunedCaption' => Str::limit($item['caption'] ?? '', 100),
                        ];
                    })->all();
                }
                return [];
            } catch (\Exception $e) {
                \Log::error("Instagram Fetch Error: " . $e->getMessage());
                return [];
            }
        });

        $productController = new ProductController();
        $products = $productController->getRawData();

        return view('welcome', compact('posts', 'products'));
    }
}
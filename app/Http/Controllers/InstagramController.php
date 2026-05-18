<?php

namespace App\Http\Controllers;

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

                    // Simpan gambar ke local storage
                    $remoteUrl = $item['displayUrl'] ?? null;
                    $finalUrl  = 'https://placehold.co/600x600?text=No+Image';

                    if ($remoteUrl) {
                        $filename = 'ig_' . ($item['id'] ?? Str::random(10)) . '.jpg';
                        $path     = 'instagram/' . $filename;

                        if (!Storage::disk('public')->exists('instagram')) {
                            Storage::disk('public')->makeDirectory('instagram');
                        }

                        if (!Storage::disk('public')->exists($path)) {
                            try {
                                $imageContent = Http::get($remoteUrl)->body();
                                if ($imageContent) {
                                    Storage::disk('public')->put($path, $imageContent);
                                }
                            } catch (\Exception $e) {}
                        }

                        $finalUrl = asset('storage/' . $path);
                    }

                    return [
                        'image'          => $finalUrl,
                        'url'            => $item['url'] ?? '#',
                        'title'          => substr($item['caption'] ?? 'ACMI Post', 0, 80),
                        'date_published' => $item['timestamp'] ?? null,
                        'likesCount'     => $item['likesCount'] ?? 0,
                        'commentsCount'  => $item['commentsCount'] ?? 0,
                    ];
                })->all();

            } catch (\Exception $e) {
                return [];
            }
        });

        return view('welcome', ['posts' => collect($posts)]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
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
                $apiUrl   = env('APIFY_INSTAGRAM_URL');
                $apifyRes = Http::timeout(15)->get($apiUrl);

                if ($apifyRes->successful()) {
                    $data  = $apifyRes->json();
                    $items = is_array($data) ? $data : [];

                    if (!Storage::disk('public')->exists('instagram')) {
                        Storage::disk('public')->makeDirectory('instagram');
                    }

                    return collect($items)->take(6)->map(function ($item) {
                        $mediaType = 'IMAGE';
                        if (isset($item['videoUrl'])) {
                            $mediaType = 'VIDEO';
                        } elseif (!empty($item['childPosts'])) {
                            $mediaType = 'CAROUSEL_ALBUM';
                        }

                        $remoteUrl = $item['displayUrl'] ?? null;
                        $finalUrl  = 'https://placehold.co/600x600?text=No+Image';

                        if ($remoteUrl) {
                            $filename = 'ig_' . ($item['id'] ?? Str::random(10)) . '.jpg';
                            $path     = 'instagram/' . $filename;

                            $needsDownload = !Storage::disk('public')->exists($path)
                                || Storage::disk('public')->size($path) < 1000;

                            if ($needsDownload) {
                                try {
                                    $imgRes = Http::timeout(10)->get($remoteUrl); // ← rename
                                    if ($imgRes->successful() && strlen($imgRes->body()) > 1000) {
                                        Storage::disk('public')->put($path, $imgRes->body());
                                    }
                                } catch (\Exception $e) {
                                    // log kalau perlu: \Log::warning('IG image download failed: ' . $e->getMessage());
                                }
                            }

                            if (Storage::disk('public')->exists($path) && Storage::disk('public')->size($path) > 1000) {
                                $finalUrl = asset('storage/' . $path);
                            }
                        }

                        return [
                            'mediaUrl'      => $finalUrl,
                            'likeCount'     => $item['likesCount'] ?? 0,
                            'commentCount'  => $item['commentsCount'] ?? 0,
                            'permalink'     => $item['url'] ?? '#',
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

        $posts = collect($posts);

        return view('welcome', compact('posts', 'products', 'faqs', 'gallery', 'partners'));
    }
}
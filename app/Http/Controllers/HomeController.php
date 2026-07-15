<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
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

        $posts = Cache::remember('instagram_posts_v4', 60 * 60, function () {
            
            try {
                // $apiUrl = env('APIFY_INSTAGRAM_URL');
                $apiUrl = config('services.apify.instagram_url');

                if (empty($apiUrl)) {
                    Log::error('APIFY_INSTAGRAM_URL belum diset di .env');
                    return [];
                }

                $response = Http::timeout(15)->get($apiUrl);

                if (!$response->successful()) {
                    Log::error('Apify gagal: ' . $response->status());
                    return [];
                }

                $items = $response->json();

                if (!is_array($items) || empty($items)) {
                    return [];
                }

                return collect($items)->take(6)->map(function ($item) {
                    $rawUrl = $item['displayUrl'] ?? null;

                    // Proxy URL lewat server kita agar bisa bypass hotlink Instagram
                    $mediaUrl = $rawUrl
                        ? route('ig.proxy', ['url' => base64_encode($rawUrl)])
                        : 'https://placehold.co/600x600?text=No+Image';

                    return [
                        'mediaUrl'      => $mediaUrl,
                        'permalink'     => $item['url'] ?? '#',
                        'prunedCaption' => Str::limit($item['caption'] ?? 'ACMI Post', 100),
                        'likeCount'     => $item['likesCount'] ?? 0,
                        'commentCount'  => $item['commentsCount'] ?? 0,
                    ];
                })->all();

            } catch (\Exception $e) {
                Log::error('Instagram error: ' . $e->getMessage());
                return [];
            }
        });

        $posts = collect($posts);
        $testimonials = $cms->getTestimonials();
        $events = \App\Models\Event::orderBy('starts_at', 'asc')->get();

        return view('welcome', compact('posts', 'products', 'faqs', 'gallery', 'partners', 'testimonials', 'events'));
    }

    /**
     * Proxy gambar Instagram agar tidak kena hotlink block
     */
    public function igProxy(Request $request)
    {
        $encodedUrl = $request->query('url');

        if (empty($encodedUrl)) {
            abort(404);
        }

        $imageUrl = base64_decode($encodedUrl);

        // Validasi: hanya boleh dari CDN Instagram
        if (!str_contains($imageUrl, 'cdninstagram.com') && !str_contains($imageUrl, 'fbcdn.net')) {
            abort(403);
        }

        try {
            $response = Http::timeout(10)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                    'Referer'    => 'https://www.instagram.com/',
                ])
                ->get($imageUrl);

            if (!$response->successful()) {
                abort(404);
            }

            $contentType = $response->header('Content-Type') ?? 'image/jpeg';

            return response($response->body(), 200)
                ->header('Content-Type', $contentType)
                ->header('Cache-Control', 'public, max-age=86400'); // cache 1 hari di browser

        } catch (\Exception $e) {
            Log::error('igProxy error: ' . $e->getMessage());
            abort(500);
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    public function index()
    {
        $cms = new CmsApiService();

        $products = $cms->getServices();
        $faqs     = $cms->getFaqs();
        $gallery  = $cms->getGallery();
        $partners = $cms->getPartners();

        // 1. Variabel dibuat
        $apiUrl = env('API_BACKEND_URL', 'http://172.16.4.143:8000') . '/api/public/instagram';

        // 2. Tambahkan "use ($apiUrl)" agar variabelnya bisa masuk ke dalam fungsi
        $posts = Cache::remember('instagram_posts_from_backend_v2', 60 * 5, function () use ($apiUrl) {
            try {
                // 3. Masukkan variabelnya ke sini! (Sekarang pasti nyala di VS Code)
                $response = Http::timeout(10)->get($apiUrl);

                if (!$response->successful() || !$response->json('success')) {
                    return [];
                }

                $items = $response->json('data');

                return collect($items)->map(function ($item) {
                    // Ambil path image mentah dari backend
                    $rawImage = $item['image'] ?? '';

                    // Native check: Jika sudah berawalan http (URL penuh), pakai langsung. 
                    // Jika belum (hanya path lokal seperti storage/instagram/xxx.jpg), kita gabungkan dengan domain backend.
                    // KODE YANG DI-UPDATE (Lebih Toleran dan Pintar)
                    if (!empty($rawImage)) {
                        // KONDISI A: Jika API Backend ngirim full URL (misal dari Apify langsung), pakai langsung.
                        if (str_starts_with($rawImage, 'http://') || str_starts_with($rawImage, 'https://')) {
                            $mediaUrl = $rawImage;
                        } else {
                            // KONDISI B: Jika API Backend ngirim path lokal (storage/instagram/xxx.jpg), gabungkan dengan IP Backend.
                            $baseUrl = rtrim(env('API_BACKEND_URL', 'http://172.16.4.143:8000'), '/');
                            $mediaUrl = $baseUrl . '/' . ltrim($rawImage, '/');
                        }
                    } else {
                        // KONDISI C: Jika di database backend ternyata isinya null/kosong, baru lempar ke placeholder "No Image".
                        $mediaUrl = 'https://placehold.co/600x600?text=No+Image';
                    }

                    return [
                        'mediaUrl'      => $mediaUrl,
                        'permalink'     => $item['post_url'] ?? '#',
                        'prunedCaption' => \Illuminate\Support\Str::limit($item['caption'] ?? '', 100),
                        'likeCount'     => $item['likes'] ?? 0,
                        'commentCount'  => $item['comments'] ?? 0,
                        'mediaType'     => 'IMAGE',
                    ];
                })->all();
            } catch (\Exception $e) {
                Log::error('Gagal mengambil data dari Backend ACMI DB: ' . $e->getMessage());
                return [];
            }
        });

        $posts = collect($posts);

        return view('welcome', compact('posts', 'products', 'faqs', 'gallery', 'partners'));
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        // Validasi secret token
        $secret = $request->bearerToken();
        if ($secret !== config('services.cms.webhook_secret')) {
            Log::warning('Webhook: token tidak valid');
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        $event = $request->input('event');
        $slug  = $request->input('slug');
        Log::info("Webhook diterima: {$event}" . ($slug ? " [{$slug}]" : ''));
        
        match(true) {
            str_starts_with($event, 'article') && $slug
                => $this->invalidateArticle($slug),
            str_starts_with($event, 'article')
                => $this->clearArticlesCache(), // Panggil fungsi pembersih cache artikel yang baru
            str_starts_with($event, 'faq')
                => Cache::forget('faqs'),
            str_starts_with($event, 'service') || str_starts_with($event, 'product')
                => Cache::forget('services'),
            str_starts_with($event, 'testimonial')
                => Cache::forget('testimonials'),
            str_starts_with($event, 'gallery')
                => Cache::forget('gallery'),
            str_starts_with($event, 'partner')
                => Cache::forget('partners'),
            default => null,
        };
        
        return response()->json(['status' => 'ok']);
    }

    private function invalidateArticle(string $slug): void
    {
        Cache::forget("article:{$slug}");
        $this->clearArticlesCache();
    }

    /**
     * Membersihkan cache artikel dengan format key yang sesuai di CmsApiService
     */
    private function clearArticlesCache(): void
    {
        // Ambil daftar kategori dari cache untuk menghapus cache per-kategori
        $categories = Cache::get('categories', []);

        for ($i = 1; $i <= 10; $i++) {
            // Hapus cache utama (tanpa kategori)
            Cache::forget("articles:page:{$i}:cat:");
            Cache::forget("articles:page:{$i}:cat:null");

            // Hapus cache untuk tiap kategori yang terdaftar
            foreach ($categories as $category) {
                $catSlug = is_array($category) ? ($category['slug'] ?? null) : ($category->slug ?? null);
                if ($catSlug) {
                    Cache::forget("articles:page:{$i}:cat:{$catSlug}");
                }
            }
        }
    }
}

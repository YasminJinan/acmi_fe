<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CacheInstagramImages extends Command
{
    protected $signature = 'instagram:cache';
    protected $description = 'Download dan cache gambar Instagram dari Apify';

    public function handle()
    {
        $apiUrl = env('APIFY_INSTAGRAM_URL');
        $response = Http::timeout(15)->get($apiUrl);

        if (!$response->successful()) {
            $this->error('Gagal fetch Apify');
            return;
        }

        $items = collect($response->json())->take(6);

        $posts = $items->map(function ($item) {
            $remoteUrl = $item['displayUrl'] ?? null;
            $localUrl  = null;

            if ($remoteUrl) {
                // Nama file unik berdasarkan shortCode
                $filename = 'instagram/' . ($item['shortCode'] ?? Str::random(10)) . '.jpg';

                // Download & simpan ke storage/app/public/instagram/
                try {
                    $imgResponse = Http::timeout(20) // naikkan timeout
    ->retry(3, 2000)              // coba 3x, jeda 2 detik tiap retry
    ->withHeaders([
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
        'Referer'    => 'https://www.instagram.com/',
    ])
    ->get($remoteUrl);

                    if ($imgResponse->successful()) {
                        Storage::disk('public')->put($filename, $imgResponse->body());
                        $localUrl = Storage::url($filename);
                        $this->info('Downloaded: ' . $filename);
                    }
                } catch (\Exception $e) {
                    $this->error('Gagal download: ' . $e->getMessage());
                }
            }

            return [
                'mediaUrl'      => $localUrl ?? 'https://placehold.co/600x600?text=No+Image',
                'permalink'     => $item['url'] ?? '#',
                'prunedCaption' => \Illuminate\Support\Str::limit($item['caption'] ?? 'ACMI Post', 100),
                'likeCount'     => $item['likesCount'] ?? 0,
                'commentCount'  => $item['commentsCount'] ?? 0,
            ];
        })->all();

        // Simpan ke cache selama 7 hari (gambar sudah lokal, aman)
        Cache::put('instagram_posts_v4', $posts, 60 * 60 * 24 * 7);

        $this->info('Selesai! ' . count($posts) . ' posts ter-cache.');
    }
}
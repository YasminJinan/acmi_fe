<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log; 
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class DownloadInstagramImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function __construct(
        public string $remoteUrl,
        public string $cacheKey, // key untuk update cache
    ) {}
    public function handle(): void
    {
        try {
            $response = Http::timeout(30)->get($this->remoteUrl);
            if (!$response->successful()) return;
            $filename = 'instagram/' . Str::uuid() . '.jpg';
            Storage::disk('public')->put($filename, $response->body());
            // Update cache dengan path lokal
            $localUrl = asset('storage/' . $filename);
            cache()->put($this->cacheKey, $localUrl, now()->addDays(30));
        } catch (\Exception $e) {
           Log::error('DownloadInstagramImage gagal: ' . $e->getMessage());

        }
    }
}
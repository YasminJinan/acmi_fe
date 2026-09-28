<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class EventService
{
    /**
     * Ambil data event dari database ACMI Connect (pgsql_acmi)
     */
    public function getEvents(): array
    {
        // Ganti nama key cache atau hapus Cache jika masih tahap development biar data selalu fresh
        return Cache::remember('acmi_connect_events_v3', 10, function () {
            try {
                $events = DB::connection('pgsql_acmi')
                    ->table('events')
                    ->leftJoin('media', 'events.banner_media_id', '=', 'media.id')
                    ->whereNull('events.deleted_at')
                    ->select([
                        'events.id',
                        'events.title',
                        'events.description',
                        'events.starts_at',
                        'events.ends_at',
                        'events.location',
                        'events.type',
                        'events.image_emoji',
                        'events.status',
                        'events.attendees_count',
                        'media.file_path as banner_image',
                    ])
                    ->orderBy('events.starts_at', 'asc')
                    ->get();

                if ($events->isNotEmpty()) {
                    // Domain tempat penyimpanan file gambar ACMI Connect
                    $baseUrl = config('services.acmi_connect.url', 'https://acmi-connect-dev.hahabid.com');

                    return $events->map(function ($event) use ($baseUrl) {
                        $image = !empty($event->banner_image) ? trim($event->banner_image) : null;

                        if ($image) {
                            // Jika bukan URL lengkap http/https, tempelkan domain backend ACMI Connect
                            if (!str_starts_with($image, 'http://') && !str_starts_with($image, 'https://')) {
                                $image = ltrim($image, '/');
                                $image = rtrim($baseUrl, '/') . '/' . $image;
                            }
                        }

                        $event->image_url = $image;
                        return (array) $event;
                    })->all();
                }
            } catch (\Throwable $e) {
                Log::error('Gagal mengambil events dari database pgsql_acmi: ' . $e->getMessage());
            }

            // Fallback data jika server remote sedang tidak dapat diakses / offline
            return [
                [
                    'id' => 1,
                    'title' => 'ACMI Annual Summit 2026',
                    'description' => 'Pertemuan puncak tahunan seluruh CEO dan eksekutif anggota ACMI untuk merumuskan sinergi strategis dan pertumbuhan bisnis nasional.',
                    'starts_at' => '2026-11-15 09:00:00',
                    'ends_at' => '2026-11-15 17:00:00',
                    'location' => 'Grand Ballroom, Jakarta',
                    'type' => 'conference',
                    'image_emoji' => '👑',
                    'status' => 1,
                    'attendees_count' => 150,
                    'image_url' => null,
                ],
            ];
        });
    }
}
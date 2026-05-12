<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstagramController extends Controller
{
    public function index()
    {
        // 1. Ambil data dari RSS.app JSON
        $response = Http::get('https://rss.app/feeds/v1.1/a7ezoFUiSa78uypf.json');
        
       $posts = $response->json()['items'] ?? [];
       
        if ($response->successful()) {
            // 2. Ambil array 'items' dari JSON
            $posts = $response->json()['items'] ?? [];
        }

        // 3. Kirim data ke view
        return view('welcome', compact('posts'));
    }
}
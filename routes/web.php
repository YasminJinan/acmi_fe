<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\PostController; 
use App\Http\Controllers\WebhookController; 
use App\Http\Controllers\OnTopicController; 
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');
    if (!File::exists($path)) {
        Artisan::call('sitemap:generate');
    }
    return response()->file($path, ['Content-Type' => 'application/xml']);
});

Route::get('/ig-proxy', function (Illuminate\Http\Request $request) {
    $url = $request->query('url');
    
    if (!str_contains($url, 'fbcdn.net')) {
        abort(403);
    }

    $response = Http::get($url);
    
    return response($response->body())
        ->header('Content-Type', $response->header('Content-Type'))
        ->header('Cache-Control', 'public, max-age=86400');
})->name('ig.proxy');

Route::get('/', [HomeController::class, 'index']);

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/ontopic', [ArticleController::class, 'index'])->name('ontopic');
Route::get('/ontopic/{slug}', [ArticleController::class, 'show'])->name('ontopic.show');
// Route::get('/ontopic/{slug}', [ArticleController::class, 'show'])->name('ontopic.detail');

Route::get('/gabung', function () {
    return view('gabung');
});

Route::get('/membership', function () {
    return view('membership');
})->name('membership');

Route::get('/gallerysec', function () {
    return view('gallerysec');
})->name('gallerysec');

Route::get('/board', function () {
    return view('board');
})->name('board');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'id'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

Route::post('/webhook/cms', [WebhookController::class, 'handle']);
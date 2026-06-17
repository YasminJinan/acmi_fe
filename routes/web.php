<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FormJoinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\WebhookController; 
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);

    }
    return redirect()->back();
})->name('lang.switch');


Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');
    if (!File::exists($path)) {
        Artisan::call('sitemap:generate');
    }
    return response()->file($path, ['Content-Type' => 'application/xml']);
});

Route::get('/ig-proxy', [App\Http\Controllers\HomeController::class, 'igProxy'])->name('ig.proxy');

Route::get('/', [HomeController::class, 'index']);

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/{locale}/ontopic', [ArticleController::class, 'index'])->name('ontopic');
Route::get('/{locale}/ontopic/{slug}', [ArticleController::class, 'show'])
    ->name('ontopic.show')
    ->where('locale', 'id|en');
// Route::get('/ontopic/{slug}', [ArticleController::class, 'show'])->name('ontopic.detail');

Route::get('/form-join', [FormJoinController::class, 'index'])->name('form');
Route::post('/form-join', [FormJoinController::class, 'store'])->name('form.store');

Route::get('/acmi-manager', function () {
    return view('acmi-manager');
})->name('acmi-manager');

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
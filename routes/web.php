<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FormJoinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\WebhookController; 
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return redirect('/' . app()->getLocale());
});

Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');
    if (!File::exists($path)) {
        Artisan::call('sitemap:generate');
    }
    return response()->file($path, ['Content-Type' => 'application/xml']);
});

Route::get('/ig-proxy', [HomeController::class, 'igProxy'])->name('ig.proxy');
Route::post('/webhook/cms', [WebhookController::class, 'handle']);

Route::middleware([\App\Http\Middleware\SetLocale::class])->group(function () {
    
    // English Routes
    Route::prefix('en')->name('en.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/board', function () { return view('board'); })->name('board');
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/faq', function () { return view('faq'); })->name('faq'); 
        Route::get('/gallery', function () { return view('gallery'); })->name('gallery'); 
        Route::get('/ontopic', [ArticleController::class, 'index'])->name('ontopic');
        Route::get('/ontopic/{slug}', [ArticleController::class, 'show'])->name('ontopic.show');
        Route::get('/join', [FormJoinController::class, 'index'])->name('join');
        Route::post('/join', [FormJoinController::class, 'store'])->name('join.store');
        Route::get('/manager', function () { return view('acmi-manager'); })->name('manager');
        Route::get('/events', [EventController::class, 'index'])->name('events');
    });

    // Indonesian Routes
    Route::prefix('id')->name('id.')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/dewan', function () { return view('board'); })->name('dewan');
        Route::get('/produk', [ProductController::class, 'index'])->name('produk');
        Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/tanya-jawab', function () { return view('faq'); })->name('faq');
        Route::get('/galeri', function () { return view('gallery'); })->name('galeri');
        Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');
        Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');
        Route::get('/gabung', [FormJoinController::class, 'index'])->name('gabung');
        Route::post('/gabung', [FormJoinController::class, 'store'])->name('gabung.store');
        Route::get('/manajer', function () { return view('acmi-manager'); })->name('manajer');
        Route::get('/events', [EventController::class, 'index'])->name('events');
    });

});
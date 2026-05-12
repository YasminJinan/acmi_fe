<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; 
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;


use Illuminate\Support\Facades\Http;
Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');
    if (!file_exists($path)) {
        Artisan::call('sitemap:generate');
    }
    return response()->file($path, ['Content-Type' => 'application/xml']);
});

Route::get('/ig-proxy', function (Illuminate\Http\Request $request) {
    $url = $request->query('url');
    
    // Validasi kalau URL-nya beneran dari domain fbcdn (server IG)
    if (!str_contains($url, 'fbcdn.net')) {
        abort(403);
    }

    $response = Http::get($url);
    
    return response($response->body())
        ->header('Content-Type', $response->header('Content-Type'))
        ->header('Cache-Control', 'public, max-age=86400'); // Cache di browser 1 hari
})->name('ig.proxy');


Route::get('/', [HomeController::class, 'index']);
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/ontopic/{slug}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/gabung', function () {
    return view('gabung');
});

Route::get('/ontopic', function () {
    return view('ontopic');
})->name('ontopic');

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

    // validasi bahasa
    if (!in_array($locale, ['en', 'id'])) {
        abort(400);
    }

    // simpan ke session
    session(['locale' => $locale]);

    // balik ke halaman sebelumnya
    return redirect()->back();

<<<<<<< HEAD
=======
<<<<<<< HEAD
})->name('lang.switch');<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; 

Route::get('/', [HomeController::class, 'index']);
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/gabung', function () {
    return view('gabung');
});

Route::get('/ontopic', function () {
    return view('ontopic');
})->name('ontopic');

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

    // validasi bahasa
    if (!in_array($locale, ['en', 'id'])) {
        abort(400);
    }

    // simpan ke session
    session(['locale' => $locale]);

    // balik ke halaman sebelumnya
    return redirect()->back();

})->name('lang.switch');
=======
>>>>>>> temp-seo-fix
})->name('lang.switch');


Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');

    // Jika file belum ada (misal baru deploy), generate dulu
    if (!File::exists($path)) {
        Artisan::call('sitemap:generate');
    }

    return response()->file($path, [
        'Content-Type' => 'application/xml'
    ]);
<<<<<<< HEAD
});
=======
});
>>>>>>> d36ff40 (SEO progress)
>>>>>>> temp-seo-fix

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; 

Route::get('/', [HomeController::class, 'index']);
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');

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
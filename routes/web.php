<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/gabung', function () {
    return view('gabung');
});

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
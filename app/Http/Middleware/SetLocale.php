<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // ambil locale dari session, kalau ga ada pakai default config
        $locale = session('locale', config('app.locale'));

        // validasi biar ga bisa inject sembarang locale
        if (!in_array($locale, ['id', 'en'])) {
            $locale = config('app.locale');
        }

        // set bahasa ke Laravel
        app()->setLocale($locale);

        return $next($request);
    }
}
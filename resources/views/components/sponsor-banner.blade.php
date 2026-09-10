{{--
|--------------------------------------------------------------------------
| Sponsor Banner Component — ACMI
|--------------------------------------------------------------------------
| Lokasi file : resources/views/components/sponsor-banner.blade.php
|
| Contoh pakai:
|   <x-sponsor-banner
|       href="https://www.bankmandiri.co.id/"
|       image="{{ asset('images/sponsors/mandiri-728x90.jpg') }}"
|       brand="Bank Mandiri"
|       size="728x90" />
|
| Props:
|   id     (opsi)   ID banner dari CMS — dipakai untuk tracking impression/click
|   href   (wajib)  URL tujuan sponsor
|   image  (wajib)  Path gambar banner (idealnya 2x retina, WebP/JPG)
|   brand  (wajib)  Nama brand — dipakai untuk alt, aria-label, & event GA4
|   size   (wajib)  Salah satu: 728x90 | 970x250 | 336x280 | 300x250
|   label  (opsi)   Teks eyebrow, default "Sponsored"
|   flush  (opsi)   true = tanpa wrapper flex tengah (dipakai di dalam grid)
--}}

@props([
    'id'    => null,
    'href'  => '#',
    'image' => null,
    'brand' => 'Sponsored',
    'size'  => '728x90',
    'label' => 'SPONSORED',
    'flush' => false,
])

@php
    // Preset ukuran standar IAB.
    $presets = [
        '728x90'  => ['max' => 'max-w-[728px]', 'text' => '728×90'],
        '970x250' => ['max' => 'max-w-[970px]', 'text' => '970×250'],
        '336x280' => ['max' => 'max-w-[336px]', 'text' => '336×280'],
        '300x250' => ['max' => 'max-w-[300px]', 'text' => '300×250'],
    ];

    $preset = $presets[$size] ?? ['max' => 'max-w-full', 'text' => $size];
@endphp

<div @class([
        'w-full flex justify-center items-center',
        'px-6' => ! $flush,
    ]) data-aos="fade-up" data-aos-duration="800">

    <div class="w-full flex flex-col items-center {{ $preset['max'] }}">
        {{-- Header Teks: SPONSORED · {UKURAN} --}}
        <p class="mb-3 select-none font-poppins text-[10px] sm:text-[11px] font-semibold uppercase tracking-[0.25em] text-gray-400 dark:text-gray-500 text-center">
            SPONSORED <span class="mx-1 text-gray-300 dark:text-gray-700">·</span> {{ $preset['text'] }}
        </p>

        {{-- Banner Card (Hanya dirender jika ada gambar banner yang valid) --}}
        @if(!empty($image) && $image !== '#')
        <a href="{{ $href }}"
           target="_blank"
           rel="sponsored noopener noreferrer"
           aria-label="{{ $brand }}"
           data-sponsor="{{ $brand }}"
           data-sponsor-size="{{ $preset['text'] }}"
           @if($id !== null) data-sponsor-id="{{ $id }}" @endif
           @class([
               'group relative block w-full overflow-hidden rounded-xl sm:rounded-2xl',
               'border border-orange-500/70 hover:border-orange-400 dark:border-orange-500/60 dark:hover:border-orange-400',
               'transition-all duration-300 ease-out',
               'hover:shadow-[0_8px_30px_rgba(249,115,22,0.28)] hover:-translate-y-0.5',
               'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-400',
           ])>

            {{-- Badge AD di pojok kanan atas --}}
            <span class="pointer-events-none absolute top-2 right-2 sm:top-3 sm:right-3 z-20 inline-flex items-center gap-1 sm:gap-1.5 rounded-md bg-orange-500 px-2 py-0.5 sm:px-2.5 sm:py-1 text-[9px] sm:text-[10px] font-black uppercase tracking-wider text-black shadow-md transition-transform duration-300 group-hover:scale-105">
                <i class="fa-solid fa-arrow-up-right-from-square text-[8px] sm:text-[9px]"></i>
                <span>AD</span>
            </span>

            {{-- Gambar Banner dari CMS --}}
            <img src="{{ $image }}"
                 alt="{{ $brand }}"
                 loading="lazy"
                 decoding="async"
                 class="w-full h-auto block transition-transform duration-500 ease-out group-hover:scale-[1.01]" />
        </a>
        @endif
    </div>
</div>
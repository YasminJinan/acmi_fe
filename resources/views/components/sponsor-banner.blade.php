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
    'image',
    'brand' => 'Sponsored',
    'size'  => '728x90',
    'label' => 'Sponsored',
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

    <a href="{{ $href }}"
       target="_blank"
       rel="sponsored noopener noreferrer"
       aria-label="{{ $brand }}"
       data-sponsor="{{ $brand }}"
       data-sponsor-size="{{ $preset['text'] }}"
       @if($id !== null) data-sponsor-id="{{ $id }}" @endif
       @class([
           'block w-full overflow-hidden rounded-xl transition-transform duration-300 hover:opacity-95',
           $preset['max'],
       ])>
        <img src="{{ $image }}"
             alt="{{ $brand }}"
             loading="lazy"
             decoding="async"
             class="w-full h-auto block rounded-xl shadow-sm" />
    </a>
</div>
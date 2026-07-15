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
|   href   (wajib)  URL tujuan sponsor
|   image  (wajib)  Path gambar banner (idealnya 2x retina, WebP/JPG)
|   brand  (wajib)  Nama brand — dipakai untuk alt, aria-label, & event GA4
|   size   (wajib)  Salah satu: 728x90 | 970x250 | 336x280 | 300x250
|   label  (opsi)   Teks eyebrow, default "Sponsored"
|   flush  (opsi)   true = tanpa wrapper flex tengah (dipakai di dalam grid)
--}}

@props([
    'href',
    'image',
    'brand',
    'size'  => '728x90',
    'label' => 'Sponsored',
    'flush' => false,
])

@php
    // Preset ukuran standar IAB.
    $presets = [
        '728x90'  => ['max' => 'max-w-[728px]', 'ratio' => 'aspect-[728/90]',  'w' => 728, 'h' => 90,  'text' => '728×90'],
        '970x250' => ['max' => 'max-w-[970px]', 'ratio' => 'aspect-[970/250]', 'w' => 970, 'h' => 250, 'text' => '970×250'],
        '336x280' => ['max' => 'max-w-[336px]', 'ratio' => 'aspect-[336/280]', 'w' => 336, 'h' => 280, 'text' => '336×280'],
        '300x250' => ['max' => 'max-w-[300px]', 'ratio' => 'aspect-[300/250]', 'w' => 300, 'h' => 250, 'text' => '300×250'],
    ];

    $preset = $presets[$size] ?? $presets['728x90'];
@endphp

<div @class([
        'w-full flex flex-col items-center',
        'px-6' => ! $flush,
    ]) data-aos="fade-up" data-aos-duration="800">

    {{-- Eyebrow: penanda iklan. Wajib ada demi transparansi & aturan Google. --}}
    <p class="mb-3 select-none font-poppins text-[10px] font-bold uppercase tracking-[0.25em] text-gray-400 dark:text-gray-600">
        {{ $label }}
        <span class="mx-1 text-gray-300 dark:text-gray-700">·</span>{{ $preset['text'] }}
    </p>

    <a href="{{ $href }}"
       target="_blank"
       rel="sponsored noopener noreferrer"
       aria-label="Iklan {{ $brand }} — membuka situs {{ $brand }} di tab baru"
       data-sponsor="{{ $brand }}"
       data-sponsor-size="{{ $preset['text'] }}"
       @class([
           'group relative block w-full overflow-hidden rounded-xl',
           'border border-gray-200/70 dark:border-white/[0.07]',
           'bg-gray-100 dark:bg-white/[0.02]',
           'shadow-sm dark:shadow-none',
           'transition-[transform,box-shadow,border-color] duration-500 ease-out',
           'hover:-translate-y-1',
           'hover:border-orange-400 dark:hover:border-orange-400/70',
           'hover:shadow-[0_12px_40px_-16px_rgba(251,146,60,0.28)]',
           'dark:hover:shadow-[0_14px_50px_-16px_rgba(251,146,60,0.22)]',
           'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-[#0a0a0b]',
           'motion-reduce:transform-none motion-reduce:transition-none',
           $preset['max'],
           $preset['ratio'],
       ])>

        {{-- Inner gold stroke — crisp di atas gambar, nggak ketiban border luar --}}
        <span aria-hidden="true"
              class="pointer-events-none absolute inset-0 z-20 rounded-xl ring-1 ring-inset ring-transparent
                     transition-[box-shadow] duration-500 group-hover:ring-orange-400/60"></span>

        {{-- Sheen halus melintas saat hover --}}
        <span aria-hidden="true"
              class="pointer-events-none absolute inset-0 z-10 -translate-x-full
                     bg-gradient-to-r from-transparent via-white/12 to-transparent
                     transition-transform duration-[1200ms] ease-out
                     group-hover:translate-x-full motion-reduce:hidden"></span>

        <img src="{{ $image }}"
             alt="Iklan {{ $brand }}"
             width="{{ $preset['w'] }}"
             height="{{ $preset['h'] }}"
             loading="lazy"
             decoding="async"
             class="h-full w-full object-cover transition-transform duration-[1200ms] ease-out
                    group-hover:scale-[1.02] motion-reduce:transform-none" />

        {{-- Badge "Ad" --}}
        <span aria-hidden="true"
              class="absolute right-2 top-2 z-30 inline-flex items-center gap-1.5
                     rounded-md border border-white/10 bg-black/55 px-2 py-1 backdrop-blur-md
                     text-[9px] font-bold uppercase tracking-wider text-white/80
                     transition-colors duration-300
                     group-hover:border-transparent group-hover:bg-orange-400 group-hover:text-black">
            <i class="fa-solid fa-arrow-up-right-from-square text-[8px]"></i> Ad
        </span>
    </a>
</div>
@extends('layouts.app')

@section('title', 'Galeri — ACMI')
@section('meta_keywords', 'galeri acmi, dokumentasi acmi, foto kegiatan acmi')
@section('meta_description', 'Dokumentasi kegiatan dan momen seru ekosistem ACMI — pertemuan, forum, dan sinergi pemimpin bisnis Indonesia.')
@section('og_title', 'Galeri — ACMI')
@section('og_description', 'Kilasan perjalanan ekosistem ACMI dalam gambar.')
@section('canonical', url('/gallery'))

@push('styles')
<style>
    /* ---- Grid Masonry ---- */
    .gallery-masonry-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: 260px;
        gap: 14px;
    }

    @media (max-width: 768px) {
        .gallery-masonry-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-auto-rows: 200px;
        }
        .item-big  { grid-column: span 2; grid-row: span 1; }
        .item-wide { grid-column: span 2; }
        .item-tall { grid-row: span 1; }
    }

    @media (max-width: 480px) {
        .gallery-masonry-grid {
            grid-template-columns: 1fr;
            grid-auto-rows: 220px;
        }
        .item-big, .item-wide, .item-tall {
            grid-column: span 1;
            grid-row: span 1;
        }
    }

    /* Span variants */
    .item-wide { grid-column: span 2; }
    .item-tall { grid-row: span 2; }
    .item-big  { grid-column: span 2; grid-row: span 2; }

    /* ---- Card Base ---- */
    .gallery-card {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        cursor: pointer;
        background: #f3f4f6;
    }

    /* FIX 2: dark mode background card pakai Tailwind class-based dark selector */
    .dark .gallery-card {
        background: #111113;
    }

    /* ---- Image ---- */
    .gallery-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        filter: grayscale(1) brightness(0.88) contrast(1.05);
        transition: filter 0.7s ease, transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .gallery-card:hover .gallery-img {
        filter: grayscale(0) brightness(1) contrast(1);
        transform: scale(1.09);
    }

    /* ---- Overlay ---- */
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.68) 0%, rgba(0,0,0,0.1) 50%, transparent 100%);
        opacity: 0;
        transition: opacity 0.45s ease;
        display: flex;
        align-items: flex-end;
        padding: 24px;
    }
    .gallery-card:hover .gallery-overlay { opacity: 1; }

    .gallery-tag {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 999px;
        background: #f97316;
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    .gallery-label {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.45;
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

    /* ---- Corner Action Button ---- */
    .gallery-corner-btn {
        position: absolute;
        top: 16px;
        right: 16px;
        opacity: 0;
        transform: translateY(8px);
        transition: opacity 0.4s ease, transform 0.4s ease;
    }
    .gallery-card:hover .gallery-corner-btn {
        opacity: 1;
        transform: translateY(0);
    }
    .gallery-action-btn {
        width: 42px;
        height: 42px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-decoration: none;
        transition: background 0.25s, border-color 0.25s;
    }
    .gallery-action-btn:hover {
        background: #f97316;
        border-color: #f97316;
    }

    /* ---- Bottom Accent Line ---- */
    .gallery-accent-line {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 0;
        background: linear-gradient(to right, #fb923c, #ea580c, #dc2626);
        transition: width 1s ease-out;
    }
    .gallery-card:hover .gallery-accent-line { width: 100%; }
</style>
@endpush

@section('content')

<section
    class="relative bg-white dark:bg-[#0a0a0b] pt-24 md:pt-32 pb-24 md:pb-32 transition-colors duration-500 overflow-hidden"
    x-data="{
        galleries: [],
        isLoading: true,
        init() {
            fetch('/api/public/gallery')
                .then(res => {
                    if (!res.ok) throw new Error('Network response was not ok');
                    return res.json();
                })
                .then(data => {
                    if (data.success) {
                        this.galleries = data.data;
                    }
                    this.isLoading = false;
                })
                .catch(err => {
                    console.error('Fetch error:', err);
                    this.isLoading = false;
                });
        }
    }"
>

    {{-- Ambient Background --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px] pointer-events-none -z-0"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-orange-600/5 dark:bg-orange-600/10 rounded-full blur-[120px] pointer-events-none -z-0 opacity-50"></div>
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[140px] pointer-events-none -z-0 opacity-40"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <div data-aos="fade-up" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-500/20 bg-orange-500/5 text-orange-600 dark:text-orange-400 text-[11px] font-black mb-6 uppercase tracking-[0.3em]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                <i class="fa-solid fa-photo-film mr-1"></i> Dokumentasi Kegiatan
            </div>

            <h2 data-aos="fade-up" data-aos-delay="100" class="text-3xl md:text-5xl font-poppins text-gray-900 dark:text-white leading-[1.1] mb-4 tracking-tight">
                Galeri
                <span class="font-serif italic font-light text-orange-500">Foto & Kegiatan</span>
            </h2>

            <p data-aos="fade-up" data-aos-delay="200" class="max-w-xl mx-auto text-gray-500 dark:text-gray-400 text-base font-light leading-relaxed">
                Setiap gambar menceritakan sinergi nyata para pemimpin bisnis Indonesia.
            </p>
        </div>

        {{-- State Loading --}}
        <template x-if="isLoading">
            <div class="flex justify-center items-center py-20">
                <i class="fa-solid fa-spinner fa-spin text-3xl text-orange-500"></i>
            </div>
        </template>

        {{-- GRID DINAMIS DARI API --}}
        <template x-if="!isLoading">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <template x-for="item in galleries" :key="item.id">
                    <div class="gallery-item group relative overflow-hidden rounded-3xl shadow-sm transition-all duration-500 hover:shadow-2xl">
                        
                        {{-- Ubah full_image_url menjadi item.image --}}
                        <img :src="item.image" 
                             class="w-full h-[300px] object-cover transition-transform duration-700 group-hover:scale-110">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent 
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-500 
                                    flex items-end p-6 text-left">
                            <p class="text-white font-poppins font-semibold" x-text="item.title || 'Momen ACMI'"></p>
                        </div>

                    </div>
                </template>

            </div>
        </template>

        {{-- State Kosong --}}
        <template x-if="!isLoading && galleries.length === 0">
            <div class="text-center py-20">
                <p class="text-gray-500">Belum ada dokumentasi galeri yang diunggah.</p>
            </div>
        </template>

    </div>
</section>
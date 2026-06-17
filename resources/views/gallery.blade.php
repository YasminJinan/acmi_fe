@extends('layouts.app')
@section('title', 'Gallery — ACMI')
@section('meta_description',
    'Dokumentasi kegiatan, event, dan momen eksklusif komunitas CEO dan eksekutif ACMI
    Indonesia.')
@section('meta_keywords', 'acmi gallery, foto event acmi, dokumentasi acmi')
@section('canonical', url('/gallery'))

@section('content')
    <style>
        [x-cloak] { display: none !important; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    <section x-data="{
        activeCategory: 'Semua',
        galleries: [],
        isLoading: true,
        
        // Lightbox state
        isOpen: false,
        currentIndex: 0,

        get categories() {
            const cats = this.galleries.map(item => item.category?.name).filter(Boolean);
            return ['Semua', ...new Set(cats)];
        },

        get filteredGalleries() {
            if (this.activeCategory === 'Semua') return this.galleries;
            return this.galleries.filter(item => item.category && item.category.name === this.activeCategory);
        },

        filter(category) {
            this.activeCategory = category;
            const url = new URL(window.location);
            if (category === 'Semua') {
                url.searchParams.delete('category');
            } else {
                url.searchParams.set('category', category);
            }
            window.history.pushState({}, '', url);
        },

        // Lightbox methods
        openLightbox(index) {
            this.currentIndex = index;
            this.isOpen = true;
            document.body.style.overflow = 'hidden';
        },

        closeLightbox() {
            this.isOpen = false;
            document.body.style.overflow = 'auto';
        },

        next() {
            if (this.currentIndex < this.filteredGalleries.length - 1) {
                this.currentIndex++;
            } else {
                this.currentIndex = 0;
            }
        },

        prev() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            } else {
                this.currentIndex = this.filteredGalleries.length - 1;
            }
        },

        // Fungsi untuk memanggil API secara otomatis
        init() {
            const urlParams = new URLSearchParams(window.location.search);
            const catParam = urlParams.get('category');
            if (catParam) {
                this.activeCategory = catParam;
            }

            fetch('http://localhost:8000/api/public/gallery')
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        this.galleries = data.data;
                    }
                    this.isLoading = false;
                })
                .catch(err => {
                    console.error('Error memuat galeri:', err);
                    this.isLoading = false;
                });
        }
    }"
    class="bg-white dark:bg-[#0a0a0b] py-24 px-6 md:px-10 transition-colors duration-500 overflow-hidden min-h-screen">

        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]">
            </div>
            <div
                class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]">
            </div>
        </div>

        <div class="max-w-7xl mx-auto text-center">
            {{-- Header --}}
            <div data-aos="fade-up" class="mb-5 mt-10">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                    <i class="fa-solid fa-bolt-lightning animate-pulse"></i> Activity Gallery
                </div>
                <h2 class="text-4xl md:text-5xl text-gray-900 dark:text-white font-poppins leading-tight">
                    <span class="font-semibold">{{ __('messages.gallery_title_1') }}</span> <br>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.gallery_title_2') }}</span>
                </h2>
            </div>

            {{-- Filter Categories (Dinamis) --}}
            <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up" data-aos-delay="100">
                <template x-for="category in categories" :key="category">
                    <button @click="filter(category)"
                        :class="activeCategory === category
                            ?
                            'bg-orange-500 text-white shadow-md shadow-orange-500/20 ring-2 ring-orange-500 ring-offset-2 dark:ring-offset-gray-900' :
                            'bg-white dark:bg-white/5 text-slate-500 dark:text-gray-400 border border-slate-200/60 dark:border-white/10 hover:border-orange-500 hover:text-orange-500'"
                        class="relative px-6 py-2.5 rounded-xl text-sm font-poppins font-semibold transition-all duration-500 ease-out"
                        x-text="category">
                    </button>
                </template>
            </div>

            {{-- State Loading --}}
            <template x-if="isLoading">
                <div class="text-center py-10">
                    <i class="fa-solid fa-spinner fa-spin text-4xl text-orange-500"></i>
                    <p class="mt-4 text-gray-500">Memuat data galeri dari server...</p>
                </div>
            </template>

            {{-- Gallery Grid Dinamis --}}
            <template x-if="!isLoading">
                <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8" id="gallery-grid">
                    {{-- Looping Data dari API --}}
                    <template x-for="(item, index) in filteredGalleries" :key="item.id">
                        <div x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0" class="break-inside-avoid">
                            <div @click="openLightbox(index)"
                                class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/10 cursor-pointer">

                                <img :src="item.image"
                                    class="w-full h-auto min-h-[300px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110"
                                    alt="Gallery Image">

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10 text-left">
                                    <p class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500"
                                        x-text="item.title || 'ACMI Moment'"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>

        {{-- LIGHTBOX MODAL --}}
        <div x-show="isOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9999] flex flex-col bg-black/95 backdrop-blur-sm"
             @keydown.window.escape="closeLightbox()"
             @keydown.window.left="prev()"
             @keydown.window.right="next()"
             x-cloak>
            
            <!-- Header -->
            <div class="flex items-center justify-between p-6 text-white relative z-10">
                <div class="text-sm font-semibold font-poppins bg-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                    <span x-text="currentIndex + 1" class="text-orange-500"></span> / <span x-text="filteredGalleries.length"></span>
                </div>
                <button @click="closeLightbox()" class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-orange-500 text-white transition-all duration-300">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Main Content slider -->
            <div class="relative flex-1 flex items-center justify-center p-4 min-h-0">
                <!-- Navigation Arrows -->
                <button @click="prev()" class="absolute left-4 md:left-8 w-14 h-14 flex items-center justify-center rounded-full bg-white/5 hover:bg-orange-500 text-white/50 hover:text-white transition-all duration-300 z-10">
                    <i class="fa-solid fa-chevron-left text-2xl"></i>
                </button>

                <div class="relative max-w-5xl w-full h-full flex flex-col items-center justify-center">
                    <!-- Image Wrapper -->
                    <div class="relative max-h-full flex flex-col items-center">
                        <img :src="filteredGalleries[currentIndex]?.image" 
                             class="max-w-full max-h-[70vh] object-contain shadow-[0_20px_50px_rgba(0,0,0,0.5)] rounded-2xl border border-white/10"
                             :key="currentIndex"
                             x-transition:enter="transition transform duration-500"
                             x-transition:enter-start="scale-95 opacity-0"
                             x-transition:enter-end="scale-100 opacity-100">
                        
                        <div class="mt-8 text-center" data-aos="fade-up">
                            <h3 class="text-white text-2xl font-bold font-poppins tracking-tight mb-2" x-text="filteredGalleries[currentIndex]?.title"></h3>
                            <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-[10px] font-bold uppercase tracking-widest border border-orange-500/30" x-text="filteredGalleries[currentIndex]?.category?.name"></span>
                        </div>
                    </div>
                </div>

                <button @click="next()" class="absolute right-4 md:right-8 w-14 h-14 flex items-center justify-center rounded-full bg-white/5 hover:bg-orange-500 text-white/50 hover:text-white transition-all duration-300 z-10">
                    <i class="fa-solid fa-chevron-right text-2xl"></i>
                </button>
            </div>
        </div>
    </section>

@endsection
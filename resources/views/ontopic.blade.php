@extends('layouts.app')
@section('title', 'On Topik — ACMI')
@section('meta_description',
    'Artikel, insight, dan perspektif terkini dari para pemimpin bisnis Indonesia bersama
    ACMI.')
@section('meta_keywords', 'acmi artikel, on topik acmi, insight bisnis indonesia')
@section('canonical', url('/ontopic'))

@section('content')

    {{-- Container Utama dengan Background Adaptive --}}
    <div
        class="min-h-screen transition-colors duration-500 font-sans selection:bg-orange-500/30 
         bg-slate-50 dark:bg-[#0a0a0b] text-slate-900 dark:text-slate-200">

        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-12 py-6">

            <div class="flex flex-col md:flex-row gap-8 lg:gap-12 justify-center relative">

                <!-- 1. KIRI: FLOATING CATEGORY BAR (Adaptive Backdrop) -->
                <aside
                    class="hidden md:flex flex-col gap-4 sticky top-32 h-fit z-20 p-2.5 rounded-3xl border transition-all duration-500
                        bg-white/80 dark:bg-[#121829]/40 backdrop-blur-2xl border-slate-200 dark:border-white/10 shadow-xl dark:shadow-[0_20px_50px_rgba(0,0,0,0.5)]">

                    <!-- Utama (Gradient Tetap Menyala) -->
                    <a href="{{route('ontopic')}}"
                        class="group relative sidebar-icon shadow-lg shadow-orange-500/20 text-white transform hover:scale-110 active:scale-95 transition-all ">
                        <i class="fas fa-home text-[1.1rem]"></i>
                        <span
                            class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-orange-600 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none text-white">
                            {{ __('messages.cat_utama') }}
                        </span>
                    </a>

                    @php
                        $categoryIcons = [
                            'Edukasi Bisnis' => 'fa-graduation-cap',
                            'Artikel' => 'fa-newspaper',
                            'Promo' => 'fa-tags',
                            'Networking' => 'fa-users',
                            'Event' => 'fa-calendar-alt',
                            'Pengumuman' => 'fa-bullhorn',
                            'Press Release' => 'fa-file-alt',
                        ];
                    @endphp

                    @foreach ($categories as $cat)
                        <a href="{{ route('ontopic', ['category' => $cat['slug']]) }}"
                            class="group relative sidebar-icon transition-all transform hover:scale-110
                            {{ request('category') === $cat['slug']
                                ? 'text-orange-500'
                                : 'text-slate-500 dark:text-slate-400 hover:text-orange-500 dark:hover:text-white hover:bg-orange-500/10' }}">
                            <i class="fas {{ $categoryIcons[$cat['name']] ?? 'fa-tag' }}"></i>
                            <span
                                class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-slate-800 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none border border-white/5 text-white">
                                {{ $cat['name'] }}
                            </span>
                        </a>
                    @endforeach
                </aside>

                <!-- 2. TENGAH: MAIN NEWS FEED (Improved Typography) -->
                <main class="flex-1 max-w-[680px] mt-32 md:mt-20">
                    <header class="mb-10 pl-2">
                        <h1
                            class="text-3xl md:text-5xl font-bold tracking-tight mb-3 bg-gradient-to-r from-slate-900 via-slate-800 to-orange-500 dark:from-white dark:via-slate-200 dark:to-orange-500 bg-clip-text text-transparent">
                            {{ __('messages.feed_title') }}
                        </h1>
                        <p class="text-slate-500 dark:text-slate-400 text-lg font-medium">
                            {{ __('messages.feed_subtitle') }}
                        </p>
                    </header>

                    <div class="space-y-10">
                        @foreach (($articles['data'] ?? []) as $article)
                            <article class="group cursor-pointer">
                                <a href="{{ route('ontopic.show', $article['slug']) }}">
                                    <div
                                        class="relative overflow-hidden rounded-[2.5rem] border transition-all duration-500 
                                        bg-white dark:bg-[#0d1117] border-slate-200 dark:border-white/5 
                                        hover:border-orange-500/50 hover:shadow-[0_30px_60px_-15px_rgba(255,115,0,0.15)]">

                                        {{-- Gambar --}}
                                        <div class="relative h-80 overflow-hidden">
                                            <img src="{{ $article['thumbnail_url'] }}"
                                                alt="{{ $article['image_alt'] ?? $article['title'] }}"
                                                class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent dark:from-[#0d1117] opacity-90 dark:opacity-100">
                                            </div>

                                            <div class="absolute top-6 left-6">
                                                <span
                                                    class="backdrop-blur-md text-[10px] uppercase tracking-widest px-4 py-2 rounded-full font-bold border 
                                                    bg-white/60 dark:bg-black/40 border-slate-200 dark:border-white/10 text-slate-800 dark:text-white">
                                                    {{ \Carbon\Carbon::parse($article['published_at'])->locale('id')->isoFormat('D MMMM YYYY') }}
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Konten --}}
                                        <div class="p-8 -mt-4 relative z-10 bg-white dark:bg-transparent">
                                            <h2
                                                class="text-2xl md:text-3xl font-extrabold leading-tight mb-3 transition-colors duration-300
                                                text-slate-900 dark:text-white group-hover:text-orange-500">
                                                {{ $article['title'] }}
                                            </h2>
                                            <p class="text-sm text-slate-500 dark:text-slate-400">
                                                {{ $article['excerpt'] }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </main>

                <!-- 3. KANAN: SIDEBAR CONTENT -->
                <aside class="hidden xl:block w-[340px] space-y-8 mt-16 sticky top-28 h-fit pb-10">

                    <!-- Section Berita Utama -->
                    <div
                        class="rounded-[2.5rem] p-8 border transition-all duration-500
                    bg-white dark:bg-[#0a0f1d] border-slate-200 dark:border-white/5 shadow-xl dark:shadow-2xl">

                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100 tracking-tight">Berita Utama
                            </h3>
                            <a href="#"
                                class="text-[10px] font-black text-orange-600 dark:text-slate-500 hover:dark:text-orange-400 uppercase tracking-widest transition-colors">See
                                all</a>
                        </div>

                        <div class="space-y-8">
                            @for ($j = 0; $j < 3; $j++)
                                <div
                                    class="group cursor-pointer border-b last:border-0 pb-6 last:pb-0 border-slate-100 dark:border-white/5">
                                    <div
                                        class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest mb-3 text-slate-400 dark:text-slate-500">
                                        <i class="fas fa-globe-asia text-orange-500"></i>
                                        <span>Barat</span>
                                        <span class="text-slate-300 dark:text-slate-700">•</span>
                                        <span>Feb 18</span>
                                    </div>
                                    <h4
                                        class="text-[15px] font-bold leading-relaxed transition-colors duration-300
                                text-slate-800 dark:text-slate-200 group-hover:text-orange-500">
                                        ACMI Grebek Kantor : Kunjungan ke Jofiter Group oleh Budi Wahyono
                                    </h4>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Section Sport -->
                    <div
                        class="rounded-[2.5rem] p-8 border transition-all duration-500
                    bg-white dark:bg-[#0a0f1d] border-slate-200 dark:border-white/5 shadow-xl dark:shadow-2xl">

                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-black text-orange-500 italic tracking-tighter uppercase">Sport</h3>
                            <a href="#"
                                class="text-[10px] font-bold text-slate-400 hover:text-slate-900 dark:hover:text-white uppercase tracking-widest transition-colors">See
                                all</a>
                        </div>

                        <div class="space-y-6">
                            <div
                                class="group cursor-pointer p-4 rounded-2xl bg-slate-50 dark:bg-white/5 border border-transparent hover:border-orange-500/30 transition-all">
                                <div class="flex items-center gap-2 text-[10px] font-bold uppercase mb-2 text-slate-400">
                                    <i class="fas fa-trophy text-orange-500"></i>
                                    <span>Tournament</span>
                                </div>
                                <h4
                                    class="text-[15px] font-bold leading-relaxed text-slate-800 dark:text-slate-200 group-hover:text-orange-500 transition-colors">
                                    CEO Golf Championship 2026: Mempererat Silaturahmi Pengusaha
                                </h4>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>

    <style>
        /* Utility Sidebar Icon */
        .sidebar-icon {
            @apply flex items-center justify-center w-12 h-12 rounded-2xl transition-all duration-300;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar (Optional) */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            @apply bg-slate-100 dark:bg-[#0a0a0b];
        }

        ::-webkit-scrollbar-thumb {
            @apply bg-slate-300 dark:bg-slate-800 rounded-full hover:bg-orange-500;
        }
    </style>
@endsection
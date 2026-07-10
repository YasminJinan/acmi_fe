@extends('layouts.app')

@section('title', 'ACMI - Bersinergi Memimpin Indonesia')
@section('meta_description',
    'Komunitas eksklusif CEO dan eksekutif terbaik Indonesia. Networking, knowledge sharing,
    dan business opportunities.')
@section('meta_keywords', 'acmi, ceo indonesia, komunitas eksekutif, leadership indonesia')
@section('og_image', asset('images/OG-ACMI.png'))
@section('canonical', url('/'))

@section('content')

    {{-- HERO SECTION --}}
    <section x-data="{
        activeSlide: 0,
        headerData: null,
        slides: [],
        isLoading: true,
        init() {
            fetch('http://localhost:8000/api/public/header')
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.data) {
                        this.headerData = data.data;
                        if(data.data.images && data.data.images.length > 0) {
                            this.slides = data.data.images;
                        } else {
                            this.slides = [
                                'https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=1920&q=80',
                                'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1920&q=80',
                                'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=1920&q=80'
                            ];
                        }
                    } else {
                        this.slides = [
                            'https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=1920&q=80',
                            'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1920&q=80',
                            'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=1920&q=80'
                        ];
                    }
                    this.isLoading = false;
                    
                    if (this.slides.length > 1) {
                        setInterval(() => {
                            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                        }, 5000);
                    }
                })
                .catch(err => {
                    console.error('Error memuat data header:', err);
                    this.isLoading = false;
                });
        }
    }"
        class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-50 dark:bg-[#0a0a0b]">

        {{-- Background Image Slider --}}
        <div class="absolute inset-0 w-full h-full bg-gray-900">
            <template x-for="(slide, index) in slides" :key="index">
                <img :src="slide" alt="Exclusive Community Background"
                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-[1500ms] ease-in-out"
                    :class="activeSlide === index ? 'opacity-80 dark:opacity-100' : 'opacity-0'" />
            </template>
        </div>

        {{-- Overlay --}}
        <div
            class="absolute inset-0 bg-gradient-to-b
        from-white/20 via-white/60 to-gray-50
        dark:from-[#0a0a0b]/40 dark:via-[#0a0a0b]/80 dark:to-[#0a0a0b]">
        </div>

        <div class="relative z-10 text-center px-6 max-w-7xl">

            {{-- Badge --}}
            <div data-aos="zoom-in"
                class="inline-block px-6 py-1.5 rounded-full bg-white/80 dark:bg-white/5 backdrop-blur-md border border-gray-200 dark:border-white/10 shadow-[0_8px_32px_0_rgba(255,145,0,0.08)] mb-6 transition-all duration-500 hover:border-orange-400/50 group">
                <div class="flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                    </span>
                    <span
                        class="text-orange-600 dark:text-orange-500 text-xs font-poppins font-semibold uppercase tracking-widest group-hover:text-orange-500 transition-colors">
                        {{ __('messages.hero_badge') }}
                    </span>
                </div>
            </div>

            {{-- Judul --}}
            <h1 data-aos="fade-up" data-aos-delay="200"
                class="text-4xl md:text-6xl lg:text-7xl leading-tight drop-shadow-md">
                <span class="font-poppins font-semibold text-white" x-text="headerData?.title_1 || '{{ __('messages.hero_title_1') }}'"></span><br>
                <span
                    class="font-serif font-bold italic text-orange-600 dark:text-orange-500" x-text="headerData?.title_2 || '{{ __('messages.hero_title_2') }}'"></span>
            </h1>

            {{-- Deskripsi --}}
            <p data-aos="fade-up" data-aos-delay="400"
                class="mt-6 text-gray-700 dark:text-gray-300 text-sm md:text-base font-poppins max-w-xl mx-auto leading-relaxed"
                x-text="headerData?.description || '{{ __('messages.hero_desc') }}'">
            </p>

            {{-- Buttons --}}
            <div data-aos="fade-up" data-aos-delay="600" class="mt-8 flex justify-center gap-4 flex-wrap">
                <a href="/form-join"
                    class="px-6 py-3 bg-orange-600 dark:bg-orange-500 text-white rounded-lg font-semibold shadow-md shadow-orange-500/20 hover:bg-orange-700 dark:hover:bg-orange-600 hover:scale-105 transition-all duration-300 inline-block">
                    {{ __('messages.btn_join') }}
                </a>
                <a href="{{ app()->getLocale() == 'id' ? route('id.artikel') : route('en.ontopic') }}"
                    class="inline-block px-6 py-3 border border-orange-400 text-orange-500 rounded-lg font-semibold hover:bg-orange-50 dark:hover:bg-orange-950 transition-all duration-300">
                    {{ __('messages.btn_explore') }}
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-14 grid grid-cols-3 gap-4 max-w-3xl mx-auto">
                @php
                    $stats = [
                        ['target' => 500, 'suffix' => '+', 'label' => __('messages.stats_ceo')],
                        ['target' => 300, 'suffix' => '+', 'label' => __('messages.stats_events')],
                        ['target' => 100, 'suffix' => '+', 'label' => __('messages.stats_industry')],
                    ];
                @endphp

                @foreach ($stats as $index => $stat)
                    <div data-aos="flip-up" data-aos-delay="{{ 800 + $index * 100 }}"
                        class="bg-white/80 dark:bg-white/5 backdrop-blur-lg rounded-xl py-4 border border-gray-200/60 dark:border-white/10 shadow-lg shadow-gray-200/50 dark:shadow-none"
                        x-data="{
                            current: 0,
                            target: {{ $stat['target'] }},
                            time: 1500,
                            start() {
                                let startTimestamp = null;
                                const step = (timestamp) => {
                                    if (!startTimestamp) startTimestamp = timestamp;
                                    const progress = Math.min((timestamp - startTimestamp) / this.time, 1);
                                    this.current = Math.floor(progress * this.target);
                                    if (progress < 1) window.requestAnimationFrame(step);
                                };
                                window.requestAnimationFrame(step);
                            }
                        }" x-init="start()">
                        <p class="text-2xl font-bold font-poppins text-gray-950 dark:text-white">
                            <span x-text="current">0</span>{{ $stat['suffix'] }}
                        </p>
                        <p class="text-xs text-gray-600 dark:text-gray-400 font-poppins mt-0.5">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- PARTNER SECTION DINAMIS DARI CMS --}}
    <section x-data="{
        partners: [],
        isLoading: true,
        init() {
            fetch('http://localhost:8000/api/public/partners')
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        this.partners = data.data;
                    }
                    this.isLoading = false;
                })
                .catch(err => {
                    console.error('Error memuat data partner:', err);
                    this.isLoading = false;
                });
        }
    }"
        class="relative py-24 bg-white dark:bg-[#0a0a0b] overflow-hidden transition-colors duration-500">
        <div class="container mx-auto px-6">

            {{-- Header Title --}}
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-orange-500 dark:text-orange-400 text-xs font-bold tracking-[0.2em] uppercase mb-3">
                    {{ __('messages.partner_title') }}
                </h2>
                <div class="h-1 w-12 bg-orange-500 mx-auto rounded-full"></div>
            </div>

            {{-- State Loading --}}
            <template x-if="isLoading">
                <div class="flex justify-center items-center py-10">
                    <i class="fa-solid fa-spinner fa-spin text-3xl text-orange-500"></i>
                </div>
            </template>

            {{-- Grid Partner Dinamis --}}
            <template x-if="!isLoading && partners.length > 0">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 max-w-6xl mx-auto">

                    {{-- Looping Data Partner dari API --}}
                    <template x-for="(partner, index) in partners" :key="partner.id || index">

                        {{-- Anchor Tag yang disesuaikan dengan key 'link' --}}
                        <a :href="partner.link ? partner.link : 'javascript:void(0)'"
                            :target="partner.link ? '_blank' : '_self'"
                            class="group relative bg-gray-50 dark:bg-white/5 backdrop-blur-sm rounded-2xl py-8 px-4 border border-gray-100 dark:border-white/10 flex items-center justify-center transition-all duration-500 hover:bg-white dark:hover:bg-white/10 hover:shadow-[0_20px_40px_rgba(0,0,0,0.05)] dark:hover:shadow-[0_20px_40px_rgba(0,0,0,0.3)] hover:-translate-y-2 cursor-pointer">

                            <div
                                class="absolute inset-0 bg-orange-500/5 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-500">
                            </div>

                            {{-- Gambar Logo yang disesuaikan dengan key 'image' --}}
                            <template x-if="partner.image">
                                <img :src="partner.image" :alt="partner.name"
                                    class="max-h-12 w-auto object-contain grayscale group-hover:grayscale-0 transition-all duration-300">
                            </template>

                            {{-- Teks Jika Logo Kosong --}}
                            <template x-if="!partner.image">
                                <p class="font-bold text-gray-400 dark:text-gray-500 group-hover:text-orange-500 dark:group-hover:text-orange-400 text-lg tracking-wider transition-colors duration-300"
                                    x-text="partner.name">
                                </p>
                            </template>

                        </a>
                    </template>

                </div>
            </template>

            {{-- Jika CMS masih kosong --}}
            <template x-if="!isLoading && partners.length === 0">
                <p class="text-center text-gray-500 text-sm font-poppins">Mitra belum ditambahkan.</p>
            </template>

        </div>
    </section>


    <!-- {{-- EVENT BANNER --}}
            <section class="bg-white dark:bg-[#0a0a0b] px-6 md:px-10 pt-10 pb-6">
                <div class="max-w-7xl mx-auto">
                    <div
                        class="relative overflow-hidden bg-gradient-to-br from-orange-50/60 via-[#f8f9fa] to-white dark:from-white/5 dark:via-white/5 dark:to-white/5 border border-orange-100 dark:border-white/10 rounded-2xl px-8 py-6 flex flex-col md:flex-row items-center justify-between shadow-md shadow-orange-500/[0.02] dark:shadow-none gap-6 group">

                        {{-- Dekorasi Ikon Background (Hanya pemanis visual samar) --}}
                        <div
                            class="absolute -right-6 -bottom-6 text-orange-500/5 dark:text-white/5 text-9xl pointer-events-none transform -rotate-12 transition-transform duration-500 group-hover:scale-110">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>

                        {{-- Sisi Kiri: Info Event --}}
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 w-full md:w-auto">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 dark:from-orange-500/20 dark:to-orange-600/20 text-white dark:text-orange-400 rounded-xl flex items-center justify-center text-xl shadow-md shadow-orange-500/20 dark:shadow-none shrink-0">
                                <i class="fa-solid fa-bolt-lightning animate-pulse"></i>
                            </div>
                            <div>
                                <span
                                    class="inline-flex items-center gap-1.5 text-xs font-bold bg-orange-100/80 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 px-3 py-1 rounded-full uppercase tracking-wider">
                                    <i class="fa-solid fa-sparkles text-[10px]"></i> {{ __('messages.event_badge') }}
                                </span>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white mt-2 font-poppins tracking-tight">
                                    {{ __('messages.event_title') }}
                                </h2>
                                <div
                                    class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1.5 text-sm text-gray-600 dark:text-gray-400">
                                    <p class="flex items-center gap-2">
                                        <i class="fa-regular fa-calendar-days text-orange-500 dark:text-orange-400"></i>
                                        {{ __('messages.event_date') }}
                                    </p>
                                    <span class="hidden sm:inline text-gray-300 dark:text-gray-700">•</span>
                                    <p class="flex items-center gap-1.5">
                                        <i class="fa-solid fa-location-dot text-gray-400 dark:text-gray-500"></i>
                                        <span class="text-xs">Live / Hybrid</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Promo & CTA Button --}}
                        <div
                            class="flex items-center justify-between md:justify-end gap-6 w-full md:w-auto border-t border-gray-100 dark:border-white/5 pt-4 md:pt-0 md:border-none">
                            <div class="text-left md:text-right flex items-center md:flex-col gap-2 md:gap-0">
                                <p
                                    class="text-xs font-medium text-gray-500 dark:text-gray-400 flex items-center gap-1 md:justify-end">
                                    <i class="fa-solid fa-tags text-orange-400 md:hidden"></i> Early Bird Discount
                                </p>
                                <p
                                    class="text-orange-600 dark:text-orange-400 font-black text-xl tracking-tight flex items-center gap-1">
                                    30% OFF <i class="fa-solid fa-fire text-sm animate-bounce hidden md:inline-block"></i>
                                </p>
                            </div>

                            <a href="{{ app()->getLocale() == 'id' ? route('id.gabung') : route('en.join') }}"
                                class="bg-orange-600 hover:bg-orange-700 dark:bg-orange-500 dark:hover:bg-orange-600 text-white text-sm font-semibold px-6 py-3.5 rounded-xl flex items-center gap-2.5 shadow-md shadow-orange-600/10 dark:shadow-none hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 ml-auto md:ml-0">
                                <span>{{ __('messages.event_cta') }}</span>
                                <i class="fa-solid fa-arrow-right-long text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </section> -->


    {{-- SOLUTION SECTION --}}
    <section
        class="relative min-h-screen w-full flex items-center justify-center py-24 px-6 overflow-hidden transition-colors duration-500 bg-white dark:bg-[#0a0a0b]">

        {{-- Background Overlay --}}
        <div class="absolute inset-0 z-0" data-aos="fade-in" data-aos-duration="2000">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80"
                class="w-full h-full object-cover opacity-20 dark:opacity-15" alt="Office background">
            <div
                class="absolute inset-0 bg-gradient-to-tr from-white via-white/85 to-orange-100/40 dark:from-[#0a0a0b] dark:via-[#0a0a0b]/95 dark:to-orange-500/10 transition-colors duration-500">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

            {{-- Left Side --}}
            <div class="space-y-12 lg:max-w-md xl:max-w-lg lg:ml-auto" data-aos="fade-right">
                <div class="relative">
                    <div
                        class="absolute -left-6 top-0 w-1 h-24 bg-orange-600 dark:bg-orange-500 rounded-full hidden md:block">
                    </div>

                    <span
                        class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full border border-orange-200 dark:border-orange-500/30 bg-orange-50/80 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-6 uppercase tracking-[0.2em]">
                        <i class="fa-solid fa-lightbulb text-[9px]"></i> {{ __('messages.solution_badge') }}
                    </span>

                    <h2
                        class="text-4xl md:text-6xl font-poppins font-bold text-gray-950 dark:text-white leading-[1.1] tracking-tight">
                        ACMI:
                        <span
                            class="font-serif italic text-orange-600 dark:text-orange-500 block md:inline-block">Powerhouse</span><br
                            class="hidden md:block">
                        <span class="font-light tracking-tight">{{ __('messages.solution_title') }}</span>
                    </h2>

                    <p
                        class="mt-8 text-gray-700 dark:text-gray-400 text-base md:text-lg font-poppins max-w-lg leading-relaxed">
                        {{ __('messages.solution_desc') }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-8 pt-10 border-t border-gray-200/60 dark:border-white/5">
                    <div class="group">
                        <p
                            class="text-4xl md:text-5xl font-black text-gray-950 dark:text-white font-poppins group-hover:text-orange-600 dark:group-hover:text-orange-500 transition-colors duration-300">
                            10<span class="text-orange-600 dark:text-orange-500">+</span>
                        </p>
                        <p
                            class="text-[11px] text-gray-500 dark:text-gray-400 font-bold uppercase tracking-widest mt-3 flex items-center gap-1.5">
                            {{ __('messages.solution_exp') }}
                        </p>
                    </div>
                    <div class="group">
                        <p
                            class="text-4xl md:text-5xl font-black text-gray-950 dark:text-white font-poppins group-hover:text-orange-600 dark:group-hover:text-orange-500 transition-colors duration-300">
                            50<span class="text-orange-600 dark:text-orange-500 text-3xl">T+</span>
                        </p>
                        <p
                            class="text-[11px] text-gray-500 dark:text-gray-400 font-bold uppercase tracking-widest mt-3 flex items-center gap-1.5">
                            {{ __('messages.solution_revenue') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Right Side (Cards) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                <div class="absolute inset-0 bg-orange-500/[0.04] dark:bg-orange-500/5 blur-[120px] -z-10 rounded-full">
                </div>

                @php
                    $solutions = [
                        [
                            'icon' => 'fa-book-open',
                            'title' => __('messages.solution_1_title'),
                            'desc' => __('messages.solution_1_desc'),
                            'aos' => 'fade-down',
                        ],
                        [
                            'icon' => 'fa-share-nodes',
                            'title' => __('messages.solution_2_title'),
                            'desc' => __('messages.solution_2_desc'),
                            'aos' => 'fade-left',
                        ],
                        [
                            'icon' => 'fa-sitemap',
                            'title' => __('messages.solution_3_title'),
                            'desc' => __('messages.solution_3_desc'),
                            'aos' => 'fade-right',
                        ],
                        [
                            'icon' => 'fa-rocket',
                            'title' => __('messages.solution_4_title'),
                            'desc' => __('messages.solution_4_desc'),
                            'aos' => 'fade-up',
                        ],
                    ];
                @endphp

                @foreach ($solutions as $index => $sol)
                    <div data-aos="{{ $sol['aos'] }}" data-aos-delay="{{ $index * 100 }}"
                        class="group bg-white/90 dark:bg-white/[0.03] backdrop-blur-xl p-8 rounded-[2rem] border border-gray-200/50 dark:border-white/5 shadow-[0_15px_40px_-15px_rgba(249,115,22,0.06)] dark:shadow-none hover:shadow-xl hover:shadow-orange-500/[0.08] dark:hover:shadow-orange-500/10 hover:-translate-y-2 transition-all duration-500">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-2xl flex items-center justify-center text-xl mb-6 shadow-md shadow-orange-500/20 dark:shadow-none group-hover:rotate-6 transition-transform">
                            <i class="fa-solid {{ $sol['icon'] }}"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-950 dark:text-white font-poppins mb-3 tracking-tight">
                            {{ $sol['title'] }}
                        </h3>
                        <p
                            class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed font-poppins group-hover:text-gray-800 dark:group-hover:text-gray-300 transition-colors">
                            {{ $sol['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- EXCLUSIVE MEMBERSHIP SECTION --}}
    <section
        class="relative py-20 md:py-28 bg-gradient-to-b from-white to-gray-50 dark:from-[#0a0a0b] dark:to-[#0c0c0e] transition-colors duration-500 overflow-hidden">

        {{-- Decorative Background (Disesuaikan antara Light dan Dark) --}}
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-10%] left-1/2 -translate-x-1/2 w-[600px] h-[500px] bg-orange-500/[0.06] dark:bg-orange-500/10 rounded-full blur-[120px]">
            </div>
            <div
                class="absolute bottom-[-5%] right-[-5%] w-[300px] h-[300px] bg-orange-600/[0.03] dark:bg-orange-900/10 rounded-full blur-[100px]">
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-6 md:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                {{-- Left: Info --}}
                <div class="space-y-8" data-aos="fade-right">
                    <div>
                        {{-- Badge --}}
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-200 dark:border-orange-500/20 bg-orange-50/80 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-xs font-bold mb-5 shadow-sm uppercase tracking-widest font-poppins">
                            <i class="fa-solid fa-shield-halved text-[11px]"></i>
                            <span>{{ __('messages.membership_badge') }}</span>
                        </div>

                        {{-- Title --}}
                        <h2
                            class="text-3xl sm:text-4xl lg:text-5xl font-poppins text-gray-950 dark:text-white leading-[1.15] tracking-tight">
                            <span class="font-light">{{ __('messages.membership_title_1') }}</span>
                            <span
                                class="block font-serif font-bold italic text-orange-600 dark:text-orange-500 mt-1 selection:bg-orange-500/20">
                                {{ __('messages.membership_title_2') }}
                            </span>
                        </h2>

                        {{-- Description --}}
                        <p
                            class="mt-6 text-gray-600 dark:text-gray-400 text-base md:text-lg font-poppins leading-relaxed max-w-md">
                            {{ __('messages.membership_desc') }}
                        </p>
                    </div>

                    {{-- Checklist dengan Hover Efek Oranye Premium --}}
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                        @php
                            $features = is_array(__('messages.membership_features'))
                                ? __('messages.membership_features')
                                : [];
                        @endphp
                        @foreach ($features as $feature)
                            <li
                                class="flex items-center gap-3 text-gray-700 dark:text-gray-300 font-poppins text-sm group cursor-default">
                                <div
                                    class="flex-shrink-0 w-5 h-5 rounded-md bg-orange-100/80 dark:bg-orange-500/20 flex items-center justify-center group-hover:bg-orange-600 dark:group-hover:bg-orange-500 transition-colors duration-300 shadow-sm">
                                    <i
                                        class="fa-solid fa-check text-[9px] text-orange-600 dark:text-orange-400 group-hover:text-white transition-colors duration-300"></i>
                                </div>
                                <span
                                    class="group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors duration-200">
                                    {{ $feature }}
                                </span>
                            </li>
                        @endforeach
                    </ul>

                    {{-- CTA --}}
                    <div class="pt-2 group/btn">
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <a href="{{ url('/form-join') }}"
                                class="px-8 py-4 bg-orange-600 dark:bg-orange-500 hover:bg-orange-700 dark:hover:bg-orange-600 text-white font-bold font-poppins rounded-xl shadow-lg shadow-orange-600/20 dark:shadow-none transition-all duration-300 hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 w-full sm:w-auto">
                                {{ __('messages.membership_cta_btn') }}
                                <i
                                    class="fa-solid fa-arrow-right-long transition-transform duration-300 group-hover/btn:translate-x-1.5"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Card Luxury Glassmorphism --}}
                <div class="relative flex justify-center lg:justify-end" data-aos="fade-left">
                    {{-- Glow effect di belakang card --}}
                    <div
                        class="absolute -top-12 -right-12 w-72 h-72 bg-orange-500/[0.08] dark:bg-orange-500/[0.12] blur-[100px] rounded-full pointer-events-none">
                    </div>

                    <div
                        class="relative group flex flex-col justify-center aspect-square bg-gradient-to-b from-white to-gray-50/50 dark:from-white/[0.04] dark:to-white/[0.01] border border-gray-200/80 dark:border-white/[0.08] p-10 md:p-12 rounded-[2.5rem] w-full max-w-[460px] text-center shadow-xl shadow-gray-200/50 dark:shadow-none backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:rotate-1 hover:border-orange-500/30 dark:hover:border-orange-500/30 hover:shadow-2xl hover:shadow-orange-500/[0.06] dark:hover:shadow-orange-500/[0.04]">

                        {{-- Icon Container Premium dengan Efek Pulse Lambat --}}
                        <div
                            class="relative w-20 h-20 mx-auto mb-8 flex items-center justify-center bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-500/10 dark:to-orange-500/20 text-orange-600 dark:text-orange-400 rounded-2xl shadow-inner group-hover:scale-110 transition-transform duration-500">
                            <i class="fa-solid fa-gem text-3xl animate-pulse [animation-duration:3s]"></i>
                        </div>

                        {{-- Card Content --}}
                        <h4 class="text-gray-900 dark:text-white font-bold font-poppins text-xl tracking-tight">
                            VIP Access Pass
                        </h4>
                        <p class="text-gray-500 dark:text-gray-400 text-xs font-poppins mt-3 px-2 leading-relaxed">
                            Unlock ultimate network with top-tier industrial leaders and global CEOs.
                        </p>

                        {{-- Divider & Bottom Label --}}
                        <div
                            class="mt-8 pt-6 border-t border-gray-100 dark:border-white/[0.06] flex items-center justify-center gap-2 text-[11px] font-bold tracking-widest text-orange-600 dark:text-orange-400 uppercase">
                            <span>Exclusive Tier</span>
                            <i class="fa-solid fa-star text-[9px] animate-spin [animation-duration:10s]"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Swiper Script --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('.membershipSwiper')) {
                new Swiper(".membershipSwiper", {
                    effect: "cards",
                    cardsEffect: {
                        slideShadows: false,
                        rotate: true,
                        perSlideRotate: 2,
                        perSlideOffset: 8,
                    },
                    grabCursor: true,
                    loop: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                        dynamicBullets: true,
                    },
                });
            }
        });
    </script>

    <style>
        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #cbd5e1 !important;
            opacity: 1;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: #f97316 !important;
            width: 30px !important;
            border-radius: 5px !important;
        }

        .dark .card-glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
        }
    </style>


    {{-- PRODUK ANGGOTA SECTION --}}
    <section class="bg-gray-50 dark:bg-[#050505] py-16 px-6 md:px-10 transition-colors duration-500 overflow-hidden relative" id="produk-anggota"
        x-data="{
            search: '',
            category: 'Semua',
            products: @js($products),
            page: 1,
            perPage: 6,
            get filteredProducts() {
                return this.products.filter(p => {
                    const title = p.title || '';
                    const company = p.company_name || '';
                    const matchSearch = title.toLowerCase().includes(this.search.toLowerCase()) ||
                        company.toLowerCase().includes(this.search.toLowerCase());
                    const matchCategory = this.category === 'Semua' ||
                        (Array.isArray(p.category) ? p.category.includes(this.category) : p.category === this.category);
                    return matchSearch && matchCategory;
                });
            },
            get paginatedProducts() {
                let start = (this.page - 1) * this.perPage;
                let end = start + this.perPage;
                return this.filteredProducts.slice(start, end);
            },
            get totalPages() {
                return Math.ceil(this.filteredProducts.length / this.perPage);
            }
        }"
        x-init="$watch('search', value => page = 1); $watch('category', value => page = 1)">

        <div class="max-w-7xl mx-auto">

            {{-- Header --}}
            <div class="text-center max-w-3xl mx-auto mb-10" data-aos="fade-up">

                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-[10px] font-semibold mb-4 border border-orange-100 dark:border-orange-500/20">
                    <i class="fa-solid fa-box-open animate-pulse"></i>
                    {{ __('messages.products_badge') }}
                </div>

                <h2 class="text-5xl md:text-5xl font-regular text-gray-900 dark:text-white leading-tight">
                    {{ __('messages.products_title_1') }} <br>
                    <span class="text-orange-500 font-serif italic font-bold">{{ __('messages.products_title_2') }}</span>
                </h2>

                {{-- Search & Filter --}}
                <div class="mt-6 flex flex-col md:flex-row gap-3 justify-center">
                    <div class="relative group md:w-72">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xs group-focus-within:text-orange-500 transition-colors"></i>
                        <input type="text" x-model="search"
                            placeholder="{{ __('messages.products_search_placeholder') }}"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white text-sm transition-all">
                    </div>

                    <select x-model="category"
                        class="px-6 py-3 rounded-xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white text-sm cursor-pointer appearance-none">
                        @foreach (__('messages.products_categories') as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Grid Produk --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="product in paginatedProducts" :key="product.id">
                    <div class="group flex flex-col" data-aos="fade-up">
                        <div
                            class="relative bg-white dark:bg-white/5 rounded-[2rem] overflow-hidden border border-gray-100 dark:border-white/10 transition-all duration-500 hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 flex flex-col h-full">

                            {{-- Image --}}
                            <div class="relative h-[180px] overflow-hidden">
                                <img :src="product.image" :alt="product.title"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-[1.5s] ease-out">
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md text-orange-600 dark:text-orange-400 text-[9px] px-3 py-1.5 rounded-lg font-black uppercase tracking-widest shadow-lg"
                                        x-text="Array.isArray(product.category) ? product.category[0] : product.category">
                                    </span>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-lg font-poppins font-bold text-gray-900 dark:text-white mb-2 group-hover:text-orange-500 transition-colors line-clamp-1"
                                    x-text="product.title">
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400 text-xs mb-4 line-clamp-2 leading-relaxed"
                                    x-text="product.description">
                                </p>

                                <div class="mt-auto">
                                    {{-- Business Info --}}
                                    <div
                                        class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 dark:bg-white/5 mb-4 border border-transparent group-hover:border-orange-500/20 transition-all">
                                        <div class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center text-[10px] font-black shadow-lg shadow-orange-500/20 flex-shrink-0"
                                            x-text="product.ceo_name ? product.ceo_name.charAt(0) : '?'">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-gray-900 dark:text-gray-200 font-bold text-[11px] truncate"
                                                x-text="product.company_name">
                                            </p>
                                            <p class="text-gray-400 text-[9px] uppercase tracking-tighter">
                                                {{ __('messages.products_ceo_label') }}: <span
                                                    class="text-gray-500 dark:text-gray-300"
                                                    x-text="product.ceo_name"></span>
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Button --}}
                                    <a :href="'{{ app()->getLocale() == 'id' ? '/id/produk/' : '/en/products/' }}' + product.slug"
                                        class="inline-flex items-center justify-center w-full py-3 bg-slate-900 dark:bg-white/10 text-white rounded-xl text-[11px] font-bold hover:bg-orange-500 dark:hover:bg-orange-500 transition-all duration-500 group/btn">
                                        {{ __('messages.products_detail_btn') }}
                                        <i
                                            class="fa-solid fa-arrow-right ml-2 text-[10px] transition-transform group-hover/btn:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </template>

                {{-- Empty State (inside grid for col-span) --}}
                <div x-show="filteredProducts.length === 0" x-cloak class="col-span-3 text-center py-24">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-white/5 text-gray-400 mb-6">
                        <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('messages.products_empty_title') }}
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">{{ __('messages.products_empty_desc') }}</p>
                </div>
            </div>

            {{-- NAVIGASI PAGINATION --}}
            <div x-show="totalPages > 1" x-cloak class="mt-16 flex justify-center items-center gap-2" data-aos="fade-up">
                {{-- Tombol Prev --}}
                <button @click="if(page > 1) { page--; document.getElementById('produk-anggota').scrollIntoView({behavior: 'smooth'}); }" 
                    :disabled="page === 1"
                    class="w-12 h-12 rounded-xl flex items-center justify-center transition-all border border-gray-200 dark:border-white/10 text-gray-600 dark:text-gray-400 hover:border-orange-500 hover:text-orange-500 disabled:opacity-30 disabled:pointer-events-none bg-white dark:bg-white/5">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>

                {{-- Angka Halaman --}}
                <template x-for="p in totalPages" :key="p">
                    <button @click="page = p; document.getElementById('produk-anggota').scrollIntoView({behavior: 'smooth'});"
                        x-text="p"
                        :class="page === p 
                            ? 'bg-orange-500 text-white border-orange-500 shadow-lg shadow-orange-500/25' 
                            : 'bg-white dark:bg-white/5 text-gray-700 dark:text-gray-300 border-gray-200 dark:border-white/10 hover:border-orange-500 hover:text-orange-500'"
                        class="w-12 h-12 rounded-xl font-bold text-sm border transition-all">
                    </button>
                </template>

                {{-- Tombol Next --}}
                <button @click="if(page < totalPages) { page++; document.getElementById('produk-anggota').scrollIntoView({behavior: 'smooth'}); }" 
                    :disabled="page === totalPages"
                    class="w-12 h-12 rounded-xl flex items-center justify-center transition-all border border-gray-200 dark:border-white/10 text-gray-600 dark:text-gray-400 hover:border-orange-500 hover:text-orange-500 disabled:opacity-30 disabled:pointer-events-none bg-white dark:bg-white/5">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </div>

            <div x-show="filteredProducts.length > 6" data-aos="fade-up" class="mt-8 text-center relative z-30" x-cloak>
                <a href="{{ app()->getLocale() == 'id' ? route('id.produk') : route('en.products') }}"
                    class="inline-flex items-center gap-3 bg-white dark:bg-gray-800 border-2 border-orange-100 dark:border-orange-500/20 text-orange-500 px-10 py-4 rounded-full text-xs font-black uppercase tracking-widest shadow-[0_15px_30px_rgba(255,107,0,0.15)] hover:bg-orange-500 hover:text-white dark:hover:bg-orange-500 transition-all duration-500 transform active:scale-95 group">
                    <span>{{ __('messages.products_view_more') }}</span>
                    <i class="fa-solid fa-chevron-right text-[10px] transition-transform duration-500 group-hover:translate-x-1"></i>
                </a>
            </div>

        </div>
        </div>
        <style>
            [x-cloak] {
                display: none !important;
            }

            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #f97316;
                border-radius: 10px;
            }
        </style>
    </section>

    {{-- TESTIMONIAL SECTION --}}
    <section x-data="{
        open: false,
        labelMore: '{{ __('messages.testimonial_more') }}',
        labelLess: '{{ __('messages.testimonial_less') }}'
    }"
        class="relative py-24 overflow-hidden transition-colors duration-500 bg-slate-50 dark:bg-[#0a0a0b]">

        {{-- Background --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1920&q=80"
                class="w-full h-full object-cover opacity-20 dark:opacity-[0.05]" alt="Office Background">
            <div
                class="absolute inset-0 bg-gradient-to-b from-slate-50/90 via-slate-50 to-slate-50/90 dark:from-[#0a0a0b]/95 dark:via-[#0a0a0b] dark:to-[#0a0a0b]/95">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6">

            {{-- Floating Badge Kiri --}}
            <div
                class="absolute -left-4 top-24 bg-white dark:bg-gray-800/90 backdrop-blur-xl p-4 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white dark:border-white/10 z-20 hidden xl:flex items-center gap-4 animate-bounce-slow">
                <div
                    class="w-10 h-10 bg-green-500/10 text-green-600 dark:text-green-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-chart-line text-sm"></i>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest leading-none mb-1">Exclusive
                        Network</p>
                    <p class="text-xs font-bold text-slate-900 dark:text-white leading-none">500+ CEO Members</p>
                </div>
            </div>

            {{-- Floating Badge Kanan --}}
            <div class="absolute -right-4 bottom-1/3 bg-white dark:bg-gray-800/90 backdrop-blur-xl p-4 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white dark:border-white/10 z-20 hidden xl:flex items-center gap-4 animate-bounce-slow"
                style="animation-delay: 1.5s">
                <div
                    class="w-10 h-10 bg-orange-500/10 text-orange-600 dark:text-orange-400 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-crown text-sm"></i>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-black tracking-widest leading-none mb-1">Priority
                        Access</p>
                    <p class="text-xs font-bold text-slate-900 dark:text-white leading-none">Global Events</p>
                </div>
            </div>

            {{-- Header --}}
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full border border-orange-200 dark:border-orange-500/20 bg-orange-50/50 dark:bg-white/5 text-orange-600 dark:text-orange-400 text-[10px] font-black uppercase mb-6 tracking-[0.2em] shadow-sm backdrop-blur-md">
                    <i class="fa-solid fa-star text-[9px]"></i>
                    <span>{{ __('messages.testimonial_badge') }}</span>
                </div>
                <h2 class="text-5xl md:text-5xl font-poppins leading-tight text-slate-900 dark:text-white tracking-tight">
                    <span class="font-regular">{{ __('messages.testimonial_title_1') }}</span> <br>
                    <span class="font-serif font-bold italic text-orange-500 drop-shadow-sm">
                        {{ __('messages.testimonial_title_2') }} {{ __('messages.testimonial_title_3') }}
                    </span>
                </h2>
            </div>

            {{-- Grid Kartu --}}
            <div class="relative">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-4 -m-4 transition-all duration-1000 ease-in-out"
                    :class="open ? 'max-h-[4000px] opacity-100' : 'max-h-[450px] overflow-hidden md:max-h-[480px]'">



                    @foreach ($testimonials as $testi)
                        <div
                            class="group relative bg-white dark:bg-white/5 backdrop-blur-2xl border border-slate-200 dark:border-white/10 p-8 rounded-[2rem] shadow-[0_10px_30px_rgba(0,0,0,0.02)] dark:shadow-none hover:shadow-[0_20px_40px_rgba(255,107,0,0.1)] dark:hover:bg-white/[0.08] transition-all duration-500 flex flex-col justify-between min-h-[380px] hover:-translate-y-2 overflow-hidden">

                            <div
                                class="absolute -right-4 -top-4 w-24 h-24 bg-orange-500/10 dark:bg-orange-500/20 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>

                            <div>
                                <div class="mb-6 flex justify-between items-start">
                                    <div class="p-3 bg-orange-50 dark:bg-orange-500/10 rounded-2xl">
                                        <i class="fa-solid fa-quote-left text-2xl text-orange-500"></i>
                                    </div>
                                    <div class="flex gap-0.5 text-orange-400 text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if($i <= ($testi['rating'] ?? 5))
                                                <i class="fa-solid fa-star"></i>
                                            @else
                                                <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <p
                                    class="text-slate-700 dark:text-gray-300 font-poppins leading-relaxed text-sm md:text-base italic mb-8 relative z-10">
                                    "{{ $testi['content'] }}"
                                </p>
                            </div>

                            <div
                                class="flex items-center gap-4 pt-6 border-t border-slate-100 dark:border-white/5 relative z-10">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 text-white rounded-2xl flex-shrink-0 flex items-center justify-center text-lg font-black shadow-lg transform group-hover:rotate-6 transition-transform">
                                    {{ strtoupper(substr($testi['name'], 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <h4
                                        class="text-slate-900 dark:text-white font-bold font-poppins text-sm md:text-base tracking-tight">
                                        {{ $testi['name'] }}</h4>
                                    <p
                                        class="text-orange-600 dark:text-orange-400 font-poppins text-[10px] font-black uppercase tracking-widest mt-0.5">
                                        {{ $testi['role'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Fade Overlay --}}
                <div x-show="!open" x-transition:leave="transition ease-in duration-300"
                    class="absolute bottom-0 left-0 w-full h-48 bg-gradient-to-t from-slate-50 via-slate-50/80 to-transparent dark:from-[#0a0a0b] dark:via-[#0a0a0b]/80 dark:to-transparent z-20 pointer-events-none">
                </div>
            </div>

            {{-- Toggle Button --}}
            <div class="mt-12 text-center relative z-30">
                <button @click="open = !open"
                    class="inline-flex items-center gap-3 bg-white dark:bg-gray-800 border-2 border-orange-100 dark:border-orange-500/20 text-orange-500 px-10 py-4 rounded-full text-xs font-black uppercase tracking-widest shadow-[0_15px_30px_rgba(255,107,0,0.15)] hover:bg-orange-500 hover:text-white dark:hover:bg-orange-500 transition-all duration-500 transform active:scale-95">
                    <span x-text="open ? labelLess : labelMore"></span>
                    <i class="fa-solid transition-transform duration-500 text-[10px]"
                        :class="open ? 'fa-chevron-up rotate-180' : 'fa-chevron-down'"></i>
                </button>
            </div>
        </div>
    </section>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- FAQ SECTION --}}
    <section class="relative py-24 px-6 overflow-hidden bg-white dark:bg-[#0a0a0b] transition-colors duration-500">

        {{-- Background --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&q=80"
                class="w-full h-full object-cover opacity-10 dark:opacity-[0.03]" alt="">
            <div
                class="absolute inset-0 bg-gradient-to-b from-white/90 via-white to-white/90 dark:from-[#0a0a0b]/95 dark:via-[#0a0a0b] dark:to-[#0a0a0b]/95">
            </div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto">

            {{-- Header --}}
            <div class="text-center mb-10" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-100 dark:border-orange-500/20 bg-orange-50/50 dark:bg-white/5 text-orange-500 text-xs font-bold tracking-widest uppercase mb-6 shadow-sm">
                    <i class="fa-regular fa-circle-question animate-pulse"></i>
                    <span>{{ __('messages.faq_badge') }}</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-poppins text-slate-900 dark:text-white leading-tight">
                    <span class="font-regular">{{ __('messages.faq_title_1') }}</span> <br>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.faq_title_2') }}</span>
                </h2>
            </div>

            {{-- Accordion --}}
            <div class="space-y-5">
                @foreach ($faqs as $index => $faq)
                    <div x-data="{ open: false }" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}"
                        class="group transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)]"
                        :class="open ? 'translate-y-[-4px]' : ''">

                        <div class="relative overflow-hidden rounded-[2rem] border transition-all duration-500 bg-white/70 dark:bg-white/[0.03] backdrop-blur-xl"
                            :class="open ? 'border-orange-500/30 shadow-2xl shadow-orange-500/10' :
                                'border-slate-100 dark:border-white/10 shadow-sm'">

                            <button @click="open = !open"
                                class="w-full px-8 py-7 flex items-center justify-between text-left focus:outline-none">
                                <span class="font-poppins font-semibold text-[15px] md:text-lg transition-all duration-500"
                                    :class="open ? 'text-orange-500' :
                                        'text-slate-700 dark:text-gray-200 group-hover:text-orange-500'">
                                    {{ $faq['question'] }}
                                </span>
                                <div class="flex-shrink-0 ml-4 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-500 ease-[cubic-bezier(0.34,1.56,0.64,1)]"
                                    :class="open ? 'bg-orange-500 rotate-[135deg] shadow-lg shadow-orange-500/30' :
                                        'bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/10 group-hover:border-orange-500/50'">
                                    <i class="fa-solid fa-plus text-xs transition-colors duration-500"
                                        :class="open ? 'text-white' : 'text-orange-500'"></i>
                                </div>
                            </button>

                            <div x-show="open" x-collapse.duration.600ms x-cloak>
                                <div class="px-8 pb-8 transform transition-all duration-700"
                                    :class="open ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'">
                                    <div
                                        class="h-[1px] w-full bg-gradient-to-r from-orange-500/20 via-orange-500/10 to-transparent mb-6">
                                    </div>
                                    <p
                                        class="text-sm md:text-base text-gray-500 dark:text-gray-400 font-poppins leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- GALLERY SECTION --}}
    <section x-data="{
        activeCategory: 'Semua',
        galleries: [],
        isLoading: true,
    
        // Lightbox state
        isOpen: false,
        currentIndex: 0,
    
        // Computed property to get unique categories from the gallery data
        get categories() {
            const cats = this.galleries.map(item => item.category?.name).filter(Boolean);
            return ['Semua', ...new Set(cats)];
        },
    
        // Computed property to get filtered and limited galleries (Max 5)
        get filteredGalleries() {
            let filtered = this.galleries;
            if (this.activeCategory !== 'Semua') {
                filtered = this.galleries.filter(item => item.category && item.category.name === this.activeCategory);
            }
            // Return only the first 5 (assumed to be the newest)
            return filtered.slice(0, 5);
        },
    
        filter(category) {
            this.activeCategory = category;
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
        class="bg-white dark:bg-[#0a0a0b] py-24 px-6 md:px-10 transition-colors duration-500 overflow-hidden relative">

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        {{-- Background Glow Effects --}}
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]">
            </div>
            <div
                class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]">
            </div>
        </div>

        <div class="max-w-7xl mx-auto text-center relative z-10">

            {{-- Header --}}
            <div data-aos="fade-up" class="mb-5 mt-10">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                    <i class="fa-solid fa-bolt-lightning animate-pulse"></i> Activity Gallery
                </div>

                <h2 class="text-4xl md:text-5xl text-gray-900 dark:text-white font-poppins leading-tight">
                    <span class="font-regular">{{ __('messages.gallery_title_1') }}</span> <br>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.gallery_title_2') }}</span>
                </h2>
            </div>

            {{-- Filter Categories (Dinamis dari API) --}}
            <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up" data-aos-delay="100">
                <template x-for="category in categories" :key="category">
                    <button @click="filter(category)"
                        :class="activeCategory === category ?
                            'bg-orange-500 text-white shadow-md shadow-orange-500/20 ring-2 ring-orange-500 ring-offset-2 dark:ring-offset-gray-900' :
                            'bg-white dark:bg-white/5 text-slate-500 dark:text-gray-400 border border-slate-200/60 dark:border-white/10 hover:border-orange-500 hover:text-orange-500'"
                        class="relative px-6 py-2.5 rounded-xl text-sm font-poppins font-semibold transition-all duration-500 ease-out"
                        x-text="category">
                    </button>
                </template>
            </div>

            {{-- State Loading --}}
            <template x-if="isLoading">
                <div class="flex justify-center items-center py-20">
                    <i class="fa-solid fa-spinner fa-spin text-3xl text-orange-500"></i>
                </div>
            </template>

            {{-- Gallery Grid --}}
            <template x-if="!isLoading">
                <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8 text-left" id="gallery-grid">

                    {{-- Looping Data (Terbatas 5 item) --}}
                    <template x-for="(item, index) in filteredGalleries" :key="item.id">
                        <div x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0" class="break-inside-avoid">

                            <div @click="openLightbox(index)"
                                class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/10 cursor-pointer">

                                <img :src="item.image"
                                    class="w-full h-auto min-h-[300px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110"
                                    alt="ACMI Gallery">

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10">
                                    <p class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500"
                                        x-text="item.title || 'ACMI Moment'"></p>
                                </div>

                            </div>
                        </div>
                    </template>

                </div>
            </template>

            {{-- Button Selengkapnya (Disesuaikan dengan kategori aktif) --}}
            <div class="text-center mt-20" data-aos="fade-up">
                <a :href="'{{ app()->getLocale() == 'id' ? route('id.galeri') : route('en.gallery') }}' + (activeCategory !== 'Semua' ?
                    '?category=' + encodeURIComponent(activeCategory) : ' ')"
                    class="group inline-flex items-center gap-3 px-10 py-4 rounded-2xl bg-slate-900 dark:bg-orange-500 text-white font-bold font-poppins transition-all duration-500 hover:bg-orange-500 hover:shadow-xl hover:shadow-orange-500/20">
                    {{ __('messages.gallery_more') }}
                    <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-2"></i>
                </a>
            </div>
        </div>

        {{-- LIGHTBOX MODAL --}}
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[9999] flex flex-col bg-black/95 backdrop-blur-sm"
            @keydown.window.escape="closeLightbox()" @keydown.window.left="prev()" @keydown.window.right="next()"
            x-cloak>

            <!-- Header -->
            <div class="flex items-center justify-between p-6 text-white relative z-10">
                <div class="text-sm font-semibold font-poppins bg-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                    <span x-text="currentIndex + 1" class="text-orange-500"></span> / <span
                        x-text="filteredGalleries.length"></span>
                </div>
                <button @click="closeLightbox()"
                    class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-orange-500 text-white transition-all duration-300">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- Main Content slider -->
            <div class="relative flex-1 flex items-center justify-center p-4 min-h-0">
                <!-- Navigation Arrows -->
                <button @click="prev()"
                    class="absolute left-4 md:left-8 w-14 h-14 flex items-center justify-center rounded-full bg-white/5 hover:bg-orange-500 text-white/50 hover:text-white transition-all duration-300 z-10">
                    <i class="fa-solid fa-chevron-left text-2xl"></i>
                </button>

                <div class="relative max-w-5xl w-full h-full flex flex-col items-center justify-center">
                    <!-- Image Wrapper -->
                    <div class="relative max-h-full flex flex-col items-center">
                        <img :src="filteredGalleries[currentIndex]?.image"
                            class="max-w-full max-h-[70vh] object-contain shadow-[0_20px_50px_rgba(0,0,0,0.5)] rounded-2xl border border-white/10"
                            :key="currentIndex" x-transition:enter="transition transform duration-500"
                            x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100">

                        <div class="mt-8 text-center" data-aos="fade-up">
                            <h3 class="text-white text-2xl font-bold font-poppins tracking-tight mb-2"
                                x-text="filteredGalleries[currentIndex]?.title"></h3>
                            <span
                                class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 text-[10px] font-bold uppercase tracking-widest border border-orange-500/30"
                                x-text="filteredGalleries[currentIndex]?.category?.name"></span>
                        </div>
                    </div>
                </div>

                <button @click="next()"
                    class="absolute right-4 md:right-8 w-14 h-14 flex items-center justify-center rounded-full bg-white/5 hover:bg-orange-500 text-white/50 hover:text-white transition-all duration-300 z-10">
                    <i class="fa-solid fa-chevron-right text-2xl"></i>
                </button>
            </div>
        </div>
    </section>

    {{-- INSTAGRAM FEED SECTION --}}
    <section class="relative py-24 bg-white dark:bg-[#0a0a0b] transition-colors duration-500 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <div
                    class="inline-block px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-4 uppercase tracking-[0.2em] border border border-orange-100 dark:border-orange-500/20">
                    Social Connect
                </div>
                <h2 class="text-4xl md:text-5xl leading-tight text-gray-900 dark:text-white font-poppins">
                    <span class="font-regular tracking-tight">{{ __('messages.activity_title_1') }}</span>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.activity_title_2') }}</span>
                </h2>
                <div class="h-1 w-12 bg-orange-500 mx-auto rounded-full mt-4"></div>
            </div>

            {{-- Grid Feed --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                {{-- Menggunakan @forelse bawaan Blade dengan aman --}}
                @forelse ($posts as $index => $post)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                        class="group relative overflow-hidden rounded-2xl bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 transition-all duration-500 hover:bg-white dark:hover:bg-white/10 hover:shadow-[0_20px_40px_rgba(0,0,0,0.05)] dark:hover:shadow-[0_20px_40px_rgba(0,0,0,0.3)] hover:-translate-y-2">

                        {{-- LINK DIRECT KE AKUN/POST INSTAGRAM (target="_blank" untuk security & user experience) --}}
                        <a href="{{ $post['permalink'] ?? '#' }}" target="_blank" rel="noopener noreferrer"
                            class="block">

                            {{-- Image Container --}}
                            <div class="aspect-square overflow-hidden relative">
                                <img src="{{ $post['mediaUrl'] ?? 'https://placehold.co/600x600?text=No+Image' }}"
                                    alt="Instagram Post"
                                    class="h-full w-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-75">
                            </div>

                            {{-- Content --}}
                            <div class="p-6 relative">
                                <div class="flex items-center justify-between mb-3">
                                    <p
                                        class="text-[10px] font-bold text-orange-500 dark:text-orange-400 uppercase tracking-widest font-poppins">
                                        Recent Post
                                    </p>
                                    <i
                                        class="fa-brands fa-instagram text-gray-400 dark:text-gray-600 text-sm group-hover:text-orange-500 transition-colors"></i>
                                </div>
                                <h3
                                    class="text-base font-medium text-gray-800 dark:text-gray-200 line-clamp-2 leading-relaxed font-poppins group-hover:text-orange-500 dark:group-hover:text-orange-400 transition-colors">
                                    {{ $post['prunedCaption'] ?? 'ACMI Post' }}
                                </h3>
                            </div>
                        </a>
                    </div>
                @empty
                    {{-- Fallback jika array $posts ternyata kosong atau cache belum terisi --}}
                    <div class="text-center col-span-1 md:col-span-3 py-12" data-aos="fade-up">
                        <div
                            class="w-16 h-16 bg-gray-100 dark:bg-white/5 text-gray-400 rounded-full flex items-center justify-center text-xl mx-auto mb-4">
                            <i class="fa-brands fa-instagram"></i>
                        </div>
                        <p class="text-sm font-poppins text-gray-400 dark:text-gray-500">Gagal memuat postingan atau feed
                            kosong.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- FINAL CTA SECTION --}}
    <section class="relative py-24 px-6 overflow-hidden bg-[#fafafa] dark:bg-[#0a0a0b] transition-colors duration-500">

        {{-- Ambient Glow --}}
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-orange-500/10 blur-[140px] rounded-full pointer-events-none">
        </div>

        <div class="relative z-10 max-w-5xl mx-auto">
            <div data-aos="fade-up" data-aos-duration="1200"
                class="relative rounded-[2.5rem] md:rounded-[3rem] p-10 md:p-20 text-center bg-white dark:bg-white/[0.03] border border-gray-200/60 dark:border-white/[0.08] shadow-[0_10px_60px_rgba(0,0,0,0.04)] dark:shadow-[0_10px_80px_rgba(0,0,0,0.5)] backdrop-blur-xl transition-all duration-700 hover:border-orange-500/30">

                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-200 dark:border-orange-500/20 bg-orange-50/80 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-xs font-bold mb-8 shadow-sm uppercase tracking-widest font-poppins transition-transform duration-500 hover:scale-105">
                    <i class="fa-solid fa-bolt-lightning text-[10px]"></i>
                    <span>{{ __('messages.cta_final_badge') }}</span>
                </div>

                {{-- Title --}}
                <h2
                    class="text-3xl sm:text-4xl lg:text-5xl leading-[1.15] mb-6 font-poppins text-gray-950 dark:text-white tracking-tight">
                    <span class="font-regular block">{{ __('messages.cta_final_title_1') }}</span>
                    <span class="font-serif font-bold italic text-orange-600 dark:text-orange-500 mt-1 block">
                        {{ __('messages.cta_final_title_2') }}
                    </span>
                </h2>

                {{-- Description --}}
                <p
                    class="text-gray-600 dark:text-gray-400 text-base md:text-lg font-poppins max-w-2xl mx-auto mb-12 leading-relaxed px-4">
                    {{ __('messages.cta_final_desc') }}
                </p>

                {{-- Button --}}
                <div class="relative group inline-block">
                    <div
                        class="absolute -inset-1 bg-orange-500 rounded-xl blur-xl opacity-20 group-hover:opacity-40 transition duration-500">
                    </div>

                    <a href="{{ url('/form-join') }}"
                        class="relative flex items-center justify-center gap-4 bg-orange-600 dark:bg-orange-500 hover:bg-orange-700 dark:hover:bg-orange-600 text-white font-bold font-poppins px-10 py-4 rounded-xl transition-all duration-300 hover:-translate-y-1 active:scale-95 shadow-lg shadow-orange-600/20 dark:shadow-none w-full sm:w-auto">
                        <span>{{ __('messages.cta_final_btn') }}</span>

                        <div class="relative w-5 h-5 overflow-hidden flex items-center justify-center">
                            <i
                                class="fa-solid fa-arrow-right absolute transition-all duration-500 group-hover:translate-x-full opacity-100 group-hover:opacity-0"></i>
                            <i
                                class="fa-solid fa-arrow-right absolute -left-full transition-all duration-500 group-hover:left-0 opacity-0 group-hover:opacity-100"></i>
                        </div>
                    </a>
                </div>

                {{-- Footer Note --}}
                <p class="mt-8 text-[11px] font-poppins tracking-[0.2em] uppercase text-gray-400 dark:text-gray-500">
                    {{ __('messages.cta_final_note') }}
                </p>

            </div>
        </div>
    </section>
@endsection

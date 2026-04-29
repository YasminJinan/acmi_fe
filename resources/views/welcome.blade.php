@extends('layouts.app')

@section('title', 'ACMI - Bersinergi Memimpin Indonesia')

@section('content')
{{-- HERO SECTION --}}
{{-- HERO SECTION --}}
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    {{-- BACKGROUND VIDEO --}}
    <div class="absolute inset-0 w-full h-full">
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('videos/hero-bg.mp4') }}" type="video/mp4">
        </video>
    </div>

    {{-- OVERLAY --}}
    <div class="absolute inset-0 bg-gradient-to-b from-white/30 via-white/80 to-white/90 dark:from-black/40 dark:via-gray-900/80 dark:to-gray-900"></div>

    <div class="relative z-10 text-center px-6 max-w-4xl">
       
        {{-- Badge dengan animasi Zoom In --}}
        <div data-aos="zoom-in" class="inline-block px-6 py-1.5 rounded-full bg-white/10 dark:bg-white/5 backdrop-blur-md border border-white/20 dark:border-white/10 shadow-[0_8px_32px_0_rgba(255,145,0,0.1)] mb-6 transition-all duration-500 hover:border-orange-400/50 group">
            <div class="flex items-center gap-2">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                <span class="text-orange-500 text-xs font-poppins font-semibold uppercase tracking-widest group-hover:text-orange-400 transition-colors">
                    {{ __('messages.hero_badge') }}
                </span>
            </div>
        </div>

        {{-- Judul dengan animasi Fade Up --}}
        <h1 data-aos="fade-up" data-aos-delay="200" class="text-4xl md:text-7xl leading-tight text-gray-900 dark:text-white">
            <span class="font-poppins font-semibold">{{ __('messages.hero_title_1') }}</span><br>
            <span class="font-serif font-bold italic text-orange-500">{{ __('messages.hero_title_2') }}</span>
        </h1>

        {{-- Deskripsi dengan animasi Fade Up --}}
        <p data-aos="fade-up" data-aos-delay="400" class="mt-6 text-gray-600 dark:text-gray-300 text-sm md:text-base font-poppins max-w-xl mx-auto">
            {{ __('messages.hero_desc') }}
        </p>
        
        {{-- Button dengan animasi Fade Up --}}
        <div data-aos="fade-up" data-aos-delay="600" class="mt-8 flex justify-center gap-4 flex-wrap">
            <a href="/gabung" class="px-6 py-3 bg-orange-500 text-white rounded-lg font-semibold shadow-lg hover:scale-105 transition-transform duration-300 inline-block">
                {{ __('messages.btn_join') }}
            </a>
            <button class="px-6 py-3 border border-orange-400 text-orange-500 rounded-lg font-semibold hover:bg-orange-50/10 hover:scale-105 transition-transform duration-300">
                {{ __('messages.btn_explore') }}
            </button>
        </div>

        {{-- Stats dengan animasi Flip Up per Item --}}
        <div class="mt-14 grid grid-cols-3 gap-4 max-w-3xl mx-auto">
            @php
                $stats = [
                    ['target' => 500, 'suffix' => '+', 'label' => __('messages.stats_ceo')],
                    ['target' => 50, 'suffix' => '+', 'label' => __('messages.stats_events')],
                    ['target' => 15, 'suffix' => '+', 'label' => __('messages.stats_industry')]
                ];
            @endphp

            @foreach($stats as $index => $stat)
                <div 
                    data-aos="flip-up" 
                    data-aos-delay="{{ 800 + ($index * 100) }}"
                    class="bg-white/60 dark:bg-white/5 backdrop-blur-lg rounded-xl py-4 border border-white/40 dark:border-white/10 shadow-xl"
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
                                if (progress < 1) {
                                    window.requestAnimationFrame(step);
                                }
                            };
                            window.requestAnimationFrame(step);
                        }
                    }"
                    x-init="start()"
                >
                    <p class="text-2xl font-semibold font-poppins text-gray-900 dark:text-white">
                        <span x-text="current">0</span>{{ $stat['suffix'] }}
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-poppins">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PARTNER SECTION --}}
<section class="relative py-24 bg-white dark:bg-gray-900 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-orange-500 dark:text-orange-400 text-xs font-bold tracking-[0.2em] uppercase mb-3">
                {{ __('messages.partner_title') }}
            </h2>
            <div class="h-1 w-12 bg-orange-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 max-w-6xl mx-auto">
            @foreach(['BCA', 'TELKOM', 'PERTAMINA', 'ASTRA', 'INDOFOOD', 'SINARMAS'] as $index => $partner)
                <div 
                    data-aos="fade-up" 
                    data-aos-delay="{{ $index * 100 }}"
                    class="group relative bg-gray-50 dark:bg-white/5 backdrop-blur-sm rounded-2xl py-8 px-4 border border-gray-100 dark:border-white/10 flex items-center justify-center transition-all duration-500 hover:bg-white dark:hover:bg-white/10 hover:shadow-[0_20px_40px_rgba(0,0,0,0.05)] dark:hover:shadow-[0_20px_40px_rgba(0,0,0,0.3)] hover:-translate-y-2"
                >
                    {{-- Dekorasi Glow saat Hover --}}
                    <div class="absolute inset-0 bg-orange-500/5 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-500"></div>
                    
                    <p class="font-bold text-gray-400 dark:text-gray-500 group-hover:text-orange-500 dark:group-hover:text-orange-400 text-lg tracking-wider transition-colors duration-300">
                        {{ $partner }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- EVENT BANNER (Fixed for Dark Mode) --}}
<section class="bg-white dark:bg-gray-900 px-6 md:px-10 pt-10 pb-6">
    <div class="max-w-7xl mx-auto">
        <div class="bg-[#f5f5f7] dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-8 py-6 flex flex-col md:flex-row items-center justify-between shadow-sm gap-6">
            <div class="flex items-center gap-5">
                <div class="w-14 h-14 bg-orange-100 dark:bg-orange-500/20 text-orange-500 rounded-xl flex items-center justify-center text-xl">
                    <i class="fa-solid fa-sparkles"></i>
                </div>
                <div>
                    <span class="text-xs font-semibold bg-orange-100 dark:bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full uppercase tracking-wider">
                        {{ __('messages.event_badge') }}
                    </span>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-2">{{ __('messages.event_title') }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-2"> {{ __('messages.event_date') }}
                        <i class="fa-regular fa-calendar"></i> 
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-xs text-gray-400">Early Bird Discount</p>
                    <p class="text-orange-500 font-bold text-lg">30% OFF</p>
                </div>
                <button class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold px-6 py-3 rounded-lg flex items-center gap-2 transition duration-300">
                    {{ __('messages.event_cta') }} <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- CHALLENGE SECTION --}}
<section class="bg-white dark:bg-gray-900 px-6 md:px-10 py-24 transition-colors duration-500 overflow-hidden">
    <div class="max-w-7xl mx-auto flex flex-col gap-16">
        
        {{-- Header Section --}}
        <div class="text-center max-w-4xl mx-auto" data-aos="fade-up">
            <div class="inline-block px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-6 uppercase tracking-[0.2em] border border-orange-100 dark:border-orange-500/20">
                {{ __('messages.challenge_badge') }}
            </div>
            <h2 class="text-4xl md:text-5xl leading-tight text-gray-900 dark:text-white font-poppins">
                <span class="font-semibold tracking-tight">{{ __('messages.challenge_title_1') }}</span><br>
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.challenge_title_2') }}</span>
            </h2>
            <p class="mt-6 text-gray-500 dark:text-gray-400 text-base md:text-lg font-poppins max-w-2xl mx-auto leading-relaxed">
                {{ __('messages.challenge_desc') }}
            </p>
        </div>

        {{-- Grid Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @php
                $challenges = [
                    ['icon' => 'fa-users', 'title' => __('messages.challenge_1_title'), 'desc' => __('messages.challenge_1_desc')],
                    ['icon' => 'fa-bolt', 'title' => __('messages.challenge_2_title'), 'desc' => __('messages.challenge_2_desc')],
                    ['icon' => 'fa-lock', 'title' => __('messages.challenge_3_title'), 'desc' => __('messages.challenge_3_desc')],
                    ['icon' => 'fa-bullseye', 'title' => __('messages.challenge_4_title'), 'desc' => __('messages.challenge_4_desc')],
                ];
            @endphp

            @foreach($challenges as $index => $item)
            <div 
                data-aos="fade-up" 
                data-aos-delay="{{ $index * 150 }}"
                class="group relative bg-gray-50/50 dark:bg-white/[0.02] border border-gray-100 dark:border-white/10 rounded-3xl p-8 transition-all duration-500 hover:bg-white dark:hover:bg-white/5 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] dark:hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] hover:-translate-y-3"
            >
                {{-- Decorative Gradient Overlay (Hidden by default, shows on hover) --}}
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl"></div>

                <div class="relative z-10">
                    {{-- Icon with Neumorphic touch --}}
                    <div class="w-14 h-14 bg-white dark:bg-gray-800 text-orange-500 rounded-2xl flex items-center justify-center text-xl mb-8 shadow-sm group-hover:bg-orange-500 group-hover:text-white group-hover:shadow-orange-500/50 group-hover:shadow-xl transition-all duration-500">
                        <i class="fa-solid {{ $item['icon'] }}"></i>
                    </div>

                    <h3 class="font-poppins font-bold text-gray-900 dark:text-white mb-4 text-lg tracking-tight">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-sm text-gray-500 dark:text-gray-400 font-poppins leading-relaxed">
                        {{ $item['desc'] }}
                    </p>
                </div>

                {{-- Bottom Arrow Indicator --}}
                <div class="mt-6 flex justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    <i class="fa-solid fa-arrow-right-long text-orange-500/50 text-sm"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- SOLUTION SECTION --}}
<section class="relative min-h-screen w-full flex items-center justify-center py-24 px-6 overflow-hidden transition-colors duration-500 bg-white dark:bg-gray-900">
    
    {{-- Background with Parallax Effect --}}
    <div class="absolute inset-0 z-0" data-aos="fade-in" data-aos-duration="2000">
        <img 
            src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80" 
            class="w-full h-full object-cover opacity-30 dark:opacity-20"
            alt="Office background"
        >
        {{-- Gradient Overlay yang lebih smooth --}}
        <div class="absolute inset-0 bg-gradient-to-tr from-white via-white/95 to-orange-50/30 dark:from-gray-900 dark:via-gray-900/98 dark:to-orange-500/5 transition-colors duration-500"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
        
        {{-- LEFT SIDE --}}
        <div class="space-y-12 lg:max-w-md xl:max-w-lg lg:ml-auto" data-aos="fade-right">
            <div class="relative">
                {{-- Decorative Line --}}
                <div class="absolute -left-6 top-0 w-1 h-24 bg-orange-500 rounded-full hidden md:block"></div>
                
                <span class="inline-block px-4 py-1.5 rounded-full border border-orange-200 dark:border-orange-500/30 bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-6 uppercase tracking-[0.2em]">
                    {{ __('messages.solution_badge') }}
                </span>

                <h2 class="text-4xl md:text-6xl font-poppins font-bold text-gray-900 dark:text-white leading-[1.1]">
                    ACMI: 
                    <span class="font-serif italic text-orange-500 block md:inline-block">Powerhouse</span><br class="hidden md:block">
                    <span class="font-light tracking-tight">{{ __('messages.solution_title') }}</span>
                </h2>

                <p class="mt-8 text-gray-600 dark:text-gray-400 text-base md:text-lg font-poppins max-w-lg leading-relaxed">
                    {{ __('messages.solution_desc') }}
                </p>
            </div>

            {{-- STATS: Dibuat lebih modern dengan border-glow --}}
            <div class="grid grid-cols-2 gap-8 pt-10 border-t border-gray-100 dark:border-white/5">
                <div class="group">
                    <p class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white font-poppins group-hover:text-orange-500 transition-colors duration-300">
                        10<span class="text-orange-500">+</span>
                    </p>
                    <p class="text-[11px] text-gray-400 dark:text-gray-500 font-bold uppercase tracking-widest mt-3">
                        {{ __('messages.solution_exp') }}
                    </p>
                </div>
                <div class="group">
                    <p class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white font-poppins group-hover:text-orange-500 transition-colors duration-300">
                        50<span class="text-orange-500 text-3xl">T+</span>
                    </p>
                    <p class="text-[11px] text-gray-400 dark:text-gray-500 font-bold uppercase tracking-widest mt-3">
                        {{ __('messages.solution_revenue') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- RIGHT SIDE: Staggered Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
            {{-- Decorative Blur behind cards --}}
            <div class="absolute inset-0 bg-orange-500/5 blur-[120px] -z-10 rounded-full"></div>

            @php
                $solutions = [
                    ['icon' => 'fa-share-nodes', 'title' => __('messages.solution_1_title'), 'desc' => __('messages.solution_1_desc'), 'aos' => 'fade-down'],
                    ['icon' => 'fa-book-open', 'title' => __('messages.solution_2_title'), 'desc' => __('messages.solution_2_desc'), 'aos' => 'fade-left'],
                    ['icon' => 'fa-bullhorn', 'title' => __('messages.solution_3_title'), 'desc' => __('messages.solution_3_desc'), 'aos' => 'fade-right'],
                    ['icon' => 'fa-briefcase', 'title' => __('messages.solution_4_title'), 'desc' => __('messages.solution_4_desc'), 'aos' => 'fade-up']
                ];
            @endphp

            @foreach($solutions as $index => $sol)
            <div 
                data-aos="{{ $sol['aos'] }}" 
                data-aos-delay="{{ $index * 100 }}"
                class="group bg-white/80 dark:bg-white/[0.03] backdrop-blur-xl p-8 rounded-[2rem] border border-white dark:border-white/5 shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] dark:shadow-none hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 transition-all duration-500"
            >
                {{-- Icon Box: Tetap orange tapi lebih soft --}}
                <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 text-white rounded-2xl flex items-center justify-center text-xl mb-6 shadow-[0_10px_20px_rgba(249,115,22,0.2)] group-hover:rotate-6 transition-transform">
                    <i class="fa-solid {{ $sol['icon'] }}"></i>
                </div>

                <h3 class="text-lg font-bold text-gray-900 dark:text-white font-poppins mb-3 tracking-tight">
                    {{ $sol['title'] }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed font-poppins group-hover:text-gray-600 dark:group-hover:text-gray-300 transition-colors">
                    {{ $sol['desc'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- EXCLUSIVE MEMBERSHIP SECTION --}}
<section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-500 overflow-hidden">
    {{-- Kita kasih px-12 sampai px-20 biar kontennya nggak nempel tembok --}}
    <div class="max-w-7xl mx-auto px-12 md:px-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
            
            {{-- Sisi Kiri: Informasi --}}
            <div class="space-y-8" data-aos="fade-right">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-100 dark:border-orange-500/20 bg-orange-50/50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-6 shadow-sm uppercase tracking-[0.2em]">
                        <i class="fa-regular fa-shield-check"></i>
                        <span>{{ __('messages.membership_badge') }}</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-poppins text-slate-900 dark:text-white leading-[1.1]">
                        <span class="font-semibold tracking-tight">{{ __('messages.membership_title_1') }}</span><br>
                        <span class="font-serif font-bold italic text-orange-500">{{ __('messages.membership_title_2') }}</span>
                    </h2>
                    
                    <p class="mt-6 text-gray-500 dark:text-gray-400 text-sm md:text-base font-poppins leading-relaxed max-w-lg">
                        {{ __('messages.membership_desc') }}
                    </p>
                </div>

                {{-- Checklist Features --}}
                <ul class="space-y-4">
                    @foreach(__('messages.membership_features') as $feature)
                    <li class="flex items-start gap-3 text-slate-700 dark:text-gray-300 font-poppins text-sm group">
                        <div class="flex-shrink-0 w-5 h-5 border-2 border-orange-400 dark:border-orange-500/50 rounded-full flex items-center justify-center mt-0.5 group-hover:bg-orange-500 group-hover:border-orange-500 transition-all duration-300">
                            <i class="fa-solid fa-check text-[8px] text-orange-500 group-hover:text-white"></i>
                        </div>
                        <span class="group-hover:text-gray-900 dark:group-hover:text-white transition-colors">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Sisi Kanan: Card CTA --}}
            <div class="relative flex justify-center lg:justify-end" data-aos="fade-left">
                {{-- Decorative Glow --}}
                <div class="absolute -top-10 -right-10 w-64 h-64 bg-orange-500/10 blur-[100px] rounded-full"></div>
                
                {{-- Main Card --}}
                <div class="relative group bg-[#f8f9fb] dark:bg-white/[0.03] border border-gray-100 dark:border-white/10 p-8 md:p-12 rounded-[3rem] w-full max-w-[380px] text-center shadow-xl backdrop-blur-sm transition-all duration-500">
                    
                    {{-- Icon Container --}}
                    <div class="relative w-20 h-20 mx-auto mb-8">
                        <div class="absolute inset-0 bg-orange-500/20 rounded-2xl blur-2xl group-hover:blur-3xl transition-all"></div>
                        <div class="relative w-full h-full bg-orange-500 rounded-[1.5rem] flex items-center justify-center transform -rotate-12 group-hover:rotate-0 transition-all shadow-lg shadow-orange-500/20">
                            <i class="fa-solid fa-shield-halved text-2xl text-white"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white font-poppins mb-3">
                        {{ __('messages.membership_cta_title') }}
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-xs font-poppins leading-relaxed mb-8">
                        {{ __('messages.membership_cta_desc') }}
                    </p>
                    
                    <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-orange-500/30 transition-all active:scale-95 text-sm flex items-center justify-center gap-2">
                        {{ __('messages.membership_cta_btn') }}
                        <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    
                    <p class="mt-6 text-[11px] text-gray-400 dark:text-gray-500 font-poppins">
                        {{ __('messages.membership_partner') }} 
                        <a href="#" class="text-orange-500 font-bold hover:underline decoration-1 underline-offset-4">
                            {{ __('messages.membership_contact') }}
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-900 py-24 px-6 md:px-10 transition-colors duration-500 overflow-hidden"
   x-data="{
        search: '',
        category: 'Semua',
        showDetail: false,
        selectedProduct: null,
        products: [
            {
                title: 'Premium Business Suite',
                company: 'PT Teknologi Maju',
                ceo: 'Budi Santoso',
                category: 'Software',
                desc: 'Premium Business Suite adalah platform manajemen bisnis all-in-one yang menggabungkan ERP, CRM, dan analitik dalam satu ekosistem terpadu.',
                img: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2015',
                website: 'https://teknologimaju.co.id',
                address: 'Menara BCA Lt. 35, Jakarta',
                features: ['ERP Terintegrasi', 'CRM & Sales Pipeline', 'Business Intelligence']
            },
            {
                title: 'Green Energy Solutions',
                company: 'PT Energi Hijau Indonesia',
                ceo: 'Dewi Kusuma',
                category: 'Energi',
                desc: 'Green Energy Solutions menyediakan solusi energi terbarukan komprehensif mulai dari konsultasi, instalasi panel surya, hingga maintenance untuk sektor industri dan komersial. Komitmen kami terhadap keberlanjutan membantu perusahaan mengurangi carbon footprint.',
                img: 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=2072',
                website: 'https://energihijau.co.id',
                email: 'contact@energihijau.co.id',
                phone: '+62 21 555 0202',
                address: 'Green Tower Lt. 20, Jakarta Selatan',
                features: ['Panel Surya Premium', 'Konsultasi Energi', 'Maintenance 24/7', 'ROI Calculator', 'Carbon Credit Trading']
            },
            {
                title: 'Premium Coffee Beans',
                company: 'PT Kopi Nusantara',
                ceo: 'Agus Wijaya',
                category: 'F&B',
                desc: 'PT Kopi Nusantara menghadirkan biji kopi single-origin premium dari perkebunan terbaik di Aceh, Toraja, dan Flores. Dengan proses roasting artisanal dan quality control ketat, kami melayani kebutuhan kopi premium untuk hotel, restoran, dan korporasi.',
                img: 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=2000',
                website: 'https://kopinusantara.co.id',
                email: 'order@kopinusantara.co.id',
                phone: '+62 21 555 0303',
                address: 'Jl. Sudirman Kav. 52, Jakarta',
                features: ['Single Origin', 'Artisanal Roasting', 'B2B Supply', 'Custom Blend', 'Cupping Session']
            },
            {
                title: 'Smart Manufacturing System',
                company: 'PT Industri Cerdas',
                ceo: 'Ratna Permata',
                category: 'Manufaktur',
                desc: 'Smart Manufacturing System menghadirkan revolusi Industri 4.0 ke lantai produksi Anda. Dengan kombinasi AI, IoT, dan robotika, kami mengoptimalkan proses manufaktur, meningkatkan kualitas produk, dan mengurangi downtime hingga 80%.',
                img: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070',
                website: 'https://industricerdas.co.id',
                email: 'sales@industricerdas.co.id',
                phone: '+62 21 555 0404',
                address: 'Kawasan Industri MM2100, Bekasi',
                features: ['AI Quality Control', 'IoT Monitoring', 'Predictive Maintenance', 'Digital Twin', 'Real-time Analytics']
            },
            {
                title: 'Luxury Property Collection',
                company: 'PT Properti Prima',
                ceo: 'Herman Tanoto',
                category: 'Properti',
                desc: 'PT Properti Prima mengembangkan hunian mewah dan properti komersial premium di lokasi-lokasi strategis Indonesia. Dengan standar internasional dan desain award-winning, setiap proyek kami mencerminkan kemewahan dan kenyamanan terbaik.',
                img: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2000',
                website: 'https://propertiprima.co.id',
                email: 'inquiry@propertiprima.co.id',
                phone: '+62 21 555 0505',
                address: 'Pacific Place Lt. 42, Jakarta',
                features: ['Lokasi Premium', 'Desain Award-Winning', 'Smart Home', 'Concierge Service', 'Investment Grade']
            },
            {
                title: 'Fintech Payment Gateway',
                company: 'PT Digital Finance',
                ceo: 'Linda Hartono',
                category: 'Fintech',
                desc: 'PT Digital Finance menyediakan payment gateway enterprise-grade yang mendukung berbagai metode pembayaran digital. Platform kami memproses jutaan transaksi per hari dengan keamanan tingkat bank dan uptime 99.99%.',
                img: 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=2000',
                website: 'https://digitalfinance.co.id',
                email: 'partnership@digitalfinance.co.id',
                phone: '+62 21 555 0606',
                address: 'Equity Tower Lt. 28, Jakarta',
                features: ['Multi-Payment Support', 'Bank-Grade Security', '99.99% Uptime', 'Real-time Settlement', 'API Integration']
            }
        ]
    }"

    < class="max-w-7xl mx-auto">
        {{-- Hapus div x-data yang kosong tadi, langsung masuk ke Header --}}
        
       {{-- HEADER --}}
       <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                <i class="fa-solid fa-box-open animate-pulse"></i> Produk Anggota
            </div>
            <h2 class="text-4xl md:text-5xl font-semibold text-gray-900 dark:text-white leading-tight">
                Produk & Layanan dari <br>
                <span class="text-orange-500 font-serif italic font-bold">Anggota ACMI</span>
            </h2>
            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm md:text-base">
                Temukan produk dan layanan berkualitas dari perusahaan yang dipimpin oleh anggota ACMI.
            </p>
        </div>


     {{-- GRID PRODUK --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <template x-for="(product, index) in products.filter(p => (category === 'Semua' || p.category === category) && (p.title.toLowerCase().includes(search.toLowerCase()) || p.company.toLowerCase().includes(search.toLowerCase())))" :key="product.title">
        <div 
            x-show="true"
            x-transition:enter="transition ease-[cubic-bezier(0.34,1.56,0.64,1)] duration-500"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            class="group flex flex-col"
        >
            <div class="relative bg-white dark:bg-white/5 rounded-3xl overflow-hidden border border-gray-100 dark:border-white/10 transition-all duration-500 hover:shadow-xl hover:-translate-y-2 flex flex-col h-full">
                
                {{-- Image: Dikecilkan tingginya --}}
                <div class="relative h-[200px] overflow-hidden">
                    <img :src="product.img" class="w-full h-full object-cover transition duration-[1.5s] ease-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    {{-- Badge: Lebih kecil & di pojok --}}
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/95 dark:bg-slate-900/90 backdrop-blur-md text-orange-500 text-[9px] px-3 py-1.5 rounded-lg font-bold uppercase tracking-wider shadow-sm" x-text="product.category"></span>
                    </div>
                </div>

                {{-- Content: Padding disesuaikan (p-5) --}}
<div class="p-5 flex flex-col flex-grow">
    {{-- Judul: Margin-bottom dikecilkan ke mb-1 --}}
    <h3 class="text-lg font-poppins font-bold text-gray-900 dark:text-white mb-1 leading-tight group-hover:text-orange-500 transition-colors" x-text="product.title"></h3>
    
    {{-- Deskripsi: Margin-bottom dari mb-8 jadi mb-4, text lebih rapat --}}
    <p class="text-gray-500 dark:text-gray-400 text-[13px] leading-snug mb-4 line-clamp-2" x-text="product.desc"></p>
    
    <div class="mt-auto">
        {{-- Info Perusahaan: Padding & Margin dikecilkan --}}
        <div class="flex items-center gap-3 p-2.5 rounded-xl bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/5 mb-3">
            <div class="w-8 h-8 flex-shrink-0 rounded-full bg-orange-500/10 flex items-center justify-center text-orange-500 text-[10px] font-bold" x-text="product.ceo.charAt(0)"></div>
            <div class="min-w-0"> {{-- min-w-0 biar truncate jalan --}}
                <p class="text-gray-900 dark:text-gray-200 font-bold text-[11px] truncate" x-text="product.company"></p>
                <p class="text-gray-400 text-[9px] uppercase tracking-tighter truncate">CEO: <span x-text="product.ceo"></span></p>
            </div>
        </div>
        
        {{-- Button: Lebih ringkas --}}
        <button @click="selectedProduct = product; showDetail = true" 
            class="w-full py-3 bg-slate-900 dark:bg-white/10 text-white rounded-xl text-xs font-bold hover:bg-orange-500 dark:hover:bg-orange-500 transition-all duration-500 active:scale-95 group/btn">
            Detail Bisnis <i class="fa-solid fa-arrow-right-long ml-1.5 transition-transform group-hover/btn:translate-x-1"></i>
        </button>
    </div>
</div>
            </div>
        </div>
    </template>
</div>

        {{-- MODAL DETAIL: Luxury Reveal --}}
        <template x-teleport="body">
            <div x-show="showDetail" class="fixed inset-0 z- overflow-hidden flex items-center justify-center p-4">
                {{-- Backdrop --}}
                <div x-show="showDetail" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-400"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="showDetail = false"
                     class="absolute inset-0 bg-slate-900/80 backdrop-blur-xl"></div>
                
                {{-- Modal Container --}}
                <div x-show="showDetail" 
                     x-transition:enter="transition ease-[cubic-bezier(0.34,1.56,0.64,1)] duration-600"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-12"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="bg-white dark:bg-gray-900 w-full max-w-5xl max-h-[90vh] rounded-[3rem] overflow-hidden shadow-2xl relative border dark:border-white/10 flex flex-col md:flex-row">
                    
                    {{-- Left Side: Image & Features (Scrollable) --}}
                    <div class="md:w-5/12 bg-gray-50 dark:bg-black/20 p-8 overflow-y-auto custom-scrollbar">
                        <img :src="selectedProduct?.img" class="rounded-[2rem] w-full aspect-square object-cover shadow-2xl mb-8">
                        
                        <div class="space-y-6">
                            <h4 class="font-bold text-gray-900 dark:text-white text-xs uppercase tracking-widest">Core Features</h4>
                            <div class="grid gap-3">
                                <template x-for="feature in selectedProduct?.features">
                                    <div class="flex items-center gap-3 p-4 bg-white dark:bg-white/5 rounded-2xl border border-gray-100 dark:border-white/10 transition-transform hover:scale-[1.02]">
                                        <i class="fa-solid fa-check-double text-orange-500 text-xs"></i>
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300" x-text="feature"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    {{-- Right Side: Info & Form --}}
                    <div class="md:w-7/12 p-10 md:p-14 overflow-y-auto custom-scrollbar relative">
                        <button @click="showDetail = false" class="absolute top-8 right-8 text-gray-400 hover:text-orange-500 transition-colors">
                            <i class="fa-solid fa-circle-xmark text-3xl"></i>
                        </button>

                        <span class="text-orange-500 text-[10px] font-black uppercase tracking-[0.3em]" x-text="selectedProduct?.category"></span>
                        <h2 class="text-4xl font-poppins font-bold text-gray-900 dark:text-white mt-2 mb-6" x-text="selectedProduct?.title"></h2>
                        <p class="text-gray-500 dark:text-gray-400 leading-relaxed mb-10" x-text="selectedProduct?.desc"></p>

                        <div class="grid grid-cols-2 gap-6 mb-12">
                            <div class="space-y-1">
                                <p class="text-[10px] text-gray-400 font-bold uppercase">Website</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-gray-200" x-text="selectedProduct?.website"></p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[10px] text-gray-400 font-bold uppercase">Office</p>
                                <p class="text-sm font-bold text-gray-800 dark:text-gray-200" x-text="selectedProduct?.address"></p>
                            </div>
                        </div>

                        {{-- Action Form --}}
                        <div class="bg-orange-500 p-1 rounded-[2.5rem]">
                            <div class="bg-white dark:bg-gray-800 rounded-[2.4rem] p-8">
                                <h3 class="text-xl font-bold mb-6 flex items-center gap-3 text-gray-900 dark:text-white">
                                    <i class="fa-solid fa-envelope-open-text text-orange-500"></i> Kirim Inkuiri
                                </h3>
                                <form class="space-y-4">
                                    <input type="text" placeholder="Nama Bisnis Anda" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-gray-900 border-none text-sm outline-none focus:ring-2 focus:ring-orange-500 transition-all">
                                    <textarea placeholder="Bagaimana kami bisa membantu Anda?" rows="3" class="w-full p-4 rounded-xl bg-gray-50 dark:bg-gray-900 border-none text-sm outline-none focus:ring-2 focus:ring-orange-500 transition-all resize-none"></textarea>
                                    <button class="w-full py-4 bg-orange-500 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-orange-500/30 transition-all">Hubungi Sekarang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    


<style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #f97316; border-radius: 10px; }
</style>
    </div>
</section>
{{-- TESTIMONIAL SECTION --}}
<section 
    x-data="{ 
        open: false,
        labelMore: '{{ __('messages.testimonial_more') }}',
        labelLess: '{{ __('messages.testimonial_less') }}'
    }" 
    class="relative py-20 overflow-hidden transition-colors duration-500 bg-white dark:bg-gray-900"
>
    {{-- Background Image & Overlay --}}
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&q=80" 
             class="w-full h-full object-cover opacity-20 dark:opacity-10" alt="Office Background">
        <div class="absolute inset-0 bg-gradient-to-b from-white via-white/90 to-white dark:from-gray-900 dark:via-gray-900/95 dark:to-gray-900"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        
        {{-- Floating Badges: Sekarang di dalam container agar tidak terpotong --}}
        <div class="absolute left-0 top-20 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md p-3 rounded-2xl shadow-xl border border-white dark:border-white/10 z-20 hidden xl:flex items-center gap-3 animate-bounce-slow">
            <div class="w-8 h-8 bg-green-500/20 text-green-500 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-chart-line text-xs"></i>
            </div>
            <div>
                <p class="text-[9px] text-gray-400 uppercase font-bold tracking-tighter leading-none mb-1">Exclusive Network</p>
                <p class="text-[11px] font-bold text-gray-900 dark:text-white leading-none">500+ CEO Members</p>
            </div>
        </div>

        <div class="absolute right-0 bottom-1/3 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md p-3 rounded-2xl shadow-xl border border-white dark:border-white/10 z-20 hidden xl:flex items-center gap-3 animate-bounce-slow" style="animation-delay: 1s">
            <div class="w-8 h-8 bg-orange-500/20 text-orange-500 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-crown text-xs"></i>
            </div>
            <div>
                <p class="text-[9px] text-gray-400 uppercase font-bold tracking-tighter leading-none mb-1">Priority Access</p>
                <p class="text-[11px] font-bold text-gray-900 dark:text-white leading-none">Global Events</p>
            </div>
        </div>

        {{-- Header --}}
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-100 dark:border-orange-500/20 bg-white/80 dark:bg-white/5 text-orange-500 text-[10px] font-bold uppercase mb-4 tracking-widest shadow-sm backdrop-blur-md">
                <i class="fa-solid fa-star text-[9px]"></i>
                <span>{{ __('messages.testimonial_badge') }}</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-poppins leading-tight text-slate-900 dark:text-white">
                <span class="font-semibold">{{ __('messages.testimonial_title_1') }}</span> <br>
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.testimonial_title_2') }} {{ __('messages.testimonial_title_3') }}</span>
            </h2>
        </div>

        {{-- Grid Kartu --}}
        <div class="relative">
            <div 
                class="grid grid-cols-1 md:grid-cols-3 gap-6 transition-all duration-1000 ease-in-out overflow-hidden"
                :class="open ? 'max-h-[3000px] opacity-100' : 'max-h-[400px] md:max-h-[420px]'"
            >
                @php
                    $testimonials = [
                        ['name' => 'Budi Santoso', 'role' => 'CEO, PT Maju Bersama', 'initial' => 'B', 'bg' => 'bg-orange-500', 'quote' => __('messages.testi_1_quote')],
                        ['name' => 'Sarah Wijaya', 'role' => 'Founder, TechVenture ID', 'initial' => 'S', 'bg' => 'bg-orange-400', 'quote' => __('messages.testi_2_quote')],
                        ['name' => 'Herman Tanaka', 'role' => 'Dirut, Global Logistics', 'initial' => 'H', 'bg' => 'bg-orange-500', 'quote' => __('messages.testi_3_quote')],
                        ['name' => 'Anita Rose', 'role' => 'CEO, Creative Agency', 'initial' => 'A', 'bg' => 'bg-orange-400', 'quote' => __('messages.testi_4_quote')],
                        ['name' => 'Dedi Kurnia', 'role' => 'Founder, Retail Group', 'initial' => 'D', 'bg' => 'bg-orange-500', 'quote' => __('messages.testi_5_quote')],
                        ['name' => 'Linda Wang', 'role' => 'Director, Finance Corp', 'initial' => 'L', 'bg' => 'bg-orange-400', 'quote' => __('messages.testi_6_quote')]
                    ];
                @endphp

                @foreach($testimonials as $testi)
                    <div class="group bg-white/70 dark:bg-white/5 backdrop-blur-xl border border-white dark:border-white/10 p-6 rounded-3xl shadow-sm hover:shadow-xl hover:shadow-orange-500/5 transition-all duration-500 flex flex-col justify-between min-h-[350px]">
                        <div>
                            <div class="mb-4">
                                <i class="fa-solid fa-quote-left text-2xl text-orange-200 dark:text-orange-500/30 group-hover:text-orange-500 transition-colors duration-500"></i>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 font-poppins leading-relaxed text-xs md:text-[13px] italic mb-6">
                                "{{ $testi['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center gap-3 pt-5 border-t border-gray-100 dark:border-white/5">
                            <div class="w-10 h-10 {{ $testi['bg'] }} text-white rounded-full flex-shrink-0 flex items-center justify-center text-sm font-bold shadow-md ring-2 ring-white dark:ring-gray-800">
                                {{ $testi['initial'] }}
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-slate-900 dark:text-white font-bold font-poppins text-xs truncate">{{ $testi['name'] }}</h4>
                                <p class="text-slate-400 dark:text-gray-500 font-poppins text-[10px] truncate uppercase tracking-tighter">{{ $testi['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Overlay Fade saat tertutup --}}
            <div x-show="!open" 
                 x-transition:leave="transition ease-in duration-300"
                 class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-white via-white/80 to-transparent dark:from-gray-900 dark:via-gray-900/80 dark:to-transparent z-20 pointer-events-none">
            </div>
        </div>

        {{-- Tombol Lihat Semua --}}
        <div class="mt-10 text-center relative z-30">
            <button 
                @click="open = !open" 
                class="inline-flex items-center gap-2 bg-white dark:bg-gray-800 border border-orange-200 dark:border-orange-500/30 text-orange-500 px-8 py-3 rounded-full text-xs font-bold shadow-lg hover:bg-orange-50 dark:hover:bg-gray-700 transition-all duration-300 transform active:scale-95"
            >
                <span x-text="open ? labelLess : labelMore"></span>
                <i class="fa-solid transition-transform duration-500 text-[10px]" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </button>
        </div>
    </div>
</section>
{{-- Pastikan Yasmin sudah pasang script Alpine.js di head atau sebelum </body> --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- EXCLUSIVE MEMBERSHIP SECTION --}}
<section class="py-24 bg-white dark:bg-gray-900 px-6 transition-colors duration-500 overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        
        {{-- Sisi Kiri: Informasi --}}
      <div class="space-y-8 lg:max-w-xl lg:ml-auto" data-aos="fade-right">
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-100 dark:border-orange-500/20 bg-orange-50/50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-6 shadow-sm uppercase tracking-[0.2em]">
                    <i class="fa-regular fa-shield-check"></i>
                    <span>{{ __('messages.membership_badge') }}</span>
                </div>
                
                <h2 class="text-4xl md:text-5xl font-poppins text-slate-900 dark:text-white leading-[1.1]">
                    <span class="font-semibold tracking-tight">{{ __('messages.membership_title_1') }}</span><br>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.membership_title_2') }}</span>
                </h2>
                
                <p class="mt-6 text-gray-500 dark:text-gray-400 text-base md:text-lg font-poppins leading-relaxed max-w-xl">
                    {{ __('messages.membership_desc') }}
                </p>
            </div>

            {{-- Checklist Features --}}
            <ul class="space-y-5">
                @php
                    $features = __('messages.membership_features');
                @endphp

                @foreach($features as $feature)
                <li class="flex items-start gap-4 text-slate-700 dark:text-gray-300 font-poppins text-sm md:text-base group">
                    <div class="flex-shrink-0 w-6 h-6 border-2 border-orange-400 dark:border-orange-500/50 rounded-full flex items-center justify-center mt-0.5 group-hover:bg-orange-500 group-hover:border-orange-500 transition-all duration-300 shadow-sm">
                        <i class="fa-solid fa-check text-[10px] text-orange-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <span class="group-hover:text-gray-900 dark:group-hover:text-white transition-colors">{{ $feature }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Sisi Kanan: Card CTA --}}
        <div class="relative flex justify-center lg:justify-end" data-aos="fade-left">
            {{-- Decorative Background Glow --}}
            <div class="absolute -top-10 -right-10 w-72 h-72 bg-orange-500/10 blur-[120px] rounded-full"></div>
            
        
            {{-- Main Card --}}
            <div class="relative group bg-[#f8f9fb] dark:bg-white/[0.03] border border-gray-100 dark:border-white/10 p-10 md:p-14 rounded-[3.5rem] w-full max-w-md text-center shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] dark:shadow-none backdrop-blur-sm transition-all duration-500 hover:border-orange-500/30">
                
                {{-- Animated Icon Container --}}
                <div class="relative w-24 h-24 mx-auto mb-10">
                    <div class="absolute inset-0 bg-orange-500/20 rounded-3xl blur-2xl group-hover:blur-3xl transition-all duration-500"></div>
                    <div class="relative w-full h-full bg-orange-500 rounded-[2rem] flex items-center justify-center transform -rotate-12 group-hover:rotate-0 transition-all duration-500 shadow-xl shadow-orange-500/20">
                        <i class="fa-solid fa-shield-halved text-3xl text-white"></i>
                    </div>
                </div>
                
                <h3 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white font-poppins mb-4 tracking-tight">
                    {{ __('messages.membership_cta_title') }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm font-poppins leading-relaxed mb-10 px-2">
                    {{ __('messages.membership_cta_desc') }}
                </p>

                <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-black py-5 rounded-2xl shadow-lg shadow-orange-500/40 transition-all duration-300 flex items-center justify-center gap-3 group active:scale-95 text-base">
                    {{ __('messages.membership_cta_btn') }}
                    <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-2 transition-transform"></i>
                </button>

                <p class="mt-8 text-xs md:text-sm text-gray-400 dark:text-gray-500 font-poppins">
                    {{ __('messages.membership_partner') }} 
                    <a href="#" class="text-orange-500 font-bold hover:underline decoration-2 underline-offset-4 transition-all">
                        {{ __('messages.membership_contact') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
{{-- FAQ SECTION --}}
<section class="relative py-24 px-6 overflow-hidden bg-white dark:bg-gray-900 transition-colors duration-500">
    {{-- Background logic tetap sama --}}
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&q=80" 
             class="w-full h-full object-cover opacity-10 dark:opacity-[0.05]" alt="">
        <div class="absolute inset-0 bg-gradient-to-b from-white/90 via-white to-white/90 dark:from-gray-900/95 dark:via-gray-900 dark:to-gray-900/95"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
        {{-- Header FAQ --}}
        <div class="text-center mb-10" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-100 dark:border-orange-500/20 bg-orange-50/50 dark:bg-white/5 text-orange-500 text-xs font-bold tracking-widest uppercase mb-6 shadow-sm">
                <i class="fa-regular fa-circle-question animate-pulse"></i>
                <span>{{ __('messages.faq_badge') }}</span>
            </div>
            
            <h2 class="text-4xl md:text-5xl font-poppins text-slate-900 dark:text-white leading-tight">
                <span class="font-semibold">{{ __('messages.faq_title_1') }}</span> <br>
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.faq_title_2') }}</span>
            </h2>
        </div>

        {{-- Accordion List --}}
        <div class="space-y-5">
            @php
                $faqs = [
                    ['q' => __('messages.faq_1_q'), 'a' => __('messages.faq_1_a')],
                    ['q' => __('messages.faq_2_q'), 'a' => __('messages.faq_2_a')],
                    ['q' => __('messages.faq_3_q'), 'a' => __('messages.faq_3_a')],
                    ['q' => __('messages.faq_4_q'), 'a' => __('messages.faq_4_a')],
                    ['q' => __('messages.faq_5_q'), 'a' => __('messages.faq_5_a'), 'is_highlight' => true],
                    ['q' => __('messages.faq_6_q'), 'a' => __('messages.faq_6_a')]
                ];
            @endphp

            @foreach($faqs as $index => $faq)
            <div 
                x-data="{ open: false }" 
                data-aos="fade-up"
                data-aos-delay="{{ $index * 50 }}"
                class="group transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)]"
                :class="open ? 'translate-y-[-4px]' : ''"
            >
                <div 
                    class="relative overflow-hidden rounded-[2rem] border transition-all duration-500 bg-white/70 dark:bg-white/5 backdrop-blur-xl"
                    :class="open ? 'border-orange-500/30 shadow-2xl shadow-orange-500/10' : 'border-slate-100 dark:border-white/10 shadow-sm'"
                >
                    <button 
                        @click="open = !open" 
                        class="w-full px-8 py-7 flex items-center justify-between text-left focus:outline-none"
                    >
                        <span class="font-poppins font-semibold text-[15px] md:text-lg transition-all duration-500"
                            :class="open ? 'text-orange-500' : 'text-slate-700 dark:text-gray-200 group-hover:text-orange-500'">
                            {{ $faq['q'] }}
                        </span>
                        
                        {{-- Icon Wrapper --}}
                        <div 
                            class="flex-shrink-0 ml-4 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-500 ease-[cubic-bezier(0.34,1.56,0.64,1)]"
                            :class="open ? 'bg-orange-500 rotate-[135deg] shadow-lg shadow-orange-500/30' : 'bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/10 group-hover:border-orange-500/50'"
                        >
                            <i class="fa-solid fa-plus text-xs transition-colors duration-500"
                               :class="open ? 'text-white' : 'text-orange-500'"></i>
                        </div>
                    </button>

                    <div 
                        x-show="open" 
                        x-collapse.duration.600ms
                        x-cloak
                    >
                        <div class="px-8 pb-8 transform transition-all duration-700" :class="open ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'">
                            <div class="h-[1px] w-full bg-gradient-to-r from-orange-500/20 via-orange-500/10 to-transparent mb-6"></div>
                            <p class="text-sm md:text-base text-gray-500 dark:text-gray-400 font-poppins leading-relaxed">
                                {{ $faq['a'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Footer Call to Action tetap di sini --}}
    </div>
</section>

{{-- GALLERY SECTION --}}
<section x-data="{ 
    activeCategory: 'Semua',
    filter(category) {
        this.activeCategory = category;
    }
}" class="bg-white dark:bg-gray-900 py-24 px-6 md:px-10 transition-colors duration-500 overflow-hidden">
    
    <div class="max-w-7xl mx-auto text-center">
        {{-- Header dengan Animate On Scroll --}}
        <div data-aos="fade-up" class="mb-5">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-bold tracking-widest uppercase mb-6 border border-orange-100 dark:border-orange-500/20">
                <i class="fa-solid fa-camera-retro animate-bounce"></i>
                {{ __('messages.gallery_badge') }}
            </div>

            <h2 class="text-4xl md:text-5xl text-gray-900 dark:text-white font-poppins leading-tight">
                <span class="font-semibold">{{ __('messages.gallery_title_1') }}</span> <br>
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.gallery_title_2') }}</span>
            </h2>
        </div>

        {{-- Filter Categories: Smooth Transition Chip --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up" data-aos-delay="100">
            @php
                $categories = ['Semua', 'Summit', 'Masterclass', 'ACMI SPORT', 'ACMI Bersama 2024', 'Reuni 2024'];
            @endphp
            @foreach($categories as $category)
                <button 
                    @click="filter('{{ $category }}')"
                    :class="activeCategory === '{{ $category }}' 
                        ? 'bg-orange-500 text-white shadow-md shadow-orange-500/20 ring-2 ring-orange-500 ring-offset-2 dark:ring-offset-gray-900' 
                        : 'bg-white dark:bg-white/5 text-slate-500 dark:text-gray-400 border border-slate-200/60 dark:border-white/10 hover:border-orange-500 hover:text-orange-500'"
                    class="relative px-6 py-2.5 rounded-xl text-sm font-poppins font-semibold transition-all duration-500 ease-out">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        {{-- Gallery Grid with Staggered Transition --}}
        <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8" id="gallery-grid">
            {{-- SUMMIT --}}
            <div x-show="activeCategory === 'Semua' || activeCategory === 'Summit'"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 class="break-inside-avoid">
                <div class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/10">
                    <img src="{{ asset('assets/bersama1.jpeg') }}" class="w-full h-auto min-h-[400px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10">
                        <p class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">ACMI Annual Summit 2024</p>
                    </div>
                </div>
            </div>

            {{-- MASTERCLASS --}}
            <div x-show="activeCategory === 'Semua' || activeCategory === 'Masterclass'"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="break-inside-avoid">
                <div class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2">
                    <img src="{{ asset('assets/acmi talk.jpg') }}" class="w-full h-auto min-h-[300px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10 text-left">
                        <p class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">CEO Masterclass Series</p>
                    </div>
                </div>
            </div>

            {{-- ACMI SPORT (Loop) --}}
            @php $sportImages = ['sport.jpeg', 'sport2.jpeg', 'sport3.jpeg']; @endphp
            @foreach($sportImages as $img)
            <div x-show="activeCategory === 'Semua' || activeCategory === 'ACMI SPORT'"
                 x-transition:enter="transition ease-out duration-500 delay-[100ms]"
                 class="break-inside-avoid">
                <div class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2">
                    <img src="{{ asset('assets/'.$img) }}" class="w-full h-auto min-h-[300px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10 text-left">
                        <p class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">ACMI Sport Moment</p>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- REUNI 2024 --}}
            <div x-show="activeCategory === 'Semua' || activeCategory === 'Reuni 2024'"
                 x-transition:enter="transition ease-out duration-500"
                 class="break-inside-avoid">
                <div class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2">
                    <img src="{{ asset('assets/galeri2.jpg') }}" class="w-full h-auto min-h-[350px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10 text-left">
                        <p class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">Reuni Moment</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Button Selengkapnya --}}
        <div class="text-center mt-20" data-aos="fade-up">
            <a href="{{ route('gallery') }}" class="group inline-flex items-center gap-3 px-10 py-4 rounded-2xl bg-slate-900 dark:bg-orange-500 text-white font-bold font-poppins transition-all duration-500 hover:bg-orange-500 hover:shadow-xl hover:shadow-orange-500/20">
                {{ __('messages.gallery_more') }} 
                <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-2"></i>
            </a>
        </div>
    </div>
</section>

<script>
function filterGallery(category, btn) {
    // 1. Reset Button Style
    const buttons = document.querySelectorAll('.filter-btn');
    buttons.forEach(b => {
        b.classList.remove('bg-orange-500', 'text-white', 'shadow-lg', 'shadow-orange-200');
        b.classList.add('bg-gray-50', 'text-gray-500', 'border-gray-100');
    });

    // 2. Set Active Button
    btn.classList.add('bg-orange-500', 'text-white', 'shadow-lg', 'shadow-orange-200');
    btn.classList.remove('bg-gray-50', 'text-gray-500', 'border-gray-100');

    // 3. Filter Logic
    const items = document.querySelectorAll('.gallery-item');
    items.forEach(item => {
        item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        
        if (category === 'Semua') {
            // Tampilkan hanya yang punya data-show="true" atau tampilkan SEMUA? 
            // Biasanya kalau "Semua", ya tampilkan semuanya.
            showItem(item);
        } else {
            if (item.getAttribute('data-category') === category) {
                showItem(item);
            } else {
                hideItem(item);
            }
        }
    });
}

function showItem(item) {
    item.style.display = 'block';
    setTimeout(() => {
        item.style.opacity = '1';
        item.style.transform = 'scale(1)';
    }, 10);
}

function hideItem(item) {
    item.style.opacity = '0';
    item.style.transform = 'scale(0.95)';
    setTimeout(() => {
        item.style.display = 'none';
    }, 300);
}
</script>

{{-- INSTAGRAM FEED SECTION --}}
<section class="py-24 bg-white dark:bg-gray-900 px-6 transition-colors duration-500 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        {{-- Header dengan Animasi Fade Up --}}
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-100 dark:border-orange-500/20 bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 shadow-sm">
                <i class="fa-brands fa-instagram animate-pulse"></i>
                <span>{{ __('messages.instagram_badge') }}</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-poppins text-slate-900 dark:text-white leading-tight">
                <span class="font-semibold">{{ __('messages.instagram_title_1') }}</span><br>
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.instagram_title_2') }}</span>
            </h2>
        </div>

        {{-- Grid Postingan dengan Staggered Animation --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $index => $post)
                <a href="{{ $post['permalink'] }}" target="_blank" 
                   data-aos="fade-up" 
                   data-aos-delay="{{ $index * 100 }}"
                   class="group relative aspect-square overflow-hidden rounded-[2.5rem] bg-slate-100 dark:bg-white/5 border border-slate-100 dark:border-white/10 transition-all duration-700 hover:-translate-y-3">
                    
                    {{-- Image dengan Smooth Zoom & Slight Rotate --}}
                    <img 
                        src="{{ $post['mediaUrl'] }}" 
                        alt="{{ $post['prunedCaption'] ?? 'ACMI Instagram Post' }}" 
                        class="w-full h-full object-cover transition duration-[1.5s] ease-out group-hover:scale-110 group-hover:rotate-1"
                    >

                    {{-- Overlay: Glassmorphism yang dihaluskan --}}
                    <div class="absolute inset-0 bg-orange-600/40 dark:bg-orange-500/60 backdrop-blur-[4px] opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center gap-8">
                        <div class="flex flex-col items-center gap-1 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75">
                            <i class="fa-solid fa-heart text-2xl drop-shadow-md"></i>
                            <span class="font-poppins font-bold text-lg">{{ number_format($post['likeCount'] ?? 0) }}</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-150">
                            <i class="fa-solid fa-comment text-2xl drop-shadow-md"></i>
                            <span class="font-poppins font-bold text-lg">{{ number_format($post['commentCount'] ?? 0) }}</span>
                        </div>
                    </div>

                    {{-- Type Indicator Badge --}}
                    <div class="absolute top-6 right-6 w-10 h-10 rounded-full bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center text-white opacity-100 group-hover:opacity-0 transition-opacity duration-300">
                        @if($post['mediaType'] === 'VIDEO')
                            <i class="fa-solid fa-play text-xs"></i>
                        @elseif($post['mediaType'] === 'CAROUSEL_ALBUM')
                            <i class="fa-solid fa-images text-xs"></i>
                        @else
                            <i class="fa-solid fa-camera text-xs"></i>
                        @endif
                    </div>
                </a>
            @empty
                {{-- Empty State tetap simple --}}
                <div class="col-span-full text-center py-20 bg-slate-50 dark:bg-white/5 rounded-[2.5rem] border-2 border-dashed border-slate-200 dark:border-white/10">
                    <p class="text-slate-400 dark:text-gray-500 font-poppins italic">{{ __('messages.instagram_error') }}</p>
                </div>
            @endforelse
        </div>

        {{-- Button Follow dengan Hover Effect yang lebih "Playful" --}}
        <div class="mt-20 text-center" data-aos="zoom-in">
            <a href="https://www.instagram.com/acmi_official/" target="_blank" 
               class="inline-flex items-center gap-4 px-12 py-4 bg-slate-900 dark:bg-orange-500 text-white rounded-2xl font-bold font-poppins hover:bg-orange-500 dark:hover:bg-orange-600 transition-all duration-500 shadow-xl hover:shadow-orange-500/20 group overflow-hidden relative">
                
                <span class="relative z-10">Follow @acmi_official</span>
                <i class="fa-brands fa-instagram text-2xl relative z-10 group-hover:rotate-[360deg] transition-transform duration-700"></i>
                
                {{-- Shine Effect on Hover --}}
                <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes shimmer {
        100% { transform: translateX(100%); }
    }
    .animate-shimmer {
        animation: shimmer 1.5s infinite;
    }
</style>
{{-- FINAL CTA SECTION --}}
<section class="relative py-24 px-6 overflow-hidden bg-white dark:bg-gray-900 transition-colors duration-500">
    <div class="relative z-10 max-w-5xl mx-auto">
        <div 
            data-aos="fade-up"
            data-aos-duration="1200"
            class="relative bg-[#1a1a1a] dark:bg-white/5 rounded-[3rem] p-12 md:p-20 text-center border border-white/5 shadow-2xl transition-all duration-700 hover:border-orange-500/30"
        >
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 mb-8 transform transition-transform duration-500 hover:scale-105">
                <span class="text-orange-400 text-[10px]">✦</span>
                <span class="text-orange-500 text-[10px] font-bold tracking-[0.2em] uppercase">{{ __('messages.cta_badge') }}</span>
            </div>

            {{-- Title with Smooth Reveal --}}
            <h2 class="text-4xl md:text-5xl font-poppins text-white leading-tight mb-6">
                <span class="font-semibold block transition-all duration-700 hover:tracking-tight">{{ __('messages.cta_title_1') }}</span>
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.cta_title_2') }}</span>
            </h2>

            {{-- Desc --}}
            <p class="text-gray-400 text-base md:text-lg font-poppins max-w-2xl mx-auto mb-12 opacity-80 transition-opacity duration-500 hover:opacity-100">
                {{ __('messages.cta_desc') }}
            </p>

            {{-- Button with Liquid Transition --}}
            <div class="relative group inline-block">
                {{-- Glow effect behind button --}}
                <div class="absolute -inset-1 bg-orange-500 rounded-[2rem] blur opacity-20 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                
                <a href="#" 
                   class="relative flex items-center gap-4 bg-orange-500 text-white font-bold px-12 py-5 rounded-[2rem] transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] group-hover:-translate-y-1.5 group-hover:shadow-2xl group-hover:shadow-orange-500/40">
                    
                    <span class="font-poppins tracking-wide">{{ __('messages.cta_btn') }}</span>
                    
                    {{-- Smooth Arrow Transition --}}
                    <div class="relative w-5 h-5 overflow-hidden">
                        <i class="fa-solid fa-arrow-right absolute transition-all duration-500 group-hover:translate-x-full opacity-100 group-hover:opacity-0"></i>
                        <i class="fa-solid fa-arrow-right absolute -left-full transition-all duration-500 group-hover:left-0 opacity-0 group-hover:opacity-100"></i>
                    </div>
                </a>
            </div>

            <p class="mt-8 text-gray-500 text-xs font-poppins tracking-wider opacity-60">
                — {{ __('messages.cta_note') }} —
            </p>
        </div>
    </div>
</section>

<hr class="border-gray-100">


@endsection
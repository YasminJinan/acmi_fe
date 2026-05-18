@extends('layouts.app')

{{-- SEO --}}
@section('title', 'ACMI - Bersinergi Memimpin Indonesia')
@section('meta_description',
    'Komunitas eksklusif CEO dan eksekutif terbaik Indonesia. Networking, knowledge sharing,
    dan business opportunities.')
@section('meta_keywords', 'acmi, ceo indonesia, komunitas eksekutif, leadership indonesia')
@section('og_image', asset('images/OG-ACMI.png'))
@section('canonical', url('/'))

@section('content')   

    {{-- HERO SECTION --}}
    <section class="relative h-screen flex items-center justify-center overflow-hidden">

        {{-- Background Video --}}
        <div class="absolute inset-0 w-full h-full">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                <source src="{{ asset('videos/hero-bg.mp4') }}" type="video/mp4">
            </video>
        </div>

        {{-- Overlay --}}
        <div
            class="absolute inset-0 bg-gradient-to-b
        from-white/30 via-white/80 to-white
        dark:from-[#0a0a0b]/40 dark:via-[#0a0a0b]/80 dark:to-[#0a0a0b]">
        </div>

        <div class="relative z-10 text-center px-6 max-w-4xl">

            {{-- Badge --}}
            <div data-aos="zoom-in"
                class="inline-block px-6 py-1.5 rounded-full bg-white/10 dark:bg-white/5 backdrop-blur-md border border-white/20 dark:border-white/10 shadow-[0_8px_32px_0_rgba(255,145,0,0.1)] mb-6 transition-all duration-500 hover:border-orange-400/50 group">
                <div class="flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                    </span>
                    <span
                        class="text-orange-500 text-xs font-poppins font-semibold uppercase tracking-widest group-hover:text-orange-400 transition-colors">
                        {{ __('messages.hero_badge') }}
                    </span>
                </div>
            </div>

            {{-- Judul --}}
            <h1 data-aos="fade-up" data-aos-delay="200"
                class="text-4xl md:text-7xl leading-tight text-gray-900 dark:text-white">
                <span class="font-poppins font-semibold">{{ __('messages.hero_title_1') }}</span><br>
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.hero_title_2') }}</span>
            </h1>

            {{-- Deskripsi --}}




            
            <p data-aos="fade-up" data-aos-delay="400"
                class="mt-6 text-gray-600 dark:text-gray-300 text-sm md:text-base font-poppins max-w-xl mx-auto">
                {{ __('messages.hero_desc') }}
            </p>

            {{-- Buttons --}}
            <div data-aos="fade-up" data-aos-delay="600" class="mt-8 flex justify-center gap-4 flex-wrap">
                <a href="/gabung"
                    class="px-6 py-3 bg-orange-500 text-white rounded-lg font-semibold shadow-lg hover:scale-105 transition-transform duration-300 inline-block">
                    {{ __('messages.btn_join') }}
                </a>
                <button
                    class="px-6 py-3 border border-orange-400 text-orange-500 rounded-lg font-semibold hover:bg-orange-50/10 hover:scale-105 transition-transform duration-300">
                    {{ __('messages.btn_explore') }}
                </button>
            </div>

            {{-- Stats --}}
            <div class="mt-14 grid grid-cols-3 gap-4 max-w-3xl mx-auto">
                @php
                    $stats = [
                        ['target' => 500, 'suffix' => '+', 'label' => __('messages.stats_ceo')],
                        ['target' => 50, 'suffix' => '+', 'label' => __('messages.stats_events')],
                        ['target' => 15, 'suffix' => '+', 'label' => __('messages.stats_industry')],
                    ];
                @endphp

                @foreach ($stats as $index => $stat)
                    <div data-aos="flip-up" data-aos-delay="{{ 800 + $index * 100 }}"
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
                                    if (progress < 1) window.requestAnimationFrame(step);
                                };
                                window.requestAnimationFrame(step);
                            }
                        }" x-init="start()">
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
    <section class="relative py-24 bg-white dark:bg-[#0a0a0b] overflow-hidden transition-colors duration-500">
        <div class="container mx-auto px-6">

            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-orange-500 dark:text-orange-400 text-xs font-bold tracking-[0.2em] uppercase mb-3">
                    {{ __('messages.partner_title') }}
                </h2>
                <div class="h-1 w-12 bg-orange-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 max-w-6xl mx-auto">
                @foreach (['BCA', 'TELKOM', 'PERTAMINA', 'ASTRA', 'INDOFOOD', 'SINARMAS'] as $index => $partner)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                        class="group relative bg-gray-50 dark:bg-white/5 backdrop-blur-sm rounded-2xl py-8 px-4 border border-gray-100 dark:border-white/10 flex items-center justify-center transition-all duration-500 hover:bg-white dark:hover:bg-white/10 hover:shadow-[0_20px_40px_rgba(0,0,0,0.05)] dark:hover:shadow-[0_20px_40px_rgba(0,0,0,0.3)] hover:-translate-y-2">
                        <div
                            class="absolute inset-0 bg-orange-500/5 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-500">
                        </div>
                        <p
                            class="font-bold text-gray-400 dark:text-gray-500 group-hover:text-orange-500 dark:group-hover:text-orange-400 text-lg tracking-wider transition-colors duration-300">
                            {{ $partner }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- EVENT BANNER --}}
    <section class="bg-white dark:bg-[#0a0a0b] px-6 md:px-10 pt-10 pb-6">
        <div class="max-w-7xl mx-auto">
            <div
                class="bg-[#f5f5f7] dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-2xl px-8 py-6 flex flex-col md:flex-row items-center justify-between shadow-sm gap-6">

                <div class="flex items-center gap-5">
                    <div
                        class="w-14 h-14 bg-orange-100 dark:bg-orange-500/20 text-orange-500 rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-sparkles"></i>
                    </div>
                    <div>
                        <span
                            class="text-xs font-semibold bg-orange-100 dark:bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full uppercase tracking-wider">
                            {{ __('messages.event_badge') }}
                        </span>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mt-2">
                            {{ __('messages.event_title') }}</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-2">
                            {{ __('messages.event_date') }}
                            <i class="fa-regular fa-calendar"></i>
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs text-gray-400">Early Bird Discount</p>
                        <p class="text-orange-500 font-bold text-lg">30% OFF</p>
                    </div>
                    <button
                        class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold px-6 py-3 rounded-lg flex items-center gap-2 transition duration-300">
                        {{ __('messages.event_cta') }} <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>

            </div>
        </div>
    </section>


    {{-- CHALLENGE SECTION --}}
    <section class="bg-gray-100/50 dark:bg-[#050506] px-6 md:px-10 py-24 transition-colors duration-500 overflow-hidden">
        <div class="max-w-7xl mx-auto flex flex-col gap-16">

            {{-- Header --}}
            <div class="text-center max-w-4xl mx-auto" data-aos="fade-up">
                <div
                    class="inline-block px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-6 uppercase tracking-[0.2em] border border-orange-100 dark:border-orange-500/20">
                    {{ __('messages.challenge_badge') }}
                </div>
                <h2 class="text-4xl md:text-5xl leading-tight text-gray-900 dark:text-white font-poppins">
                    <span class="font-semibold tracking-tight">{{ __('messages.challenge_title_1') }}</span><br>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.challenge_title_2') }}</span>
                </h2>
                <p
                    class="mt-6 text-gray-500 dark:text-gray-400 text-base md:text-lg font-poppins max-w-2xl mx-auto leading-relaxed">
                    {{ __('messages.challenge_desc') }}
                </p>
            </div>

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @php
                    $challenges = [
                        [
                            'icon' => 'fa-users',
                            'title' => __('messages.challenge_1_title'),
                            'desc' => __('messages.challenge_1_desc'),
                        ],
                        [
                            'icon' => 'fa-bolt',
                            'title' => __('messages.challenge_2_title'),
                            'desc' => __('messages.challenge_2_desc'),
                        ],
                        [
                            'icon' => 'fa-lock',
                            'title' => __('messages.challenge_3_title'),
                            'desc' => __('messages.challenge_3_desc'),
                        ],
                        [
                            'icon' => 'fa-bullseye',
                            'title' => __('messages.challenge_4_title'),
                            'desc' => __('messages.challenge_4_desc'),
                        ],
                    ];
                @endphp

                @foreach ($challenges as $index => $item)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 150 }}"
                        class="group relative bg-white dark:bg-[#121214] border border-gray-200 dark:border-white/10 rounded-3xl p-8 transition-all duration-500 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1)] dark:hover:shadow-[0_30px_60px_-15px_rgba(249,115,22,0.15)] hover:-translate-y-3">

                        <div
                            class="absolute inset-0 bg-gradient-to-br from-orange-500/[0.03] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="w-14 h-14 bg-gray-50 dark:bg-white/5 text-orange-500 rounded-2xl flex items-center justify-center text-xl mb-8 border border-gray-100 dark:border-white/5 group-hover:bg-orange-500 group-hover:text-white group-hover:shadow-lg group-hover:shadow-orange-500/40 transition-all duration-500">
                                <i class="fa-solid {{ $item['icon'] }}"></i>
                            </div>
                            <h3 class="font-poppins font-bold text-gray-900 dark:text-white mb-4 text-lg tracking-tight">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-poppins leading-relaxed">
                                {{ $item['desc'] }}
                            </p>
                        </div>

                        <div
                            class="mt-6 flex justify-end opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-x-2 group-hover:translate-x-0">
                            <i class="fa-solid fa-arrow-right-long text-orange-500 text-sm"></i>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- SOLUTION SECTION --}}
    <section
        class="relative min-h-screen w-full flex items-center justify-center py-24 px-6 overflow-hidden transition-colors duration-500 bg-white dark:bg-[#0a0a0b]">

        {{-- Background --}}
        <div class="absolute inset-0 z-0" data-aos="fade-in" data-aos-duration="2000">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80"
                class="w-full h-full object-cover opacity-30 dark:opacity-20" alt="Office background">
            <div
                class="absolute inset-0 bg-gradient-to-tr from-white via-white/95 to-orange-50/30 dark:from-gray-900 dark:via-gray-900/98 dark:to-orange-500/5 transition-colors duration-500">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

            {{-- Left Side --}}
            <div class="space-y-12 lg:max-w-md xl:max-w-lg lg:ml-auto" data-aos="fade-right">
                <div class="relative">
                    <div class="absolute -left-6 top-0 w-1 h-24 bg-orange-500 rounded-full hidden md:block"></div>

                    <span
                        class="inline-block px-4 py-1.5 rounded-full border border-orange-200 dark:border-orange-500/30 bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-bold mb-6 uppercase tracking-[0.2em]">
                        {{ __('messages.solution_badge') }}
                    </span>

                    <h2 class="text-4xl md:text-6xl font-poppins font-bold text-gray-900 dark:text-white leading-[1.1]">
                        ACMI:
                        <span class="font-serif italic text-orange-500 block md:inline-block">Powerhouse</span><br
                            class="hidden md:block">
                        <span class="font-light tracking-tight">{{ __('messages.solution_title') }}</span>
                    </h2>

                    <p
                        class="mt-8 text-gray-600 dark:text-gray-400 text-base md:text-lg font-poppins max-w-lg leading-relaxed">
                        {{ __('messages.solution_desc') }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-8 pt-10 border-t border-gray-100 dark:border-white/5">
                    <div class="group">
                        <p
                            class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white font-poppins group-hover:text-orange-500 transition-colors duration-300">
                            10<span class="text-orange-500">+</span>
                        </p>
                        <p class="text-[11px] text-gray-400 dark:text-gray-500 font-bold uppercase tracking-widest mt-3">
                            {{ __('messages.solution_exp') }}
                        </p>
                    </div>
                    <div class="group">
                        <p
                            class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white font-poppins group-hover:text-orange-500 transition-colors duration-300">
                            50<span class="text-orange-500 text-3xl">T+</span>
                        </p>
                        <p class="text-[11px] text-gray-400 dark:text-gray-500 font-bold uppercase tracking-widest mt-3">
                            {{ __('messages.solution_revenue') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                <div class="absolute inset-0 bg-orange-500/5 blur-[120px] -z-10 rounded-full"></div>

                @php
                    $solutions = [
                        [
                            'icon' => 'fa-share-nodes',
                            'title' => __('messages.solution_1_title'),
                            'desc' => __('messages.solution_1_desc'),
                            'aos' => 'fade-down',
                        ],
                        [
                            'icon' => 'fa-book-open',
                            'title' => __('messages.solution_2_title'),
                            'desc' => __('messages.solution_2_desc'),
                            'aos' => 'fade-left',
                        ],
                        [
                            'icon' => 'fa-bullhorn',
                            'title' => __('messages.solution_3_title'),
                            'desc' => __('messages.solution_3_desc'),
                            'aos' => 'fade-right',
                        ],
                        [
                            'icon' => 'fa-briefcase',
                            'title' => __('messages.solution_4_title'),
                            'desc' => __('messages.solution_4_desc'),
                            'aos' => 'fade-up',
                        ],
                    ];
                @endphp

                @foreach ($solutions as $index => $sol)
                    <div data-aos="{{ $sol['aos'] }}" data-aos-delay="{{ $index * 100 }}"
                        class="group bg-white/80 dark:bg-white/[0.03] backdrop-blur-xl p-8 rounded-[2rem] border border-white dark:border-white/5 shadow-[0_15px_40px_-15px_rgba(0,0,0,0.05)] dark:shadow-none hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 transition-all duration-500">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 text-white rounded-2xl flex items-center justify-center text-xl mb-6 shadow-[0_10px_20px_rgba(249,115,22,0.2)] group-hover:rotate-6 transition-transform">
                            <i class="fa-solid {{ $sol['icon'] }}"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white font-poppins mb-3 tracking-tight">
                            {{ $sol['title'] }}
                        </h3>
                        <p
                            class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed font-poppins group-hover:text-gray-600 dark:group-hover:text-gray-300 transition-colors">
                            {{ $sol['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    {{-- EXCLUSIVE MEMBERSHIP SECTION --}}
    <section
        class="py-16 md:py-20 bg-white dark:bg-[#0a0a0b] transition-colors duration-500 overflow-hidden mt-10 relative">

        {{-- Decorative Background --}}
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-10%] left-1/2 -translate-x-1/2 w-[600px] h-[500px] bg-orange-500/10 dark:bg-orange-500/20 rounded-full blur-[120px]">
            </div>
            <div
                class="absolute bottom-[-5%] right-[-5%] w-[300px] h-[300px] bg-orange-600/5 dark:bg-orange-900/15 rounded-full blur-[100px]">
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-6 md:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Left: Info --}}
                <div class="space-y-6" data-aos="fade-right">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-100 dark:border-orange-500/20 bg-orange-50/50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-xs font-bold mb-4 shadow-sm uppercase tracking-widest">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>{{ __('messages.membership_badge') }}</span>
                        </div>

                        <h2
                            class="text-3xl md:text-4xl lg:text-5xl font-poppins text-slate-900 dark:text-white leading-tight">
                            <span class="font-semibold tracking-tight">{{ __('messages.membership_title_1') }}</span><br>
                            <span
                                class="font-serif font-bold italic text-orange-500">{{ __('messages.membership_title_2') }}</span>
                        </h2>

                        <p
                            class="mt-4 text-gray-500 dark:text-gray-400 text-base md:text-lg font-poppins leading-relaxed max-w-md">
                            {{ __('messages.membership_desc') }}
                        </p>
                    </div>

                    {{-- Checklist --}}
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-3">
                        @php
                            $features = is_array(__('messages.membership_features'))
                                ? __('messages.membership_features')
                                : [];
                        @endphp
                        @foreach ($features as $feature)
                            <li
                                class="flex items-center gap-3 text-slate-700 dark:text-gray-300 font-poppins text-sm group">
                                <div
                                    class="flex-shrink-0 w-5 h-5 rounded-md bg-orange-100 dark:bg-orange-500/20 flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300">
                                    <i
                                        class="fa-solid fa-check text-[8px] text-orange-600 dark:text-orange-400 group-hover:text-white"></i>
                                </div>
                                <span
                                    class="group-hover:text-orange-500 dark:group-hover:text-white transition-colors">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>

                    {{-- CTA --}}
                    <div class="pt-4">
                        <div class="flex flex-col sm:flex-row items-center gap-4">
                            <button
                                class="px-8 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-500/30 transition-all hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 w-full sm:w-auto">
                                {{ __('messages.membership_cta_btn') }}
                                <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-1"></i>
                            </button>
                        </div>
                        <p class="mt-4 text-[11px] text-gray-400 font-poppins">
                            *{{ __('messages.membership_partner') }}
                            <a href="#"
                                class="text-orange-500 font-bold hover:underline decoration-2 underline-offset-4 ml-1">
                                {{ __('messages.membership_contact') }}
                            </a>
                        </p>
                    </div>
                </div>

                {{-- Right: Card --}}
                <div class="relative flex justify-center lg:justify-start lg:ml-12" data-aos="fade-left">
                    <div class="absolute -top-12 -right-12 w-64 h-64 bg-orange-500/10 blur-[100px] rounded-full"></div>

                    <div
                        class="relative group bg-[#f8f9fb] dark:bg-white/[0.03] border border-gray-100 dark:border-white/10 p-10 md:p-14 rounded-[3rem] w-full max-w-[420px] text-center shadow-2xl backdrop-blur-sm transition-all duration-500 hover:border-orange-500/30">

                        <div class="relative w-20 h-20 mx-auto mb-10">
                            <div
                                class="absolute inset-0 bg-orange-500/20 rounded-3xl blur-2xl group-hover:blur-3xl transition-all">
                            </div>
                            <div
                                class="relative w-full h-full bg-orange-500 rounded-[1.5rem] flex items-center justify-center transform -rotate-6 group-hover:rotate-0 transition-all shadow-lg shadow-orange-500/25">
                                <i class="fa-solid fa-shield-halved text-3xl text-white"></i>
                            </div>
                        </div>

                        <h3 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white font-poppins mb-4">
                            {{ __('messages.membership_cta_title') }}
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-poppins leading-relaxed mb-10 px-2">
                            {{ __('messages.membership_cta_desc') }}
                        </p>

                        <button
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-orange-500/40 transition-all active:scale-95 text-base flex items-center justify-center gap-3">
                            {{ __('messages.membership_cta_btn') }}
                            <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                        </button>

                        <p
                            class="mt-8 text-[12px] text-gray-400 dark:text-gray-500 font-poppins uppercase tracking-[0.1em]">
                            {{ __('messages.membership_partner') }}
                            <a href="#"
                                class="text-orange-500 font-bold hover:underline decoration-2 underline-offset-4 ml-1">
                                {{ __('messages.membership_contact') }}
                            </a>
                        </p>
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
    <section class="bg-gray-50 dark:bg-[#050505] py-16 px-6 md:px-10 transition-colors duration-500 overflow-hidden"
        x-data="{
            search: '',
            category: 'Semua',
            products: @js($products),
            get filteredProducts() {
                return this.products.filter(p => {
                    const matchSearch = p.title.toLowerCase().includes(this.search.toLowerCase()) ||
                        p.company_name.toLowerCase().includes(this.search.toLowerCase());
                    const matchCategory = this.category === 'Semua' ||
                        (Array.isArray(p.category) ? p.category.includes(this.category) : p.category === this.category);
                    return matchSearch && matchCategory;
                });
            }
        }">

        <div class="max-w-7xl mx-auto">

            {{-- Header --}}
            <div class="text-center max-w-3xl mx-auto mb-10" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-[10px] font-semibold mb-4 border border-orange-100 dark:border-orange-500/20">
                    <i class="fa-solid fa-box-open animate-pulse"></i> Produk Anggota
                </div>
                <h2 class="text-5xl md:text-5xl font-semibold text-gray-900 dark:text-white leading-tight">
                    Produk & Layanan <br>
                    <span class="text-orange-500 font-serif italic font-bold">Anggota ACMI</span>
                </h2>

                {{-- Search & Filter --}}
                <div class="mt-6 flex flex-col md:flex-row gap-3 justify-center">
                    <div class="relative group md:w-72">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xs group-focus-within:text-orange-500 transition-colors"></i>
                        <input type="text" x-model="search" placeholder="Cari produk..."
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white text-sm transition-all">
                    </div>
                    <select x-model="category"
                        class="px-6 py-3 rounded-xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white text-sm cursor-pointer appearance-none">
                        <option value="Semua">Semua Kategori</option>
                        <option value="Software">Software</option>
                        <option value="Energi">Energi</option>
                        <option value="F&B">F&B</option>
                        <option value="Manufaktur">Manufaktur</option>
                        <option value="Properti">Properti</option>
                        <option value="Fintech">Fintech</option>
                    </select>
                </div>
            </div>

            {{-- Grid Produk --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div class="group flex flex-col" data-aos="fade-up">
                        <div class="relative bg-white dark:bg-white/5 rounded-[2rem] overflow-hidden border border-gray-100 dark:border-white/10 transition-all duration-500 hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 flex flex-col h-full">
            
                            {{-- Image --}}
                            <div class="relative h-[180px] overflow-hidden">
                                <img :src="product.image"
                                     :alt="product.title"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-[1.5s] ease-out">
                                <div class="absolute top-4 left-4">
                                    <span class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md text-orange-600 dark:text-orange-400 text-[9px] px-3 py-1.5 rounded-lg font-black uppercase tracking-widest shadow-lg"
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
                                    <div class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 dark:bg-white/5 mb-4 border border-transparent group-hover:border-orange-500/20 transition-all">
                                        <div class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center text-[10px] font-black shadow-lg shadow-orange-500/20 flex-shrink-0"
                                             x-text="product.ceo_name ? product.ceo_name.charAt(0) : '?'">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-gray-900 dark:text-gray-200 font-bold text-[11px] truncate"
                                               x-text="product.company_name">
                                            </p>
                                            <p class="text-gray-400 text-[9px] uppercase tracking-tighter">
                                                CEO: <span class="text-gray-500 dark:text-gray-300"
                                                           x-text="product.ceo_name">
                                                </span>
                                            </p>
                                        </div>
                                    </div>
            
                                    {{-- Button --}}
                                    <a :href="'/products/' + product.slug"
                                       class="inline-flex items-center justify-center w-full py-3 bg-slate-900 dark:bg-white/10 text-white rounded-xl text-[11px] font-bold hover:bg-orange-500 dark:hover:bg-orange-500 transition-all duration-500 group/btn">
                                        Lihat Detail Bisnis
                                        <i class="fa-solid fa-arrow-right ml-2 text-[10px] transition-transform group-hover/btn:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </template>
            
                {{-- Empty State --}}
                <div x-show="filteredProducts.length === 0" x-cloak
                     class="col-span-3 text-center py-24">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-white/5 text-gray-400 mb-6">
                        <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Produk Tidak Ditemukan</h3>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Coba gunakan kata kunci lain.</p>
                </div>
            </div>

            {{-- Empty State --}}
            <div x-show="filteredProducts.length === 0" x-cloak class="text-center py-24" data-aos="fade-up">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-white/5 text-gray-400 mb-6">
                    <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Produk Tidak Ditemukan</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2">Coba gunakan kata kunci lain atau pilih kategori yang
                    berbeda.</p>
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
                <h2 class="text-4xl md:text-6xl font-poppins leading-tight text-slate-900 dark:text-white tracking-tight">
                    <span class="font-bold">{{ __('messages.testimonial_title_1') }}</span> <br>
                    <span class="font-serif font-bold italic text-orange-500 drop-shadow-sm">
                        {{ __('messages.testimonial_title_2') }} {{ __('messages.testimonial_title_3') }}
                    </span>
                </h2>
            </div>

            {{-- Grid Kartu --}}
            <div class="relative">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 transition-all duration-1000 ease-in-out"
                    :class="open ? 'max-h-[4000px] opacity-100' : 'max-h-[450px] overflow-hidden md:max-h-[480px]'">

                    @php
                        $testimonials = [
                            [
                                'name' => 'Budi Santoso',
                                'role' => 'CEO, PT Maju Bersama',
                                'initial' => 'B',
                                'bg' => 'bg-gradient-to-br from-orange-500 to-orange-600',
                                'quote' => __('messages.testi_1_quote'),
                            ],
                            [
                                'name' => 'Sarah Wijaya',
                                'role' => 'Founder, TechVenture ID',
                                'initial' => 'S',
                                'bg' => 'bg-gradient-to-br from-orange-400 to-orange-500',
                                'quote' => __('messages.testi_2_quote'),
                            ],
                            [
                                'name' => 'Herman Tanaka',
                                'role' => 'Dirut, Global Logistics',
                                'initial' => 'H',
                                'bg' => 'bg-gradient-to-br from-orange-500 to-orange-600',
                                'quote' => __('messages.testi_3_quote'),
                            ],
                            [
                                'name' => 'Anita Rose',
                                'role' => 'CEO, Creative Agency',
                                'initial' => 'A',
                                'bg' => 'bg-gradient-to-br from-orange-400 to-orange-500',
                                'quote' => __('messages.testi_4_quote'),
                            ],
                            [
                                'name' => 'Dedi Kurnia',
                                'role' => 'Founder, Retail Group',
                                'initial' => 'D',
                                'bg' => 'bg-gradient-to-br from-orange-500 to-orange-600',
                                'quote' => __('messages.testi_5_quote'),
                            ],
                            [
                                'name' => 'Linda Wang',
                                'role' => 'Director, Finance Corp',
                                'initial' => 'L',
                                'bg' => 'bg-gradient-to-br from-orange-400 to-orange-500',
                                'quote' => __('messages.testi_6_quote'),
                            ],
                        ];
                    @endphp

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
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fa-solid fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p
                                    class="text-slate-700 dark:text-gray-300 font-poppins leading-relaxed text-sm md:text-base italic mb-8 relative z-10">
                                    "{{ $testi['quote'] }}"
                                </p>
                            </div>

                            <div
                                class="flex items-center gap-4 pt-6 border-t border-slate-100 dark:border-white/5 relative z-10">
                                <div
                                    class="w-12 h-12 {{ $testi['bg'] }} text-white rounded-2xl flex-shrink-0 flex items-center justify-center text-lg font-black shadow-lg transform group-hover:rotate-6 transition-transform">
                                    {{ $testi['initial'] }}
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
                    <span class="font-semibold">{{ __('messages.faq_title_1') }}</span> <br>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.faq_title_2') }}</span>
                </h2>
            </div>

            {{-- Accordion --}}
            <div class="space-y-5">
                {{-- @php
                    $faqs = [
                        ['q' => __('messages.faq_1_q'), 'a' => __('messages.faq_1_a')],
                        ['q' => __('messages.faq_2_q'), 'a' => __('messages.faq_2_a')],
                        ['q' => __('messages.faq_3_q'), 'a' => __('messages.faq_3_a')],
                        ['q' => __('messages.faq_4_q'), 'a' => __('messages.faq_4_a')],
                        ['q' => __('messages.faq_5_q'), 'a' => __('messages.faq_5_a')],
                        ['q' => __('messages.faq_6_q'), 'a' => __('messages.faq_6_a')],
                    ];
                @endphp --}}

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
        filter(category) { this.activeCategory = category; }
    }"
        class="bg-white dark:bg-[#0a0a0b] py-24 px-6 md:px-10 transition-colors duration-500 overflow-hidden">

        <div class="max-w-7xl mx-auto text-center">

            {{-- Header --}}
            <div data-aos="fade-up" class="mb-5">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-bold tracking-widest uppercase mb-6 border border-orange-100 dark:border-orange-500/20">
                    <i class="fa-solid fa-camera-retro animate-bounce"></i>
                    {{ __('messages.gallery_badge') }}
                </div>
                <h2 class="text-4xl md:text-5xl text-gray-900 dark:text-white font-poppins leading-tight">
                    <span class="font-semibold">{{ __('messages.gallery_title_1') }}</span> <br>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.gallery_title_2') }}</span>
                </h2>
            </div>

            {{-- Filter Categories --}}
            <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up" data-aos-delay="100">
                @php
                    $categories = ['Semua', 'Summit', 'Masterclass', 'ACMI SPORT', 'ACMI Bersama 2024', 'Reuni 2024'];
                @endphp
                @foreach ($categories as $category)
                    <button @click="filter('{{ $category }}')"
                        :class="activeCategory === '{{ $category }}'
                            ?
                            'bg-orange-500 text-white shadow-md shadow-orange-500/20 ring-2 ring-orange-500 ring-offset-2 dark:ring-offset-gray-900' :
                            'bg-white dark:bg-white/5 text-slate-500 dark:text-gray-400 border border-slate-200/60 dark:border-white/10 hover:border-orange-500 hover:text-orange-500'"
                        class="relative px-6 py-2.5 rounded-xl text-sm font-poppins font-semibold transition-all duration-500 ease-out">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            {{-- Gallery Grid --}}
            <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">

                {{-- Summit --}}
                <div x-show="activeCategory === 'Semua' || activeCategory === 'Summit'"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0" class="break-inside-avoid">
                    <div
                        class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/10">
                        <img src="{{ asset('assets/bersama1.jpeg') }}"
                            class="w-full h-auto min-h-[400px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10">
                            <p
                                class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                ACMI Annual Summit 2024</p>
                        </div>
                    </div>
                </div>

                {{-- Masterclass --}}
                <div x-show="activeCategory === 'Semua' || activeCategory === 'Masterclass'"
                    x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" class="break-inside-avoid">
                    <div
                        class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2">
                        <img src="{{ asset('assets/acmi talk.jpg') }}"
                            class="w-full h-auto min-h-[300px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10 text-left">
                            <p
                                class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                CEO Masterclass Series</p>
                        </div>
                    </div>
                </div>

                {{-- ACMI Sport --}}
                @php $sportImages = ['sport.jpeg', 'sport2.jpeg', 'sport3.jpeg']; @endphp
                @foreach ($sportImages as $img)
                    <div x-show="activeCategory === 'Semua' || activeCategory === 'ACMI SPORT'"
                        x-transition:enter="transition ease-out duration-500 delay-[100ms]" class="break-inside-avoid">
                        <div
                            class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2">
                            <img src="{{ asset('assets/' . $img) }}"
                                class="w-full h-auto min-h-[300px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10 text-left">
                                <p
                                    class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    ACMI Sport Moment</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Reuni 2024 --}}
                <div x-show="activeCategory === 'Semua' || activeCategory === 'Reuni 2024'"
                    x-transition:enter="transition ease-out duration-500" class="break-inside-avoid">
                    <div
                        class="group relative overflow-hidden rounded-[2.5rem] bg-gray-100 dark:bg-white/5 transition-all duration-500 hover:-translate-y-2">
                        <img src="{{ asset('assets/galeri2.jpg') }}"
                            class="w-full h-auto min-h-[350px] object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-orange-600/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-10 text-left">
                            <p
                                class="text-white font-poppins font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                Reuni Moment</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Button Selengkapnya --}}
            <div class="text-center mt-20" data-aos="fade-up">
                <a href="{{ route('gallery') }}"
                    class="group inline-flex items-center gap-3 px-10 py-4 rounded-2xl bg-slate-900 dark:bg-orange-500 text-white font-bold font-poppins transition-all duration-500 hover:bg-orange-500 hover:shadow-xl hover:shadow-orange-500/20">
                    {{ __('messages.gallery_more') }}
                    <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-2"></i>
                </a>
            </div>

        </div>
    </section>

    {{-- INSTAGRAM FEED SECTION --}}
    <section class="py-20 bg-[#FAF9F6]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($posts as $post)
                    <div
                        class="group overflow-hidden rounded-2xl bg-white shadow-sm transition-all hover:-translate-y-2 hover:shadow-xl">
                        <a href="{{ $post['url'] ?? ($post['link'] ?? '#') }}" target="_blank">
                            <div class="aspect-square overflow-hidden">
                                <img src="{{ $post['image'] ?? ($post['thumbnail'] ?? asset('images/placeholder.jpg')) }}"
                                    alt="{{ $post['title'] ?? 'Instagram Post' }}"
                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="p-6">
                                <p class="text-xs text-gray-400 mb-2 uppercase tracking-widest">
                                    {{ isset($post['date_published']) ? \Carbon\Carbon::parse($post['date_published'])->format('d M Y') : 'Recent Post' }}
                                </p>
                                <h3 class="text-lg font-medium text-gray-800 line-clamp-2 leading-relaxed">
                                    {{ $post['title'] ?? ($post['content_text'] ?? 'ACMI Post') }}
                                </h3>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-center col-span-3 text-gray-400">Gagal memuat postingan atau feed kosong.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- FINAL CTA SECTION --}}
    <section class="relative py-24 px-6 overflow-hidden bg-[#fafafa] dark:bg-[#0a0a0b] transition-colors duration-500">

        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-orange-500/10 blur-[140px] rounded-full">
        </div>

        <div class="relative z-10 max-w-5xl mx-auto">
            <div data-aos="fade-up" data-aos-duration="1200"
                class="relative rounded-[3rem] p-12 md:p-20 text-center bg-white dark:bg-white/[0.03] border border-black/5 dark:border-white/[0.08] shadow-[0_10px_60px_rgba(0,0,0,0.06)] dark:shadow-[0_10px_80px_rgba(0,0,0,0.5)] backdrop-blur-xl transition-all duration-700 hover:border-orange-500/30">

                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 dark:bg-white/[0.04] border border-orange-100 dark:border-white/10 mb-8 transition-all duration-500 hover:scale-105">
                    <span class="text-orange-400 text-[10px]">✦</span>
                    <span
                        class="text-orange-500 text-[10px] font-bold tracking-[0.2em] uppercase">{{ __('messages.cta_badge') }}</span>
                </div>

                {{-- Title --}}
                <h2 class="text-4xl md:text-5xl leading-tight mb-6 font-poppins">
                    <span
                        class="block font-semibold text-gray-900 dark:text-white transition-all duration-700 hover:tracking-tight">
                        {{ __('messages.cta_title_1') }}
                    </span>
                    <span class="font-serif font-bold italic text-orange-500">{{ __('messages.cta_title_2') }}</span>
                </h2>

                {{-- Description --}}
                <p
                    class="text-gray-600 dark:text-gray-400/80 text-base md:text-lg font-poppins max-w-2xl mx-auto mb-12 leading-relaxed px-4">
                    {{ __('messages.cta_desc') }}
                </p>

                {{-- Button --}}
                <div class="relative group inline-block">
                    <div
                        class="absolute -inset-1 bg-orange-500 rounded-[2rem] blur-xl opacity-20 group-hover:opacity-50 transition duration-1000 group-hover:duration-200">
                    </div>
                    <a href="#"
                        class="relative flex items-center gap-4 bg-orange-500 hover:bg-orange-400 text-white font-bold px-12 py-5 rounded-[2rem] transition-all duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] group-hover:-translate-y-1.5 group-hover:shadow-2xl group-hover:shadow-orange-500/40">
                        <span class="font-poppins tracking-wide">{{ __('messages.cta_btn') }}</span>
                        <div class="relative w-5 h-5 overflow-hidden">
                            <i
                                class="fa-solid fa-arrow-right absolute inset-0 transition-all duration-500 group-hover:translate-x-full opacity-100 group-hover:opacity-0 flex items-center justify-center"></i>
                            <i
                                class="fa-solid fa-arrow-right absolute inset-0 -left-full transition-all duration-500 group-hover:left-0 opacity-0 group-hover:opacity-100 flex items-center justify-center"></i>
                        </div>
                    </a>
                </div>

                {{-- Footer Note --}}
                <p
                    class="mt-8 text-[10px] md:text-xs font-poppins tracking-[0.2em] uppercase text-gray-400 dark:text-gray-500 opacity-70">
                    — {{ __('messages.cta_note') }} —
                </p>

            </div>
        </div>
    </section>

@endsection

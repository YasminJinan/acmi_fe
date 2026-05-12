@extends('layouts.app')
@section('title', 'Membership — ACMI')
@section('meta_description', 'Bergabunglah dengan komunitas eksklusif CEO Indonesia. Dapatkan akses ke networking, masterclass, dan peluang bisnis strategis.')
@section('meta_keywords', 'acmi membership, daftar acmi, join acmi, member ceo indonesia')
@section('canonical', url('/membership'))

@section('content')
<!-- Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="py-16 md:py-20 bg-white dark:bg-[#0a0a0b] transition-colors duration-500 overflow-hidden mt-10 relative ">
    {{-- Decorative Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-1/2 -translate-x-1/2 w-[600px] h-[500px] bg-orange-500/10 dark:bg-orange-500/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-5%] right-[-5%] w-[300px] h-[300px] bg-orange-600/5 dark:bg-orange-900/15 rounded-full blur-[100px]"></div>
    </div>
    
    {{-- Container dikecilkan ke max-w-6xl agar konten lebih rapat --}}
    <div class="max-w-6xl mx-auto px-6 md:px-12 relative z-10">
        {{-- Gap dikurangi dari 20 ke 12 --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            {{-- Sisi Kiri: Informasi --}}
            <div class="space-y-6" data-aos="fade-right">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-100 dark:border-orange-500/20 bg-orange-50/50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-xs font-bold mb-4 shadow-sm uppercase tracking-widest">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>{{ __('messages.membership_badge') }}</span>
                    </div>
                    
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-poppins text-slate-900 dark:text-white leading-tight">
                        <span class="font-semibold tracking-tight">{{ __('messages.membership_title_1') }}</span><br>
                        <span class="font-serif font-bold italic text-orange-500">{{ __('messages.membership_title_2') }}</span>
                    </h2>
                    
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-base md:text-lg font-poppins leading-relaxed max-w-md">
                        {{ __('messages.membership_desc') }}
                    </p>
                </div>

                {{-- Checklist Features --}}
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-3">
                    @php
                        $features = is_array(__('messages.membership_features')) ? __('messages.membership_features') : [];
                    @endphp
                    @foreach($features as $feature)
                    <li class="flex items-center gap-3 text-slate-700 dark:text-gray-300 font-poppins text-sm group">
                        <div class="flex-shrink-0 w-5 h-5 rounded-md bg-orange-100 dark:bg-orange-500/20 flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300">
                            <i class="fa-solid fa-check text-[8px] text-orange-600 dark:text-orange-400 group-hover:text-white"></i>
                        </div>
                        <span class="group-hover:text-orange-500 dark:group-hover:text-white transition-colors">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>

                {{-- Action Button --}}
                <div class="pt-4">
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <button class="px-8 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl shadow-lg shadow-orange-500/30 transition-all hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 w-full sm:w-auto">
                            {{ __('messages.membership_cta_btn') }}
                            <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-1"></i>
                        </button>
                    </div>
                    <p class="mt-4 text-[11px] text-gray-400 font-poppins">
                        *{{ __('messages.membership_partner') }} 
                        <a href="#" class="text-orange-500 font-bold hover:underline decoration-2 underline-offset-4 ml-1">
                            {{ __('messages.membership_contact') }}
                        </a>
                    </p>
                </div>
            </div>

         {{-- Sisi Kanan: Kartu (Diperbesar & Digeser ke Kiri) --}}
            <div class="relative flex justify-center lg:justify-start lg:ml-12" data-aos="fade-left">
                {{-- Decorative Glow diperbesar mengikuti kartu --}}
                <div class="absolute -top-12 -right-12 w-64 h-64 bg-orange-500/10 blur-[100px] rounded-full"></div>
                
                {{-- Main Card - Max width dinaikkan ke 420px --}}
                <div class="relative group bg-[#f8f9fb] dark:bg-white/[0.03] border border-gray-100 dark:border-white/10 p-10 md:p-14 rounded-[3rem] w-full max-w-[420px] text-center shadow-2xl backdrop-blur-sm transition-all duration-500 hover:border-orange-500/30">
                    
                    {{-- Icon Container diperbesar --}}
                    <div class="relative w-20 h-20 mx-auto mb-10">
                        <div class="absolute inset-0 bg-orange-500/20 rounded-3xl blur-2xl group-hover:blur-3xl transition-all"></div>
                        <div class="relative w-full h-full bg-orange-500 rounded-[1.5rem] flex items-center justify-center transform -rotate-6 group-hover:rotate-0 transition-all shadow-lg shadow-orange-500/25">
                            <i class="fa-solid fa-shield-halved text-3xl text-white"></i>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white font-poppins mb-4">
                        {{ __('messages.membership_cta_title') }}
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-poppins leading-relaxed mb-10 px-2">
                        {{ __('messages.membership_cta_desc') }}
                    </p>
                    
                    <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-orange-500/40 transition-all active:scale-95 text-base flex items-center justify-center gap-3">
                        {{ __('messages.membership_cta_btn') }}
                        <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    
                    <p class="mt-8 text-[12px] text-gray-400 dark:text-gray-500 font-poppins uppercase tracking-[0.1em]">
                        {{ __('messages.membership_partner') }} 
                        <a href="#" class="text-orange-500 font-bold hover:underline decoration-2 underline-offset-4 ml-1">
                            {{ __('messages.membership_contact') }}
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Swiper.js Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hanya jalankan Swiper jika elemen dengan class .membershipSwiper ada di DOM
        if(document.querySelector('.membershipSwiper')) {
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
@endsection@extends('layouts.app')

@section('content')

{{-- EXCLUSIVE MEMBERSHIP SECTION --}}
<section class="py-24 bg-white dark:bg-[#0a0a0b] transition-colors duration-500 overflow-hidden mt-10">

     <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]"></div>
    </div>
    
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

@endsection
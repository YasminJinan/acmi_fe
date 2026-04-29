{{-- Container Utama --}}
<div x-data="{ mobileMenuOpen: false }" class="absolute top-6 left-1/2 -translate-x-1/2 w-[92%] max-w-6xl z-50">    
    <div class="flex items-center justify-between px-4 md:px-6 py-3 rounded-full 
                bg-white/40 dark:bg-black/40 backdrop-blur-xl border border-gray-200 dark:border-white/10
                shadow-lg transition-colors duration-500">

        {{-- LOGO --}}
        <div class="flex-shrink-0">
            <img x-show="isDark" x-cloak src="{{ asset('assets/logo_light.png') }}" class="h-9 md:h-11 object-contain" alt="Logo ACMI"/>
            <img x-show="!isDark" src="{{ asset('assets/logo-acmi-new.svg') }}" class="h-9 md:h-11 object-contain" alt="Logo ACMI"/>
        </div>

        {{-- Navigasi Desktop & Tablet (Layar Besar) --}}
        <div class="hidden lg:flex items-center gap-8 text-sm font-poppins text-gray-700 dark:text-gray-200">
            <a href="#" class="hover:text-orange-500 dark:hover:text-orange-400 transition">{{ __('messages.nav_profile') }}</a>
            <a href="#" class="hover:text-orange-500 dark:hover:text-orange-400 transition">{{ __('messages.nav_board') }}</a>
            <a href="#" class="hover:text-orange-500 dark:hover:text-orange-400 transition">{{ __('messages.nav_members') }}</a>
            <a href="#" class="hover:text-orange-500 dark:hover:text-orange-400 transition">{{ __('messages.nav_gallery') }}</a>
            <a href="#" class="hover:text-orange-500 dark:hover:text-orange-400 transition">{{ __('messages.nav_ontopic') }}</a>
        </div>

        {{-- Action Buttons --}}
        <div class="flex items-center gap-2 md:gap-3">
            
            {{-- Dark Mode Toggle --}}
            <button @click="toggle()" type="button" class="w-9 h-9 md:w-10 md:h-10 flex items-center justify-center rounded-full bg-white/50 dark:bg-white/10 border border-gray-200 dark:border-white/20 text-gray-700 dark:text-yellow-300 backdrop-blur-md transition-all hover:scale-110">
                <i x-show="!isDark" class="fa-solid fa-moon text-xs md:text-sm"></i>
                <i x-show="isDark" x-cloak class="fa-solid fa-sun text-xs md:text-sm"></i>
            </button>

            {{-- Language Switcher (Hidden on very small phones, shown on SMS+) --}}
            @php
                $locale = app()->getLocale();
                $switchTo = $locale === 'id' ? 'en' : 'id';
                $label = $locale === 'id' ? 'EN' : 'ID';
            @endphp
            <a href="{{ url('lang/' . $switchTo) }}"
               class="hidden sm:flex px-3 md:px-4 h-9 items-center gap-2 rounded-full text-[10px] font-bold tracking-widest bg-white/50 dark:bg-white/10 text-gray-700 dark:text-gray-200 hover:bg-orange-500 hover:text-white border border-gray-100 dark:border-white/20 uppercase transition-all">
                <i class="fa-solid fa-globe text-xs"></i> {{ $label }}
            </a>

            {{-- Join Button (Desktop Only) --}}
            <button class="hidden md:block bg-orange-500 text-white px-5 py-2 rounded-full text-sm font-semibold shadow-md hover:scale-105 transition-all">
                {{ __('messages.btn_join') }}
            </button>

            {{-- Hamburger Button (Mobile Only) --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="lg:hidden w-9 h-9 flex items-center justify-center rounded-full bg-white/50 dark:bg-white/10 border border-gray-200 dark:border-white/20 text-gray-700 dark:text-white">
                <i :class="mobileMenuOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>
            </button>
        </div> 
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute top-16 left-0 right-0 mt-2 p-4 rounded-3xl bg-white/90 dark:bg-black/90 backdrop-blur-2xl border border-gray-200 dark:border-white/10 shadow-2xl lg:hidden">
        
        <div class="flex flex-col gap-4 text-center font-poppins text-gray-700 dark:text-gray-200">
            <a href="#" class="py-2 hover:text-orange-500 transition border-b border-gray-100 dark:border-white/5">{{ __('messages.nav_profile') }}</a>
            <a href="#" class="py-2 hover:text-orange-500 transition border-b border-gray-100 dark:border-white/5">{{ __('messages.nav_board') }}</a>
            <a href="#" class="py-2 hover:text-orange-500 transition border-b border-gray-100 dark:border-white/5">{{ __('messages.nav_members') }}</a>
            <a href="#" class="py-2 hover:text-orange-500 transition border-b border-gray-100 dark:border-white/5">{{ __('messages.nav_gallery') }}</a>
            <a href="#" class="py-2 hover:text-orange-500 transition">{{ __('messages.nav_ontopic') }}</a>
            
            <div class="flex flex-col gap-2 mt-2 pt-4 border-t border-gray-100 dark:border-white/10">
                {{-- Join Button Mobile --}}
                <button class="w-full bg-orange-500 text-white py-3 rounded-2xl font-bold">
                    {{ __('messages.btn_join') }}
                </button>
                {{-- Language Switcher Mobile (Hanya muncul jika di sm:hidden) --}}
                <a href="{{ url('lang/' . $switchTo) }}" class="sm:hidden w-full py-2 text-[10px] font-bold tracking-widest uppercase">
                    Switch to {{ $switchTo }}
                </a>
            </div>
        </div>
    </div>
</div>
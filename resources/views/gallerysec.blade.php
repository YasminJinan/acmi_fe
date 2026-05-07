@extends('layouts.app')

@section('content')
<section x-data="{ 
    activeCategory: 'Semua',
    filter(category) {
        this.activeCategory = category;
    }
}" class="bg-white dark:bg-[#0a0a0b] py-24 px-6 md:px-10 transition-colors duration-500 overflow-hidden">

 <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]"></div>
    </div>
    
    <div class="max-w-7xl mx-auto text-center">
        {{-- Header dengan Animate On Scroll --}}
        <div data-aos="fade-up" class="mb-5 mt-10">
           <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                <i class="fa-solid fa-bolt-lightning animate-pulse"></i> Activity Gallery
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

@endsection
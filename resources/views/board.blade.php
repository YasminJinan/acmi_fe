@extends('layouts.app')

@section('title', 'Board of Directors — ACMI')
@section('meta_keywords', 'acmi board, pengurus acmi, direktur acmi')
@section('meta_description', 'Kenali jajaran Board of Directors ACMI, para pemimpin bisnis terbaik yang mengelola komunitas CEO Indonesia.')
@section('og_title', 'Tentang Kami — ACMI')
@section('og_description', 'Kenali lebih dalam tentang ACMI, visi, misi, dan tim di baliknya.')
@section('canonical', url('/board'))


@section('content')
<section class="relative bg-white dark:bg-[#0a0a0b] py-10 md:py-48 overflow-hidden transition-colors duration-500">

    {{-- Background Decorative Elements --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            
      

            {{-- Badge --}}
             <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                <i class="fa-solid fa-user-tie animate-pulse"></i> {{ __('messages.about_badge') }}
            </div>

            {{-- Title --}}
            <h1 data-aos="fade-up" data-aos-delay="200" class="text-5xl md:text-7xl leading-[1.1] text-gray-900 dark:text-white mb-10">
                <span class="font-poppins font-semibold tracking-tight">{{ __('messages.about_title_1') }}</span> 
                <span class="font-serif font-bold italic text-orange-500">{{ __('messages.about_title_2') }}</span>
                <span class="font-poppins font-semibold block mt-2">{{ __('messages.about_title_3') }}</span>
            </h1>

           {{-- Description --}}
        <p data-aos="fade-up" data-aos-delay="300" class="text-gray-600 dark:text-gray-400 text-xl md:text-1xl leading-relaxed font-poppins max-w-2xl mx-auto mb-16">
            {!! __('messages.about_desc') !!}
        </p>

            {{-- Decorative Divider --}}
            <div data-aos="zoom-in" data-aos-delay="400" class="flex justify-center items-center gap-4 mb-16">
                <div class="h-[1px] w-12 bg-gray-200 dark:bg-gray-800"></div>
                <div class="text-orange-500"><i class="fa-solid fa-quote-left opacity-30"></i></div>
                <div class="h-[1px] w-12 bg-gray-200 dark:bg-gray-800"></div>
            </div>

       
    
        </div>
    </div>
</section>

<section class="bg-white dark:bg-[#0a0a0b] py-12 md:py-20 transition-colors duration-500 overflow-hidden">
    <div class="container mx-auto px-6">

        {{-- TITLE SECTION --}}
        <div class="max-w-3xl mx-auto text-center mb-10 md:mb-14">
            <div data-aos="fade-up" class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-orange-500/20 bg-orange-500/5 text-orange-600 dark:text-orange-400 text-[10px] font-black mb-6 uppercase tracking-[0.2em]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                <i class="fa-solid mr-1"></i> {{ __('messages.vm_badge') }}
            </div>
            
            <h2 data-aos="fade-up" data-aos-delay="100" class="text-3xl md:text-5xl font-regular font-poppins text-gray-900 dark:text-white leading-tight mb-4 tracking-tight">
               {{ __('messages.vm_title_1') }} 
                <span class="font-serif italic font-semibold text-orange-500">{{ __('messages.vm_title_2') }}</span>
            </h2>
            
            <p data-aos="fade-up" data-aos-delay="200" class="max-w-xl mx-auto text-gray-500 dark:text-gray-400 text-base font-semibold leading-relaxed">
               {{ __('messages.vm_desc') }}
            </p>
        </div>

        {{-- GRID SECTION --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-6xl mx-auto items-stretch">            
            
            {{-- Vision Card --}}
            <div data-aos="fade-right" data-aos-delay="100" 
                 class="group relative p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/[0.02] overflow-hidden transition-all duration-500 hover:border-orange-500/30 flex flex-col h-full">
                
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-orange-500/10 rounded-full blur-[50px] group-hover:bg-orange-500/20 transition-colors"></div>
                
                <div class="relative z-10 flex flex-col h-full">
                    <div class="w-11 h-11 rounded-2xl bg-orange-500 flex items-center justify-center text-white mb-6 shadow-lg shadow-orange-500/20">
                        <i class="fa-solid fa-eye text-lg"></i>
                    </div>
                    
                    <span class="text-xs font-bold uppercase tracking-widest text-orange-500 mb-2">{{ __('messages.vision_title') }}</span>
                    <h3 class="text-2xl font-serif font-bold italic text-gray-900 dark:text-white mb-4">{{ __('messages.vision_text') }}</h3>
                    
                    <p class="text-gray-500 dark:text-gray-400 text-sm md:text-base leading-relaxed font-poppins mt-auto">
                       {{ __('messages.vm_desc') }}
                    </p>
                </div>
            </div>

            {{-- Mission Card --}}
            <div data-aos="fade-left" data-aos-delay="200" 
                 class="group relative p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/[0.02] overflow-hidden transition-all duration-500 hover:border-orange-500/30 flex flex-col h-full">
                
                <div class="absolute -bottom-12 -right-12 w-32 h-32 bg-orange-500/10 rounded-full blur-[50px] group-hover:bg-orange-500/20 transition-colors"></div>

                <div class="relative z-10 flex flex-col h-full">
                    <div class="w-11 h-11 rounded-2xl bg-orange-500 flex items-center justify-center text-white mb-6 shadow-lg shadow-orange-500/20">
                        <i class="fa-solid fa-rocket text-lg"></i>
                    </div>
                    
                    <span class="text-xs font-bold uppercase tracking-widest text-orange-500 mb-2">{{ __('messages.mission_title') }}</span>
                    <h3 class="text-2xl font-serif font-bold italic text-gray-900 dark:text-white mb-4">Our Missions</h3>
                    
                    <ul class="space-y-3.5 mt-auto">
                        @foreach(__('messages.missions') as $mission)
                        <li class="flex items-start gap-3 text-gray-500 dark:text-gray-400 font-poppins text-sm md:text-[15px]">
                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-orange-500 flex-shrink-0 shadow-[0_0_8px_rgba(249,115,22,0.8)]"></div>
                            <span>{{ $mission }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- TIMELINE HISTORY SECTION --}}
<section class="relative py-24 md:py-32 bg-white dark:bg-[#0a0a0b] transition-colors duration-500 overflow-hidden">
    
    {{-- Decorative Background --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-orange-500/5 rounded-full blur-[150px] -z-0"></div>

    <div class="container mx-auto px-6 relative z-10">
        
        {{-- Header --}}
        <div class="max-w-3xl mx-auto text-center mb-24">
            <div data-aos="fade-up" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-500/20 bg-orange-500/5 text-orange-500 text-[10px] font-bold mb-6 uppercase tracking-[0.2em]">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>{{ __('messages.history_badge') }}</span>
            </div>
            
<h2 data-aos="fade-up" data-aos-delay="100" class="text-3xl md:text-5xl font-poppins text-gray-900 dark:text-white leading-[1.1] mb-6">                {{ __('messages.history_title_1') }} <span class="font-serif font-bold italic text-orange-500">ACMI</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-500 dark:text-gray-400 text-lg font-poppins">
                {{ __('messages.history_subtitle') }}
            </p>
        </div>

        {{-- Timeline Structure --}}
        <div class="relative max-w-5xl mx-auto">
            
            {{-- Vertical Central Line --}}
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-[2px] bg-gradient-to-b from-orange-500/0 via-orange-500/20 to-orange-500/0 hidden md:block"></div>

            @php
                $milestones = [
                    ['year' => '2014', 'title' => __('messages.milestone_2014_title'), 'desc' => __('messages.milestone_2014_desc')],
                    ['year' => '2016', 'title' => __('messages.milestone_2016_title'), 'desc' => __('messages.milestone_2016_desc')],
                    ['year' => '2018', 'title' => __('messages.milestone_2018_title'), 'desc' => __('messages.milestone_2018_desc')],
                    ['year' => '2020', 'title' => __('messages.milestone_2020_title'), 'desc' => __('messages.milestone_2020_desc')],
                    ['year' => '2022', 'title' => __('messages.milestone_2022_title'), 'desc' => __('messages.milestone_2022_desc')],
                    ['year' => '2024', 'title' => __('messages.milestone_2024_title'), 'desc' => __('messages.milestone_2024_desc')]
                ];
            @endphp

            <div class="space-y-16 md:space-y-24">
                @foreach($milestones as $index => $item)
                <div class="relative flex flex-col md:flex-row items-center group">
                    
                    {{-- Year Bubble (Desktop) --}}
                    <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2 w-16 h-16 rounded-full bg-white dark:bg-[#0a0a0b] border-2 border-orange-500/30 items-center justify-center z-20 group-hover:border-orange-500 transition-all duration-500 shadow-xl shadow-orange-500/5">
                        <span class="text-orange-500 font-bold text-xs">{{ $item['year'] }}</span>
                    </div>

                    {{-- Content Side --}}
                    <div class="w-full md:w-1/2 {{ $index % 2 == 0 ? 'md:pr-24 md:text-right' : 'md:pl-24 md:ml-auto' }}" 
                         data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                        
                        <div class="relative p-8 rounded-[2rem] bg-gray-50 dark:bg-white/[0.02] border border-gray-100 dark:border-white/5 hover:border-orange-500/30 transition-all duration-500 group-hover:-translate-y-1 shadow-sm hover:shadow-orange-500/5">
                            {{-- Year (Mobile Only) --}}
                            <span class="inline-block md:hidden text-orange-500 font-bold mb-2">{{ $item['year'] }}</span>
                            
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white font-poppins mb-3">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 font-poppins leading-relaxed">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>

        {{-- Final Footer Note --}}
        <div data-aos="zoom-in" class="mt-24 text-center">
            <p class="text-gray-400 dark:text-gray-500 italic font-serif">
                {{ __('messages.history_footer') }}
            </p>
        </div>

    </div>
</section>

{{-- CTA JOIN SECTION --}}
<section class="relative py-24 md:py-32 bg-[#fafafa] dark:bg-[#0a0a0b] transition-colors duration-500">

    {{-- Ambient Background --}}
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-[-120px] right-[-120px] w-[420px] h-[420px] bg-orange-500/10 dark:bg-orange-500/20 rounded-full blur-[140px]"></div>
        <div class="absolute bottom-[-100px] left-[-100px] w-[320px] h-[320px] bg-orange-400/10 dark:bg-orange-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">

        {{-- Main CTA Card --}}
        <div
            data-aos="zoom-in"
            class="relative overflow-hidden rounded-[3rem]
                   bg-white dark:bg-white/[0.03]
                   border border-black/5 dark:border-white/10
                   shadow-[0_10px_60px_rgba(0,0,0,0.06)]
                   dark:shadow-[0_10px_80px_rgba(0,0,0,0.45)]
                   backdrop-blur-xl
                   transition-all duration-700
                   hover:border-orange-500/20"
        >

            {{-- Glow Effects --}}
            <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-orange-500/10 dark:bg-orange-500/20 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-orange-400/10 dark:bg-orange-600/10 rounded-full blur-[100px]"></div>

            <div class="relative z-10 px-8 py-16 md:px-16 md:py-24 flex flex-col items-center text-center">

                {{-- Icon Badge --}}
                <div class="w-20 h-20 rounded-2xl
                            bg-orange-500
                            flex items-center justify-center
                            text-white
                            mb-10
                            shadow-xl shadow-orange-500/20
                            transform -rotate-3
                            hover:rotate-0 hover:scale-105
                            transition-all duration-500">
                    <i class="fa-solid fa-paper-plane text-3xl"></i>
                </div>

                {{-- Heading --}}
                <h2 class="text-4xl md:text-5xl leading-tight mb-8 font-poppins">
                    <span class="block font-regular text-gray-900 dark:text-white">
                        {{ __('messages.cta_title_1') }}
                    </span>
                    <span class="font-serif italic font-bold text-orange-500">
                        {{ __('messages.cta_title_2') }}
                    </span>
                </h2>

                {{-- Description --}}
                <p class="text-gray-600 dark:text-gray-400
                          text-lg md:text-xl
                          font-poppins
                          max-w-2xl mx-auto
                          mb-12
                          leading-relaxed">
                    {{ __('messages.cta_desc') }}
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row items-center gap-5">

                    {{-- Primary Button --}}
                    <a href="{{ url('/form-join') }}"
                       class="group relative px-10 py-5
                              bg-orange-500 hover:bg-orange-400
                              text-white font-bold font-poppins
                              rounded-2xl overflow-hidden
                              shadow-lg shadow-orange-500/20
                              transition-all duration-500
                              hover:scale-105 hover:-translate-y-1
                              active:scale-95
                              flex items-center gap-2">
                        <span class="relative z-10 flex items-center gap-2">
                            {{ __('messages.cta_btn_apply') }}
                            <i class="fa-solid fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                        </span>
                    </a>

                    {{-- Secondary Button --}}
                    <a href="/contact"
                       class="px-10 py-5
                              bg-black/[0.03] dark:bg-white/[0.05]
                              backdrop-blur-md
                              border border-black/5 dark:border-white/10
                              text-gray-800 dark:text-white
                              font-bold
                              rounded-2xl
                              hover:bg-black/[0.05]
                              dark:hover:bg-white/[0.08]
                              transition-all duration-500
                              hover:scale-105
                              active:scale-95">
                        {{ __('messages.cta_btn_contact') }}
                    </a>

                </div>

            </div>
        </div>

    </div>
</section>
@endsection
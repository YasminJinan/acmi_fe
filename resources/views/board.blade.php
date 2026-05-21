@extends('layouts.app')

@section('title', 'Board of Directors — ACMI')
@section('meta_keywords', 'acmi board, pengurus acmi, direktur acmi')
@section('meta_description', 'Kenali jajaran Board of Directors ACMI, para pemimpin bisnis terbaik yang mengelola komunitas CEO Indonesia.')
@section('og_title', 'Tentang Kami — ACMI')
@section('og_description', 'Kenali lebih dalam tentang ACMI, visi, misi, dan tim di baliknya.')
@section('canonical', url('/board'))


@section('content')

<section class="relative bg-white dark:bg-[#0a0a0b] py-10 md:py-48 overflow-hidden transition-colors duration-500">



    {{-- Background Decorative Elements (Symmetrical) --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            
      

            {{-- Badge --}}
             <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                <i class="fa-solid fa-user-tie animate-pulse"></i> Tentang ACMI
            </div>

            {{-- Title --}}
            <h1 data-aos="fade-up" data-aos-delay="200" class="text-5xl md:text-7xl leading-[1.1] text-gray-900 dark:text-white mb-10">
                <span class="font-poppins font-semibold tracking-tight">Memimpin</span> 
                <span class="font-serif font-bold italic text-orange-500">Sinergi Bisnis</span>
                <span class="font-poppins font-semibold block mt-2">Indonesia</span>
            </h1>

            {{-- Description --}}
            <p data-aos="fade-up" data-aos-delay="300" class="text-gray-600 dark:text-gray-400 text-xl md:text-1xl leading-relaxed font-poppins max-w-2xl mx-auto mb-16">
                <strong class="text-gray-900 dark:text-white font-semibold">ACMI (Asosiasi CEO Masterind Indonesia)</strong> adalah wadah eksklusif bagi para pemimpin puncak untuk bersinergi dan mendorong akselerasi ekonomi nasional.
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

<section class="bg-white dark:bg-[#0a0a0b] pb-16 md:pb-24 transition-colors duration-500">
    
    <div class="container mx-auto px-6">

        {{-- TITLE SECTION --}}
        <div class="max-w-4xl mx-auto text-center mb-16">
            <div data-aos="fade-up" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-500/20 bg-orange-500/5 text-orange-600 dark:text-orange-400 text-[11px] font-black mb-8 uppercase tracking-[0.3em]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                <i class="fa-solid fa-bolt-lightning mr-1"></i> Aktivitas & Fondasi
            </div>
            
            <h2 data-aos="fade-up" data-aos-delay="100" class="text-4xl md:text-6xl font-poppins text-gray-900 dark:text-white leading-[1.05] mb-4 tracking-tight">
                Arah Strategis <br>
                <span class="font-serif italic font-light text-orange-500">Visi & Misi Kami</span>
            </h2>
            
            <p data-aos="fade-up" data-aos-delay="200" class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400 text-lg font-light leading-relaxed">
                Landasan pacu ACMI dalam menciptakan ekosistem kolaboratif bagi para pemimpin bisnis untuk bersinergi membangun Indonesia.
            </p>
        </div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-2 md:gap-8 max-w-6xl mx-auto">            
            {{-- Vision Card --}}
            <div data-aos="fade-right" data-aos-delay="100" 
                 class="group relative p-8 md:p-10 rounded-[2rem] border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/[0.02] overflow-hidden transition-all duration-500 hover:border-orange-500/30 flex flex-col justify-center">
                {{-- Decorative Glow --}}
                <div class="absolute -top-16 -right-16 w-32 h-32 bg-orange-500/10 rounded-full blur-[60px] group-hover:bg-orange-500/20 transition-colors"></div>
                
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-orange-500 flex items-center justify-center text-white mb-5 shadow-lg shadow-orange-500/20">
                        <i class="fa-solid fa-eye text-xl"></i>
                    </div>
                    
                    <h2 class="text-2xl font-serif font-bold italic text-gray-900 dark:text-white mb-4">Visi</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-base md:text-lg leading-relaxed font-poppins">
                        Menjadi komunitas CEO paling berpengaruh di Indonesia yang mendorong sinergi bisnis, inovasi, dan pertumbuhan ekonomi nasional melalui kolaborasi pemimpin berkualitas.
                    </p>
                </div>
            </div>

            {{-- Mission Card --}}
            <div data-aos="fade-left" data-aos-delay="200" 
                 class="group relative p-8 md:p-10 rounded-[2rem] border border-gray-100 dark:border-white/5 bg-gray-50/50 dark:bg-white/[0.02] overflow-hidden transition-all duration-500 hover:border-orange-500/30">
                {{-- Decorative Glow --}}
                <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-orange-500/10 rounded-full blur-[60px] group-hover:bg-orange-500/20 transition-colors"></div>

                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-orange-500 flex items-center justify-center text-white mb-5 shadow-lg shadow-orange-500/20">
                        <i class="fa-solid fa-rocket text-xl"></i>
                    </div>
                    
                    <h2 class="text-3xl font-serif font-bold italic text-gray-900 dark:text-white mb-4">Misi</h2>
                    
                    <ul class="space-y-3">
                        @php
                            $missions = [
                                'Memfasilitasi jaringan strategis antar CEO Indonesia.',
                                'Menyediakan program pengembangan kepemimpinan.',
                                'Mendorong inovasi dan kolaborasi bisnis.',
                                'Memperkuat suara pemimpin dalam kebijakan nasional.'
                            ];
                        @endphp

                        @foreach($missions as $mission)
                        <li class="flex items-start gap-3 text-gray-500 dark:text-gray-400 font-poppins text-sm md:text-base">
                            <span class="mt-2 w-1.5 h-1.5 rounded-full bg-orange-500 flex-shrink-0"></span>
                            <span>{{ $mission }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- BOARD OF DIRECTORS SECTION --}}
<section class="relative py-24 lg:py-32 overflow-hidden bg-white dark:bg-[#0a0a0b] transition-colors duration-500">
    
    {{-- Ambient Background Lights --}}
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-orange-500/5 rounded-full blur-[140px] -z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-orange-600/5 rounded-full blur-[120px] -z-0 pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10">
        
        {{-- Header Section --}}
        <div class="max-w-4xl mx-auto text-center mb-16">
            <div data-aos="fade-up" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-500/20 bg-orange-500/5 text-orange-600 dark:text-orange-400 text-[11px] font-black mb-8 uppercase tracking-[0.3em]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                Struktur Organisasi ACMI
            </div>
            
            <h2 data-aos="fade-up" data-aos-delay="100" class="text-4xl md:text-6xl font-poppins text-gray-900 dark:text-white leading-[1.05] mb-4 tracking-tight">
                Nahkoda di Balik <br>
                <span class="font-serif italic font-light text-orange-500">Visi Besar Kami</span>
            </h2>
            
            <p data-aos="fade-up" data-aos-delay="200" class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400 text-lg font-light leading-relaxed">
                Sinergi para pemimpin industri dan eksekutif visioner yang berdedikasi tinggi dalam mengakselerasi pertumbuhan ekosistem bisnis di Indonesia.
            </p>
        </div>

        {{-- Board Members Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $boardMembers = [
                    [
                        'role' => 'Ketua Umum',
                        'name' => 'Dr. Ir. Hendra Wijaya, MBA',
                        'company' => 'PT Nusantara Global Corp',
                        'desc' => 'Lebih dari 25 tahun pengalaman memimpin perusahaan multinasional. Pelopor transformasi digital nasional.',
                        'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=600',
                    ],
                    [
                        'role' => 'Wakil Ketua',
                        'name' => 'Siti Rahmawati, SE, MM',
                        'company' => 'PT Investasi Nusantara',
                        'desc' => 'Ahli keuangan korporasi dengan track record membangun 3 unicorn. Aktif mendorong peran wanita dalam kepemimpinan.',
                        'img' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=600',
                    ],
                    [
                        'role' => 'Sekretaris Jenderal',
                        'name' => 'Ir. Bambang Prasetyo, PhD',
                        'company' => 'PT Inovasi Teknologi',
                        'desc' => 'Teknokrat lulusan Silicon Valley. Fokus pada pengembangan kedaulatan AI dan adopsi blockchain di industri lokal.',
                        'img' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=600',
                    ],
                    [
                        'role' => 'Bendahara Umum',
                        'name' => 'Dewi Lestari, MBA',
                        'company' => 'PT Bank Mitra Sejahtera',
                        'desc' => 'Bankir senior dengan spesialisasi wealth management. Berpengalaman mengelola portfolio strategis skala nasional.',
                        'img' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&q=80&w=600',
                    ],
                    [
                        'role' => 'Ketua Dewan Penasihat',
                        'name' => 'Prof. Ahmad Fauzi, DBA',
                        'company' => 'Universitas Indonesia',
                        'desc' => 'Guru besar dan praktisi strategi bisnis. Penulis literatur kepemimpinan yang menjadi rujukan CEO Indonesia.',
                        'img' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&q=80&w=600',
                    ],
                    [
                        'role' => 'Ketua Bidang Keanggotaan',
                        'name' => 'Maria Santika, SE',
                        'company' => 'PT Media Kreatif Indonesia',
                        'desc' => 'Serial entrepreneur yang berfokus pada ekonomi kreatif. Arsitek di balik komunitas startup terbesar di tanah air.',
                        'img' => 'https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?auto=format&fit=crop&q=80&w=600',
                    ],
                ];
            @endphp

            @foreach($boardMembers as $index => $member)
            <div 
                data-aos="fade-up" 
                data-aos-delay="{{ $index * 100 }}"
                class="group relative bg-white dark:bg-[#111113] rounded-[2.5rem] overflow-hidden border border-gray-100 dark:border-white/5 transition-all duration-500 hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-3"
            >
                {{-- Image Aspect Ratio --}}
                <div class="relative aspect-[4/4] overflow-hidden">
                    <img 
                        src="{{ $member['img'] }}" 
                        alt="{{ $member['name'] }}" 
                        class="w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-105"
                    >
                    
                    {{-- Soft Overlay Gradient --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-white via-white/20 to-transparent dark:from-[#111113] dark:via-[#111113]/20 opacity-100 transition-opacity duration-500 group-hover:opacity-80"></div>
                    
                    {{-- Floating Social Action --}}
                    <div class="absolute top-6 right-6 translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white dark:bg-gray-900 shadow-xl flex items-center justify-center text-gray-700 dark:text-white hover:bg-orange-500 hover:text-white transition-colors">
                            <i class="fa-brands fa-linkedin-in text-lg"></i>
                        </a>
                    </div>
                </div>

                {{-- Content Area --}}
                <div class="px-8 pb-10 -mt-20 relative z-20">
                    <div class="inline-block px-4 py-1.5 rounded-xl bg-orange-500 text-white text-[10px] font-black uppercase tracking-[0.15em] mb-6 shadow-xl shadow-orange-500/20">
                        {{ $member['role'] }}
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white font-poppins mb-2 leading-tight">
                        {{ $member['name'] }}
                    </h3>
                    
                    <p class="text-orange-600 dark:text-orange-400 text-sm font-semibold mb-5 italic">
                        {{ $member['company'] }}
                    </p>
                    
                    <p class="text-[15px] text-gray-500 dark:text-gray-400 leading-relaxed font-light line-clamp-3 group-hover:line-clamp-none transition-all duration-500">
                        {{ $member['desc'] }}
                    </p>
                </div>

                {{-- Animated Border Accent --}}
                <div class="absolute bottom-0 left-0 w-0 h-1.5 bg-gradient-to-r from-orange-400 to-orange-600 group-hover:w-full transition-all duration-700 ease-in-out"></div>
            </div>
            @endforeach
        </div>

        {{-- Optional CTA --}}
        <div data-aos="fade-up" class="mt-20 text-center">
            <a href="#" class="inline-flex items-center gap-3 text-gray-400 hover:text-orange-500 font-poppins font-medium transition-colors group">
                Lihat Seluruh Struktur Organisasi 
                <i class="fa-solid fa-arrow-right-long group-hover:translate-x-2 transition-transform"></i>
            </a>
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
                <span>Legacy Kami</span>
            </div>
            
            <h2 data-aos="fade-up" data-aos-delay="100" class="text-4xl md:text-6xl font-poppins text-gray-900 dark:text-white leading-[1.1] mb-6">
                Perjalanan <span class="font-serif font-bold italic text-orange-500">ACMI</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-gray-500 dark:text-gray-400 text-lg font-poppins">
                Milestone penting dalam sejarah kami membangun ekosistem bisnis Indonesia.
            </p>
        </div>

        {{-- Timeline Structure --}}
        <div class="relative max-w-5xl mx-auto">
            
            {{-- Vertical Central Line --}}
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-[2px] bg-gradient-to-b from-orange-500/0 via-orange-500/20 to-orange-500/0 hidden md:block"></div>

            @php
                $milestones = [
                    ['year' => '2014', 'title' => 'Pendirian ACMI', 'desc' => 'ACMI didirikan oleh 12 CEO visioner Indonesia dengan misi sinergi ekonomi.'],
                    ['year' => '2016', 'title' => '100 CEO Pertama', 'desc' => 'Pertumbuhan pesat hingga mencapai 100 anggota dari berbagai industri strategis.'],
                    ['year' => '2018', 'title' => 'Business Mission', 'desc' => 'Peluncuran program ekspansi global dengan kunjungan bisnis ke 5 negara.'],
                    ['year' => '2020', 'title' => 'Digital Transformation', 'desc' => 'Adaptasi pandemi melalui peluncuran platform networking virtual eksklusif.'],
                    ['year' => '2022', 'title' => 'Ekspansi Masif', 'desc' => 'Anggota melampaui 300 CEO, mencakup ekspansi ke 15 sektor industri berbeda.'],
                    ['year' => '2024', 'title' => 'Annual Summit Terbesar', 'desc' => 'Puncak perayaan dengan 500+ peserta dari pemimpin puncak perusahaan nasional.']
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
                        
                        <div class="relative p-8 rounded-[2rem] bg-gray-50 dark:bg-white/[0.02] border border-gray-100 dark:border-white/5 hover:border-orange-500/30 transition-all duration-500 group-hover:-translate-y-1">
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
            <p class="text-gray-400 dark:text-gray-500 italic font-serif">"Sejarah adalah fondasi, masa depan adalah tujuan kami."</p>
        </div>

    </div>
</section>

{{-- CTA JOIN SECTION (Sempurna untuk Light & Dark Mode) --}}
<section class="relative py-24 md:py-32 bg-gray-50 dark:bg-[#0a0a0b] overflow-hidden transition-colors duration-500">
    <div class="container mx-auto px-6 relative z-10">
        
        {{-- Main CTA Card --}}
        <div data-aos="zoom-in" 
            class="relative rounded-[2.5rem] md:rounded-[3rem] bg-white dark:bg-white/[0.03] overflow-hidden border border-gray-200/80 dark:border-white/[0.08] shadow-[0_10px_60px_rgba(0,0,0,0.04)] dark:shadow-[0_10px_80px_rgba(0,0,0,0.5)] transition-all duration-500">
            
            {{-- Background Glows --}}
            <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-orange-500/[0.06] dark:bg-orange-500/20 rounded-full blur-[120px] -z-0 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-orange-600/[0.04] dark:bg-orange-600/10 rounded-full blur-[100px] -z-0 pointer-events-none"></div>

            <div class="relative z-10 px-6 py-16 md:py-24 flex flex-col items-center text-center max-w-4xl mx-auto">
                
                {{-- Icon Badge Premium --}}
                <div class="w-16 h-16 rounded-2xl bg-orange-600 dark:bg-orange-500 flex items-center justify-center text-white dark:text-[#0a0a0b] mb-10 shadow-lg shadow-orange-600/20 dark:shadow-orange-500/10 transform -rotate-3 hover:rotate-0 transition-transform duration-500 group">
                    <i class="fa-solid fa-paper-plane text-2xl group-hover:scale-110 transition-transform"></i>
                </div>

                {{-- Title --}}
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-poppins text-gray-950 dark:text-white mb-6 leading-[1.15] tracking-tight">
                    <span class="font-light block">Siap Bergabung dengan</span>
                    <span class="font-serif font-bold italic text-orange-600 dark:text-orange-500 mt-1 block">ACMI?</span>
                </h2>

                {{-- Description --}}
                <p class="text-gray-600 dark:text-gray-400 text-base md:text-lg font-poppins max-w-2xl mx-auto mb-12 leading-relaxed px-4">
                    Jadilah bagian dari ekosistem eksklusif pemimpin bisnis Indonesia. Bersinergi, tumbuh, dan berkontribusi secara nyata untuk ekonomi bangsa.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto px-6 sm:px-0">
                    {{-- Primary Button --}}
                    <a href="{{ url('/gabung') }}" 
                        class="group px-8 py-4 bg-orange-600 dark:bg-orange-500 hover:bg-orange-700 dark:hover:bg-orange-600 text-white dark:text-[#0a0a0b] font-bold font-poppins rounded-xl shadow-lg shadow-orange-600/20 dark:shadow-none transition-all duration-300 hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2 w-full sm:w-auto">
                        <span>Ajukan Keanggotaan Anda</span>
                        <i class="fa-solid fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                    </a>
                    
                    {{-- Secondary Button --}}
                    <a href="{{ url('/contact') }}" 
                        class="px-8 py-4 bg-gray-100 dark:bg-white/5 border border-gray-300/60 dark:border-white/10 text-gray-800 dark:text-white font-bold font-poppins rounded-xl hover:bg-gray-200 dark:hover:bg-white/10 transition-all duration-300 hover:-translate-y-1 active:scale-95 flex items-center justify-center w-full sm:w-auto">
                        Hubungi Kami
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection
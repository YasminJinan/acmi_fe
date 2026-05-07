@extends('layouts.app')

@section('content')

<div class="min-h-screen text-slate-200 font-sans selection:bg-orange-500/30 bg-[#0a0a0b]">
    
    <!-- Wrapper Content: Max-width 1440px dan Center Auto -->
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-12 py-6">
        
        <!-- Grid System: Membagi 3 Kolom utama (Sidebar Kiri, Main, Sidebar Kanan) -->
        <div class="flex flex-col md:flex-row gap-8 lg:gap-12 justify-center relative">
            
          <!-- 1. KIRI: FLOATING CATEGORY BAR (Navigasi Ikon Premium) -->
          <aside class="hidden md:flex flex-col gap-4 sticky top-32 h-fit bg-[#121829]/40 backdrop-blur-xl p-2.5 rounded-3xl border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.5)] z-20 transition-all duration-500">
    
            <!-- Berita Utama (Orange Active State) -->
            <a href="#" class="group relative sidebar-icon bg-gradient-to-br from-orange-400 to-orange-600 shadow-lg shadow-orange-500/20 text-white transform hover:scale-110 active:scale-95 transition-all">
                <i class="fas fa-newspaper text-[1.1rem]"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-orange-600 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none">
                    Utama
                </span>
            </a>

            <!-- Sport -->
            <a href="#" class="group relative sidebar-icon text-slate-400 hover:text-white hover:bg-orange-500/10 transform hover:scale-110 transition-all">
                <i class="fas fa-volleyball-ball"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-slate-800 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none border border-white/5">
                    Sport
                </span>
            </a>

            <!-- Bisnis -->
            <a href="#" class="group relative sidebar-icon text-slate-400 hover:text-white hover:bg-orange-500/10 transform hover:scale-110 transition-all">
                <i class="fas fa-briefcase"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-slate-800 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none border border-white/5">
                    Bisnis
                </span>
            </a>

            <!-- Social -->
            <a href="#" class="group relative sidebar-icon text-slate-400 hover:text-white hover:bg-orange-500/10 transform hover:scale-110 transition-all">
                <i class="fas fa-users"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-slate-800 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none border border-white/5">
                    Social
                </span>
            </a>

            <!-- Gaya Hidup -->
            <a href="#" class="group relative sidebar-icon text-slate-400 hover:text-white hover:bg-orange-500/10 transform hover:scale-110 transition-all">
                <i class="fas fa-leaf"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-slate-800 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none border border-white/5">
                    Gaya Hidup
                </span>
            </a>

            <hr class="border-white/5 mx-2 my-1">

            <!-- Wilayah Timur -->
            <a href="#" class="group relative sidebar-icon text-slate-500 hover:text-orange-400 hover:bg-orange-400/5 transition-all">
                <i class="fas fa-sun text-xs"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-orange-600 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none">
                    Timur
                </span>
            </a>

            <!-- Wilayah Tengah -->
            <a href="#" class="group relative sidebar-icon text-slate-500 hover:text-orange-400 hover:bg-orange-400/5 transition-all">
               <i class="fas fa-map text-xs"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-orange-600 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none">
                    Tengah
                </span>
            </a>

            <!-- Wilayah Barat -->
            <a href="#" class="group relative sidebar-icon text-slate-500 hover:text-orange-400 hover:bg-orange-400/5 transition-all">
                <i class="fas fa-moon text-xs"></i>
                <span class="absolute left-16 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 bg-orange-600 text-[10px] font-bold tracking-widest uppercase px-3 py-1.5 rounded-xl whitespace-nowrap pointer-events-none">
                    Barat
                </span>
            </a>
          </aside>

            <!-- 2. TENGAH: MAIN NEWS FEED -->
            <main class="flex-1 max-w-[680px] mt-32 md:mt-20">
                <header class="mb-10 pl-2">
                    <h1 class="text-4xl font-extrabold tracking-tight mb-2 bg-gradient-to-r from-white to-orange-500 bg-clip-text text-transparent">For you</h1>
                    <p class="text-slate-400 text-base">Liputan khusus dan berita pilihan untuk Anda hari ini.</p>
                </header>

                <div class="space-y-8 mt-1.5">
                    @for ($i = 0; $i < 3; $i++)
                    <article class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-[2rem] border border-white/5 bg-[#0d1117] transition-all duration-300 hover:border-orange-500/40 hover:shadow-2xl hover:shadow-orange-900/10">
                            
                            <!-- Gambar News -->
                            <div class="relative h-72 overflow-hidden"> 
                               <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                    alt="ACMI News" 
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0d1117] via-transparent to-transparent"></div>
                                
                                <!-- Overlay Badges -->
                                <div class="absolute top-5 left-5">
                                    <span class="bg-black/40 backdrop-blur-xl text-[10px] uppercase tracking-tighter px-3 py-1.5 rounded-full font-semibold border border-white/10">
                                        Februari 18, 2025
                                    </span>
                                </div>
                                <div class="absolute top-5 right-5">
                                    <span class="bg-orange-600/80 backdrop-blur-lg text-[10px] uppercase tracking-tighter px-3 py-1.5 rounded-full font-bold shadow-lg text-white">
                                        Wilayah Barat
                                    </span>
                                </div>
                            </div>

                            <!-- Deskripsi News -->
                            <div class="p-7"> 
                                <h2 class="text-2xl font-bold leading-tight mb-4 group-hover:text-orange-500 transition-colors">
                                    ACMI Peduli : Penyaluran Bantuan Korban Banjir Bandang
                                </h2>
                                
                                <div class="space-y-2 text-slate-400 text-xs leading-relaxed border-l-2 border-orange-600 pl-4 py-1">
                                    <p><span class="text-slate-200 font-semibold uppercase tracking-widest text-[10px]">Lokasi</span> : Desa Bantar Gadung, Sukabumi, Jawa Barat</p>
                                    <p><span class="text-slate-200 font-semibold uppercase tracking-widest text-[10px]">Waktu</span> : Minggu, 15 Januari 2025 | 11:00 - 15:00 WIB</p>
                                    <p><span class="text-slate-200 font-semibold uppercase tracking-widest text-[10px]">Logistik</span> : 6.000+ Paket Sembako & Kebutuhan Pokok</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endfor
                </div>
            </main>

            <!-- 3. KANAN: SIDEBAR CONTENT -->
            <aside class="hidden xl:block w-[320px] space-y-8 mt-10 md:mt-16 sticky top-28 h-fit pb-10">
                
                <!-- Section Berita Utama -->
                <div class="bg-[#0a0f1d] rounded-[2rem] p-6 border border-white/5 shadow-2xl">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-slate-100">Berita Utama</h3>
                        <a href="#" class="text-[10px] font-bold text-slate-500 hover:text-orange-400 uppercase tracking-widest transition-colors">See all</a>
                    </div>
                    
                    <div class="space-y-6">
                        @for ($j = 0; $j < 3; $j++)
                        <div class="group cursor-pointer border-b border-white/5 pb-5 last:border-0 last:pb-0">
                            <div class="flex items-center gap-2 text-[9px] text-slate-500 font-bold uppercase tracking-widest mb-2">
                                <i class="fas fa-globe-asia text-orange-500"></i>
                                <span>Barat</span>
                                <span class="text-slate-700">•</span>
                                <span>Feb 18</span>
                            </div>
                            <h4 class="text-sm font-semibold leading-relaxed group-hover:text-orange-500 transition-colors">
                                ACMI Grebek Kantor : Kunjungan ke Jofiter Group oleh Budi Wahyono
                            </h4>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Section Sport -->
                <div class="bg-[#0a0f1d] rounded-[2rem] p-6 border border-white/5 shadow-2xl">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-orange-500 italic">Sport</h3>
                        <a href="#" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">See all</a>
                    </div>
                    
                    <div class="space-y-5">
                        <div class="group cursor-pointer">
                            <div class="flex items-center gap-2 text-[9px] text-slate-500 font-bold uppercase mb-2">
                                <i class="fas fa-trophy text-orange-400"></i>
                                <span>Tournament</span>
                            </div>
                            <h4 class="text-sm font-semibold leading-relaxed group-hover:text-orange-500 transition-colors">
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
    .sidebar-icon {
        @apply flex items-center justify-center w-12 h-12 rounded-2xl transition-all duration-300;
    }
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection
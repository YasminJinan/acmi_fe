@extends('layouts.app')

@section('title', 'Join Membership - ACMI')

@section('content')
<section class="min-h-screen bg-[#FBFBFC] pt-32 pb-20 px-6">
    {{-- Container dilebarkan ke 7xl --}}
    <div class="max-w-7xl mx-auto">
        {{-- Custom Grid Ratio: Kiri lebih kecil, Kanan (Form) lebih lebar --}}
        <div class="grid grid-cols-1 lg:grid-cols-[0.8fr_1.2fr] gap-12 lg:gap-20 items-start">
            
            {{-- KOLOM KIRI: TEKS & BENEFIT --}}
           <div class="space-y-10 lg:sticky lg:top-32 lg:pl-12">
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-200 bg-orange-50/50">
                        <i class="fa-solid fa-crown text-orange-500 text-[10px]"></i>
                        <span class="text-orange-600 text-[11px] font-poppins font-bold tracking-[0.2em] uppercase">Executive Membership</span>
                    </div>

                    <h1 class="text-4xl md:text-6xl font-poppins font-bold text-slate-900 leading-[1.1]">
                        The Nexus of <br>
                        <span class="font-serif italic text-orange-500 font-medium">Indonesian Leaders</span>
                    </h1>

                    <p class="text-gray-500 text-lg leading-relaxed max-w-md font-poppins">
                        Jadilah bagian dari ekosistem elit tempat para pemimpin visioner bertukar ide, strategi, dan peluang masa depan.
                    </p>
                </div>

                {{-- List Benefit dengan Styling Lebih Premium --}}
                <div class="grid grid-cols-1 gap-4 pt-4">
                    @php
                        $benefits = [
                            'Akses Eksklusif Program ACMI',
                            'CEO Roundtable & Private Luncheon',
                            'Masterclass Pakar Global',
                            'Networking 500+ Top Executive',
                            'International Business Mission'
                        ];
                    @endphp
                    @foreach($benefits as $benefit)
                    <div class="group flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-white hover:shadow-sm">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-orange-500 flex items-center justify-center text-white shadow-sm shadow-orange-200">
                            <i class="fa-solid fa-check text-[12px]"></i>
                        </div>
                        <span class="text-slate-700 font-semibold font-poppins text-sm md:text-base">{{ $benefit }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

     
            <div class="bg-white rounded-[2.5rem] shadow-[0_40px_100px_-20px_rgba(0,0,0,0.04)] border border-gray-100 p-8 md:p-16 relative overflow-hidden">
                {{-- Decorative Elements --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-orange-50/50 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-50/30 rounded-full -ml-32 -mb-32 blur-3xl"></div>
                
                <div class="relative">
                    <h2 class="text-3xl font-poppins font-bold text-slate-900 mb-2">Formulir Aplikasi</h2>
                    <p class="text-gray-400 text-sm mb-12 font-poppins">Estimasi waktu pengisian: 3 menit</p>

                    <form action="#" method="POST" class="space-y-12">
                        @csrf
                        
                        {{-- Section: Profil Pribadi --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-900 text-white text-[10px] font-bold">01</span>
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-widest">Informasi Pribadi</h3>
                                <div class="h-[1px] flex-grow bg-gray-100"></div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <input type="text" placeholder="Nama Lengkap" 
                                        class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 placeholder:text-gray-400">
                                </div>
                                <div class="space-y-2">
                                    <input type="email" placeholder="Email Profesional" 
                                        class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 placeholder:text-gray-400">
                                </div>
                                <div class="space-y-2">
                                    <input type="tel" placeholder="WhatsApp (Aktif)" 
                                        class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 placeholder:text-gray-400">
                                </div>
                                <div class="space-y-2">
                                    <input type="url" placeholder="LinkedIn Profile URL" 
                                        class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 placeholder:text-gray-400">
                                </div>
                            </div>
                        </div>

                        {{-- Section: Profil Bisnis --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-900 text-white text-[10px] font-bold">02</span>
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-widest">Informasi Bisnis</h3>
                                <div class="h-[1px] flex-grow bg-gray-100"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" placeholder="Nama Perusahaan" 
                                    class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 placeholder:text-gray-400">
                                
                                <input type="text" placeholder="Jabatan Saat Ini" 
                                    class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 placeholder:text-gray-400">
                                
                                <select class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.5rem_center] bg-no-repeat">
                                    <option disabled selected>Sektor Industri</option>
                                    <option>Teknologi</option>
                                    <option>Manufaktur</option>
                                    <option>F&B / Retail</option>
                                    <option>Energi</option>
                                </select>

                                <select class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.5rem_center] bg-no-repeat">
                                    <option disabled selected>Skala Pendapatan Tahunan</option>
                                    <option>Di atas Rp 10 Miliar</option>
                                    <option>Di atas Rp 100 Miliar</option>
                                    <option>Di atas Rp 1 Triliun</option>
                                </select>
                            </div>
                        </div>

                        {{-- Section: Motivasi --}}
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-900 text-white text-[10px] font-bold">03</span>
                                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-widest">Visi & Aspirasi</h3>
                                <div class="h-[1px] flex-grow bg-gray-100"></div>
                            </div>
                            <textarea rows="4" placeholder="Apa kontribusi atau value yang ingin Anda bagikan dalam komunitas ini?" 
                                class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:ring-4 focus:ring-orange-500/5 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 placeholder:text-gray-400 resize-none"></textarea>
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-6">
                            <button type="submit" class="group relative w-full overflow-hidden py-5 bg-slate-900 text-white rounded-2xl font-bold transition-all duration-300 hover:shadow-2xl hover:shadow-slate-200">
                                <div class="absolute inset-0 w-0 bg-orange-500 transition-all duration-[400ms] ease-out group-hover:w-full"></div>
                                <div class="relative flex items-center justify-center gap-3">
                                    <span class="font-poppins uppercase tracking-[0.2em] text-xs">Kirim Aplikasi Pendaftaran</span>
                                    <i class="fa-solid fa-arrow-right-long text-xs transition-transform duration-300 group-hover:translate-x-2"></i>
                                </div>
                            </button>
                            <p class="text-center text-[10px] text-gray-400 mt-8 font-poppins uppercase tracking-widest leading-relaxed">
                                Keanggotaan bersifat selektif. <br> Keputusan tim kurasi ACMI bersifat mutlak.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
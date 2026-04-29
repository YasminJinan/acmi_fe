@extends('layouts.app')

@section('title', 'Gabung Keanggotaan - ACMI')

@section('content')
{{-- Padding top ditambahkan agar tidak tertutup Navbar --}}
<section class="min-h-screen bg-[#F8F9FA] pt-32 pb-20 px-6">
    <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            
            {{-- KOLOM KIRI: TEKS & BENEFIT --}}
            <div class="space-y-8 lg:sticky lg:top-32">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-200 bg-orange-50/50">
                    <i class="fa-solid fa-crown text-orange-500 text-[10px]"></i>
                    <span class="text-orange-600 text-xs font-poppins font-semibold tracking-widest uppercase">Keanggotaan Eksklusif</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-4xl md:text-5xl font-poppins font-semibold text-slate-900 leading-[1.2]">
                    Bergabung dengan <br>
                    <span class="font-serif italic text-orange-500 font-bold">Komunitas CEO</span> <br>
                    Terbaik Indonesia
                </h1>

                <p class="text-gray-500 text-lg leading-relaxed max-w-md font-poppins">
                    Lengkapi formulir pendaftaran di bawah ini. Tim kurasi kami akan meninjau profil Anda dan menghubungi dalam 5-7 hari kerja.
                </p>

                {{-- List Benefit --}}
                <ul class="space-y-5 pt-4">
                    @php
                        $benefits = [
                            'Akses penuh ke seluruh program ACMI',
                            'CEO Roundtable bulanan',
                            'Masterclass eksklusif dengan pakar global',
                            'Networking dengan 500+ CEO Indonesia',
                            'Business mission internasional',
                            'Resource center & insight industri'
                        ];
                    @endphp
                    @foreach($benefits as $benefit)
                    <li class="flex items-center gap-4">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full border border-orange-500 flex items-center justify-center bg-white shadow-sm shadow-orange-100">
                            <i class="fa-solid fa-check text-[10px] text-orange-500"></i>
                        </div>
                        <span class="text-gray-700 font-medium font-poppins text-sm md:text-base">{{ $benefit }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- KOLOM KANAN: FORMULIR --}}
            <div class="bg-white rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] border border-gray-100 p-8 md:p-12 relative overflow-hidden">
                {{-- Dekorasi halus di sudut form --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-orange-50 rounded-full -mr-16 -mt-16 opacity-50"></div>
                
                <h2 class="text-3xl font-poppins font-bold text-slate-900 mb-10 relative">Formulir Pendaftaran</h2>

                <form action="#" method="POST" class="space-y-8 relative">
                    @csrf
                    
                    {{-- Section: Informasi Pribadi --}}
                    <div class="space-y-4">
                        <h3 class="text-[10px] font-bold text-orange-500 uppercase tracking-[0.3em] mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-orange-200"></span> Informasi Pribadi
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" placeholder="Nama Lengkap" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">
                            <input type="email" placeholder="Email" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">
                            <input type="tel" placeholder="Nomor Telepon" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">
                            <input type="url" placeholder="LinkedIn Profile" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">
                        </div>
                    </div>

                    {{-- Section: Informasi Perusahaan --}}
                    <div class="space-y-4">
                        <h3 class="text-[10px] font-bold text-orange-500 uppercase tracking-[0.3em] mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-orange-200"></span> Informasi Perusahaan
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" placeholder="Nama Perusahaan" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">
                            <input type="text" placeholder="Jabatan" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">
                            
                            <select class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm text-gray-500 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.25rem_center] bg-no-repeat">
                                <option disabled selected>Industri</option>
                                <option>Teknologi & Software</option>
                                <option>Keuangan & Fintech</option>
                                <option>Manufaktur</option>
                                <option>Properti & Real Estate</option>
                                <option>F&B</option>
                                <option>Energi & Resources</option>
                                <option>Retail & E-commerce</option>
                                <option>Healthcare</option>
                                <option>Media & Entertainment</option>
                                <option>Logistik & Supply Chain</option>
                                <option>Lainnya</option>
                            </select>

                            <input type="url" placeholder="Website Perusahaan" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">

                            <select class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm text-gray-500 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.25rem_center] bg-no-repeat">
                                <option disabled selected>Jumlah Karyawan</option>
                                <option>1-50 Karyawan</option>
                                <option>51-200 Karyawan</option>
                                <option>201-500 Karyawan</option>
                                <option>501-1000 Karyawan</option>
                                <option>1000+ Karyawan</option>
                            </select>

                            <select class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm text-gray-500 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.25rem_center] bg-no-repeat">
                                <option disabled selected>Annual Revenue</option>
                                <option>< IDR 10 Miliar</option>
                                <option>IDR 10 - 50 Miliar</option>
                                <option>IDR 50 - 200 Miliar</option>
                                <option>IDR 200 Miliar - 1 Triliun</option>
                                <option>> IDR 1 Triliun</option>
                            </select>
                        </div>
                    </div>

                    {{-- Section: Motivasi --}}
                    <div class="space-y-4">
                        <h3 class="text-[10px] font-bold text-orange-500 uppercase tracking-[0.3em] mb-6 flex items-center gap-2">
                            <span class="w-8 h-[1px] bg-orange-200"></span> Motivasi & Referral
                        </h3>
                        <div class="space-y-4">
                            <textarea rows="4" placeholder="Mengapa Anda tertarik bergabung dengan ACMI?" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm"></textarea>
                            <input type="text" placeholder="Direferensikan oleh (opsional)" class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition font-poppins text-sm">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-6">
                        <button type="submit" class="w-full py-5 bg-orange-500 hover:bg-orange-600 text-white rounded-2xl font-bold flex items-center justify-center gap-3 shadow-xl shadow-orange-100 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fa-solid fa-paper-plane text-sm"></i>
                            <span class="font-poppins uppercase tracking-widest text-sm">Ajukan Pendaftaran</span>
                        </button>
                        <p class="text-center text-[10px] text-gray-400 mt-6 font-poppins uppercase tracking-wider leading-relaxed">
                            Dengan mendaftar, Anda menyetujui proses kurasi <br> eksklusif oleh tim ACMI Indonesia.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
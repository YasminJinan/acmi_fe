@extends('layouts.app')

@section('title', 'Join Membership - ACMI')

@section('content')
    <section class="min-h-screen bg-[#FBFBFC] dark:bg-[#0a0a0b] pt-32 pb-20 px-6 transition-colors duration-500">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-[-10%] left-1/2 -translate-x-1/2 w-[700px] h-[500px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]">
            </div>
            <div
                class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-blue-500/5 dark:bg-blue-900/10 rounded-full blur-[100px]">
            </div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            {{-- Grid Ratio --}}
            <div class="grid grid-cols-1 lg:grid-cols-[0.8fr_1.2fr] gap-12 lg:gap-20 items-start">

                {{-- KOLOM KIRI: TEKS & BENEFIT --}}
                <div class="space-y-10 lg:sticky lg:top-32 lg:pl-12">
                    <div class="space-y-6">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-200 dark:border-orange-500/20 bg-orange-50/50 dark:bg-orange-500/10 transition-colors duration-300">
                            <i class="fa-solid fa-crown text-orange-500 text-[10px]"></i>
                            <span
                                class="text-orange-600 dark:text-orange-400 text-[11px] font-poppins font-bold tracking-[0.2em] uppercase">Executive
                                Membership</span>
                        </div>

                        <h1
                            class="text-4xl md:text-6xl font-poppins font-bold text-slate-900 dark:text-white leading-[1.1] transition-colors duration-300">
                            The Nexus of <br>
                            <span class="font-serif italic text-orange-500 font-medium">Indonesian Leaders</span>
                        </h1>

                        <p
                            class="text-gray-500 dark:text-gray-400 text-lg leading-relaxed max-w-md font-poppins transition-colors duration-300">
                            Jadilah bagian dari ekosistem elit tempat para pemimpin visioner bertukar ide, strategi, dan
                            peluang masa depan.
                        </p>
                    </div>

                    {{-- List Benefit --}}
                    <div class="grid grid-cols-1 gap-4 pt-4">
                        @php
                            $benefits = [
                                'Akses Eksklusif Program ACMI',
                                'CEO Roundtable & Private Luncheon',
                                'Masterclass Pakar Global',
                                'Networking 500+ Top Executive',
                                'International Business Mission',
                            ];
                        @endphp
                        @foreach ($benefits as $benefit)
                            <div
                                class="group flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-white dark:hover:bg-white/5 hover:shadow-sm dark:hover:shadow-none">
                                <div
                                    class="flex-shrink-0 w-8 h-8 rounded-lg bg-orange-500 flex items-center justify-center text-white shadow-sm shadow-orange-200 dark:shadow-orange-900/30">
                                    <i class="fa-solid fa-check text-[12px]"></i>
                                </div>
                                <span
                                    class="text-slate-700 dark:text-slate-300 font-semibold font-poppins text-sm md:text-base transition-colors duration-300">{{ $benefit }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-[#111113] rounded-[2.5rem] shadow-[0_40px_100px_-20px_rgba(0,0,0,0.04)] dark:shadow-[0_40px_100px_-20px_rgba(0,0,0,0.4)] border border-gray-100 dark:border-white/5 p-8 md:p-16 relative overflow-hidden transition-colors duration-300">
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-orange-50/50 dark:bg-orange-500/5 rounded-full -mr-32 -mt-32 blur-3xl pointer-events-none">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-64 h-64 bg-blue-50/30 dark:bg-blue-900/5 rounded-full -ml-32 -mb-32 blur-3xl pointer-events-none">
                    </div>

                    <div class="relative">
                        <h2 class="text-3xl font-poppins font-bold text-slate-900 dark:text-white mb-2 transition-colors duration-300">
                            Formulir Aplikasi
                        </h2>
                        <p class="text-gray-400 dark:text-gray-500 text-sm mb-12 font-poppins transition-colors duration-300">
                            Estimasi waktu pengisian: 3 menit
                        </p>

                        {{-- GANTI action="#" MENJADI route YANG BENAR (misal: route('join.store')) --}}
                        <form action="{{ app()->getLocale() == 'id' ? route('id.gabung.store') : route('en.join.store') }}" method="POST" class="space-y-12">
                            @csrf

                            {{-- PENTING: Tambahkan kembali Alert Notifikasi --}}
                            @if(session('success'))
                                <div class="p-4 bg-green-50 border border-green-200 rounded-2xl text-green-700 text-sm font-poppins">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="p-4 bg-red-50 border border-red-200 rounded-2xl text-red-700 text-sm font-poppins">
                                    {!! session('error') !!}
                                </div>
                            @endif

                            {{-- Section 01: Informasi Pribadi --}}
                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-[10px] font-bold transition-colors duration-300">01</span>
                                    <h3 class="text-xs font-bold text-slate-900 dark:text-slate-100 uppercase tracking-widest transition-colors duration-300">Informasi Pribadi</h3>
                                    <div class="h-[1px] flex-grow bg-gray-100 dark:bg-white/10 transition-colors duration-300"></div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        {{-- TAMBAHKAN name="name" --}}
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required
                                            class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600">
                                    </div>
                                    <div class="space-y-2">
                                        {{-- TAMBAHKAN name="email" --}}
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Profesional" required
                                            class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600">
                                    </div>
                                    <div class="space-y-2">
                                        {{-- TAMBAHKAN name="phone" --}}
                                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="WhatsApp (Aktif)" required
                                            class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600">
                                    </div>
                                    <div class="space-y-2">
                                        {{-- TAMBAHKAN name="linkedin" --}}
                                        <input type="url" name="linkedin" value="{{ old('linkedin') }}" placeholder="LinkedIn Profile URL"
                                            class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600">
                                    </div>
                                </div>
                            </div>

                            {{-- Section 02: Informasi Bisnis --}}
                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-[10px] font-bold transition-colors duration-300">02</span>
                                    <h3 class="text-xs font-bold text-slate-900 dark:text-slate-100 uppercase tracking-widest transition-colors duration-300">Informasi Bisnis</h3>
                                    <div class="h-[1px] flex-grow bg-gray-100 dark:bg-white/10 transition-colors duration-300"></div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    {{-- TAMBAHKAN name="company" --}}
                                    <input type="text" name="company" value="{{ old('company') }}" placeholder="Nama Perusahaan" required
                                        class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600">

                                    {{-- TAMBAHKAN name="position" --}}
                                    <input type="text" name="position" value="{{ old('position') }}" placeholder="Jabatan Saat Ini" required
                                        class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600">

                                    {{-- TAMBAHKAN name="industry" --}}
                                    <select name="industry"
                                        class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.5rem_center] bg-no-repeat">
                                        <option disabled {{ !old('industry') ? 'selected' : '' }} class="dark:bg-[#111113] dark:text-gray-400">Sektor Industri</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Teknologi & Software' ? 'selected' : '' }}>Teknologi & Software </option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Keuangan & Fintech' ? 'selected' : '' }}>Keuangan & Fintech</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Manufaktur' ? 'selected' : '' }}>Manufaktur</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Properti & Real Estate' ? 'selected' : '' }}>Properti & Real Estate</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'F&B' ? 'selected' : '' }}>F&B</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Energi & Resources' ? 'selected' : '' }}>Energi & Resources</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Retail & E-commerce' ? 'selected' : '' }}>Retail & E-commerce</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Media & Entertainment' ? 'selected' : '' }}>Media & Entertainment</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Logistik & Supply Chain' ? 'selected' : '' }}>Logistik & Supply Chain</option>
                                        <option class="dark:bg-[#111113]" {{ old('industry') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>

                                    <input type="text" name="company_url" value="{{ old('company_url') }}" placeholder="Website Perusahaan"
                                        class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600">

                                    <select name="employee_size"
                                        class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.5rem_center] bg-no-repeat">
                                        <option disabled {{ !old('employee_size') ? 'selected' : '' }} class="dark:bg-[#111113] dark:text-gray-400">Jumlah Karyawan</option>
                                        <option class="dark:bg-[#111113]" {{ old('employee_szie') == '1-50 Karyawan' ? 'selected' : '' }}>1-50 Karyawan</option>
                                        <option class="dark:bg-[#111113]" {{ old('employee_size') == '51-200 Karyawan' ? 'selected' : '' }}>51-200 Karyawan</option>
                                        <option class="dark:bg-[#111113]" {{ old('employee_size') == '201-500 Karyawan' ? 'selected' : '' }}>201-500 Karyawan</option>
                                        <option class="dark:bg-[#111113]" {{ old('employee_size') == '501-1000 Karyawan' ? 'selected' : '' }}>501-1000 Karyawan</option>
                                        <option class="dark:bg-[#111113]" {{ old('employee_size') == '1000+ Karyawan' ? 'selected' : '' }}>1000+ Karyawan</option>
                                    </select>

                                    <select name="annual_revenue"
                                        class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.5rem_center] bg-no-repeat">
                                        <option disabled {{ !old('revenue') ? 'selected' : '' }} class="dark:bg-[#111113] dark:text-gray-400">Skala Pendapatan Tahunan</option>
                                        <option class="dark:bg-[#111113]" {{ old('revenue') == '< IDR 10 Miliar' ? 'selected' : '' }}>< IDR 10 Miliar</option>
                                        <option class="dark:bg-[#111113]" {{ old('revenue') == 'IDR 10 - 50 Miliar' ? 'selected' : '' }}>IDR 10 - 50 Miliar</option>
                                        <option class="dark:bg-[#111113]" {{ old('revenue') == 'IDR 50 - 200 Miliar' ? 'selected' : '' }}>IDR 50 - 200 Miliar</option>
                                        <option class="dark:bg-[#111113]" {{ old('revenue') == 'IDR 200 Miliar - 1 Triliun' ? 'selected' : '' }}>IDR 200 Miliar - 1 Triliun</option>
                                        <option class="dark:bg-[#111113]" {{ old('revenue') == '> IDR 1 Triliun' ? 'selected' : '' }}>> IDR 1 Triliun</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Section 03: Visi & Aspirasi --}}
                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-[10px] font-bold transition-colors duration-300">03</span>
                                    <h3 class="text-xs font-bold text-slate-900 dark:text-slate-100 uppercase tracking-widest transition-colors duration-300">Motivasi & Referral</h3>
                                    <div class="h-[1px] flex-grow bg-gray-100 dark:bg-white/10 transition-colors duration-300"></div>
                                </div>
                                {{-- TAMBAHKAN name="message" --}}
                                <textarea name="message" rows="4" placeholder="Mengapa anda tertarik bergabung dengan ACMI?*" required
                                    class="w-full px-6 py-4 bg-gray-50 dark:bg-white/5 border border-transparent dark:border-white/5 rounded-2xl focus:bg-white dark:focus:bg-white/10 focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/20 focus:border-orange-500 outline-none transition-all duration-300 font-poppins text-sm text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-600 resize-none">{{ old('message') }}</textarea>
                            </div>

                            {{-- Submit Button --}}
                            <div class="py-2">
                                <button type="submit"
                                    class="group relative w-full overflow-hidden py-5 bg-slate-900 dark:bg-white text-white dark:text-slate-900 rounded-2xl font-bold transition-all duration-300 hover:shadow-2xl hover:shadow-slate-200 dark:hover:shadow-orange-900/20">
                                    <div class="absolute inset-0 w-0 bg-orange-500 transition-all duration-[400ms] ease-out group-hover:w-full"></div>
                                    <div class="relative flex items-center justify-center gap-3">
                                        <span class="font-poppins uppercase tracking-[0.2em] text-xs group-hover:text-white transition-colors duration-300">Kirim Aplikasi Pendaftaran</span>
                                        <i class="fa-solid fa-arrow-right-long text-xs transition-transform duration-300 group-hover:translate-x-2 group-hover:text-white"></i>
                                    </div>
                                </button>
                                <p class="text-center text-[10px] text-gray-400 dark:text-gray-600 mt-8 font-poppins uppercase tracking-widest leading-relaxed transition-colors duration-300">
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

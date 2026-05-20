@extends('layouts.app')

@section('title', 'Gabung Keanggotaan - ACMI')

@section('content')
{{-- Padding top ditambahkan agar tidak tertutup Navbar --}}
<section class="min-h-screen bg-[#F8F9FA] dark:bg-[#0a0a0b] pt-32 pb-20 px-6 transition-colors duration-500">
    <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            
            {{-- KOLOM KIRI: TEKS & BENEFIT --}}
            <div class="space-y-8 lg:sticky lg:top-32">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-200 dark:border-orange-500/30 bg-orange-50/50 dark:bg-orange-500/10">
                    <i class="fa-solid fa-crown text-orange-500 text-[10px]"></i>
                    <span class="text-orange-600 dark:text-orange-400 text-xs font-poppins font-semibold tracking-widest uppercase">{{ __('messages.badge') }}</span>
                </div>

                {{-- Headline --}}
                <h1 class="text-4xl md:text-5xl font-poppins font-semibold text-slate-900 dark:text-white leading-[1.2]">
                    {{ __('messages.headline_1') }} <br>
                    <span class="font-serif italic text-orange-500 font-bold">{{ __('messages.headline_em') }}</span> <br>
                    {{ __('messages.headline_2') }}
                </h1>

                <p class="text-gray-500 dark:text-gray-400 text-lg leading-relaxed max-w-md font-poppins">
                    {{ __('messages.subheadline') }}
                </p>

                {{-- List Benefit --}}
                <ul class="space-y-5 pt-4">
                    @foreach(__('messages.benefits') as $benefit)
                    <li class="flex items-center gap-4">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full border border-orange-500 flex items-center justify-center bg-white dark:bg-transparent shadow-sm shadow-orange-100 dark:shadow-none">
                            <i class="fa-solid fa-check text-[10px] text-orange-500"></i>
                        </div>
                        <span class="text-gray-700 dark:text-gray-300 font-medium font-poppins text-sm md:text-base">{{ $benefit }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- KOLOM KANAN: FORMULIR --}}
            <div class="bg-white dark:bg-white/5 rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] dark:shadow-none border border-gray-100 dark:border-white/10 p-8 md:p-12 relative overflow-hidden">
                {{-- Dekorasi halus di sudut form --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-orange-50 dark:bg-orange-500/5 rounded-full -mr-16 -mt-16 opacity-50"></div>
                
                <h2 class="text-3xl font-poppins font-bold text-slate-900 dark:text-white mb-10 relative">{{ __('messages.form_title') }}</h2>

                <form action="#" method="POST" class="space-y-10 relative">
                    @csrf
                    
                    {{-- Section: Informasi Pribadi --}}
                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-orange-500 uppercase tracking-widest mb-4">
                            {{ __('messages.section_personal') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <input type="text" placeholder="{{ __('messages.placeholder_name') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">
                            <input type="email" placeholder="{{ __('messages.placeholder_email') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">
                            <input type="tel" placeholder="{{ __('messages.placeholder_phone') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">
                            <input type="url" placeholder="{{ __('messages.placeholder_linkedin') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">
                        </div>
                    </div>

                    {{-- Section: Informasi Perusahaan --}}
                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-orange-500 uppercase tracking-widest mb-4">
                            {{ __('messages.section_company') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <input type="text" placeholder="{{ __('messages.placeholder_company') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">
                            <input type="text" placeholder="{{ __('messages.placeholder_position') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">
                            
                            <select class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-gray-400 dark:text-gray-500 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.25rem_center] bg-no-repeat">
                                <option disabled selected>{{ __('messages.select_industry') }}</option>
                                @foreach(__('messages.industry_options') as $option)
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>

                            <input type="url" placeholder="{{ __('messages.placeholder_website') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">

                            <select class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-gray-400 dark:text-gray-500 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.25rem_center] bg-no-repeat">
                                <option disabled selected>{{ __('messages.select_employees') }}</option>
                                @foreach(__('messages.employees_options') as $option)
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>

                            <select class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-gray-400 dark:text-gray-500 appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23f97316%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-[length:1em_1em] bg-[right_1.25rem_center] bg-no-repeat">
                                <option disabled selected>{{ __('messages.select_revenue') }}</option>
                                @foreach(__('messages.revenue_options') as $option)
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Section: Motivasi --}}
                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-orange-500 uppercase tracking-widest mb-4">
                            {{ __('messages.section_motive') }}
                        </h3>
                        <div class="space-y-3">
                            <textarea rows="4" placeholder="{{ __('messages.placeholder_motivation') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 resize-none"></textarea>
                            <input type="text" placeholder="{{ __('messages.placeholder_referral') }}" class="w-full px-5 py-3.5 bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-xl focus:ring-4 focus:ring-orange-500/10 dark:focus:ring-orange-500/10 focus:border-orange-500 dark:focus:border-orange-500 outline-none transition font-poppins text-xs text-slate-900 dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-4">
                        <button type="submit" class="w-full py-5 bg-orange-500 hover:bg-orange-600 text-white rounded-2xl font-bold flex items-center justify-center gap-3 shadow-xl shadow-orange-100 dark:shadow-orange-500/10 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fa-solid fa-paper-plane text-sm"></i>
                            <span class="font-poppins uppercase tracking-widest text-sm">{{ __('messages.submit_btn') }}</span>
                        </button>
                        <p class="text-center text-[10px] text-gray-400 dark:text-gray-500 mt-6 font-poppins uppercase tracking-wider leading-relaxed">
                            {!! nl2br(e(__('messages.disclaimer'))) !!}
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
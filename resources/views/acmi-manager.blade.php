@extends('layouts.app')
@section('content')

{{-- ============================================================
     BOARD OF DIRECTORS — ACMI 2024-2025
     Lang keys: messages.bod_*
     Photos   : public/assets/manager/{slug}.png
     ============================================================ --}}
<section class="relative py-24 lg:py-32 overflow-hidden bg-white dark:bg-[#0a0a0b] transition-colors duration-500">

    {{-- Ambient Background Lights --}}
    <div class="absolute top-0 right-0 w-[700px] h-[700px] bg-orange-500/8 rounded-full blur-[160px] -z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-orange-600/8 rounded-full blur-[140px] -z-0 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-orange-500/3 rounded-full blur-[180px] -z-0 pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10">

        {{-- ====================== HEADER ====================== --}}
        <div class="max-w-4xl mx-auto text-center mb-24">

            <div data-aos="fade-up"
                 class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-500/20 bg-orange-500/5 text-orange-600 dark:text-orange-400 text-[11px] font-black mb-8 uppercase tracking-[0.3em]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                {{ __('messages.bod_badge') }}
            </div>

            <h2 data-aos="fade-up" data-aos-delay="100"
                class="font-poppins text-gray-900 dark:text-white leading-[1.1] mb-6 tracking-tight text-3xl md:text-5xl font-bold">
                <span class="font-poppins font-bold">{{ __('messages.bod_title_1') }}</span> <br>
                <span class="font-serif italic font-semibold text-orange-500">{{ __('messages.bod_title_2') }}</span>
            </h2>

            <p data-aos="fade-up" data-aos-delay="200"
               class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400 text-lg md:text-xl font-semibold leading-relaxed">
                {{ __('messages.bod_description') }}
            </p>

        </div>

        {{-- ====================== DATA ====================== --}}
        @php
        $groups = [

            // ── Dewan Pengurus Pusat ──────────────────────────────────────
            [
                'title'    => __('messages.bod_group_dpp_title'),
                'subtitle' => __('messages.bod_group_dpp_subtitle'),
                'icon'     => 'fa-solid fa-crown',
                'cols'     => 5,
                'members'  => [
                    ['role' => __('messages.bod_role_ketua_umum'),       'name' => 'Donny Wahyudi',                          'img' => 'donny_wahyudi.png'],
                    ['role' => __('messages.bod_role_wakil_ketua_umum'), 'name' => 'Dara Zam',                               'img' => 'dara_zam.png'],
                    ['role' => __('messages.bod_role_sekjen'),           'name' => 'Sonny Arca Adryanto',                   'img' => 'sonny_arca_adryanto.png'],
                    ['role' => __('messages.bod_role_wasekjen'),         'name' => 'Candra Arief S.',                       'img' => 'candra_arief_s.png'],
                    ['role' => __('messages.bod_role_bendahara_umum'),   'name' => 'Lim Erwin Hartono',                     'img' => 'lim_erwin_hartono.png'],
                ],
            ],

            // ── Pengurus Pusat ────────────────────────────────────────────
            [
                'title'    => __('messages.bod_group_pusat_title'),
                'subtitle' => __('messages.bod_group_pusat_subtitle'),
                'icon'     => 'fa-solid fa-building',
                'cols'     => 3,
                'members'  => [
                    ['role' => __('messages.bod_role_bisdev'),      'name' => 'Fajar Budiman',                           'img' => 'fajar_budiman.png'],
                    ['role' => __('messages.bod_role_keanggotaan'), 'name' => 'Rilla Kusuma Dewi',                      'img' => 'rilla_kusuma_dewi.png'],
                    ['role' => __('messages.bod_role_legal'),       'name' => 'Husni Farid Abdat, S.H., M.H., C.L.A.', 'img' => 'husni_farid_abdat_sh_mh_cla.png'],
                ],
            ],

            // ── Wilayah Barat ─────────────────────────────────────────────
            [
                'title'    => __('messages.bod_group_barat_title'),
                'subtitle' => __('messages.bod_group_barat_subtitle'),
                'icon'     => 'fa-solid fa-map-location-dot',
                'cols'     => 4,
                'members'  => [
                    ['role' => __('messages.bod_role_ketua'),         'name' => 'Wie Wie',                 'img' => 'wie_wie.png'],
                    ['role' => __('messages.bod_role_wakil_ketua'),   'name' => 'Deasi Widya',             'img' => 'deasi_widya.png'],
                    ['role' => __('messages.bod_role_wabid_edukasi'), 'name' => 'Gunawan Saputro',         'img' => 'gunawan_saputro.png'],
                    ['role' => __('messages.bod_role_digicom'),       'name' => 'Martin Suharto, SE. MM',  'img' => 'martin_suharto_se_mm.png'],
                ],
            ],

            // ── Wilayah Tengah ────────────────────────────────────────────
            [
                'title'    => __('messages.bod_group_tengah_title'),
                'subtitle' => __('messages.bod_group_tengah_subtitle'),
                'icon'     => 'fa-solid fa-map-location-dot',
                'cols'     => 4,
                'members'  => [
                    ['role' => __('messages.bod_role_ketua'),     'name' => 'Iwan Anton Prabowo',    'img' => 'iwan_anton_prabowo.png'],
                    ['role' => __('messages.bod_role_wakil'),     'name' => 'Muhammad Kudhori Bix',  'img' => 'muhammad_kudhori_bix.png'],
                    ['role' => __('messages.bod_role_bendahara'), 'name' => 'Adi Darmawan',          'img' => 'adi_darmawan.png'],
                    ['role' => __('messages.bod_role_humas'),     'name' => 'Muhammad Dardiri',      'img' => 'muhammad_dardiri.png'],
                ],
            ],

            // ── Wilayah Timur ─────────────────────────────────────────────
            [
                'title'    => __('messages.bod_group_timur_title'),
                'subtitle' => __('messages.bod_group_timur_subtitle'),
                'icon'     => 'fa-solid fa-map-location-dot',
                'cols'     => 5,
                'members'  => [
                    ['role' => __('messages.bod_role_ketua'),       'name' => 'Raga Alfath',                'img' => 'raga_alfath.png'],
                    ['role' => __('messages.bod_role_bisdev_wil'),  'name' => 'Yainudin Yahya',             'img' => 'yainudin_yahya.png'],
                    ['role' => __('messages.bod_role_keanggotaan'), 'name' => 'Achmad Arief',              'img' => 'achmad_arief.png'],
                    ['role' => __('messages.bod_role_bendahara'),   'name' => 'Sukis Wijayanti',           'img' => 'sukis_wijayanti.png'],
                    ['role' => __('messages.bod_role_edukasi'),     'name' => 'Dedy Pratama (Dedy Focus)', 'img' => 'dedy_pratama_dedy_focus.png'],
                ],
            ],

        ];

        $colsMap = [
            3 => 'grid-cols-2 sm:grid-cols-3',
            4 => 'grid-cols-2 sm:grid-cols-4',
            5 => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-5',
        ];
        @endphp

        {{-- ====================== GROUPS LOOP ====================== --}}
        @foreach($groups as $gIndex => $group)
        <div class="mb-20" data-aos="fade-up" data-aos-delay="{{ $gIndex * 60 }}">

            {{-- Group Header --}}
            <div class="flex items-center gap-4 mb-10">
                <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center shadow-lg shadow-orange-500/30">
                    <i class="{{ $group['icon'] }} text-white text-sm"></i>
                </div>
                <div class="leading-tight">
                    <span class="font-poppins font-bold text-lg text-gray-900 dark:text-white">
                        {{ $group['title'] }}
                    </span>
                    <span class="mx-2 text-gray-300 dark:text-white/20">·</span>
                    <span class="text-orange-500 dark:text-orange-400 text-sm font-semibold">
                        {{ $group['subtitle'] }}
                    </span>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-orange-500/25 via-orange-500/10 to-transparent"></div>
            </div>

            {{-- Members Grid --}}
            <div class="grid {{ $colsMap[$group['cols']] }} gap-4 md:gap-5">

                @foreach($group['members'] as $mIndex => $member)
                <div
                    data-aos="fade-up"
                    data-aos-delay="{{ ($gIndex * 40) + ($mIndex * 70) }}"
                    class="group relative bg-gray-50 dark:bg-[#111113] rounded-2xl overflow-hidden border border-gray-100 dark:border-white/5 transition-all duration-500 hover:border-orange-500/40 hover:shadow-[0_20px_40px_-12px_rgba(249,115,22,0.18)] hover:-translate-y-1.5"
                >
                    {{-- Top accent line --}}
                    <div class="absolute top-0 left-0 w-0 h-[2.5px] bg-gradient-to-r from-orange-400 via-orange-500 to-red-500 group-hover:w-full transition-all duration-700 ease-out z-10"></div>

                    {{-- Photo --}}
                    <div class="relative overflow-hidden aspect-[3/3.2]">
                        <img
                            src="{{ asset('assets/manager/' . $member['img']) }}"
                            alt="{{ $member['name'] }}"
                            class="w-full h-full object-cover object-top transition-all duration-700 group-hover:scale-105"
                            onerror="this.onerror=null;this.src='';this.parentElement.classList.add('img-fallback');"
                        >
                        {{-- Fallback avatar --}}
                        <div class="fallback-avatar absolute inset-0 hidden items-center justify-center bg-gradient-to-br from-orange-500/10 to-orange-600/5">
                            <svg class="w-16 h-16 text-orange-400/40" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                            </svg>
                        </div>
                        {{-- Bottom gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-50 via-gray-50/10 to-transparent dark:from-[#111113] dark:via-[#111113]/10 pointer-events-none"></div>
                        {{-- Orange tint on hover --}}
                        <div class="absolute inset-0 bg-orange-500/0 group-hover:bg-orange-500/8 transition-all duration-500 pointer-events-none"></div>
                    </div>

                    {{-- Content --}}
                    <div class="px-4 pb-5 pt-2">
                        {{-- Role Badge --}}
                        <div class="inline-flex items-center px-2.5 py-1 rounded-full bg-orange-500/10 border border-orange-500/15 text-orange-600 dark:text-orange-400 text-[9px] font-black uppercase tracking-widest mb-2 leading-none group-hover:bg-orange-500/20 transition-colors duration-300">
                            {{ $member['role'] }}
                        </div>
                        {{-- Name — NOT translated (proper noun) --}}
                        <h4 class="text-[13px] font-bold text-gray-800 dark:text-white font-poppins leading-snug group-hover:text-orange-500 transition-colors duration-300">
                            {{ $member['name'] }}
                        </h4>
                    </div>

                    {{-- Bottom accent line --}}
                    <div class="absolute bottom-0 left-0 w-0 h-[2px] bg-gradient-to-r from-orange-400 to-orange-600 group-hover:w-full transition-all duration-1000 ease-out"></div>
                </div>
                @endforeach

            </div>
        </div>
        @endforeach

        {{-- ====================== FOOTER LINK ====================== --}}
        <div data-aos="fade-up" class="mt-8 text-center">
            <a href="#"
               class="inline-flex items-center gap-4 px-8 py-4 rounded-full border border-gray-200 dark:border-white/10 text-gray-500 dark:text-gray-400 hover:text-orange-500 hover:border-orange-500/50 transition-all group">
                <span class="font-poppins font-semibold tracking-wide uppercase text-sm">
                    {{ __('messages.bod_see_all') }}
                </span>
                <div class="w-8 h-8 rounded-full bg-gray-100 dark:bg-white/5 flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-all">
                    <i class="fa-solid fa-arrow-right-long transition-transform group-hover:translate-x-1"></i>
                </div>
            </a>
        </div>

    </div>
</section>

<style>
    .img-fallback img              { display: none !important; }
    .img-fallback .fallback-avatar { display: flex !important; }
</style>

@endsection
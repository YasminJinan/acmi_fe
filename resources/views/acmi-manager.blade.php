@extends('layouts.app')
@section('content')

{{-- ============================================================
     STRUKTUR ORGANISASI — ACMI 2025-2028
     Sumber   : Struktur_Organisasi_ACMI_Periode_2025-2028_rev.pdf
     Lang keys: messages.org_*
     Catatan  : tanpa foto — monogram inisial + nama + jabatan
     ============================================================ --}}
<section class="relative py-24 lg:py-32 overflow-hidden bg-white dark:bg-[#0a0a0b] transition-colors duration-500">

    {{-- Ambient Background Lights --}}
    <div class="absolute top-0 right-0 w-[700px] h-[700px] bg-orange-500/8 rounded-full blur-[160px] -z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-800/8 rounded-full blur-[140px] -z-0 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-orange-500/3 rounded-full blur-[180px] -z-0 pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10">

        {{-- ====================== HEADER ====================== --}}
        <div class="max-w-4xl mx-auto text-center mb-20 lg:mb-24">

            <div data-aos="fade-up"
                 class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-orange-500/20 bg-orange-500/5 text-orange-600 dark:text-orange-400 text-[11px] font-black mb-8 uppercase tracking-[0.3em]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                </span>
                {{ __('messages.org_badge') }}
            </div>

            <h2 data-aos="fade-up" data-aos-delay="100"
                class="font-poppins text-gray-900 dark:text-white leading-[1.1] mb-6 tracking-tight text-3xl md:text-5xl font-bold">
                <span class="font-poppins font-bold">{{ __('messages.org_title_1') }}</span> <br>
                <span class="font-serif italic font-semibold text-orange-500">{{ __('messages.org_title_2') }}</span>
            </h2>

            <p data-aos="fade-up" data-aos-delay="200"
               class="max-w-2xl mx-auto text-gray-500 dark:text-gray-400 text-lg md:text-xl font-semibold leading-relaxed">
                {{ __('messages.org_description') }}
            </p>

        </div>

        {{-- ====================== DATA ====================== --}}
        @php
        /*
        |--------------------------------------------------------------------------
        | Struktur Pusat
        |--------------------------------------------------------------------------
        | 'lead' => true  : jabatan level pimpinan (kartu solid, badge oranye)
        | name = null     : posisi masih kosong → tampil "Segera Diisi"
        */
        $pusat = [
            ['role' => __('messages.org_role_president'),          'name' => 'Donny Wahyudi',          'lead' => true],
            ['role' => __('messages.org_role_deputy_president'),   'name' => 'Dara Zam Chairyah',      'lead' => true],
            ['role' => __('messages.org_role_secgen'),             'name' => 'Sonny Arca Adryanto',    'lead' => true],
            ['role' => __('messages.org_role_treasurer'),          'name' => 'Lim Erwin Hartono',      'lead' => true],
            ['role' => __('messages.org_role_deputy_secgen_1'),    'name' => 'Deasi T. Widyastuti'],
            ['role' => __('messages.org_role_deputy_secgen_2'),    'name' => null],
            ['role' => __('messages.org_role_deputy_treasurer_1'), 'name' => 'Raga Birhatihin Al Fath'],
            ['role' => __('messages.org_role_deputy_treasurer_2'), 'name' => 'Suryani'],
        ];

        /*
        |--------------------------------------------------------------------------
        | Empat Pilar
        |--------------------------------------------------------------------------
        | Tiap pilar: satu Director + jajaran Deputy.
        */
        $pilar = [
            [
                'key'      => 'learn',
                'title'    => __('messages.org_pilar_learn_title'),
                'subtitle' => __('messages.org_pilar_learn_subtitle'),
                'icon'     => 'fa-solid fa-graduation-cap',
                'director' => ['role' => __('messages.org_role_dir_learning'), 'name' => 'Muhammad Khemal'],
                'deputies' => [
                    ['role' => __('messages.org_role_dep_curriculum'),  'name' => 'Erlina'],
                    ['role' => __('messages.org_role_dep_mentorship'),  'name' => 'Krisna Purbaya Putra'],
                    ['role' => __('messages.org_role_dep_pubedu'),      'name' => 'Achmad Wildan'],
                ],
            ],
            [
                'key'      => 'connect',
                'title'    => __('messages.org_pilar_connect_title'),
                'subtitle' => __('messages.org_pilar_connect_subtitle'),
                'icon'     => 'fa-solid fa-handshake',
                'director' => ['role' => __('messages.org_role_dir_networking'), 'name' => 'Lindar Fitriany'],
                'deputies' => [
                    ['role' => __('messages.org_role_dep_event'),    'name' => 'Zulaidah Rahmawati Wadjo'],
                    ['role' => __('messages.org_role_dep_pr'),       'name' => 'Aris Imran'],
                    ['role' => __('messages.org_role_dep_digicom'),  'name' => 'Asad Abdulkadir'],
                    ['role' => __('messages.org_role_dep_creative'), 'name' => 'Lely Kusworo'],
                ],
            ],
            [
                'key'      => 'ecosystem',
                'title'    => __('messages.org_pilar_ecosystem_title'),
                'subtitle' => __('messages.org_pilar_ecosystem_subtitle'),
                'icon'     => 'fa-solid fa-users-gear',
                'director' => ['role' => __('messages.org_role_dir_membership'), 'name' => 'Paula Meliana'],
                'deputies' => [
                    ['role' => __('messages.org_role_dep_member_mgmt'), 'name' => 'Yandi Hermawan'],
                    ['role' => __('messages.org_role_dep_compliance'),  'name' => null],
                    ['role' => __('messages.org_role_dep_legal'),       'name' => 'Husni Farid Abdat'],
                    ['role' => __('messages.org_role_dep_bond'),        'name' => 'M. Zulkifli'],
                ],
            ],
            [
                'key'      => 'scaleup',
                'title'    => __('messages.org_pilar_scaleup_title'),
                'subtitle' => __('messages.org_pilar_scaleup_subtitle'),
                'icon'     => 'fa-solid fa-arrow-trend-up',
                'director' => ['role' => __('messages.org_role_dir_bisdev'), 'name' => 'Andi Pangeran'],
                'deputies' => [
                    ['role' => __('messages.org_role_dep_consulting'), 'name' => 'Heriyanto Anugroho'],
                ],
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Struktur Wilayah
        |--------------------------------------------------------------------------
        */
        $wilayah = [
            [
                'key'     => 'barat',
                'title'   => __('messages.org_wil_barat_title'),
                'lead'    => ['role' => __('messages.org_role_reg_director'), 'name' => 'Wie Wie'],
                'members' => [
                    ['role' => __('messages.org_role_reg_secretary'),     'name' => 'Ayad Als Adha'],
                    ['role' => __('messages.org_role_reg_treasurer'),     'name' => 'Alif Akbar S.'],
                    ['role' => __('messages.org_role_reg_dir_learning'),  'name' => 'Hilman Pratama'],
                    ['role' => __('messages.org_role_reg_dep_learning'),  'name' => 'Irfi Ismail'],
                    ['role' => __('messages.org_role_reg_dir_network'),   'name' => 'Abinew Razak'],
                    ['role' => __('messages.org_role_reg_dep_network'),   'name' => 'Unggul Gumilang Wicaksono'],
                    ['role' => __('messages.org_role_reg_dir_member'),    'name' => 'Martin Suharto'],
                    ['role' => __('messages.org_role_reg_dep_member'),    'name' => 'Indra Nanda'],
                    ['role' => __('messages.org_role_reg_dir_bisdev'),    'name' => 'Jatmeko'],
                    ['role' => __('messages.org_role_reg_dep_bisdev'),    'name' => 'Citra Kusuma'],
                ],
            ],
            [
                'key'     => 'tengah',
                'title'   => __('messages.org_wil_tengah_title'),
                'lead'    => ['role' => __('messages.org_role_reg_director'), 'name' => 'Iwan A. Prabowo'],
                'members' => [
                    ['role' => __('messages.org_role_reg_secretary'),    'name' => 'M. Khudori Bix'],
                    ['role' => __('messages.org_role_reg_treasurer'),    'name' => 'Marylia Rahmawati'],
                    ['role' => __('messages.org_role_reg_dir_learning'), 'name' => 'Bimo Yunianto'],
                    ['role' => __('messages.org_role_reg_dir_network'),  'name' => 'Taufiq Ichsani'],
                    ['role' => __('messages.org_role_reg_dir_member'),   'name' => 'Fajarini'],
                    ['role' => __('messages.org_role_reg_dir_bisdev'),   'name' => 'Suyono'],
                ],
            ],
            [
                'key'     => 'timur',
                'title'   => __('messages.org_wil_timur_title'),
                'lead'    => ['role' => __('messages.org_role_reg_director'), 'name' => 'Sukis Widjajanti'],
                'members' => [
                    ['role' => __('messages.org_role_reg_secretary'),    'name' => 'Dedy Pratama'],
                    ['role' => __('messages.org_role_reg_treasurer'),    'name' => 'Dedy Pratama'],
                    ['role' => __('messages.org_role_reg_dir_learning'), 'name' => 'Indra Rinaldy'],
                    ['role' => __('messages.org_role_reg_dir_network'),  'name' => 'Achmad Arief'],
                    ['role' => __('messages.org_role_reg_dir_member'),   'name' => 'Soesanto Hartono'],
                    ['role' => __('messages.org_role_reg_dir_bisdev'),   'name' => 'Abdul Muidz Aad'],
                    ['role' => __('messages.org_role_reg_dep_bisdev'),   'name' => 'Yainudin Yahya'],
                ],
            ],
        ];

        /* Helper: bikin monogram dari nama (maks 2 huruf) */
        $initials = function ($name) {
            if (! $name) return '—';
            $clean = preg_replace('/\(.*?\)|[^\p{L}\s]/u', ' ', $name);
            $parts = preg_split('/\s+/u', trim($clean), -1, PREG_SPLIT_NO_EMPTY);
            if (empty($parts)) return '—';
            $first = mb_substr($parts[0], 0, 1);
            $last  = count($parts) > 1 ? mb_substr(end($parts), 0, 1) : '';
            return mb_strtoupper($first . $last);
        };
        @endphp

        {{-- ====================== 01 · STRUKTUR PUSAT ====================== --}}
        <div class="mb-24" data-aos="fade-up">

            <div class="flex items-center gap-4 mb-10">
                <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center shadow-lg shadow-orange-500/30">
                    <i class="fa-solid fa-crown text-white text-sm"></i>
                </div>
                <div class="leading-tight">
                    <span class="font-poppins font-bold text-lg text-gray-900 dark:text-white">
                        {{ __('messages.org_pusat_title') }}
                    </span>
                    <span class="mx-2 text-gray-300 dark:text-white/20">·</span>
                    <span class="text-orange-500 dark:text-orange-400 text-sm font-semibold">
                        {{ __('messages.org_pusat_subtitle') }}
                    </span>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-orange-500/25 via-orange-500/10 to-transparent"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
                @foreach($pusat as $i => $m)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 60 }}"
                     class="group relative overflow-hidden rounded-2xl border transition-all duration-500 hover:-translate-y-1.5 hover:shadow-[0_20px_40px_-12px_rgba(249,115,22,0.18)]
                            {{ ($m['lead'] ?? false)
                                ? 'bg-white dark:bg-[#111113] border-orange-500/25 hover:border-orange-500/60'
                                : 'bg-gray-50 dark:bg-[#0f0f11] border-gray-100 dark:border-white/5 hover:border-orange-500/40' }}">

                    <div class="absolute top-0 left-0 w-0 h-[2.5px] bg-gradient-to-r from-orange-400 via-orange-500 to-red-500 group-hover:w-full transition-all duration-700 ease-out z-10"></div>

                    <div class="p-6">
                        {{-- Monogram --}}
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 font-poppins font-black text-base tracking-wider transition-all duration-500
                                    {{ ($m['lead'] ?? false)
                                        ? 'bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-500/25'
                                        : 'bg-orange-500/10 text-orange-600 dark:text-orange-400 border border-orange-500/15 group-hover:bg-orange-500/20' }}">
                            {{ $initials($m['name']) }}
                        </div>

                        {{-- Role --}}
                        <div class="inline-flex items-center px-2.5 py-1 rounded-full bg-orange-500/10 border border-orange-500/15 text-orange-600 dark:text-orange-400 text-[9px] font-black uppercase tracking-widest mb-2.5 leading-none group-hover:bg-orange-500/20 transition-colors duration-300">
                            {{ $m['role'] }}
                        </div>

                        {{-- Nama (proper noun — tidak diterjemahkan) --}}
                        @if($m['name'])
                            <h4 class="text-[15px] font-bold text-gray-800 dark:text-white font-poppins leading-snug group-hover:text-orange-500 transition-colors duration-300">
                                {{ $m['name'] }}
                            </h4>
                        @else
                            <h4 class="text-[15px] font-semibold text-gray-400 dark:text-gray-600 font-poppins leading-snug italic">
                                {{ __('messages.org_vacant') }}
                            </h4>
                        @endif
                    </div>

                    <div class="absolute bottom-0 left-0 w-0 h-[2px] bg-gradient-to-r from-orange-400 to-orange-600 group-hover:w-full transition-all duration-1000 ease-out"></div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ====================== 02 · EMPAT PILAR ====================== --}}
        <div class="mb-24">

            <div class="flex items-center gap-4 mb-10" data-aos="fade-up">
                <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center shadow-lg shadow-orange-500/30">
                    <i class="fa-solid fa-layer-group text-white text-sm"></i>
                </div>
                <div class="leading-tight">
                    <span class="font-poppins font-bold text-lg text-gray-900 dark:text-white">
                        {{ __('messages.org_pilar_title') }}
                    </span>
                    <span class="mx-2 text-gray-300 dark:text-white/20">·</span>
                    <span class="text-orange-500 dark:text-orange-400 text-sm font-semibold">
                        {{ __('messages.org_pilar_subtitle') }}
                    </span>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-orange-500/25 via-orange-500/10 to-transparent"></div>
            </div>

            <div class="space-y-5">
                @foreach($pilar as $pIndex => $p)
                <div data-aos="fade-up" data-aos-delay="{{ $pIndex * 60 }}"
                     class="group/pillar relative rounded-3xl border border-gray-100 dark:border-white/5 bg-gray-50/60 dark:bg-[#0f0f11] p-6 md:p-8 transition-all duration-500 hover:border-orange-500/30">

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

                        {{-- Kiri: identitas pilar + Director --}}
                        <div class="lg:col-span-4">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-orange-500/10 border border-orange-500/20 flex items-center justify-center">
                                    <i class="{{ $p['icon'] }} text-orange-500 text-xs"></i>
                                </div>
                                <div class="leading-tight">
                                    <div class="font-poppins font-bold text-base text-gray-900 dark:text-white uppercase tracking-wide">
                                        {{ $p['title'] }}
                                    </div>
                                    <div class="text-[11px] font-semibold text-gray-400 dark:text-gray-500">
                                        {{ $p['subtitle'] }}
                                    </div>
                                </div>
                            </div>

                            {{-- Kartu Director --}}
                            <div class="group relative overflow-hidden rounded-2xl bg-white dark:bg-[#141416] border border-orange-500/25 p-5 transition-all duration-500 hover:border-orange-500/60 hover:shadow-[0_20px_40px_-12px_rgba(249,115,22,0.18)]">
                                <div class="absolute top-0 left-0 w-0 h-[2.5px] bg-gradient-to-r from-orange-400 to-red-500 group-hover:w-full transition-all duration-700 ease-out"></div>
                                <div class="flex items-center gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-500/25 flex items-center justify-center font-poppins font-black text-sm tracking-wider">
                                        {{ $initials($p['director']['name']) }}
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-[9px] font-black uppercase tracking-widest text-orange-600 dark:text-orange-400 mb-1 leading-none">
                                            {{ $p['director']['role'] }}
                                        </div>
                                        <h4 class="text-[15px] font-bold text-gray-800 dark:text-white font-poppins leading-snug truncate group-hover:text-orange-500 transition-colors duration-300">
                                            {{ $p['director']['name'] }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Kanan: jajaran Deputy --}}
                        <div class="lg:col-span-8 lg:border-l lg:border-gray-200/70 dark:lg:border-white/5 lg:pl-8">
                            <div class="text-[10px] font-black uppercase tracking-[0.25em] text-gray-400 dark:text-gray-600 mb-4">
                                {{ __('messages.org_deputy_label') }}
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($p['deputies'] as $d)
                                <div class="group relative overflow-hidden rounded-xl bg-white dark:bg-[#141416] border border-gray-100 dark:border-white/5 px-4 py-3.5 transition-all duration-400 hover:border-orange-500/40 hover:-translate-y-0.5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-9 h-9 rounded-lg bg-orange-500/10 border border-orange-500/15 text-orange-600 dark:text-orange-400 flex items-center justify-center font-poppins font-black text-[11px] tracking-wider group-hover:bg-orange-500/20 transition-colors duration-300">
                                            {{ $initials($d['name']) }}
                                        </div>
                                        <div class="min-w-0">
                                            <div class="text-[9px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-0.5 leading-none">
                                                {{ $d['role'] }}
                                            </div>
                                            @if($d['name'])
                                                <h4 class="text-[13px] font-bold text-gray-800 dark:text-white font-poppins leading-snug truncate group-hover:text-orange-500 transition-colors duration-300">
                                                    {{ $d['name'] }}
                                                </h4>
                                            @else
                                                <h4 class="text-[13px] font-semibold text-gray-400 dark:text-gray-600 font-poppins leading-snug italic">
                                                    {{ __('messages.org_vacant') }}
                                                </h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ====================== 03 · STRUKTUR WILAYAH ====================== --}}
        <div class="mb-16">

            <div class="flex items-center gap-4 mb-10" data-aos="fade-up">
                <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center shadow-lg shadow-orange-500/30">
                    <i class="fa-solid fa-map-location-dot text-white text-sm"></i>
                </div>
                <div class="leading-tight">
                    <span class="font-poppins font-bold text-lg text-gray-900 dark:text-white">
                        {{ __('messages.org_wilayah_title') }}
                    </span>
                    <span class="mx-2 text-gray-300 dark:text-white/20">·</span>
                    <span class="text-orange-500 dark:text-orange-400 text-sm font-semibold">
                        {{ __('messages.org_wilayah_subtitle') }}
                    </span>
                </div>
                <div class="flex-1 h-px bg-gradient-to-r from-orange-500/25 via-orange-500/10 to-transparent"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                @foreach($wilayah as $wIndex => $w)
                <div data-aos="fade-up" data-aos-delay="{{ $wIndex * 80 }}"
                     class="relative rounded-3xl border border-gray-100 dark:border-white/5 bg-gray-50/60 dark:bg-[#0f0f11] overflow-hidden transition-all duration-500 hover:border-orange-500/30">

                    {{-- Header wilayah --}}
                    <div class="relative px-6 pt-6 pb-5 border-b border-gray-100 dark:border-white/5">
                        <div class="absolute top-0 left-0 w-full h-[2.5px] bg-gradient-to-r from-orange-400 via-orange-500 to-transparent"></div>
                        <div class="text-[10px] font-black uppercase tracking-[0.3em] text-orange-500 dark:text-orange-400 mb-3">
                            {{ $w['title'] }}
                        </div>
                        <div class="group flex items-center gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-500/25 flex items-center justify-center font-poppins font-black text-sm tracking-wider">
                                {{ $initials($w['lead']['name']) }}
                            </div>
                            <div class="min-w-0">
                                <div class="text-[9px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-1 leading-none">
                                    {{ $w['lead']['role'] }}
                                </div>
                                <h4 class="text-[15px] font-bold text-gray-800 dark:text-white font-poppins leading-snug truncate">
                                    {{ $w['lead']['name'] }}
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Daftar pengurus --}}
                    <ul class="divide-y divide-gray-100 dark:divide-white/5">
                        @foreach($w['members'] as $m)
                        <li class="group flex items-center justify-between gap-4 px-6 py-3.5 transition-colors duration-300 hover:bg-orange-500/5">
                            <span class="text-[10px] font-black uppercase tracking-wider text-gray-400 dark:text-gray-500 leading-tight">
                                {{ $m['role'] }}
                            </span>
                            <span class="text-[13px] font-bold text-gray-800 dark:text-white font-poppins text-right leading-snug group-hover:text-orange-500 transition-colors duration-300">
                                {{ $m['name'] }}
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ====================== FOOTER NOTE ====================== --}}
        <div data-aos="fade-up" class="text-center">
            <p class="text-xs font-semibold text-gray-400 dark:text-gray-600 tracking-wide">
                {{ __('messages.org_footnote') }}
            </p>
        </div>

    </div>
</section>

@endsection
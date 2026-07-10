{{-- FOOTER SECTION --}}
<footer
    class="bg-white dark:bg-gray-950 pt-24 pb-12 px-6 md:px-20 transition-colors duration-500 border-t border-gray-100 dark:border-white/5">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-20">

            {{-- Brand Column --}}
            <div class="md:col-span-5">
                <div class="flex items-center gap-4 mb-8">
                    <div
                        class="w-12 h-12 bg-orange-500 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-orange-500/20 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        A
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl text-slate-900 dark:text-white leading-none tracking-tight">ACMI
                        </h3>
                        <p
                            class="text-[10px] text-gray-400 dark:text-gray-500 uppercase tracking-widest mt-1.5 font-semibold italic">
                            Asosiasi CEO Mastermind Indonesia</p>
                    </div>
                </div>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed max-w-sm mb-8 font-poppins">
                    {{ __('messages.hero_desc') }}
                </p>

                {{-- Social Media --}}
                <div class="flex gap-4">
                    <a href="https://linkedin.com/company/acmiofficial" target="_blank"
                        class="w-10 h-10 border border-gray-200 dark:border-white/10 rounded-xl flex items-center justify-center text-gray-400 dark:text-gray-500 hover:text-white hover:bg-[#0077b5] hover:border-[#0077b5] transition-all duration-300 hover:-translate-y-1 shadow-sm">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.instagram.com/acmi_official/" target="_blank"
                        class="w-10 h-10 border border-gray-200 dark:border-white/10 rounded-xl flex items-center justify-center text-gray-400 dark:text-gray-500 hover:text-white hover:bg-gradient-to-tr hover:from-[#f9ce34] hover:via-[#ee2a7b] hover:to-[#6228d7] hover:border-transparent transition-all duration-300 hover:-translate-y-1 shadow-sm">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com/@acmiofficial" target="_blank"
                        class="w-10 h-10 border border-gray-200 dark:border-white/10 rounded-xl flex items-center justify-center text-gray-400 dark:text-gray-500 hover:text-white hover:bg-[#ff0000] hover:border-[#ff0000] transition-all duration-300 hover:-translate-y-1 shadow-sm">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="md:col-span-3">
                <h4
                    class="font-bold text-slate-900 dark:text-white mb-8 font-poppins relative inline-block text-sm uppercase tracking-wider">
                    {{ __('messages.tautan') }}
                    <span class="absolute -bottom-2 left-0 w-6 h-1 bg-orange-500 rounded-full"></span>
                </h4>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ app()->getLocale() == 'id' ? route('id.dewan') : route('en.board') }}"
                            class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group">
                            <i
                                class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i>
                            {{ __('messages.nav_board') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ app()->getLocale() == 'id' ? route('id.produk') : route('en.products') }}"
                            class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group">
                            <i
                                class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i>
                            {{ __('messages.nav_products') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ app()->getLocale() == 'id' ? route('id.galeri') : route('en.gallery') }}"
                            class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group">
                            <i
                                class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i>
                            {{ __('messages.nav_gallery') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ app()->getLocale() == 'id' ? route('id.manajer') : route('en.manager') }}"
                            class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group">
                            <i
                                class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i>
                            {{ __('messages.nav_manager') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ app()->getLocale() == 'id' ? route('id.artikel') : route('en.ontopic') }}"
                            class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group">
                            <i
                                class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i>
                            {{ __('messages.nav_ontopic') }}
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="md:col-span-4">
                <h4
                    class="font-bold text-slate-900 dark:text-white mb-8 font-poppins relative inline-block text-sm uppercase tracking-wider">
                    {{ __('messages.membership_contact') }}
                    <span class="absolute -bottom-2 left-0 w-6 h-1 bg-orange-500 rounded-full"></span>
                </h4>
                <ul class="space-y-6">
                    <li class="flex items-start gap-4 group">
                        <div
                            class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-500 transition-all duration-300">
                            <i
                                class="fa-solid fa-location-dot text-orange-500 group-hover:text-white transition-colors"></i>
                        </div>
                        <span class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <strong class="text-slate-800 dark:text-gray-200 block mb-1">Sekretariat ACMI</strong>
                            Menara 165, Lantai 4 Unit B, Jl. TB Simatupang No.Kav. 1, Cilandak Tim., Pasar Minggu,
                            Jakarta Selatan, 12560.
                        </span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div
                            class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-500 transition-all duration-300">
                            <i
                                class="fa-regular fa-envelope text-orange-500 group-hover:text-white transition-colors"></i>
                        </div>
                        <a href="mailto:acmi.ceo@gmail.com"
                            class="text-gray-500 dark:text-gray-400 text-sm font-medium group-hover:text-orange-500 transition-colors">
                            acmi.ceo@gmail.com
                        </a>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div
                            class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-500 transition-all duration-300">
                            <i
                                class="fa-brands fa-whatsapp text-orange-500 group-hover:text-white transition-colors"></i>
                        </div>
                        <a href="https://wa.me/6287889806080" target="_blank"
                            class="text-gray-500 dark:text-gray-400 text-sm font-medium group-hover:text-orange-500 transition-colors">
                            +62 878-8980-6080 (Ratna Suci)
                        </a>
                        <a href="https://wa.me/6289506543752" target="_blank"
                            class="text-gray-500 dark:text-gray-400 text-sm font-medium group-hover:text-orange-500 transition-colors">
                            +62 895-0654-3752 (Paula)
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- Bottom Copyright --}}
        <div
            class="pt-10 border-t border-gray-100 dark:border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
            <div class="space-y-1">
                <p class="text-gray-400 dark:text-gray-500 text-[10px] font-poppins uppercase tracking-wider">
                    © {{ date('Y') }} Asosiasi CEO Mastermind Indonesia. All rights reserved.
                </p>
                <div class="flex gap-4 justify-center md:justify-start">
                    <a href="#"
                        class="text-[9px] uppercase tracking-tighter text-gray-400 hover:text-orange-500 transition-colors font-semibold">Privacy
                        Policy</a>
                    <a href="#"
                        class="text-[9px] uppercase tracking-tighter text-gray-400 hover:text-orange-500 transition-colors font-semibold">Terms
                        of Service</a>
                </div>
            </div>
            <p
                class="text-orange-500/80 dark:text-orange-400 text-[10px] md:text-xs italic font-serif tracking-[0.3em] uppercase font-bold">
                "{{ __('messages.hero_title_1') }} {{ __('messages.hero_title_2') }}"
            </p>
        </div>

    </div>
</footer>

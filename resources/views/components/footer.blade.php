{{-- FOOTER SECTION --}}
<footer class="bg-orange-500 dark:bg-gray-950 pt-24 pb-12 px-6 md:px-20 transition-colors duration-500 border-t border-orange-500 dark:border-white/5">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-20">
            
            {{-- Brand Column --}}
            <div class="md:col-span-5">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-orange-500 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-orange-500/20 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        A
                    </div>
                    <div>
                        <h3 class="font-bold text-2xl text-slate-900 dark:text-white leading-none tracking-tight">ACMI</h3>
                        <p class="text-[10px] text-gray-400 dark:text-gray-500 uppercase tracking-widest mt-1.5 font-semibold italic">Asosiasi CEO Mastermind Indonesia</p>
                    </div>
                </div>
                {{-- Mengambil deskripsi dari hero_desc atau membership_desc agar selaras --}}
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed max-w-sm mb-8 font-poppins">
                    {{ __('messages.hero_desc') }}
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 border border-gray-200 dark:border-white/10 rounded-xl flex items-center justify-center text-gray-400 dark:text-gray-500 hover:text-orange-500 hover:border-orange-500 dark:hover:border-orange-500 transition-all duration-300 hover:-translate-y-1">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border border-gray-200 dark:border-white/10 rounded-xl flex items-center justify-center text-gray-400 dark:text-gray-500 hover:text-orange-500 hover:border-orange-500 dark:hover:border-orange-500 transition-all duration-300 hover:-translate-y-1">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 border border-gray-200 dark:border-white/10 rounded-xl flex items-center justify-center text-gray-400 dark:text-gray-500 hover:text-orange-500 hover:border-orange-500 dark:hover:border-orange-500 transition-all duration-300 hover:-translate-y-1">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="md:col-span-3">
                <h4 class="font-bold text-slate-900 dark:text-white mb-8 font-poppins relative inline-block text-sm uppercase tracking-wider">
                    {{-- Judul Menu --}}
                    {{ __('messages.tautan') }}
                    <span class="absolute -bottom-2 left-0 w-6 h-1 bg-orange-500 rounded-full"></span>
                </h4>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group"><i class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> {{ __('messages.nav_profile') }}</a></li>
                    <li><a href="#" class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group"><i class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> {{ __('messages.nav_board') }}</a></li>
                    <li><a href="#" class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group"><i class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> {{ __('messages.nav_members') }}</a></li>
                    <li><a href="#" class="text-gray-500 dark:text-gray-400 hover:text-orange-500 dark:hover:text-orange-500 text-sm transition-colors flex items-center gap-2 group"><i class="fa-solid fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> {{ __('messages.faq_badge') }}</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="md:col-span-4">
                <h4 class="font-bold text-slate-900 dark:text-white mb-8 font-poppins relative inline-block text-sm uppercase tracking-wider">
                    {{ __('messages.membership_contact') }}
                    <span class="absolute -bottom-2 left-0 w-6 h-1 bg-orange-500 rounded-full"></span>
                </h4>
                <ul class="space-y-6">
                    <li class="flex items-start gap-4 group">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-500 transition-colors">
                            <i class="fa-solid fa-location-dot text-orange-500 group-hover:text-white transition-colors"></i>
                        </div>
                        <span class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            <strong class="text-slate-800 dark:text-gray-200 block mb-1">Sekretariat ACMI</strong>
                            {{ __('messages.asal') }}
                        </span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-500 transition-colors">
                            <i class="fa-regular fa-envelope text-orange-500 group-hover:text-white transition-colors"></i>
                        </div>
                        <span class="text-gray-500 dark:text-gray-400 text-sm font-medium group-hover:text-orange-500 transition-colors">info@acmi.or.id</span>
                    </li>
                    <li class="flex items-center gap-4 group">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-500 transition-colors">
                            <i class="fa-solid fa-phone text-orange-500 group-hover:text-white transition-colors"></i>
                        </div>
                        <span class="text-gray-500 dark:text-gray-400 text-sm font-medium group-hover:text-orange-500 transition-colors">+62 21 1234 567</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Copyright --}}
        <div class="pt-10 border-t border-gray-100 dark:border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
            <div class="space-y-1">
                <p class="text-gray-400 dark:text-gray-500 text-[10px] font-poppins uppercase tracking-wider">
                    © 2026 Asosiasi CEO Mastermind Indonesia. All rights reserved.
                </p>
                <div class="flex gap-4 justify-center md:justify-start">
                    <a href="#" class="text-[9px] uppercase tracking-tighter text-gray-400 hover:text-orange-500 transition-colors">Privacy Policy</a>
                    <a href="#" class="text-[9px] uppercase tracking-tighter text-gray-400 hover:text-orange-500 transition-colors">Terms of Service</a>
                </div>
            </div>
            <p class="text-orange-500/80 dark:text-orange-400 text-[10px] md:text-xs italic font-serif tracking-[0.3em] uppercase font-bold">
                "{{ __('messages.hero_title_1') }} {{ __('messages.hero_title_2') }}"
            </p>
        </div>
    </div>
</footer>
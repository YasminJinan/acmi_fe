@extends('layouts.app')

@section('title', app()->getLocale() == 'id' ? 'Event & Kegiatan ACMI' : 'ACMI Events')

@section('content')
<div class="pt-16 md:pt-24">
    {{-- EVENT SECTION --}}
    <section class="bg-white dark:bg-[#0a0a0b] py-20 px-6 md:px-10 transition-colors duration-500 overflow-hidden relative" id="events-section"
        x-data="{
            filter: 'upcoming',
            events: @js($events),
            get filteredEvents() {
                const now = new Date();
                return this.events.filter(e => {
                    // Fix date parsing for cross-browser support (replace space with T)
                    const dateStr = e.starts_at ? e.starts_at.replace(' ', 'T') : '';
                    const eventDate = new Date(dateStr);
                    if (this.filter === 'upcoming') return eventDate >= now;
                    if (this.filter === 'past') return eventDate < now;
                    return true;
                });
            }
        }">
        
        <div class="max-w-7xl mx-auto">
            
            {{-- Header --}}
            <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-orange-500/30 bg-orange-500/10 text-orange-500 dark:text-orange-400 text-[11px] font-bold mb-6 shadow-sm uppercase tracking-widest font-poppins">
                    <i class="fa-regular fa-calendar-check text-[12px]"></i>
                    <span>{{ app()->getLocale() == 'id' ? 'Event Eksklusif' : 'Exclusive Events' }}</span>
                </div>
                
                <h2 class="text-4xl md:text-5xl font-poppins font-bold text-gray-900 dark:text-white leading-tight tracking-tight mb-4">
                    {{ app()->getLocale() == 'id' ? 'Event & ' : 'ACMI ' }}<span class="text-orange-500">{{ app()->getLocale() == 'id' ? 'Kegiatan ACMI' : 'Events' }}</span>
                </h2>
                <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base font-poppins leading-relaxed max-w-2xl mx-auto">
                    {{ app()->getLocale() == 'id' ? 'Jadilah bagian dari event eksklusif ACMI yang dirancang untuk mengembangkan wawasan, jaringan, dan kapasitas kepemimpinan Anda.' : 'Be part of exclusive ACMI events designed to develop your insights, network, and leadership capacity.' }}
                </p>
            </div>

            {{-- Filter Tabs --}}
            <div class="flex justify-center gap-3 mb-10" data-aos="fade-up">
                <button @click="filter = 'upcoming'" 
                        :class="filter === 'upcoming' ? 'bg-orange-500 text-white border-orange-500 shadow-md shadow-orange-500/20' : 'bg-transparent text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 hover:text-gray-900 dark:hover:text-white hover:border-gray-400 dark:hover:border-gray-500'"
                        class="px-6 py-2 rounded-full border text-sm font-semibold font-poppins transition-all duration-300">
                    {{ app()->getLocale() == 'id' ? 'Akan Datang' : 'Upcoming' }}
                </button>
                <button @click="filter = 'past'" 
                        :class="filter === 'past' ? 'bg-orange-500 text-white border-orange-500 shadow-md shadow-orange-500/20' : 'bg-transparent text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 hover:text-gray-900 dark:hover:text-white hover:border-gray-400 dark:hover:border-gray-500'"
                        class="px-6 py-2 rounded-full border text-sm font-semibold font-poppins transition-all duration-300">
                    {{ app()->getLocale() == 'id' ? 'Selesai' : 'Past' }}
                </button>
                <button @click="filter = 'all'" 
                        :class="filter === 'all' ? 'bg-orange-500 text-white border-orange-500 shadow-md shadow-orange-500/20' : 'bg-transparent text-gray-500 dark:text-gray-400 border-gray-300 dark:border-gray-700 hover:text-gray-900 dark:hover:text-white hover:border-gray-400 dark:hover:border-gray-500'"
                        class="px-6 py-2 rounded-full border text-sm font-semibold font-poppins transition-all duration-300">
                    {{ app()->getLocale() == 'id' ? 'Semua' : 'All' }}
                </button>
            </div>

            {{-- Grid Events --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <template x-for="event in filteredEvents" :key="event.id">
                    <div @click="window.location.href = '{{ app()->getLocale() == 'id' ? route('id.gabung') : route('en.join') }}'" class="cursor-pointer group bg-gray-50 dark:bg-[#111116] rounded-[2rem] overflow-hidden border border-gray-200 dark:border-white/5 transition-all duration-500 hover:border-orange-500/50 dark:hover:border-orange-500/30 hover:shadow-xl hover:shadow-orange-500/10 flex flex-col h-full" data-aos="fade-up">
                        
                        {{-- Image Placeholder / Pattern --}}
                        <div class="relative h-48 w-full bg-gray-200 dark:bg-[#1a1a24] overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-50 dark:from-[#111116] to-transparent z-10"></div>
                            
                            {{-- Event Type Badge --}}
                            <div class="absolute top-5 left-5 z-20">
                                <span class="bg-orange-500 text-white text-[10px] font-black px-3 py-1.5 rounded-lg uppercase tracking-widest shadow-lg"
                                      x-text="event.type">
                                </span>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6 md:p-8 flex flex-col flex-grow relative z-20 -mt-8">
                            <h3 class="text-xl md:text-2xl font-poppins font-bold text-gray-900 dark:text-white mb-3 group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors"
                                x-text="event.title">
                            </h3>
                            
                            {{-- Meta Info --}}
                            <div class="flex flex-wrap gap-x-4 gap-y-2 mb-4 text-xs font-poppins text-gray-600 dark:text-gray-400">
                                <div class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-clock text-orange-500"></i>
                                    <span x-text="new Date(event.starts_at.replace(' ', 'T')).toLocaleTimeString('{{ app()->getLocale() }}-{{ strtoupper(app()->getLocale()) }}', {hour: '2-digit', minute:'2-digit'}) + ' {{ app()->getLocale() == 'id' ? 'WIB' : '' }}'"></span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <i class="fa-solid fa-location-dot text-orange-500"></i>
                                    <span x-text="event.location"></span>
                                </div>
                            </div>
                            
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-poppins leading-relaxed mb-6 line-clamp-2" x-text="event.description"></p>

                            <div class="mt-auto pt-5 border-t border-gray-200 dark:border-white/5 flex items-center justify-between">
                                <div class="flex items-center gap-3 text-xs font-poppins text-gray-600 dark:text-gray-400">
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-solid fa-users text-gray-400 dark:text-gray-500"></i>
                                        <span x-text="event.attendees_count"></span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-solid fa-crown text-orange-500"></i>
                                        <span>{{ app()->getLocale() == 'id' ? 'Eksklusif Anggota' : 'Member Exclusive' }}</span>
                                    </div>
                                </div>
                                
                                <a href="{{ app()->getLocale() == 'id' ? route('id.gabung') : route('en.join') }}" class="text-orange-600 dark:text-orange-500 hover:text-orange-700 dark:hover:text-orange-400 text-xs font-bold font-poppins flex items-center gap-2 group/link">
                                    {{ app()->getLocale() == 'id' ? 'Daftar Sekarang' : 'Register Now' }}
                                    <i class="fa-solid fa-arrow-right transition-transform group-hover/link:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
                
                {{-- Empty State --}}
                <div x-show="filteredEvents.length === 0" class="col-span-1 md:col-span-2 text-center py-20" x-cloak>
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-white/5 text-gray-400 dark:text-gray-500 mb-4">
                        <i class="fa-solid fa-calendar-xmark text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white font-poppins">{{ app()->getLocale() == 'id' ? 'Belum ada event' : 'No events available' }}</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ app()->getLocale() == 'id' ? 'Nantikan event menarik dari kami selanjutnya.' : 'Stay tuned for our upcoming exciting events.' }}</p>
                </div>
            </div>
            
        </div>
    </section>
</div>
@endsection

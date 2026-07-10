@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-[#0a0c14] text-gray-900 dark:text-white pt-28 pb-20 px-4 md:px-10 font-sans transition-colors duration-500">
        <div class="max-w-7xl mx-auto">
            <a href="{{ app()->getLocale() == 'id' ? route('id.produk') : route('en.products') }}" class="flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mb-8 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Produk
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                <div class="lg:col-span-6 space-y-7">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-800">
                        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full h-[300px]  object-cover">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($product->gallery as $img)
                            @if ($img !== $product->image)
                                <div class="rounded-2xl overflow-hidden h-40 border border-gray-200 dark:border-gray-800">
                                    <img src="{{ $img }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="bg-white dark:bg-[#111420] border border-gray-200 dark:border-gray-800 rounded-3xl p-8 shadow-sm">
                        <h3 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">Fitur Unggulan</h3>
                        <ul class="space-y-4">
                            @foreach ($product->features as $feature)
                                <li class="flex items-center text-gray-700 dark:text-gray-300">
                                    <span class="bg-orange-500/10 p-1 rounded-full mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    {{ $feature }}
                                </li>
                            @endforeach
                            <li class="flex items-center text-gray-700 dark:text-gray-300">
                                <span class="bg-orange-500/10 p-1 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span>
                                ROI Calculator
                            </li>
                            <li class="flex items-center text-gray-700 dark:text-gray-300">
                                <span class="bg-orange-500/10 p-1 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </span>
                                Carbon Credit Trading
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <span
                            class="bg-orange-50 dark:bg-orange-500/20 text-orange-600 dark:text-orange-400 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest border border-orange-200 dark:border-orange-500/30">
                            {{ is_array($product->category) ? implode(', ', $product->category) : $product->category }}
                        </span>
                        <h1 class="text-5xl font-poppins font-bold mt-4 mb-2 leading-tight text-gray-900 dark:text-white">{{ $product->title }}</h1>
                        <p class="text-gray-600 dark:text-gray-400 text-lg mb-2">{{ $product->company_name }}</p>
                        <p class="text-sm text-gray-500 mb-6">CEO: <span
                                class="text-gray-800 dark:text-gray-300 font-medium">{{ $product->ceo_name }}</span></p>

                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed italic border-l-4 border-orange-500 pl-4">
                            "{{ $product->description }}"
                        </p>
                    </div>

                    <div class="bg-white dark:bg-[#111420] border border-gray-200 dark:border-gray-800 rounded-3xl p-8 space-y-5 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <a href="{{ $product->website }}"
                                class="flex items-center text-gray-600 dark:text-gray-400 hover:text-orange-500 transition">
                                <i class="fas fa-globe w-8 text-orange-500 text-xl"></i>
                                {{ str_replace(['https://', 'http://'], '', $product->website) }}
                            </a>
                            <div class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-envelope w-8 text-orange-500 text-xl"></i>
                                contact@energihijau.co.id
                            </div>
                            <div class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-phone w-8 text-orange-500 text-xl"></i>
                                +62 21 555 0202
                            </div>
                            <div class="flex items-start text-gray-600 dark:text-gray-400">
                                <i class="fas fa-map-marker-alt w-8 text-orange-500 text-xl mt-1"></i>
                                <span>{{ $product->address }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-[#111420] border border-gray-200 dark:border-gray-800 rounded-3xl p-8 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-6">Hubungi Perusahaan</h3>
                        <form class="space-y-4">
                            <input type="text" placeholder="Nama Lengkap"
                                class="w-full bg-gray-50 dark:bg-[#0a0c14] border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 text-gray-900 dark:text-white transition">
                            <input type="email" placeholder="Email"
                                class="w-full bg-gray-50 dark:bg-[#0a0c14] border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 text-gray-900 dark:text-white transition">
                            <input type="tel" placeholder="Nomor Telepon"
                                class="w-full bg-gray-50 dark:bg-[#0a0c14] border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 text-gray-900 dark:text-white transition">
                            <textarea rows="4" placeholder="Pesan Anda..."
                                class="w-full bg-gray-50 dark:bg-[#0a0c14] border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-orange-500 text-gray-900 dark:text-white transition"></textarea>

                            <button
                                class="w-full bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700 text-white font-bold py-4 rounded-xl flex items-center justify-center space-x-2 transition transform active:scale-95 shadow-lg shadow-orange-500/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                <span>Kirim Pesan</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

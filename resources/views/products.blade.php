@extends('layouts.app')
@section('title', 'Products & Services — ACMI')
@section('meta_description', 'Temukan berbagai produk dan layanan eksklusif ACMI untuk mendukung pertumbuhan bisnis dan kepemimpinan Anda.')
@section('meta_keywords', 'acmi products, layanan acmi, program ceo')
@section('canonical', url('/products'))

@section('content')

{{-- SECTION PRODUK ANGGOTA --}}
<section class="bg-gray-50 dark:bg-[#050505] py-16 px-6 md:px-10 transition-colors duration-500 overflow-hidden"
        x-data="{
            search: '',
            category: 'Semua',
            products: @js($products),
            get filteredProducts() {
                return this.products.filter(p => {
                    const matchSearch = p.title.toLowerCase().includes(this.search.toLowerCase()) ||
                        p.company_name.toLowerCase().includes(this.search.toLowerCase());
                    const matchCategory = this.category === 'Semua' ||
                        (Array.isArray(p.category) ? p.category.includes(this.category) : p.category === this.category);
                    return matchSearch && matchCategory;
                });
            }
        }">

        <div class="max-w-7xl mx-auto">

            {{-- Header --}}
            <div class="text-center max-w-3xl mx-auto mb-10" data-aos="fade-up">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-[10px] font-semibold mb-4 border border-orange-100 dark:border-orange-500/20">
                    <i class="fa-solid fa-box-open animate-pulse"></i> Produk Anggota
                </div>
                <h2 class="text-5xl md:text-5xl font-semibold text-gray-900 dark:text-white leading-tight">
                    Produk & Layanan <br>
                    <span class="text-orange-500 font-serif italic font-bold">Anggota ACMI</span>
                </h2>

                {{-- Search & Filter --}}
                <div class="mt-6 flex flex-col md:flex-row gap-3 justify-center">
                    <div class="relative group md:w-72">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xs group-focus-within:text-orange-500 transition-colors"></i>
                        <input type="text" x-model="search" placeholder="Cari produk..."
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white text-sm transition-all">
                    </div>
                    <select x-model="category"
                        class="px-6 py-3 rounded-xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white text-sm cursor-pointer appearance-none">
                        <option value="Semua">Semua Kategori</option>
                        <option value="Software">Software</option>
                        <option value="Energi">Energi</option>
                        <option value="F&B">F&B</option>
                        <option value="Manufaktur">Manufaktur</option>
                        <option value="Properti">Properti</option>
                        <option value="Fintech">Fintech</option>
                    </select>
                </div>
            </div>

            {{-- Grid Produk --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div class="group flex flex-col" data-aos="fade-up">
                        <div
                            class="relative bg-white dark:bg-white/5 rounded-[2rem] overflow-hidden border border-gray-100 dark:border-white/10 transition-all duration-500 hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 flex flex-col h-full">

                            {{-- Image --}}
                            <div class="relative h-[180px] overflow-hidden">
                                <img :src="product.image" :alt="product.title"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-[1.5s] ease-out">
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md text-orange-600 dark:text-orange-400 text-[9px] px-3 py-1.5 rounded-lg font-black uppercase tracking-widest shadow-lg"
                                        x-text="Array.isArray(product.category) ? product.category[0] : product.category">
                                    </span>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="text-lg font-poppins font-bold text-gray-900 dark:text-white mb-2 group-hover:text-orange-500 transition-colors line-clamp-1"
                                    x-text="product.title">
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400 text-xs mb-4 line-clamp-2 leading-relaxed"
                                    x-text="product.description">
                                </p>

                                <div class="mt-auto">
                                    {{-- Business Info --}}
                                    <div
                                        class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 dark:bg-white/5 mb-4 border border-transparent group-hover:border-orange-500/20 transition-all">
                                        <div class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center text-[10px] font-black shadow-lg shadow-orange-500/20 flex-shrink-0"
                                            x-text="product.ceo_name ? product.ceo_name.charAt(0) : '?'">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-gray-900 dark:text-gray-200 font-bold text-[11px] truncate"
                                                x-text="product.company_name">
                                            </p>
                                            <p class="text-gray-400 text-[9px] uppercase tracking-tighter">
                                                CEO: <span class="text-gray-500 dark:text-gray-300"
                                                    x-text="product.ceo_name">
                                                </span>
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Button --}}
                                    <a :href="'/products/' + product.slug"
                                        class="inline-flex items-center justify-center w-full py-3 bg-slate-900 dark:bg-white/10 text-white rounded-xl text-[11px] font-bold hover:bg-orange-500 dark:hover:bg-orange-500 transition-all duration-500 group/btn">
                                        Lihat Detail Bisnis
                                        <i
                                            class="fa-solid fa-arrow-right ml-2 text-[10px] transition-transform group-hover/btn:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </template>

                {{-- Empty State --}}
                <div x-show="filteredProducts.length === 0" x-cloak class="col-span-3 text-center py-24">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-white/5 text-gray-400 mb-6">
                        <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Produk Tidak Ditemukan</h3>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Coba gunakan kata kunci lain.</p>
                </div>
            </div>

        </div>

        <style>
            [x-cloak] {
                display: none !important;
            }

            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #f97316;
                border-radius: 10px;
            }
        </style>
    </section>
@endsection

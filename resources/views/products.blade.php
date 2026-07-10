@extends('layouts.app')
@section('title', 'Products & Services — ACMI')
@section('meta_description', 'Temukan berbagai produk dan layanan eksklusif ACMI untuk mendukung pertumbuhan bisnis dan kepemimpinan Anda.')
@section('meta_keywords', 'acmi products, layanan acmi, program ceo')
@section('canonical', url('/products'))

@section('content')

{{-- SECTION PRODUK ANGGOTA --}}
<section class="bg-gray-50 dark:bg-[#050505] pt-32 pb-16 px-6 md:px-10 transition-colors duration-500 overflow-hidden relative"
    x-data="{
        search: '',
        category: 'Semua',
        products: @js($products),
        page: 1,
        perPage: 12,
        
        // Memfilter produk berdasarkan input search & kategori
        get filteredProducts() {
            return this.products.filter(p => {
                const matchSearch = p.title.toLowerCase().includes(this.search.toLowerCase()) ||
                    p.company_name.toLowerCase().includes(this.search.toLowerCase());
                const matchCategory = this.category === 'Semua' ||
                    (Array.isArray(p.category) ? p.category.includes(this.category) : p.category === this.category);
                return matchSearch && matchCategory;
            });
        },

        // Memotong hasil filter agar hanya tampil 6 item sesuai halaman aktif
        get paginatedProducts() {
            let start = (this.page - 1) * this.perPage;
            let end = start + this.perPage;
            return this.filteredProducts.slice(start, end);
        },

        // Menghitung total jumlah halaman yang tersedia
        get totalPages() {
            return Math.ceil(this.filteredProducts.length / this.perPage);
        }
    }"
    {{-- Jika user mengetik pencarian baru atau ganti kategori, halaman otomatis reset ke angka 1 --}}
    x-init="$watch('search', value => page = 1); $watch('category', value => page = 1)">

    {{-- Background Decoration --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">

        {{-- Header --}}
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                <i class="fa-solid fa-box-open animate-pulse"></i>
                {{ __('messages.products_badge') }}
            </div>

            <h2 class="text-4xl md:text-5xl font-regular text-gray-900 dark:text-white leading-tight">
                {{ __('messages.products_title_1') }} <br>
                <span class="text-orange-500 font-serif italic font-bold">{{ __('messages.products_title_2') }}</span>
            </h2>

            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm md:text-base">
                {{ __('messages.products_desc') }}
            </p>

            {{-- Search & Filter --}}
            <div class="mt-10 flex flex-col md:flex-row gap-4 justify-center">

                <div class="relative group md:w-80">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-orange-500 transition-colors"></i>
                    <input type="text" x-model="search"
                        placeholder="{{ __('messages.products_search_placeholder') }}"
                        class="w-full pl-12 pr-6 py-4 rounded-2xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white transition-all">
                </div>

                <select x-model="category"
                    class="px-6 py-4 rounded-2xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white cursor-pointer appearance-none">
                    @foreach(__('messages.products_categories') as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>

            </div>
        </div>

        {{-- Grid Produk --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- LOOPING DIGANTI MENGGUNAKAN paginatedProducts --}}
            <template x-for="product in paginatedProducts" :key="product.id">
                <div class="group flex flex-col" data-aos="fade-up">
                    <div class="relative bg-white dark:bg-white/5 rounded-[2rem] overflow-hidden border border-gray-100 dark:border-white/20 transition-all duration-500 hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1.5 flex flex-col h-full">

                        {{-- Image --}}
                        <div class="relative h-[180px] overflow-hidden">
                            <img :src="product.image" :alt="product.title"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-[1.5s] ease-out">
                            <div class="absolute top-4 left-4">
                                <span class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md text-orange-600 dark:text-orange-400 text-[9px] px-3 py-1.5 rounded-lg font-black uppercase tracking-widest shadow-lg"
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
                                <div class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 dark:bg-white/5 mb-4 border border-transparent group-hover:border-orange-500/20 transition-all">
                                    <div class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center text-[10px] font-black shadow-lg shadow-orange-500/20 flex-shrink-0"
                                        x-text="product.ceo_name ? product.ceo_name.charAt(0) : '?'">
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-gray-900 dark:text-gray-200 font-bold text-[11px] truncate"
                                            x-text="product.company_name">
                                        </p>
                                        <p class="text-gray-400 text-[9px] uppercase tracking-tighter">
                                            {{ __('messages.products_ceo_label') }}:
                                            <span class="text-gray-500 dark:text-gray-300" x-text="product.ceo_name"></span>
                                        </p>
                                    </div>
                                </div>

                                {{-- Button --}}
                                <a :href="'{{ app()->getLocale() == 'id' ? '/id/produk/' : '/en/products/' }}' + product.slug"
                                    class="inline-flex items-center justify-center w-full py-3 bg-slate-900 dark:bg-white/10 text-white rounded-xl text-[11px] font-bold hover:bg-orange-500 dark:hover:bg-orange-500 transition-all duration-500 group/btn">
                                    {{ __('messages.products_detail_btn') }}
                                    <i class="fa-solid fa-arrow-right ml-2 text-[10px] transition-transform group-hover/btn:translate-x-1"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </template>

            {{-- Empty State --}}
            <div x-show="filteredProducts.length === 0" x-cloak class="col-span-3 text-center py-24">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-white/5 text-gray-400 mb-6">
                    <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('messages.products_empty_title') }}</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2">{{ __('messages.products_empty_desc') }}</p>
            </div>

        </div>

        {{-- NAVIGASI PAGINATION (DITAMBAHKAN DI SINI) --}}
        <div x-show="totalPages > 1" x-cloak class="mt-16 flex justify-center items-center gap-2" data-aos="fade-up">
            {{-- Tombol Prev --}}
            <button @click="if(page > 1) { page--; window.scrollTo({top: 0, behavior: 'smooth'}); }" 
                :disabled="page === 1"
                class="w-12 h-12 rounded-xl flex items-center justify-center transition-all border border-gray-200 dark:border-white/10 text-gray-600 dark:text-gray-400 hover:border-orange-500 hover:text-orange-500 disabled:opacity-30 disabled:pointer-events-none bg-white dark:bg-white/5">
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>

            {{-- Angka Halaman --}}
            <template x-for="p in totalPages" :key="p">
                <button @click="page = p; window.scrollTo({top: 0, behavior: 'smooth'});"
                    x-text="p"
                    :class="page === p 
                        ? 'bg-orange-500 text-white border-orange-500 shadow-lg shadow-orange-500/25' 
                        : 'bg-white dark:bg-white/5 text-gray-700 dark:text-gray-300 border-gray-200 dark:border-white/10 hover:border-orange-500 hover:text-orange-500'"
                    class="w-12 h-12 rounded-xl font-bold text-sm border transition-all">
                </button>
            </template>

            {{-- Tombol Next --}}
            <button @click="if(page < totalPages) { page++; window.scrollTo({top: 0, behavior: 'smooth'}); }" 
                :disabled="page === totalPages"
                class="w-12 h-12 rounded-xl flex items-center justify-center transition-all border border-gray-200 dark:border-white/10 text-gray-600 dark:text-gray-400 hover:border-orange-500 hover:text-orange-500 disabled:opacity-30 disabled:pointer-events-none bg-white dark:bg-white/5">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </button>
        </div>

    </div>

    <style>
        [x-cloak] { display: none !important; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #f97316; border-radius: 10px; }
    </style>

</section>

@endsection
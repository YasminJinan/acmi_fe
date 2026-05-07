@extends('layouts.app')

@section('content')

{{-- SECTION PRODUK ANGGOTA --}}
<section class="bg-white dark:bg-[#0a0a0b] py-24 px-6 md:px-10 transition-colors duration-500 overflow-hidden mt-10"
   x-data="{
        search: '',
        category: 'Semua',
        /* Data otomatis diambil dari ProductController */
        products: @js($products),
        
        /* Logic Filter Real-time */
        get filteredProducts() {
            return this.products.filter(p => {
                const matchSearch = p.title.toLowerCase().includes(this.search.toLowerCase()) || 
                                    p.company.toLowerCase().includes(this.search.toLowerCase());
                const matchCategory = this.category === 'Semua' || p.category === this.category;
                return matchSearch && matchCategory;
            });
        }
    }">

    <div class="max-w-7xl mx-auto">

         <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-orange-600/5 dark:bg-orange-900/10 rounded-full blur-[100px]"></div>
    </div>
        
        {{-- HEADER --}}
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-500/10 text-orange-500 text-xs font-semibold mb-6 border border-orange-100 dark:border-orange-500/20">
                <i class="fa-solid fa-box-open animate-pulse"></i> Produk Anggota
            </div>
            <h2 class="text-4xl md:text-5xl font-semibold text-gray-900 dark:text-white leading-tight">
                Produk & Layanan dari <br>
                <span class="text-orange-500 font-serif italic font-bold">Anggota ACMI</span>
            </h2>
            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm md:text-base">
                Temukan produk dan layanan berkualitas dari perusahaan yang dipimpin oleh anggota ACMI.
            </p>

            {{-- SEARCH & FILTER BAR --}}
            <div class="mt-6 flex flex-col md:flex-row gap-4 justify-center">
                <div class="relative group md:w-80">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-orange-500 transition-colors"></i>
                    <input type="text" x-model="search" placeholder="Cari produk atau perusahaan..." 
                           class="w-full pl-12 pr-6 py-4 rounded-2xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white transition-all">
                </div>
                
                <select x-model="category" 
                        class="px-8 py-4 rounded-2xl bg-gray-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-orange-500 dark:text-white cursor-pointer appearance-none">
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

        {{-- GRID PRODUK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            <template x-for="product in filteredProducts" :key="product.slug">
                <div class="group flex flex-col" data-aos="fade-up">
                    <div class="relative bg-white dark:bg-white/5 rounded-[2.5rem] overflow-hidden border border-gray-100 dark:border-white/10 transition-all duration-500 hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 flex flex-col h-full">
                        
                        {{-- Image Badge Kategori --}}
                        <div class="relative h-[240px] overflow-hidden">
                            <img :src="product.img" :alt="product.title" class="w-full h-full object-cover group-hover:scale-110 transition duration-[1.5s] ease-out">
                            <div class="absolute top-5 left-5">
                                <span class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md text-orange-600 dark:text-orange-400 text-[10px] px-4 py-2 rounded-xl font-black uppercase tracking-widest shadow-lg" x-text="product.category"></span>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-xl font-poppins font-bold text-gray-900 dark:text-white mb-2 group-hover:text-orange-500 transition-colors" x-text="product.title"></h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mb-6 line-clamp-2 leading-relaxed" x-text="product.desc"></p>
                            
                            <div class="mt-auto">
                                {{-- Business Info Card --}}
                                <div class="flex items-center gap-4 p-4 rounded-2xl bg-gray-50 dark:bg-white/5 mb-4 border border-transparent group-hover:border-orange-500/20 transition-all">
                                    <div class="w-10 h-10 rounded-full bg-orange-500 text-white flex items-center justify-center text-xs font-black shadow-lg shadow-orange-500/20" x-text="product.ceo.charAt(0)"></div>
                                    <div class="min-w-0">
                                        <p class="text-gray-900 dark:text-gray-200 font-bold text-xs truncate" x-text="product.company"></p>
                                        <p class="text-gray-400 text-[10px] uppercase tracking-tighter">CEO: <span class="text-gray-500 dark:text-gray-300" x-text="product.ceo"></span></p>
                                    </div>
                                </div>
                                
                                {{-- Tombol Detail ke Halaman Terpisah --}}
                                <a :href="'/products/' + product.slug"
                                   class="inline-flex items-center justify-center w-full py-4 bg-slate-900 dark:bg-white/10 text-white rounded-2xl text-xs font-bold hover:bg-orange-500 dark:hover:bg-orange-500 transition-all duration-500 group/btn">
                                    Lihat Detail Bisnis 
                                    <i class="fa-solid fa-arrow-right ml-2 transition-transform group-hover/btn:translate-x-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Empty State --}}
        <div x-show="filteredProducts.length === 0" x-cloak class="text-center py-24" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-white/5 text-gray-400 mb-6">
                <i class="fa-solid fa-magnifying-glass text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Produk Tidak Ditemukan</h3>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Coba gunakan kata kunci lain atau pilih kategori yang berbeda.</p>
        </div>

    </div>

    {{-- Styling Khusus untuk Scrollbar & Alpine Cloak --}}
    <style>
        [x-cloak] { display: none !important; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #f97316; border-radius: 10px; }
    </style>
</section>
@endsection
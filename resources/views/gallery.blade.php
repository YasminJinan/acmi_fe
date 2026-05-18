{{-- FULL GALLERY SECTION --}}
<section class="bg-white py-20 px-6 md:px-10" 
         x-data="{ 
            galleries: [], 
            isLoading: true,
            init() {
                fetch('http://localhost:8000/api/public/gallery')
                    .then(res => res.json())
                    .then(data => {
                        if(data.success) {
                            this.galleries = data.data;
                        }
                        this.isLoading = false;
                    });
            }
         }">
    <div class="max-w-7xl mx-auto pt-24">

        {{-- Title --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold">
                Galeri ACMI
            </h2>
            <p class="text-gray-500 mt-3">
                Dokumentasi kegiatan dan momen seru ekosistem ACMI 🎉
            </p>
        </div>

        {{-- State Loading --}}
        <template x-if="isLoading">
            <div class="flex justify-center items-center py-20">
                <i class="fa-solid fa-spinner fa-spin text-3xl text-orange-500"></i>
            </div>
        </template>

        {{-- GRID DINAMIS DARI API --}}
        <template x-if="!isLoading">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <template x-for="item in galleries" :key="item.id">
                    <div class="gallery-item group relative overflow-hidden rounded-3xl shadow-sm transition-all duration-500 hover:shadow-2xl">
                        
                        {{-- Ubah full_image_url menjadi item.image --}}
                        <img :src="item.image" 
                             class="w-full h-[300px] object-cover transition-transform duration-700 group-hover:scale-110">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent 
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-500 
                                    flex items-end p-6 text-left">
                            <p class="text-white font-poppins font-semibold" x-text="item.title || 'Momen ACMI'"></p>
                        </div>

                    </div>
                </template>

            </div>
        </template>

        {{-- State Kosong --}}
        <template x-if="!isLoading && galleries.length === 0">
            <div class="text-center py-20">
                <p class="text-gray-500">Belum ada dokumentasi galeri yang diunggah.</p>
            </div>
        </template>

    </div>
</section>
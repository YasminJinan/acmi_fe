{{-- FULL GALLERY SECTION --}}
<section class="bg-white py-20 px-6 md:px-10">
    <div class="max-w-7xl mx-auto">

        {{-- Title --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold">
                ACMI Bersama 2024
            </h2>
            <p class="text-gray-500 mt-3">
                Dokumentasi kegiatan seru ACMI 🎉
            </p>
        </div>

        {{-- DATA --}}
        @php
            $images = [
                'bersama1.jpeg',
                'bersama2.jpeg',
                'bersama3.jpeg',
                'bersama4.jpeg',
                'bersama5.jpeg',
                'bersama6.jpeg',
                'bersama7.jpeg',
                'bersama8.jpeg',
                'bersama9.jpeg',
                'bersama10.jpeg',
                'bersama11.jpeg',
                'bersama12.jpeg',
                'bersama13.jpeg',
                'bersama14.jpeg',
                'bersama15.jpeg',
                'bersama16.jpeg',
                'bersama17.jpeg',
                'bersama18.jpeg',
                'bersama19.jpeg',
                'bersama20.jpeg',
                'bersama21.jpeg',
                'bersama22.jpeg',
                'bersama23.jpeg',
            ];
        @endphp

        {{-- GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($images as $img)
            <div class="gallery-item group relative overflow-hidden rounded-3xl shadow-sm transition-all duration-500 hover:shadow-2xl" data-category="ACMI Bersama 2024">
                
                <img src="{{ asset('assets/' . $img) }}" 
                     class="w-full h-[300px] object-cover transition-transform duration-700 group-hover:scale-110">

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent 
                            opacity-0 group-hover:opacity-100 transition-opacity duration-500 
                            flex items-end p-6 text-left">
                    <p class="text-white font-poppins font-semibold">
                        Fun Match Day
                    </p>
                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>
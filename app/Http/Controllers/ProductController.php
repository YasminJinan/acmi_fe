<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Halaman Depan (Grid Produk)
     */
    public function index()
    {
        $products = $this->getRawData();
        return view('products', compact('products'));
    }

    /**
     * Halaman Detail Produk
     */
    public function show(string $slug)
    {
        $products = $this->getRawData();
        
        // Cari produk berdasarkan slug menggunakan Collection
        $product = collect($products)->firstWhere('slug', $slug);

        if (!$product) {
            abort(404);
        }

        // Return sebagai object supaya di blade bisa pakai format $product->title
        return view('products', ['product' => (object)$product]);
    }

    /**
     * Single Source of Truth - Data Utama
     * Diubah ke PUBLIC agar HomeController bisa mengambil data ini
     */
public function getRawData()
{
    return [
        [
            'title' => 'Premium Business Suite',
            'slug' => 'premium-business-suite',
            'company' => 'PT Teknologi Maju',
            'ceo' => 'Budi Santoso',
            'category' => 'Software',
            'desc' => 'Premium Business Suite adalah platform manajemen bisnis all-in-one yang menggabungkan ERP, CRM, dan analitik dalam satu ekosistem terpadu.',
            'img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2015',
            'gallery' => [
                'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070',
                'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070'
            ],
            'website' => 'https://teknologimaju.co.id',
            'address' => 'Menara BCA Lt. 35, Jakarta',
            'features' => ['ERP Terintegrasi', 'CRM & Sales Pipeline', 'Business Intelligence']
        ],
        [
            'title' => 'Green Energy Solutions',
            'slug' => 'green-energy-solutions',
            'company' => 'PT Energi Hijau Indonesia',
            'ceo' => 'Dewi Kusuma',
            'category' => 'Energi',
            'desc' => 'Green Energy Solutions menyediakan solusi energi terbarukan komprehensif mulai dari konsultasi, instalasi panel surya, hingga maintenance untuk sektor industri dan komersial.',
            'img' => 'https://images.unsplash.com/photo-1508514177221-188b1cf16e9d?q=80&w=2072',
            'gallery' => [
                'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?q=80&w=2072',
                'https://images.unsplash.com/photo-1466611653911-954ffea11271?q=80&w=2070'
            ],
            'website' => 'https://energihijau.co.id',
            'address' => 'Green Tower Lt. 20, Jakarta Selatan',
            'features' => ['Panel Surya Premium', 'Konsultasi Energi', 'Maintenance 24/7']
        ],
        [
            'title' => 'Premium Coffee Beans',
            'slug' => 'premium-coffee-beans',
            'company' => 'PT Kopi Nusantara',
            'ceo' => 'Agus Wijaya',
            'category' => 'F&B',
            'desc' => 'PT Kopi Nusantara menghadirkan biji kopi single-origin premium dari perkebunan terbaik di Aceh, Toraja, dan Flores dengan proses roasting artisanal.',
            'img' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=2000',
            'gallery' => [
                'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070',
                'https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=2070'
            ],
            'website' => 'https://kopinusantara.co.id',
            'address' => 'Jl. Sudirman Kav. 52, Jakarta',
            'features' => ['Single Origin', 'Artisanal Roasting', 'B2B Supply']
        ],
        [
            'title' => 'Smart Manufacturing System',
            'slug' => 'smart-manufacturing-system',
            'company' => 'PT Industri Cerdas',
            'ceo' => 'Ratna Permata',
            'category' => 'Manufaktur',
            'desc' => 'Smart Manufacturing System menghadirkan revolusi Industri 4.0 dengan kombinasi AI, IoT, dan robotika untuk mengoptimalkan proses produksi.',
            'img' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070',
            'gallery' => [
                'https://images.unsplash.com/photo-1565891741441-64926e441838?q=80&w=2071',
                'https://images.unsplash.com/photo-1513828583688-c52646db42da?q=80&w=2070'
            ],
            'website' => 'https://industricerdas.co.id',
            'address' => 'Kawasan Industri MM2100, Bekasi',
            'features' => ['AI Quality Control', 'IoT Monitoring', 'Predictive Maintenance']
        ],
        [
            'title' => 'Luxury Property Collection',
            'slug' => 'luxury-property-collection',
            'company' => 'PT Properti Prima',
            'ceo' => 'Herman Tanoto',
            'category' => 'Properti',
            'desc' => 'PT Properti Prima mengembangkan hunian mewah dan properti komersial premium di lokasi-lokasi strategis Indonesia dengan standar internasional.',
            'img' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2000',
            'gallery' => [
                'https://images.unsplash.com/photo-1600607687940-c52af0843990?q=80&w=2070',
                'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?q=80&w=2070'
            ],
            'website' => 'https://propertiprima.co.id',
            'address' => 'Pacific Place Lt. 42, Jakarta',
            'features' => ['Lokasi Premium', 'Desain Award-Winning', 'Smart Home']
        ],
        [
            'title' => 'Fintech Payment Gateway',
            'slug' => 'fintech-payment-gateway',
            'company' => 'PT Digital Finance',
            'ceo' => 'Linda Hartono',
            'category' => 'Fintech',
            'desc' => 'PT Digital Finance menyediakan payment gateway enterprise-grade yang mendukung berbagai metode pembayaran digital dengan keamanan tingkat bank.',
            'img' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=2000',
            'gallery' => [
                'https://images.unsplash.com/photo-1563013544-824ae1b704d3?q=80&w=2070',
                'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=2071'
            ],
            'website' => 'https://digitalfinance.co.id',
            'address' => 'Equity Tower Lt. 28, Jakarta',
            'features' => ['Multi-Payment Support', 'Bank-Grade Security', '99.99% Uptime']
        ]
    ];
}
}
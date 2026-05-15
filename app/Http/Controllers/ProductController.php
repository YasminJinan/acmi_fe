<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;

class ProductController extends Controller
{
    public function index()
    {
        $cms = new CmsApiService();
        $products = $cms->getServices();

        return view('products', compact('products'));
    }

    public function show(string $slug)
    {
        $cms = new CmsApiService();
        $products = $cms->getServices();

        $product = collect($products)->firstWhere('slug', $slug);

        if (!$product) {
            abort(404);
        }

        return view('product-detail', ['product' => (object) $product]);
    }

    // Tetap ada untuk HomeController yang masih pakai ini
    public function getRawData(): array
    {
        $cms = new CmsApiService();
        return $cms->getServices();
    }
}
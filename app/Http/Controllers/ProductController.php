<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();

        return view('products', compact('products'));
    }

    public function show(string $slug)
    {
        $product = $this->productService->findBySlug($slug);

        if (!$product) {
            abort(404);
        }

        return view('product-detail', ['product' => (object) $product]);
    }

    public function getRawData(): array
    {
        return $this->productService->getAllProducts();
    }
}
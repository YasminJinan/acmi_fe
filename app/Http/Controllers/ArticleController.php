<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public function index()
    {
        $cms = new CmsApiService();
        $articles = $cms->getArticles(request('page', 1), request('category'));
        $categories = $cms->getCategories();

        return view('ontopic', compact('articles', 'categories'));
    }

    public function show(string $slug)
    {
        // Memanggil API backend
        $response = Http::get("http://localhost:8000/api/public/articles/{$slug}");
        
        if ($response->successful() && $response->json('success')) {
            $article = $response->json('data');
            return view('ontopic-detail', compact('article'));
        }

        abort(404);
    }
    
}
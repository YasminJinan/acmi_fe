<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{
    public function index()
    {
        $cms = new CmsApiService();
        $articles = $cms->getArticles(request('page', 1), request('category'));
        $categories = $cms->getCategories();

        return view('ontopic', compact('articles', 'categories'));
    }

    public function show(string $locale, string $slug)
    {
        App::setLocale($locale); // set locale dari URL
        
        $response = Http::get("http://localhost:8000/api/public/articles/{$locale}/{$slug}");
    
        if ($response->successful() && $response->json('success')) {
            $article = $response->json('data');
            return view('ontopic-detail', compact('article', 'locale'));
        }
    
        abort(404);
    }
    
}
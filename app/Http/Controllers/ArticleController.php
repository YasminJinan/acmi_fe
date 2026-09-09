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

    public function show(string $slug)
    {
        $locale = app()->getLocale();
        $cms = new CmsApiService();
        $article = $cms->getArticle($slug, $locale);
    
        if ($article) {
            return view('ontopic-detail', compact('article', 'locale'));
        }
    
        abort(404);
    }
    
}
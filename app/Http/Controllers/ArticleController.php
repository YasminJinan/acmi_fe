<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;

class ArticleController extends Controller
{
    public function show(string $slug)
    {
        $cms = new CmsApiService();
        $article = $cms->getArticle($slug);

        if (!$article) {
            abort(404);
        }

        return view('articles.show', compact('article'));
    }
}
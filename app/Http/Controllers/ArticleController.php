<?php

namespace App\Http\Controllers;

class ArticleController extends Controller
{
    public function show(string $slug)
    {
        // Data dummy dulu, nanti diganti fetch dari CMS
        $article = [
            'title'         => 'Contoh Judul Artikel ACMI',
            'slug'          => $slug,
            'excerpt'       => 'Deskripsi singkat artikel ini untuk keperluan SEO testing ACMI.',
            'content'       => '<p>Ini konten dummy untuk testing tampilan dan SEO.</p>',
            'thumbnail_url' => asset('images/og-default.jpg'),
            'image_alt'     => 'Artikel ACMI',
            'tags'          => ['acmi', 'leadership', 'ceo'],
        ];

        return view('articles.show', compact('article'));
    }
}
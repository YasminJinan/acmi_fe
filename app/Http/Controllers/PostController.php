<?php

namespace App\Http\Controllers;
use App\Services\CmsApiService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(CmsApiService $cms) {
        $post = $cms->getPosts();
        return view('ontopic', compact('posts'));
    }

    public function show(CmsApiService $cms, $slug)
    {
        $post = $cms->getPost($slug);
        return view('ontopic-detail', compact('post'));
    }
}

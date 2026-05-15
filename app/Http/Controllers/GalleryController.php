<?php

namespace App\Http\Controllers;
use App\Services\CmsApiService;

class GalleryController extends Controller
{
    public function index()
    {
        $cms = new CmsApiService();
        $gallery = $cms->getServices();

        return view('gallery', compact('gallery'));
    }
    
    public function gallery() 
    {
        $gallery = $cms->getGallery();
        
        return view('gallery', compact('gallery'));
    }
}

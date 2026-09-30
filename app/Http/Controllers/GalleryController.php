<?php

namespace App\Http\Controllers;

use App\Services\CmsApiService;

class GalleryController extends Controller
{
    protected CmsApiService $cms;

    public function __construct(?CmsApiService $cms = null)
    {
        $this->cms = $cms ?? new CmsApiService();
    }

    public function index()
    {
        $gallery = $this->cms->getGallery();

        return view('gallery', compact('gallery'));
    }

    public function gallery()
    {
        return $this->index();
    }
}


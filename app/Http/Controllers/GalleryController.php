<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Media::published()
            ->ofType('image')
            ->inCategory('gallery')
            ->ordered()
            ->get();

        return view('gallery.index', compact('images'));
    }

    public function teachings()
    {
        $videos = Media::published()
            ->ofType('youtube')
            ->inCategory('teaching')
            ->ordered()
            ->get();

        return view('gallery.teachings', compact('videos'));
    }
}

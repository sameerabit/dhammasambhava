<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $mediaItems = Media::published()
            ->ofType('image')
            ->inCategory('gallery')
            ->ordered()
            ->paginate(12);

        return view('gallery.index', compact('mediaItems'));
    }

    public function teachings()
    {
        $mediaItems = Media::published()
            ->ofType('youtube')
            ->inCategory('teaching')
            ->ordered()
            ->paginate(9);

        return view('gallery.teachings', compact('mediaItems'));
    }
}

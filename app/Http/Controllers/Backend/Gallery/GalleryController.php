<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Backend\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('news','photos')->latest()->get();
        // return response()->json($galleries);
        return view('backend.pages.gallery.index', compact('galleries')); 
    }

    public function show($id)
    {
        $gallery = Gallery::with('news','photos')->findOrFail($id);
        // return response()->json($gallery);
        return view('backend.pages.gallery.show', compact('gallery')); 
    }
}

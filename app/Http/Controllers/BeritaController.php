<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(9);
        return view('berita.index', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $lainnya = Berita::where('id', '!=', $berita->id)->latest()->take(3)->get();
        return view('berita.show', compact('berita', 'lainnya'));
    }
}

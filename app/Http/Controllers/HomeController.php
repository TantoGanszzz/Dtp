<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(20)->get();
        return view('home', compact('beritas', 'galeris'));
    }

    public function profil()
    {
        $strukturs = \App\Models\StrukturYayasan::orderBy('urutan')->get();
        $galeris = Galeri::latest()->take(20)->get();
        return view('profil', compact('strukturs', 'galeris'));
    }

    public function kontak()
    {
        $galeris = Galeri::latest()->take(20)->get();
        return view('kontak', compact('galeris'));
    }

}

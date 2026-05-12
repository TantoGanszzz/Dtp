<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::latest();
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }
        $galeris = $query->paginate(12);
        return view('galeri', compact('galeris'));
    }

    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }
}

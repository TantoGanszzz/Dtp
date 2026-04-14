<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $galeris = \App\Models\Galeri::latest()->take(20)->get();
        return view('ppdb', compact('galeris'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required|string',
            'pilihan_sekolah' => 'required|in:SMP,SMA',
            'no_hp'           => 'required|string|max:20',
        ]);

        Ppdb::create($request->all());

        return redirect()->route('ppdb')->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }
}

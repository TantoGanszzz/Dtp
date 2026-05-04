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
        $validatedData = $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'tempat_lahir'    => 'required|string|max:100',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required|string',
            'pilihan_sekolah' => 'required|in:SMP,SMA',
            'no_hp'           => 'required|string|max:20',
            'email'           => 'required|email|max:255',
            'ijazah'          => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta_kelahiran'  => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk'              => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'surat_sehat'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $files = ['ijazah', 'akta_kelahiran', 'pas_foto', 'kk', 'surat_sehat'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $validatedData[$file] = $request->file($file)->store('ppdb_documents', 'public');
            }
        }

        Ppdb::create($validatedData);

        return redirect()->route('ppdb')->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda segera.');
    }
}

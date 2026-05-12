<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|in:kegiatan,fasilitas,event,prestasi',
            'unit'      => 'required|in:umum,smp,sma',
            'foto'      => 'required|image|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $path = $request->file('foto')->store('galeri', 'public');
        Galeri::create([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'unit'      => $request->unit,
            'foto'      => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->foto) {
            \Storage::disk('public')->delete($galeri->foto);
        }
        $galeri->delete();
        return back()->with('success', 'Foto dihapus.');
    }
}

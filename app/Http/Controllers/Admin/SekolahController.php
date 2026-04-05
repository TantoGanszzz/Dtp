<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::all();
        return view('admin.sekolah.index', compact('sekolahs'));
    }

    public function create()
    {
        return view('admin.sekolah.form', ['sekolah' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jenjang'   => 'required|in:SMP,SMA',
            'nama'      => 'required|string|max:255',
            'profil'    => 'required',
            'fasilitas' => 'required',
            'jurusan'   => 'nullable',
            'data_guru' => 'nullable',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('sekolah', 'public');
        }

        Sekolah::create($data);
        return redirect()->route('admin.sekolah.index')->with('success', 'Data sekolah ditambahkan.');
    }

    public function edit(Sekolah $sekolah)
    {
        return view('admin.sekolah.form', compact('sekolah'));
    }

    public function update(Request $request, Sekolah $sekolah)
    {
        $data = $request->validate([
            'jenjang'   => 'required|in:SMP,SMA',
            'nama'      => 'required|string|max:255',
            'profil'    => 'required',
            'fasilitas' => 'required',
            'jurusan'   => 'nullable',
            'data_guru' => 'nullable',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($sekolah->foto) \Storage::disk('public')->delete($sekolah->foto);
            $data['foto'] = $request->file('foto')->store('sekolah', 'public');
        }

        $sekolah->update($data);
        return redirect()->route('admin.sekolah.index')->with('success', 'Data sekolah diperbarui.');
    }

    public function destroy(Sekolah $sekolah)
    {
        if ($sekolah->foto) \Storage::disk('public')->delete($sekolah->foto);
        $sekolah->delete();
        return back()->with('success', 'Data dihapus.');
    }
}

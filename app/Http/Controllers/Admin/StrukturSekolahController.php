<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\StrukturSekolah;
use Illuminate\Http\Request;

class StrukturSekolahController extends Controller
{
    public function index(Sekolah $sekolah)
    {
        $strukturs = $sekolah->strukturs;
        return view('admin.struktur-sekolah.index', compact('sekolah', 'strukturs'));
    }

    public function create(Sekolah $sekolah)
    {
        return view('admin.struktur-sekolah.form', ['sekolah' => $sekolah, 'struktur' => null]);
    }

    public function store(Request $request, Sekolah $sekolah)
    {
        $data = $request->validate([
            'jabatan' => 'required|string|max:100',
            'nama'    => 'required|string|max:255',
            'urutan'  => 'required|integer',
            'foto'    => 'nullable|image|max:2048',
        ]);

        $data['sekolah_id'] = $sekolah->id;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        StrukturSekolah::create($data);
        return redirect()->route('admin.sekolah.struktur.index', $sekolah)->with('success', 'Anggota struktur ditambahkan.');
    }

    public function edit(Sekolah $sekolah, StrukturSekolah $struktur)
    {
        return view('admin.struktur-sekolah.form', compact('sekolah', 'struktur'));
    }

    public function update(Request $request, Sekolah $sekolah, StrukturSekolah $struktur)
    {
        $data = $request->validate([
            'jabatan' => 'required|string|max:100',
            'nama'    => 'required|string|max:255',
            'urutan'  => 'required|integer',
            'foto'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($struktur->foto) \Storage::disk('public')->delete($struktur->foto);
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        $struktur->update($data);
        return redirect()->route('admin.sekolah.struktur.index', $sekolah)->with('success', 'Data diperbarui.');
    }

    public function destroy(Sekolah $sekolah, StrukturSekolah $struktur)
    {
        if ($struktur->foto) \Storage::disk('public')->delete($struktur->foto);
        $struktur->delete();
        return back()->with('success', 'Data dihapus.');
    }
}

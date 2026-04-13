<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturYayasan;
use Illuminate\Http\Request;

class StrukturYayasanController extends Controller
{
    public function index()
    {
        $strukturs = StrukturYayasan::orderBy('urutan')->get();
        return view('admin.struktur-yayasan.index', compact('strukturs'));
    }

    public function create()
    {
        return view('admin.struktur-yayasan.form', ['struktur' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jabatan' => 'required|string|max:100',
            'nama'    => 'required|string|max:255',
            'urutan'  => 'required|integer',
            'foto'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        StrukturYayasan::create($data);
        return redirect()->route('admin.struktur-yayasan.index')->with('success', 'Anggota struktur ditambahkan.');
    }

    public function edit(StrukturYayasan $struktur_yayasan)
    {
        return view('admin.struktur-yayasan.form', ['struktur' => $struktur_yayasan]);
    }

    public function update(Request $request, StrukturYayasan $struktur_yayasan)
    {
        $data = $request->validate([
            'jabatan' => 'required|string|max:100',
            'nama'    => 'required|string|max:255',
            'urutan'  => 'required|integer',
            'foto'    => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($struktur_yayasan->foto) \Storage::disk('public')->delete($struktur_yayasan->foto);
            $data['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        $struktur_yayasan->update($data);
        return redirect()->route('admin.struktur-yayasan.index')->with('success', 'Data diperbarui.');
    }

    public function destroy(StrukturYayasan $struktur_yayasan)
    {
        if ($struktur_yayasan->foto) \Storage::disk('public')->delete($struktur_yayasan->foto);
        $struktur_yayasan->delete();
        return back()->with('success', 'Data dihapus.');
    }
}

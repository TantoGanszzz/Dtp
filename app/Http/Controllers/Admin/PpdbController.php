<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdbs = Ppdb::latest()->paginate(15);
        return view('admin.ppdb.index', compact('ppdbs'));
    }

    public function update(Request $request, Ppdb $ppdb)
    {
        $ppdb->update(['status' => $request->status]);
        return back()->with('success', 'Status diperbarui.');
    }

    public function destroy(Ppdb $ppdb)
    {
        $ppdb->delete();
        return back()->with('success', 'Data dihapus.');
    }
}

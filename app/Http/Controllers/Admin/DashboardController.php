<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $stats = [
            'ppdb'   => Ppdb::count(),
            'berita' => Berita::count(),
            'galeri' => Galeri::count(),
            'pending' => Ppdb::where('status', 'pending')->count(),
        ];
        
        $query = Ppdb::latest();
        
        if ($request->filled('sekolah') && in_array($request->sekolah, ['SMA', 'SMP'])) {
            $query->where('pilihan_sekolah', $request->sekolah);
        }
        
        $ppdb_terbaru = $query->paginate(30)->withQueryString();

        return view('admin.dashboard', compact('stats', 'ppdb_terbaru'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ppdb;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'ppdb'   => Ppdb::count(),
            'berita' => Berita::count(),
            'galeri' => Galeri::count(),
            'pending' => Ppdb::where('status', 'pending')->count(),
        ];
        $ppdb_terbaru = Ppdb::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'ppdb_terbaru'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function smp()
    {
        $sekolah = \App\Models\Sekolah::with('strukturs')->where('jenjang', 'SMP')->first();
        $galeris = \App\Models\Galeri::where('unit', 'smp')->latest()->take(20)->get();
        return view('sekolah.smp', compact('sekolah', 'galeris'));
    }

    public function sma()
    {
        $sekolah = \App\Models\Sekolah::with('strukturs')->where('jenjang', 'SMA')->first();
        $galeris = \App\Models\Galeri::where('unit', 'sma')->latest()->take(20)->get();
        return view('sekolah.sma', compact('sekolah', 'galeris'));
    }


}

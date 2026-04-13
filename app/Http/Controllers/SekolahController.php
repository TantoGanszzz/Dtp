<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function smp()
    {
        $sekolah = \App\Models\Sekolah::with('strukturs')->where('jenjang', 'SMP')->first();
        return view('sekolah.smp', compact('sekolah'));
    }

    public function sma()
    {
        $sekolah = \App\Models\Sekolah::with('strukturs')->where('jenjang', 'SMA')->first();
        return view('sekolah.sma', compact('sekolah'));
    }
}

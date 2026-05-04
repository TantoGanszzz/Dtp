<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

use App\Mail\PpdbDiterimaMail;
use Illuminate\Support\Facades\Mail;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdbs = Ppdb::latest()->paginate(15);
        return view('admin.ppdb.index', compact('ppdbs'));
    }

    public function update(Request $request, Ppdb $ppdb)
    {
        $oldStatus = $ppdb->status;
        $ppdb->update(['status' => $request->status]);

        // Cek jika status diubah menjadi "diterima" dan sebelumnya bukan "diterima"
        if ($oldStatus !== 'diterima' && $request->status === 'diterima' && $ppdb->email) {
            try {
                Mail::to($ppdb->email)->send(new PpdbDiterimaMail($ppdb));
            } catch (\Exception $e) {
                return back()->with('success', 'Status diperbarui, namun email gagal dikirim: ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Status diperbarui.');
    }

    public function destroy(Ppdb $ppdb)
    {
        $ppdb->delete();
        return back()->with('success', 'Data dihapus.');
    }
}

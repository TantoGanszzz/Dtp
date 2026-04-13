@extends('layouts.admin')
@section('title', 'Data PPDB')
@section('content')

<div class="card-admin overflow-hidden">
    <div class="flex justify-between items-center px-6 py-4 border-b border-slate-100">
        <div>
            <h2 class="font-extrabold text-gray-900">Data Pendaftar PPDB</h2>
            <p class="text-xs text-gray-400 mt-0.5 font-medium">Total {{ $ppdbs->total() }} pendaftar</p>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 text-xs uppercase tracking-wider text-gray-400">
                    <th class="text-left px-5 py-3 font-bold">No</th>
                    <th class="text-left px-5 py-3 font-bold">Nama Lengkap</th>
                    <th class="text-left px-5 py-3 font-bold">TTL</th>
                    <th class="text-left px-5 py-3 font-bold">Sekolah</th>
                    <th class="text-left px-5 py-3 font-bold">No. HP</th>
                    <th class="text-left px-5 py-3 font-bold">Status</th>
                    <th class="text-left px-5 py-3 font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($ppdbs as $i => $p)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-5 py-4 text-gray-400 font-medium text-xs">{{ $ppdbs->firstItem() + $i }}</td>
                    <td class="px-5 py-4">
                        <div class="font-bold text-gray-900">{{ $p->nama_lengkap }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit($p->alamat, 40) }}</div>
                    </td>
                    <td class="px-5 py-4 text-gray-500 text-xs">{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d/m/Y') }}</td>
                    <td class="px-5 py-4">
                        <span class="badge-{{ strtolower($p->pilihan_sekolah) }} text-xs font-bold px-2.5 py-1 rounded-full">{{ $p->pilihan_sekolah }}</span>
                    </td>
                    <td class="px-5 py-4 text-gray-500 text-xs font-medium">{{ $p->no_hp }}</td>
                    <td class="px-5 py-4">
                        <form action="{{ route('admin.ppdb.update', $p) }}" method="POST">
                            @csrf @method('PATCH')
                            <select name="status" onchange="this.form.submit()"
                                class="text-xs font-bold px-2.5 py-1.5 rounded-full border-0 cursor-pointer badge-{{ $p->status }} focus:outline-none">
                                <option value="pending"  {{ $p->status=='pending'  ? 'selected':'' }}>Pending</option>
                                <option value="diterima" {{ $p->status=='diterima' ? 'selected':'' }}>Diterima</option>
                                <option value="ditolak"  {{ $p->status=='ditolak'  ? 'selected':'' }}>Ditolak</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-5 py-4">
                        <form action="{{ route('admin.ppdb.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold flex items-center gap-1 transition-colors">
                                <i class="fas fa-trash text-xs"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-5 py-14 text-center">
                    <i class="fas fa-inbox text-4xl text-slate-200 mb-3 block"></i>
                    <span class="text-gray-400 font-semibold text-sm">Belum ada data pendaftar</span>
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-slate-100">{{ $ppdbs->links() }}</div>
</div>
@endsection

@extends('layouts.admin')
@section('title', 'Data PPDB')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-gray-900">Data Pendaftar PPDB</h2>
        <span class="text-sm text-gray-500">Total: {{ $ppdbs->total() }} pendaftar</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left px-4 py-3 font-semibold text-gray-700">No</th>
                    <th class="text-left px-4 py-3 font-semibold text-gray-700">Nama Lengkap</th>
                    <th class="text-left px-4 py-3 font-semibold text-gray-700">TTL</th>
                    <th class="text-left px-4 py-3 font-semibold text-gray-700">Sekolah</th>
                    <th class="text-left px-4 py-3 font-semibold text-gray-700">No. HP</th>
                    <th class="text-left px-4 py-3 font-semibold text-gray-700">Status</th>
                    <th class="text-left px-4 py-3 font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($ppdbs as $i => $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-500">{{ $ppdbs->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="font-medium text-gray-900">{{ $p->nama_lengkap }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">{{ Str::limit($p->alamat, 40) }}</div>
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d/m/Y') }}</td>
                    <td class="px-4 py-3"><span class="bg-blue-100 text-blue-800 px-2 py-0.5 rounded text-xs font-medium">{{ $p->pilihan_sekolah }}</span></td>
                    <td class="px-4 py-3 text-gray-600">{{ $p->no_hp }}</td>
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.ppdb.update', $p) }}" method="POST">
                            @csrf @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="text-xs border rounded px-2 py-1
                                {{ $p->status == 'diterima' ? 'bg-green-50 border-green-300 text-green-800' : ($p->status == 'ditolak' ? 'bg-red-50 border-red-300 text-red-800' : 'bg-yellow-50 border-yellow-300 text-yellow-800') }}">
                                <option value="pending" {{ $p->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diterima" {{ $p->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ $p->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.ppdb.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-4 py-10 text-center text-gray-500">Belum ada data pendaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $ppdbs->links() }}</div>
</div>
@endsection

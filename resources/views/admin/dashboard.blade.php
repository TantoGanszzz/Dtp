@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    @foreach([
        ['Total Pendaftar', $stats['ppdb'], 'fa-user-plus', 'from-blue-500 to-blue-700', 'bg-blue-100', 'text-blue-600'],
        ['Pending Review', $stats['pending'], 'fa-clock', 'from-amber-400 to-amber-600', 'bg-amber-100', 'text-amber-600'],
        ['Total Berita', $stats['berita'], 'fa-newspaper', 'from-emerald-500 to-emerald-700', 'bg-emerald-100', 'text-emerald-600'],
        ['Total Foto', $stats['galeri'], 'fa-images', 'from-purple-500 to-purple-700', 'bg-purple-100', 'text-purple-600'],
    ] as $s)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 overflow-hidden relative">
        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br {{ $s[3] }} opacity-5 rounded-full translate-x-6 -translate-y-6"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">{{ $s[0] }}</p>
                <p class="text-3xl font-extrabold text-gray-900">{{ $s[1] }}</p>
            </div>
            <div class="w-11 h-11 {{ $s[4] }} rounded-xl flex items-center justify-center">
                <i class="fas {{ $s[2] }} {{ $s[5] }}"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Quick Actions --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    @foreach([
        [route('admin.berita.create'), 'fa-plus', 'Tambah Berita', 'bg-blue-600 hover:bg-blue-700'],
        [route('admin.galeri.create'), 'fa-image', 'Upload Foto', 'bg-purple-600 hover:bg-purple-700'],
        [route('admin.ppdb.index'), 'fa-list', 'Data PPDB', 'bg-amber-500 hover:bg-amber-600'],
        [route('admin.sekolah.index'), 'fa-school', 'Data Sekolah', 'bg-emerald-600 hover:bg-emerald-700'],
    ] as $q)
    <a href="{{ $q[0] }}" class="{{ $q[3] }} text-white rounded-2xl p-4 flex items-center gap-3 font-bold text-sm transition-colors shadow-sm">
        <i class="fas {{ $q[1] }} text-white/80"></i>{{ $q[2] }}
    </a>
    @endforeach
</div>

{{-- Tabel PPDB Terbaru --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100">
        <h2 class="font-extrabold text-gray-900">Pendaftar PPDB Terbaru</h2>
        <a href="{{ route('admin.ppdb.index') }}" class="text-blue-600 text-xs font-bold hover:text-blue-800 transition-colors flex items-center gap-1">
            Lihat Semua <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500">
                    <th class="text-left px-6 py-3 font-bold">Nama</th>
                    <th class="text-left px-6 py-3 font-bold">Sekolah</th>
                    <th class="text-left px-6 py-3 font-bold">No. HP</th>
                    <th class="text-left px-6 py-3 font-bold">Status</th>
                    <th class="text-left px-6 py-3 font-bold">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($ppdb_terbaru as $p)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-900">{{ $p->nama_lengkap }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 px-2.5 py-1 rounded-full text-xs font-bold">{{ $p->pilihan_sekolah }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $p->no_hp }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold
                            {{ $p->status == 'diterima' ? 'bg-emerald-100 text-emerald-800' : ($p->status == 'ditolak' ? 'bg-red-100 text-red-800' : 'bg-amber-100 text-amber-800') }}">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-400 text-xs">{{ $p->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400">
                    <i class="fas fa-inbox text-3xl mb-2 block text-gray-200"></i>Belum ada pendaftar.
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

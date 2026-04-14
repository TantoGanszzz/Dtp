@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-7">
    @foreach([
        ['Total Pendaftar', $stats['ppdb'],    'fa-user-plus',       'from-green-500 to-emerald-600', 'bg-green-100',  'text-green-600'],
        ['Pending Review',  $stats['pending'], 'fa-clock',           'from-amber-400 to-orange-500',  'bg-amber-100',  'text-amber-600'],
        ['Total Foto',      $stats['galeri'],  'fa-images',          'from-purple-500 to-violet-600', 'bg-purple-100', 'text-purple-600'],
    ] as $s)
    <div class="card-admin p-5 relative overflow-hidden">
        <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-br {{ $s[3] }} opacity-10 rounded-full"></div>
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">{{ $s[0] }}</p>
                <p class="text-3xl font-extrabold text-gray-900">{{ $s[1] }}</p>
            </div>
            <div class="w-11 h-11 {{ $s[4] }} rounded-2xl flex items-center justify-center flex-shrink-0">
                <i class="fas {{ $s[2] }} {{ $s[5] }}"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Quick Actions --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-7">
    @foreach([
        [route('admin.galeri.create'), 'fa-image',      'Upload Foto',    'from-purple-500 to-purple-700'],
        [route('admin.ppdb.index'),    'fa-list-check', 'Data PPDB',      'from-amber-500 to-orange-600'],
        [route('admin.sekolah.index'), 'fa-school',     'Data Sekolah',   'from-green-500 to-emerald-600'],
    ] as $q)
    <a href="{{ $q[0] }}" class="bg-gradient-to-br {{ $q[3] }} text-white rounded-2xl p-4 flex items-center gap-3 font-bold text-sm transition-all hover:-translate-y-0.5 shadow-sm hover:shadow-md">
        <i class="fas {{ $q[1] }} text-white/80 text-sm"></i>{{ $q[2] }}
    </a>
    @endforeach
</div>

{{-- Tabel --}}
<div class="card-admin overflow-hidden">
    <div class="flex justify-between items-center px-6 py-4 border-b border-slate-100">
        <h2 class="font-extrabold text-gray-900">Pendaftar PPSB Terbaru</h2>
        <a href="{{ route('admin.ppdb.index') }}" class="text-green-600 text-xs font-bold hover:text-green-800 flex items-center gap-1 transition-colors">
            Lihat Semua <i class="fas fa-arrow-right text-xs"></i>
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 text-xs uppercase tracking-wider text-gray-400">
                    <th class="text-left px-6 py-3 font-bold">Nama</th>
                    <th class="text-left px-6 py-3 font-bold">Sekolah</th>
                    <th class="text-left px-6 py-3 font-bold">No. HP</th>
                    <th class="text-left px-6 py-3 font-bold">Status</th>
                    <th class="text-left px-6 py-3 font-bold">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($ppdb_terbaru as $p)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-900">{{ $p->nama_lengkap }}</td>
                    <td class="px-6 py-4">
                        <span class="badge-{{ strtolower($p->pilihan_sekolah) }} text-xs font-bold px-2.5 py-1 rounded-full">{{ $p->pilihan_sekolah }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $p->no_hp }}</td>
                    <td class="px-6 py-4">
                        <span class="badge-{{ $p->status }} text-xs font-bold px-2.5 py-1 rounded-full">{{ ucfirst($p->status) }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-400 text-xs font-medium">{{ $p->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-14 text-center">
                    <i class="fas fa-inbox text-4xl text-slate-200 mb-3 block"></i>
                    <span class="text-gray-400 font-semibold text-sm">Belum ada pendaftar</span>
                </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

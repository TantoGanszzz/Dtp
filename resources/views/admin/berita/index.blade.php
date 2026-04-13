@extends('layouts.admin')
@section('title', 'Kelola Berita')
@section('content')

<div class="flex justify-end mb-5">
    <a href="{{ route('admin.berita.create') }}" class="btn-green text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Berita
    </a>
</div>

<div class="card-admin overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-slate-50 text-xs uppercase tracking-wider text-gray-400">
                <th class="text-left px-6 py-3 font-bold">Berita</th>
                <th class="text-left px-6 py-3 font-bold">Penulis</th>
                <th class="text-left px-6 py-3 font-bold">Tanggal</th>
                <th class="text-left px-6 py-3 font-bold">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            @forelse($beritas as $b)
            <tr class="hover:bg-slate-50/50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        @if($b->gambar)
                        <img src="{{ asset('storage/'.$b->gambar) }}" class="w-14 h-14 object-cover rounded-xl flex-shrink-0 shadow-sm">
                        @else
                        <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-newspaper text-green-400"></i>
                        </div>
                        @endif
                        <div>
                            <div class="font-bold text-gray-900">{{ Str::limit($b->judul, 55) }}</div>
                            <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit(strip_tags($b->isi), 70) }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-500 text-xs font-medium">{{ $b->penulis }}</td>
                <td class="px-6 py-4 text-gray-400 text-xs font-medium">{{ $b->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.berita.edit', $b) }}" class="text-blue-600 hover:text-blue-800 text-xs font-bold flex items-center gap-1 transition-colors">
                            <i class="fas fa-pen text-xs"></i> Edit
                        </a>
                        <form action="{{ route('admin.berita.destroy', $b) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold flex items-center gap-1 transition-colors">
                                <i class="fas fa-trash text-xs"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-14 text-center">
                <i class="fas fa-newspaper text-4xl text-slate-200 mb-3 block"></i>
                <span class="text-gray-400 font-semibold text-sm">Belum ada berita</span>
            </td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t border-slate-100">{{ $beritas->links() }}</div>
</div>
@endsection

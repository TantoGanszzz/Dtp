@extends('layouts.admin')
@section('title', 'Kelola Galeri')
@section('content')

<div class="flex justify-end mb-5">
    <a href="{{ route('admin.galeri.create') }}" class="btn-green text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Foto
    </a>
</div>

@if($galeris->count())
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($galeris as $g)
    <div class="card-admin overflow-hidden group">
        <div class="relative overflow-hidden">
            <img src="{{ asset('storage/'.$g->foto) }}" alt="{{ $g->judul }}" class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute top-3 left-3">
                <span class="text-xs font-bold px-2.5 py-1 rounded-full capitalize bg-black/40 backdrop-blur text-white">{{ $g->kategori }}</span>
            </div>
        </div>
        <div class="p-4">
            <p class="font-bold text-gray-900 text-sm truncate mb-3">{{ $g->judul }}</p>
            <form action="{{ route('admin.galeri.destroy', $g) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold flex items-center gap-1.5 transition-colors">
                    <i class="fas fa-trash text-xs"></i> Hapus Foto
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div class="mt-6">{{ $galeris->links() }}</div>
@else
<div class="card-admin p-16 text-center">
    <i class="fas fa-images text-5xl text-slate-200 mb-4 block"></i>
    <p class="text-gray-400 font-bold mb-2">Belum ada foto</p>
    <a href="{{ route('admin.galeri.create') }}" class="text-green-600 text-sm font-bold hover:text-green-800 transition-colors">+ Tambah foto sekarang</a>
</div>
@endif
@endsection

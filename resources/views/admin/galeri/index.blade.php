@extends('layouts.admin')
@section('title', 'Kelola Galeri')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div></div>
    <a href="{{ route('admin.galeri.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 font-medium text-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Foto
    </a>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse($galeris as $g)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <img src="{{ asset('storage/' . $g->foto) }}" alt="{{ $g->judul }}" class="w-full h-40 object-cover">
        <div class="p-3">
            <p class="font-medium text-gray-900 text-sm truncate">{{ $g->judul }}</p>
            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full capitalize">{{ $g->kategori }}</span>
            <form action="{{ route('admin.galeri.destroy', $g) }}" method="POST" class="mt-2" onsubmit="return confirm('Hapus foto ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">
                    <i class="fas fa-trash mr-1"></i>Hapus
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-4 text-center py-16 text-gray-500">
        <i class="fas fa-images text-4xl mb-3 text-gray-300"></i>
        <p>Belum ada foto. <a href="{{ route('admin.galeri.create') }}" class="text-blue-700 hover:underline">Tambah sekarang</a></p>
    </div>
    @endforelse
</div>
<div class="mt-6">{{ $galeris->links() }}</div>
@endsection

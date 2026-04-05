@extends('layouts.admin')
@section('title', 'Data Sekolah')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div></div>
    @if($sekolahs->count() < 2)
    <a href="{{ route('admin.sekolah.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 font-medium text-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Sekolah
    </a>
    @endif
</div>

<div class="grid md:grid-cols-2 gap-6">
    @forelse($sekolahs as $s)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        @if($s->foto)
        <img src="{{ asset('storage/' . $s->foto) }}" class="w-full h-40 object-cover">
        @else
        <div class="w-full h-40 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
            <i class="fas fa-school text-white text-4xl"></i>
        </div>
        @endif
        <div class="p-5">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">{{ $s->jenjang }}</span>
                    <h3 class="font-bold text-gray-900 mt-1">{{ $s->nama }}</h3>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.sekolah.edit', $s) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <form action="{{ route('admin.sekolah.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus data sekolah ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-gray-600 text-sm line-clamp-2">{{ $s->profil }}</p>
        </div>
    </div>
    @empty
    <div class="col-span-2 text-center py-16 text-gray-500">
        <i class="fas fa-school text-4xl mb-3 text-gray-300"></i>
        <p>Belum ada data sekolah. <a href="{{ route('admin.sekolah.create') }}" class="text-blue-700 hover:underline">Tambah sekarang</a></p>
    </div>
    @endforelse
</div>
@endsection

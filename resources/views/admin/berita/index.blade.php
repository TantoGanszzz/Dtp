@extends('layouts.admin')
@section('title', 'Kelola Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div></div>
    <a href="{{ route('admin.berita.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 font-medium text-sm">
        <i class="fas fa-plus mr-2"></i>Tambah Berita
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-50">
                <th class="text-left px-4 py-3 font-semibold text-gray-700">Judul</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-700">Penulis</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-700">Tanggal</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($beritas as $b)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-3">
                        @if($b->gambar)
                        <img src="{{ asset('storage/' . $b->gambar) }}" class="w-12 h-12 object-cover rounded-lg flex-shrink-0">
                        @else
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-newspaper text-blue-500"></i>
                        </div>
                        @endif
                        <div>
                            <div class="font-medium text-gray-900">{{ Str::limit($b->judul, 60) }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ Str::limit(strip_tags($b->isi), 80) }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-gray-600">{{ $b->penulis }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $b->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.berita.edit', $b) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('admin.berita.destroy', $b) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-xs font-medium">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-4 py-10 text-center text-gray-500">Belum ada berita.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $beritas->links() }}</div>
</div>
@endsection

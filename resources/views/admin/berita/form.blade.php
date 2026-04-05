@extends('layouts.admin')
@section('title', $berita ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm p-6">
    <h2 class="text-lg font-bold text-gray-900 mb-6">{{ $berita ? 'Edit Berita' : 'Tambah Berita Baru' }}</h2>

    <form action="{{ $berita ? route('admin.berita.update', $berita) : route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @if($berita) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
            <input type="text" name="judul" value="{{ old('judul', $berita?->judul) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('judul') border-red-500 @enderror"
                placeholder="Masukkan judul berita">
            @error('judul')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis', $berita?->penulis ?? 'Admin') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('penulis') border-red-500 @enderror">
            @error('penulis')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
            <textarea name="isi" rows="10"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('isi') border-red-500 @enderror"
                placeholder="Tulis isi berita di sini...">{{ old('isi', $berita?->isi) }}</textarea>
            @error('isi')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar {{ $berita ? '(kosongkan jika tidak diubah)' : '' }}</label>
            @if($berita?->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-32 h-24 object-cover rounded-lg mb-2">
            @endif
            <input type="file" name="gambar" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 @error('gambar') border-red-500 @enderror">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maks: 2MB</p>
            @error('gambar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex space-x-3 pt-2">
            <button type="submit" class="flex-1 bg-blue-700 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-800 transition-colors">
                <i class="fas fa-save mr-2"></i>{{ $berita ? 'Perbarui' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.berita.index') }}" class="flex-1 text-center bg-gray-200 text-gray-700 py-2.5 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

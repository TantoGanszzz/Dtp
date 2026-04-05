@extends('layouts.admin')
@section('title', 'Tambah Foto Galeri')

@section('content')
<div class="max-w-lg mx-auto bg-white rounded-xl shadow-sm p-6">
    <h2 class="text-lg font-bold text-gray-900 mb-6">Tambah Foto Galeri</h2>
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Foto</label>
            <input type="text" name="judul" value="{{ old('judul') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('judul') border-red-500 @enderror">
            @error('judul')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="kategori" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('kategori') border-red-500 @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach(['kegiatan', 'fasilitas', 'event'] as $k)
                <option value="{{ $k }}" {{ old('kategori') == $k ? 'selected' : '' }}>{{ ucfirst($k) }}</option>
                @endforeach
            </select>
            @error('kategori')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto</label>
            <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 @error('foto') border-red-500 @enderror">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maks: 2MB</p>
            @error('foto')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex space-x-3 pt-2">
            <button type="submit" class="flex-1 bg-blue-700 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-800 transition-colors">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="{{ route('admin.galeri.index') }}" class="flex-1 text-center bg-gray-200 text-gray-700 py-2.5 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

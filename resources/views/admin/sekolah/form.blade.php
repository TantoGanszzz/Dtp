@extends('layouts.admin')
@section('title', $sekolah ? 'Edit Data Sekolah' : 'Tambah Sekolah')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm p-6">
    <h2 class="text-lg font-bold text-gray-900 mb-6">{{ $sekolah ? 'Edit Data Sekolah' : 'Tambah Data Sekolah' }}</h2>

    <form action="{{ $sekolah ? route('admin.sekolah.update', $sekolah) : route('admin.sekolah.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @if($sekolah) @method('PUT') @endif

        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
                <select name="jenjang" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('jenjang') border-red-500 @enderror">
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="SMP" {{ old('jenjang', $sekolah?->jenjang) == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ old('jenjang', $sekolah?->jenjang) == 'SMA' ? 'selected' : '' }}>SMA</option>
                </select>
                @error('jenjang')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
                <input type="text" name="nama" value="{{ old('nama', $sekolah?->nama) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                    placeholder="Contoh: SMP Al-Hikmah">
                @error('nama')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Profil Sekolah</label>
            <textarea name="profil" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('profil') border-red-500 @enderror"
                placeholder="Deskripsi singkat tentang sekolah...">{{ old('profil', $sekolah?->profil) }}</textarea>
            @error('profil')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Fasilitas</label>
            <textarea name="fasilitas" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('fasilitas') border-red-500 @enderror"
                placeholder="Daftar fasilitas yang tersedia...">{{ old('fasilitas', $sekolah?->fasilitas) }}</textarea>
            @error('fasilitas')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan (khusus SMA, opsional)</label>
            <textarea name="jurusan" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                placeholder="IPA, IPS, Bahasa...">{{ old('jurusan', $sekolah?->jurusan) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Data Guru (opsional)</label>
            <textarea name="data_guru" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500"
                placeholder="Informasi tenaga pengajar...">{{ old('data_guru', $sekolah?->data_guru) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Sekolah {{ $sekolah ? '(opsional)' : '' }}</label>
            @if($sekolah?->foto)
            <img src="{{ asset('storage/' . $sekolah->foto) }}" class="w-32 h-24 object-cover rounded-lg mb-2">
            @endif
            <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2.5">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maks: 2MB</p>
        </div>

        <div class="flex space-x-3 pt-2">
            <button type="submit" class="flex-1 bg-blue-700 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-800 transition-colors">
                <i class="fas fa-save mr-2"></i>{{ $sekolah ? 'Perbarui' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.sekolah.index') }}" class="flex-1 text-center bg-gray-200 text-gray-700 py-2.5 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

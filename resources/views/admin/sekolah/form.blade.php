@extends('layouts.admin')
@section('title', $sekolah ? 'Edit Data Sekolah' : 'Tambah Sekolah')
@section('content')

<div class="max-w-3xl mx-auto">
    <div class="card-admin p-8">
        <div class="flex items-center gap-3 mb-7">
            <div class="w-10 h-10 grad-green rounded-xl flex items-center justify-center shadow-md">
                <i class="fas fa-school text-white text-sm"></i>
            </div>
            <div>
                <h2 class="font-extrabold text-gray-900">{{ $sekolah ? 'Edit Data Sekolah' : 'Tambah Data Sekolah' }}</h2>
                <p class="text-xs text-gray-400 mt-0.5">{{ $sekolah ? 'Perbarui informasi sekolah' : 'Isi form untuk menambah data sekolah' }}</p>
            </div>
        </div>

        <form action="{{ $sekolah ? route('admin.sekolah.update', $sekolah) : route('admin.sekolah.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if($sekolah) @method('PUT') @endif

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Jenjang <span class="text-red-500">*</span></label>
                    <select name="jenjang" class="input-field @error('jenjang') border-red-400 @enderror">
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="SMP" {{ old('jenjang', $sekolah?->jenjang) == 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA" {{ old('jenjang', $sekolah?->jenjang) == 'SMA' ? 'selected' : '' }}>SMA</option>
                    </select>
                    @error('jenjang')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Sekolah <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $sekolah?->nama) }}" class="input-field @error('nama') border-red-400 @enderror" placeholder="Contoh: SMP Al-Hikmah">
                    @error('nama')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Profil Sekolah <span class="text-red-500">*</span></label>
                <textarea name="profil" rows="4" class="input-field resize-none @error('profil') border-red-400 @enderror" placeholder="Deskripsi singkat tentang sekolah...">{{ old('profil', $sekolah?->profil) }}</textarea>
                @error('profil')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Fasilitas <span class="text-red-500">*</span></label>
                <textarea name="fasilitas" rows="4" class="input-field resize-none @error('fasilitas') border-red-400 @enderror" placeholder="- Lab IPA&#10;- Perpustakaan&#10;- Masjid">{{ old('fasilitas', $sekolah?->fasilitas) }}</textarea>
                @error('fasilitas')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Jurusan <span class="text-gray-400 font-normal">(khusus SMA)</span></label>
                <textarea name="jurusan" rows="3" class="input-field resize-none" placeholder="IPA, IPS, Bahasa...">{{ old('jurusan', $sekolah?->jurusan) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Data Guru <span class="text-gray-400 font-normal">(opsional)</span></label>
                <textarea name="data_guru" rows="3" class="input-field resize-none" placeholder="Informasi tenaga pengajar...">{{ old('data_guru', $sekolah?->data_guru) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Struktur Organisasi <span class="text-gray-400 font-normal">(opsional)</span></label>
                <textarea name="struktur_organisasi" rows="5" class="input-field resize-none"
                    placeholder="Contoh:&#10;Kepala Sekolah: Budi Santoso, M.Pd&#10;Wakil Kepala: Siti Rahayu, S.Pd&#10;Bendahara: Ahmad Fauzi, S.E">{{ old('struktur_organisasi', $sekolah?->struktur_organisasi) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Foto Bagan Struktur <span class="text-gray-400 font-normal">(opsional)</span></label>
                @if($sekolah?->foto_struktur)
                <img src="{{ asset('storage/'.$sekolah->foto_struktur) }}" class="w-full h-40 object-contain rounded-xl shadow-sm mb-3 bg-gray-50">
                @endif
                <input type="file" name="foto_struktur" accept="image/*" class="input-field">
                <p class="text-xs text-gray-400 mt-1.5 font-medium">Upload foto/bagan struktur organisasi. Format: JPG, PNG. Maks: 2MB</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Foto Sekolah <span class="text-gray-400 font-normal">(opsional)</span></label>
                @if($sekolah?->foto)
                <img src="{{ asset('storage/'.$sekolah->foto) }}" class="w-40 h-28 object-cover rounded-xl shadow-sm mb-3">
                @endif
                <input type="file" name="foto" accept="image/*" class="input-field">
                <p class="text-xs text-gray-400 mt-1.5 font-medium">Format: JPG, PNG. Maks: 2MB</p>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-green text-white px-6 py-3 rounded-xl font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-floppy-disk"></i> {{ $sekolah ? 'Perbarui' : 'Simpan' }}
                </button>
                <a href="{{ route('admin.sekolah.index') }}" class="px-6 py-3 rounded-xl font-bold text-sm bg-slate-100 text-gray-600 hover:bg-slate-200 transition-colors flex items-center gap-2">
                    <i class="fas fa-xmark"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

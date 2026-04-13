@extends('layouts.admin')
@section('title', $berita ? 'Edit Berita' : 'Tambah Berita')
@section('content')

<div class="max-w-3xl mx-auto">
    <div class="card-admin p-8">
        <div class="flex items-center gap-3 mb-7">
            <div class="w-10 h-10 grad-green rounded-xl flex items-center justify-center shadow-md">
                <i class="fas fa-newspaper text-white text-sm"></i>
            </div>
            <div>
                <h2 class="font-extrabold text-gray-900">{{ $berita ? 'Edit Berita' : 'Tambah Berita Baru' }}</h2>
                <p class="text-xs text-gray-400 mt-0.5">{{ $berita ? 'Perbarui informasi berita' : 'Isi form untuk menambah berita baru' }}</p>
            </div>
        </div>

        <form action="{{ $berita ? route('admin.berita.update', $berita) : route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if($berita) @method('PUT') @endif

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Judul Berita <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul', $berita?->judul) }}" class="input-field @error('judul') border-red-400 @enderror" placeholder="Masukkan judul berita">
                @error('judul')<p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-circle-exclamation"></i>{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Penulis <span class="text-red-500">*</span></label>
                <input type="text" name="penulis" value="{{ old('penulis', $berita?->penulis ?? 'Admin') }}" class="input-field @error('penulis') border-red-400 @enderror">
                @error('penulis')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Isi Berita <span class="text-red-500">*</span></label>
                <textarea name="isi" rows="10" class="input-field resize-none @error('isi') border-red-400 @enderror" placeholder="Tulis isi berita di sini...">{{ old('isi', $berita?->isi) }}</textarea>
                @error('isi')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Gambar {{ $berita ? '(kosongkan jika tidak diubah)' : '' }}</label>
                @if($berita?->gambar)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$berita->gambar) }}" class="w-40 h-28 object-cover rounded-xl shadow-sm">
                </div>
                @endif
                <input type="file" name="gambar" accept="image/*" class="input-field @error('gambar') border-red-400 @enderror">
                <p class="text-xs text-gray-400 mt-1.5 font-medium">Format: JPG, PNG. Maks: 2MB</p>
                @error('gambar')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-green text-white px-6 py-3 rounded-xl font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-floppy-disk"></i> {{ $berita ? 'Perbarui' : 'Simpan' }}
                </button>
                <a href="{{ route('admin.berita.index') }}" class="px-6 py-3 rounded-xl font-bold text-sm bg-slate-100 text-gray-600 hover:bg-slate-200 transition-colors flex items-center gap-2">
                    <i class="fas fa-xmark"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

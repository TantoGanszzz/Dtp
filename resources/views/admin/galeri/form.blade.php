@extends('layouts.admin')
@section('title', 'Tambah Foto Galeri')
@section('content')

<div class="max-w-lg mx-auto">
    <div class="card-admin p-8">
        <div class="flex items-center gap-3 mb-7">
            <div class="w-10 h-10 grad-green rounded-xl flex items-center justify-center shadow-md">
                <i class="fas fa-image text-white text-sm"></i>
            </div>
            <div>
                <h2 class="font-extrabold text-gray-900">Tambah Foto Galeri</h2>
                <p class="text-xs text-gray-400 mt-0.5">Upload foto kegiatan atau fasilitas</p>
            </div>
        </div>

        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Judul Foto <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="input-field @error('judul') border-red-400 @enderror" placeholder="Contoh: Upacara Bendera 17 Agustus">
                @error('judul')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
                <select name="kategori" class="input-field @error('kategori') border-red-400 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach(['kegiatan' => 'Kegiatan Siswa', 'fasilitas' => 'Fasilitas Sekolah', 'event' => 'Event & Acara'] as $val => $label)
                    <option value="{{ $val }}" {{ old('kategori') == $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('kategori')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Deskripsi <span class="text-gray-400 text-xs font-normal">(opsional)</span></label>
                <textarea name="deskripsi" rows="3" class="input-field @error('deskripsi') border-red-400 @enderror" placeholder="Tulis deskripsi singkat tentang foto ini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">Upload Foto <span class="text-red-500">*</span></label>
                <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-green-400 transition-colors cursor-pointer" onclick="document.getElementById('fotoInput').click()">
                    <i class="fas fa-cloud-arrow-up text-3xl text-gray-300 mb-2 block"></i>
                    <p class="text-sm text-gray-500 font-medium">Klik untuk pilih foto</p>
                    <p class="text-xs text-gray-400 mt-1">JPG, PNG, GIF — Maks 2MB</p>
                    <input type="file" id="fotoInput" name="foto" accept="image/*" class="hidden" onchange="previewImg(this)">
                </div>
                <img id="preview" class="mt-3 w-full h-40 object-cover rounded-xl hidden shadow-sm">
                @error('foto')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="btn-green text-white px-6 py-3 rounded-xl font-bold text-sm flex items-center gap-2">
                    <i class="fas fa-floppy-disk"></i> Simpan
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="px-6 py-3 rounded-xl font-bold text-sm bg-slate-100 text-gray-600 hover:bg-slate-200 transition-colors flex items-center gap-2">
                    <i class="fas fa-xmark"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function previewImg(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.getElementById('preview');
            img.src = e.target.result;
            img.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection

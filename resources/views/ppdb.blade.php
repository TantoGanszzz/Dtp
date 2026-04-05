@extends('layouts.app')
@section('title', 'PPDB Online 2024/2025')

@section('content')
{{-- Hero --}}
<section class="gradient-hero text-white py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-blue-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-blue-400 text-xs"></i>
            <span class="text-white text-sm font-medium">PPDB Online</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">PPDB Online <span class="text-emerald-300">2024/2025</span></h1>
        <p class="text-blue-200 text-lg">Penerimaan Peserta Didik Baru — Yayasan Al-Hikmah</p>
    </div>
</section>

<div class="max-w-6xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-5 gap-10">

        {{-- Info Sidebar --}}
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 text-lg mb-5 flex items-center gap-2">
                    <i class="fas fa-info-circle text-blue-600"></i>Informasi PPDB
                </h3>
                <div class="space-y-4">
                    @foreach([
                        ['Periode Pendaftaran','1 Jan – 31 Mar 2024','fa-calendar','blue'],
                        ['Pengumuman','15 April 2024','fa-bullhorn','emerald'],
                        ['Daftar Ulang','16 – 30 April 2024','fa-check-circle','blue'],
                        ['Tahun Ajaran','2024/2025','fa-graduation-cap','emerald'],
                    ] as $info)
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50">
                        <div class="w-9 h-9 {{ $info[3] === 'blue' ? 'bg-blue-100' : 'bg-emerald-100' }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $info[0] }} {{ $info[3] === 'blue' ? 'text-blue-600' : 'text-emerald-600' }} text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 font-medium">{{ $info[1] }}</div>
                            <div class="text-sm font-bold text-gray-800">{{ $info[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 text-lg mb-4 flex items-center gap-2">
                    <i class="fas fa-list-check text-blue-600"></i>Persyaratan
                </h3>
                <ul class="space-y-2.5">
                    @foreach(['Fotokopi Ijazah/STTB','Fotokopi Akta Kelahiran','Pas Foto 3x4 (4 lembar)','Fotokopi KK','Surat Keterangan Sehat','Mengisi formulir online'] as $s)
                    <li class="flex items-center gap-2.5 text-sm text-gray-600">
                        <i class="fas fa-check-circle text-emerald-500 flex-shrink-0"></i>{{ $s }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="gradient-green text-white rounded-3xl p-6">
                <i class="fas fa-phone-alt text-2xl mb-3 opacity-80"></i>
                <h3 class="font-extrabold text-lg mb-2">Butuh Bantuan?</h3>
                <p class="text-emerald-100 text-sm mb-4">Hubungi panitia PPDB kami untuk informasi lebih lanjut.</p>
                <a href="https://wa.me/6281234567890" class="bg-white text-emerald-700 px-4 py-2 rounded-xl font-bold text-sm inline-flex items-center gap-2 hover:bg-emerald-50 transition-colors">
                    <i class="fab fa-whatsapp"></i>WhatsApp Kami
                </a>
            </div>
        </div>

        {{-- Form --}}
        <div class="lg:col-span-3">
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                <div class="mb-8">
                    <div class="w-14 h-14 gradient-card rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-plus text-white text-xl"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Form Pendaftaran Siswa Baru</h2>
                    <p class="text-gray-500 mt-1 text-sm">Isi formulir dengan data yang benar dan lengkap</p>
                </div>

                <form action="{{ route('ppdb.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-0 focus:border-blue-500 transition-colors text-sm @error('nama_lengkap') border-red-400 @enderror"
                            placeholder="Masukkan nama lengkap sesuai akta">
                        @error('nama_lengkap')<p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-0 focus:border-blue-500 transition-colors text-sm @error('tempat_lahir') border-red-400 @enderror"
                                placeholder="Kota kelahiran">
                            @error('tempat_lahir')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-0 focus:border-blue-500 transition-colors text-sm @error('tanggal_lahir') border-red-400 @enderror">
                            @error('tanggal_lahir')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="alamat" rows="3"
                            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-0 focus:border-blue-500 transition-colors text-sm resize-none @error('alamat') border-red-400 @enderror"
                            placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota">{{ old('alamat') }}</textarea>
                        @error('alamat')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Pilihan Sekolah <span class="text-red-500">*</span></label>
                            <select name="pilihan_sekolah"
                                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-0 focus:border-blue-500 transition-colors text-sm @error('pilihan_sekolah') border-red-400 @enderror">
                                <option value="">-- Pilih Sekolah --</option>
                                <option value="SMP" {{ old('pilihan_sekolah') == 'SMP' ? 'selected' : '' }}>SMP Al-Hikmah</option>
                                <option value="SMA" {{ old('pilihan_sekolah') == 'SMA' ? 'selected' : '' }}>SMA Al-Hikmah</option>
                            </select>
                            @error('pilihan_sekolah')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Nomor HP / WhatsApp <span class="text-red-500">*</span></label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-0 focus:border-blue-500 transition-colors text-sm @error('no_hp') border-red-400 @enderror"
                                placeholder="08xx-xxxx-xxxx">
                            @error('no_hp')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="bg-amber-50 border border-amber-200 rounded-2xl p-4 flex items-start gap-3">
                        <i class="fas fa-info-circle text-amber-500 mt-0.5 flex-shrink-0"></i>
                        <p class="text-amber-800 text-sm">Pastikan data yang diisi sudah benar. Kami akan menghubungi Anda melalui nomor HP yang terdaftar untuk konfirmasi pendaftaran.</p>
                    </div>

                    <button type="submit" class="w-full btn-green text-white py-4 rounded-2xl font-extrabold text-base flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i>Kirim Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

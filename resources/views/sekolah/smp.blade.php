@extends('layouts.app')
@section('title', 'SMP Al-Hikmah')

@section('content')
<div class="bg-blue-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                <i class="fas fa-school text-blue-800 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold">{{ $sekolah?->nama ?? 'SMP Al-Hikmah' }}</h1>
                <p class="text-blue-200">Sekolah Menengah Pertama</p>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    @if($sekolah)
    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center"><i class="fas fa-info-circle text-blue-600 mr-2"></i>Profil Sekolah</h2>
                <p class="text-gray-700 leading-relaxed">{{ $sekolah->profil }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center"><i class="fas fa-building text-blue-600 mr-2"></i>Fasilitas</h2>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $sekolah->fasilitas }}</p>
            </div>
            @if($sekolah->data_guru)
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center"><i class="fas fa-chalkboard-teacher text-blue-600 mr-2"></i>Data Guru</h2>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $sekolah->data_guru }}</p>
            </div>
            @endif
        </div>
        <div class="space-y-6">
            @if($sekolah->foto)
            <img src="{{ asset('storage/' . $sekolah->foto) }}" alt="{{ $sekolah->nama }}" class="w-full rounded-xl shadow-md">
            @endif
            <div class="bg-blue-50 rounded-xl p-5">
                <h3 class="font-bold text-blue-900 mb-3">Informasi PPDB</h3>
                <p class="text-sm text-gray-700 mb-4">Pendaftaran siswa baru SMP Al-Hikmah telah dibuka. Segera daftarkan putra-putri Anda!</p>
                <a href="{{ route('ppdb') }}" class="block text-center bg-blue-700 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-800 transition-colors">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-20 text-gray-500">
        <i class="fas fa-school text-5xl mb-4 text-gray-300"></i>
        <p class="text-lg">Informasi sekolah belum tersedia.</p>
    </div>
    @endif
</div>
@endsection

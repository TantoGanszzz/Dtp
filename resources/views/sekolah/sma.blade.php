@extends('layouts.app')
@section('title', 'SMA Al-Hikmah')

@section('content')
<div class="bg-green-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                <i class="fas fa-university text-green-800 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold">{{ $sekolah?->nama ?? 'SMA Al-Hikmah' }}</h1>
                <p class="text-green-200">Sekolah Menengah Atas</p>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    @if($sekolah)
    <div class="grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center"><i class="fas fa-info-circle text-green-600 mr-2"></i>Profil Sekolah</h2>
                <p class="text-gray-700 leading-relaxed">{{ $sekolah->profil }}</p>
            </div>
            @if($sekolah->jurusan)
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center"><i class="fas fa-book text-green-600 mr-2"></i>Program Jurusan</h2>
                <div class="grid md:grid-cols-3 gap-4">
                    @foreach(['IPA', 'IPS', 'Bahasa'] as $j)
                    <div class="bg-green-50 rounded-lg p-4 text-center">
                        <i class="fas fa-graduation-cap text-green-600 text-2xl mb-2"></i>
                        <div class="font-semibold text-green-900">{{ $j }}</div>
                    </div>
                    @endforeach
                </div>
                <p class="text-gray-700 mt-4 whitespace-pre-line">{{ $sekolah->jurusan }}</p>
            </div>
            @endif
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center"><i class="fas fa-building text-green-600 mr-2"></i>Fasilitas</h2>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $sekolah->fasilitas }}</p>
            </div>
            @if($sekolah->data_guru)
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center"><i class="fas fa-chalkboard-teacher text-green-600 mr-2"></i>Data Guru</h2>
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $sekolah->data_guru }}</p>
            </div>
            @endif
        </div>
        <div class="space-y-6">
            @if($sekolah->foto)
            <img src="{{ asset('storage/' . $sekolah->foto) }}" alt="{{ $sekolah->nama }}" class="w-full rounded-xl shadow-md">
            @endif
            <div class="bg-green-50 rounded-xl p-5">
                <h3 class="font-bold text-green-900 mb-3">Informasi PPDB</h3>
                <p class="text-sm text-gray-700 mb-4">Pendaftaran siswa baru SMA Al-Hikmah telah dibuka. Raih masa depan cerah bersama kami!</p>
                <a href="{{ route('ppdb') }}" class="block text-center bg-green-700 text-white py-2.5 rounded-lg font-semibold hover:bg-green-800 transition-colors">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-20 text-gray-500">
        <i class="fas fa-university text-5xl mb-4 text-gray-300"></i>
        <p class="text-lg">Informasi sekolah belum tersedia.</p>
    </div>
    @endif
</div>
@endsection

@extends('layouts.app')
@section('title', 'SMA Unggulan Al-Hidayah')
@section('content')

@php $smaHeroFoto = 'assets/hero-bg.png'; @endphp
<section class="photo-hero islamic-pattern relative overflow-hidden py-24" style="background-image: linear-gradient(135deg, rgba(5,46,22,0.7), rgba(20,83,45,0.6), rgba(22,101,52,0.65)), url('{{ asset('storage/' . $smaHeroFoto) }}'); background-size: cover; background-position: center;">

    <div class="absolute top-0 right-0 w-80 h-80 bg-white/5 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-sky-300/10 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="photo-overlay" style="background: linear-gradient(135deg, rgba(5,46,22,0.45), rgba(20,83,45,0.35), rgba(22,101,52,0.40));"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-20">

        <div class="flex items-center gap-3 mb-4 text-sky-200 text-sm">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">SMA Unggulan Al-Hidayah</span>
        </div>
        <div class="flex items-center gap-5">
            <div class="w-16 h-16 bg-white/15 backdrop-blur rounded-2xl flex items-center justify-center border border-white/20">
                <i class="fas fa-university text-white text-2xl"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-sky-200 uppercase tracking-widest">Sekolah Menengah Atas</span>
                <h1 class="text-4xl font-extrabold text-white mt-1">{{ $sekolah?->nama ?? 'SMA Unggulan Al-Hidayah' }}</h1>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 60L1440 60L1440 20C1200 50 960 60 720 50C480 40 240 10 0 20Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-14">
    @if($sekolah)
    <div class="grid lg:grid-cols-3 gap-8">

        {{-- Konten Utama --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Profil --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 reveal tilt-card group hover:border-sky-300 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 grad-sma rounded-xl flex items-center justify-center">
                        <i class="fas fa-circle-info text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Profil Sekolah</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">{{ $sekolah->profil }}</p>
            </div>

            {{-- Jurusan --}}
            @if($sekolah->jurusan)
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 tilt-card group hover:border-sky-300 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 grad-sma rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-book-open text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Program Jurusan</h2>
                </div>
                <div class="grid grid-cols-3 gap-4 mb-5">
                    @foreach([['IPA','fa-flask','Ilmu Pengetahuan Alam']] as $j)
                    <div class="text-center p-5 rounded-2xl border-2 border-sky-100 bg-sky-50 hover:border-sky-400 hover:shadow-md hover:-translate-y-1 transition-all duration-300 cursor-default">
                        <div class="w-12 h-12 grad-sma rounded-xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas {{ $j[1] }} text-white"></i>
                        </div>
                        <div class="font-extrabold text-gray-900 text-lg">{{ $j[0] }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ $j[2] }}</div>
                    </div>
                    @endforeach
                </div>
                <p class="text-gray-600 text-sm leading-relaxed whitespace-pre-line">{{ $sekolah->jurusan }}</p>
            </div>
            @endif

            {{-- Fasilitas --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 reveal tilt-card group hover:border-sky-300 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 grad-sma rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-building text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Fasilitas</h2>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    @foreach(explode("\n", $sekolah->fasilitas) as $f)
                    @if(trim($f))
                    <div class="flex items-center gap-3 p-3 bg-sky-50/50 hover:bg-sky-50 border border-transparent hover:border-sky-200 rounded-xl transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-sky-500 text-xs"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">{{ ltrim(trim($f), '-') }}</span>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            {{-- Struktur Organisasi --}}
            @if($sekolah->struktur_organisasi || $sekolah->foto_struktur)
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 tilt-card group hover:border-sky-300 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 grad-sma rounded-xl flex items-center justify-center">
                        <i class="fas fa-sitemap text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Struktur Organisasi</h2>
                </div>

                {{-- Foto Bagan Struktur --}}
                @if($sekolah->foto_struktur)
                <div class="mb-6 rounded-2xl overflow-hidden border border-sky-100 bg-sky-50 p-3">
                    <img src="{{ asset('storage/'.$sekolah->foto_struktur) }}"
                         alt="Struktur Organisasi {{ $sekolah->nama }}"
                         class="w-full object-contain rounded-xl max-h-96">
                </div>
                @endif

                {{-- Teks Struktur --}}
                @if($sekolah->struktur_organisasi)
                <div class="space-y-2">
                    @foreach(explode("\n", $sekolah->struktur_organisasi) as $i => $baris)
                    @if(trim($baris))
                    @php
                        $parts = explode(':', trim($baris), 2);
                        $jabatan = trim($parts[0]);
                        $nama = isset($parts[1]) ? trim($parts[1]) : '';
                    @endphp
                    <div class="flex items-center gap-4 p-4 rounded-2xl {{ $i === 0 ? 'grad-sma' : 'bg-sky-50' }}">
                        <div class="w-10 h-10 {{ $i === 0 ? 'bg-white/20' : 'bg-white' }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user {{ $i === 0 ? 'text-white' : 'text-sky-500' }} text-sm"></i>
                        </div>
                        <div>
                            <div class="font-extrabold {{ $i === 0 ? 'text-white' : 'text-gray-900' }} text-sm">{{ $nama ?: $jabatan }}</div>
                            @if($nama)
                            <div class="text-xs {{ $i === 0 ? 'text-sky-200' : 'text-gray-500' }} mt-0.5">{{ $jabatan }}</div>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
            @endif

            {{-- Data Guru --}}
            @if($sekolah->data_guru)
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 tilt-card group hover:border-sky-300 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 grad-sma rounded-xl flex items-center justify-center">
                        <i class="fas fa-chalkboard-user text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Data Guru</h2>
                </div>
                <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $sekolah->data_guru }}</p>
            </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="space-y-5">

            {{-- Foto Sekolah --}}
@php $sidebarFoto = ''; @endphp
            @if($sekolah->foto)
            <div class="rounded-3xl overflow-hidden shadow-md">
                <img src="{{ asset('storage/'.$sekolah->foto) }}" alt="{{ $sekolah->nama }}" class="w-full h-52 object-cover">
                <div class="grad-sma px-4 py-2.5">
                    <p class="text-white text-xs font-bold text-center">{{ $sekolah->nama }}</p>
                </div>
            </div>
            @elseif($sidebarFoto)
            <div class="rounded-3xl overflow-hidden shadow-md photo-card h-52" style="background-image: url('{{ asset('storage/' . $sidebarFoto) }}')">
                <div class="photo-card-overlay"></div>
                <div class="absolute inset-0 flex items-end p-4">
                    <div class="grad-sma px-4 py-2.5 w-full">
                        <p class="text-white text-xs font-bold text-center">{{ $sekolah->nama ?? 'SMA Unggulan Al-Hidayah' }}</p>
                    </div>
                </div>
            </div>
            @else
            <div class="rounded-3xl overflow-hidden shadow-md grad-sma h-52 flex flex-col items-center justify-center relative">
                <div class="absolute inset-0 bg-pattern opacity-10"></div>
                <div class="relative z-10 text-center text-white">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-university text-2xl"></i>
                    </div>
                    <p class="text-sm font-bold opacity-90">SMA Unggulan Al-Hidayah</p>
                    <p class="text-xs font-medium opacity-70 mt-1">Foto belum tersedia</p>
                </div>
            </div>
            @endif


            {{-- PPDB Card --}}
            <div class="grad-sma rounded-3xl p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-full translate-x-6 -translate-y-6"></div>
                <div class="relative z-10">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-plus text-white"></i>
                    </div>
                    <h3 class="font-extrabold text-white text-lg mb-2">Daftar PPSB</h3>
                    <p class="text-sky-100 text-sm mb-4 leading-relaxed">Pendaftaran siswa baru SMA Unggulan Al-Hidayah telah dibuka!</p>
                    <a href="{{ route('ppdb') }}" class="block text-center bg-white text-sky-700 py-2.5 rounded-xl font-extrabold text-sm hover:bg-sky-50 transition-colors">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            {{-- Info Singkat --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 mb-4 text-sm uppercase tracking-wider">Info Singkat</h3>
                <div class="space-y-3">
                    @foreach([
                        ['fa-graduation-cap', 'Jenjang',    'SMA (Kelas 10-12)'],
                        ['fa-book',           'Jurusan',    'IPA'],
                        ['fa-star',           'Akreditasi', 'A (Sangat Baik)'],
                    ] as $info)
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $info[0] }} text-sky-500 text-xs"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-400 font-medium">{{ $info[1] }}</div>
                            <div class="text-sm font-bold text-gray-800">{{ $info[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-24">
        <div class="w-20 h-20 bg-sky-50 rounded-3xl flex items-center justify-center mx-auto mb-5">
            <i class="fas fa-university text-sky-300 text-3xl"></i>
        </div>
        <p class="text-gray-400 font-semibold">Informasi sekolah belum tersedia.</p>
    </div>
    @endif
</div>
@endsection

// this is a blank commit to test user on github
//this is also a blank commit to test user on github

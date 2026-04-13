@extends('layouts.app')
@section('title', 'SMP Al-Hikmah')
@section('content')

<section class="grad-smp relative overflow-hidden py-20">
    <div class="absolute top-0 right-0 w-80 h-80 bg-white/5 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-300/10 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex items-center gap-3 mb-4 text-blue-200 text-sm">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold">SMP Al-Hikmah</span>
        </div>
        <div class="flex items-center gap-5">
            <div class="w-16 h-16 bg-white/15 backdrop-blur rounded-2xl flex items-center justify-center border border-white/20">
                <i class="fas fa-school text-white text-2xl"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-blue-200 uppercase tracking-widest">Sekolah Menengah Pertama</span>
                <h1 class="text-4xl font-extrabold text-white mt-1">{{ $sekolah?->nama ?? 'SMP Al-Hikmah' }}</h1>
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
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 grad-smp rounded-xl flex items-center justify-center">
                        <i class="fas fa-circle-info text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Profil Sekolah</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">{{ $sekolah->profil }}</p>
            </div>

            {{-- Fasilitas --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 grad-smp rounded-xl flex items-center justify-center">
                        <i class="fas fa-building text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Fasilitas</h2>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    @foreach(explode("\n", $sekolah->fasilitas) as $f)
                    @if(trim($f))
                    <div class="flex items-center gap-2.5 p-3 bg-blue-50 rounded-xl">
                        <i class="fas fa-check-circle text-blue-600 flex-shrink-0"></i>
                        <span class="text-sm font-medium text-gray-700">{{ ltrim(trim($f), '-') }}</span>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            {{-- Struktur Organisasi --}}
            @if($sekolah->struktur_organisasi || $sekolah->foto_struktur)
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 grad-smp rounded-xl flex items-center justify-center">
                        <i class="fas fa-sitemap text-white text-sm"></i>
                    </div>
                    <h2 class="text-xl font-extrabold text-gray-900">Struktur Organisasi</h2>
                </div>

                {{-- Foto Bagan Struktur --}}
                @if($sekolah->foto_struktur)
                <div class="mb-6 rounded-2xl overflow-hidden border border-blue-100 bg-blue-50 p-3">
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
                    <div class="flex items-center gap-4 p-4 rounded-2xl {{ $i === 0 ? 'grad-smp' : 'bg-blue-50' }}">
                        <div class="w-10 h-10 {{ $i === 0 ? 'bg-white/20' : 'bg-white' }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user {{ $i === 0 ? 'text-white' : 'text-blue-500' }} text-sm"></i>
                        </div>
                        <div>
                            <div class="font-extrabold {{ $i === 0 ? 'text-white' : 'text-gray-900' }} text-sm">{{ $nama ?: $jabatan }}</div>
                            @if($nama)
                            <div class="text-xs {{ $i === 0 ? 'text-blue-200' : 'text-gray-500' }} mt-0.5">{{ $jabatan }}</div>
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
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 grad-smp rounded-xl flex items-center justify-center">
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
            @if($sekolah->foto)
            <div class="rounded-3xl overflow-hidden shadow-md">
                <img src="{{ asset('storage/'.$sekolah->foto) }}" alt="{{ $sekolah->nama }}" class="w-full h-52 object-cover">
                <div class="grad-smp px-4 py-2.5">
                    <p class="text-white text-xs font-bold text-center">{{ $sekolah->nama }}</p>
                </div>
            </div>
            @else
            <div class="rounded-3xl overflow-hidden shadow-md grad-smp h-40 flex items-center justify-center">
                <div class="text-center text-white">
                    <i class="fas fa-school text-4xl opacity-40 mb-2 block"></i>
                    <p class="text-xs font-semibold opacity-60">Foto belum tersedia</p>
                </div>
            </div>
            @endif

            {{-- PPDB Card --}}
            <div class="grad-smp rounded-3xl p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-full translate-x-6 -translate-y-6"></div>
                <div class="relative z-10">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-plus text-white"></i>
                    </div>
                    <h3 class="font-extrabold text-white text-lg mb-2">Daftar PPDB</h3>
                    <p class="text-blue-200 text-sm mb-4 leading-relaxed">Pendaftaran siswa baru SMP Al-Hikmah telah dibuka!</p>
                    <a href="{{ route('ppdb') }}" class="block text-center bg-white text-blue-800 py-2.5 rounded-xl font-extrabold text-sm hover:bg-blue-50 transition-colors">
                        Daftar Sekarang
                    </a>
                </div>
            </div>

            {{-- Info Singkat --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 mb-4 text-sm uppercase tracking-wider">Info Singkat</h3>
                <div class="space-y-3">
                    @foreach([
                        ['fa-graduation-cap', 'Jenjang',    'SMP (Kelas 7-9)'],
                        ['fa-clock',          'Jam Belajar','07.00 – 15.00 WIB'],
                        ['fa-star',           'Akreditasi', 'A (Sangat Baik)'],
                    ] as $info)
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $info[0] }} text-blue-600 text-xs"></i>
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
        <div class="w-20 h-20 bg-blue-50 rounded-3xl flex items-center justify-center mx-auto mb-5">
            <i class="fas fa-school text-blue-300 text-3xl"></i>
        </div>
        <p class="text-gray-400 font-semibold">Informasi sekolah belum tersedia.</p>
    </div>
    @endif
</div>
@endsection

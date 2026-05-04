@extends('layouts.app')
@section('title', 'Beranda — Yayasan Pondok Pesantren Al-Hidayah')
@section('content')

{{-- HERO --}}
@php $heroFoto = 'assets/hero-bg.png'; @endphp
<section class="photo-hero islamic-pattern relative overflow-hidden min-h-[90vh] flex items-center" style="background-image: linear-gradient(135deg, rgba(5,46,22,0.7), rgba(20,83,45,0.6), rgba(22,101,52,0.65)), url('{{ asset('storage/' . $heroFoto) }}'); background-size: cover; background-position: center;">

    {{-- Floating Particles --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-[12]">
        <div class="particle w-1 h-1 bg-green-400/30" style="left:10%; bottom:-10%; animation-duration:12s; animation-delay:0s"></div>
        <div class="particle w-1.5 h-1.5 bg-green-300/20" style="left:25%; bottom:-10%; animation-duration:15s; animation-delay:2s"></div>
        <div class="particle w-1 h-1 bg-emerald-400/25" style="left:45%; bottom:-10%; animation-duration:10s; animation-delay:4s"></div>
        <div class="particle w-2 h-2 bg-green-200/15" style="left:65%; bottom:-10%; animation-duration:18s; animation-delay:1s"></div>
        <div class="particle w-1 h-1 bg-green-400/20" style="left:80%; bottom:-10%; animation-duration:13s; animation-delay:3s"></div>
        <div class="particle w-1.5 h-1.5 bg-emerald-300/20" style="left:90%; bottom:-10%; animation-duration:16s; animation-delay:5s"></div>
    </div>

    {{-- Blobs --}}
    <div class="absolute top-20 right-10 w-72 h-72 bg-green-400/10 blob animate-pulse pointer-events-none"></div>
    <div class="absolute bottom-20 left-10 w-56 h-56 bg-green-300/10 blob pointer-events-none" style="animation:pulse 3s infinite 1s"></div>
    <div class="absolute top-1/2 left-1/2 w-[500px] h-[500px] bg-green-500/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-[100px] pointer-events-none"></div>

    <div class="photo-overlay" style="background: linear-gradient(135deg, rgba(5,46,22,0.45), rgba(20,83,45,0.35), rgba(22,101,52,0.40));"></div>
    <div class="max-w-7xl mx-auto px-4 py-28 relative z-20 w-full">

        <div class="max-w-3xl mx-auto text-center">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 glass px-5 py-2.5 rounded-full text-sm font-semibold text-green-200 mb-8 animate-[pulse_3s_ease-in-out_infinite]">
                <span class="dot-pulse"></span>
                PPSB 2026/2027 Sedang Berlangsung
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
                Yayasan Pondok Pesantren
                <span class="block bg-gradient-to-r from-green-300 via-emerald-400 to-green-300 bg-clip-text text-transparent mt-2">
                    Al-Hidayah
                </span>
            </h1>
            <p class="text-green-100/80 text-lg md:text-xl mb-12 leading-relaxed max-w-2xl mx-auto">
                Lembaga pendidikan Islam terpercaya sejak 2002. Membentuk generasi cerdas, berakhlak mulia, dan siap menghadapi tantangan global.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('ppdb') }}" class="btn-main text-white px-8 py-4 rounded-2xl font-extrabold text-base inline-flex items-center gap-2">
                    <i class="fas fa-pen-to-square"></i> Daftar PPSB Sekarang
                </a>
                <a href="{{ route('profil') }}" class="btn-outline text-white px-8 py-4 rounded-2xl font-bold text-base inline-flex items-center gap-2">
                    <i class="fas fa-circle-info"></i> Tentang Kami
                </a>
            </div>
        </div>

        

    {{-- Wave --}}
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none z-[15]">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-[60px] md:h-[80px]">
            <path d="M0 120L48 108C96 96 192 72 288 60C384 48 480 48 576 54C672 60 768 72 864 72C960 72 1056 60 1152 54C1248 48 1344 48 1392 48L1440 48V120H0Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- UNIT SEKOLAH --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 reveal">
            <span class="section-label">Unit Pendidikan</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">
                <span class="title-deco">Sekolah Kami</span>
            </h2>
            <p class="text-gray-500 max-w-xl mx-auto mt-8">Dua jenjang pendidikan berkualitas dengan kurikulum nasional plus nilai-nilai Islami</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- SMP --}}
            <div class="card bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 reveal">
@php $smpFoto = ''; @endphp
                <div class="photo-card h-56 relative flex items-end p-7 overflow-hidden grad-smp" @if($smpFoto) style="background-image: url('{{ asset('storage/' . $smpFoto) }}')" @endif>
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full translate-x-10 -translate-y-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-8 translate-y-8"></div>
                    <div class="photo-card-overlay"></div>
                    <div class="relative z-20">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-3 backdrop-blur">
                            <i class="fas fa-school text-white text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-blue-200 uppercase tracking-widest">Jenjang SMP</span>
                    </div>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-3">SMP Unggulan Al-Hidayah</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-5">Pendidikan menengah pertama berbasis Islam dengan program tahfidz, bahasa Arab, dan kurikulum nasional terintegrasi.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(['Tahfidz Al-Quran','Lab IPA','Bahasa Arab','Ekstrakurikuler'] as $f)
                        <span class="badge-blue text-xs font-bold px-3 py-1 rounded-full">{{ $f }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('sekolah.smp') }}" class="btn-smp text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                        Lihat Detail <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            {{-- SMA --}}
            <div class="card bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 reveal">
@php $smaFoto = ''; @endphp
                <div class="photo-card h-56 relative flex items-end p-7 overflow-hidden grad-sma" @if($smaFoto) style="background-image: url('{{ asset('storage/' . $smaFoto) }}')" @endif>
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full translate-x-10 -translate-y-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-8 translate-y-8"></div>
                    <div class="photo-card-overlay"></div>
                    <div class="relative z-20">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-3 backdrop-blur">
                            <i class="fas fa-university text-white text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-sky-200 uppercase tracking-widest">Jenjang SMA</span>
                    </div>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-3">SMA Unggulan Al-Hidayah</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-5">Pendidikan menengah atas dengan jurusan IPA dan kurikulum terpadu pesantren-formal.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(['IPA','Kurikulum Merdeka','Laboratorium'] as $f)
                        <span class="text-xs font-bold px-3 py-1 rounded-full" style="background:rgba(14,165,233,0.1);color:#0284c7;border:1px solid rgba(14,165,233,0.2)">{{ $f }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('sekolah.sma') }}" class="btn-sma text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                        Lihat Detail <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KEUNGGULAN --}}
<section class="py-24 bg-white section-divider">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 reveal">
            <span class="section-label">Mengapa Kami</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3"><span class="title-deco">Keunggulan Kami</span></h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach([
                ['fa-book-quran','Baca Tulis Al-Quran','Program baca tulis Al-Quran terintegrasi dengan metode modern dan bimbingan langsung dari ustadz berpengalaman.','0'],
                ['fa-book-quran','Baca Tulis Kitab Kuning','Mengintegrasikan nilai-nilai Islam dalam setiap aspek pembelajaran kitab kuning klasik.','100'],
                ['fa-laptop','Fasilitas Modern','Lab lengkap, perpustakaan digital, dan ruang kelas multimedia berstandar tinggi.','200'],
                ['fa-users-gear','Program Kerja Ke Jepang','Program unggulan kerja sama internasional untuk mempersiapkan santri berdaya saing global.','300'],
                ['fa-trophy','Prestasi Gemilang','Ratusan prestasi akademik dan non-akademik tingkat regional dan nasional.','400'],
                ['fa-heart','Thoriqot Syadziliyah','Pendidikan spiritual melalui Thoriqot Syadziliyah Waqodiriyah Wanaqsabandiyah.','500'],
            ] as $i => $k)
            <div class="card p-7 rounded-3xl border border-gray-100 bg-white hover:border-green-200 group reveal" style="transition-delay: {{ $k[3] }}ms">
                <div class="w-14 h-14 grad-green rounded-2xl flex items-center justify-center mb-5 shadow-md group-hover:scale-110 transition-transform glow-green">
                    <i class="fas {{ $k[0] }} text-white text-xl"></i>
                </div>
                <h3 class="font-extrabold text-gray-900 text-lg mb-2">{{ $k[1] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $k[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- GALERI --}}
@if($galeris->count())
<section class="py-24 bg-gray-50 section-divider">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
            <div>
                <span class="section-label">Dokumentasi</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3"><span class="title-deco">Galeri Kegiatan</span></h2>
            </div>
            <a href="{{ route('galeri') }}" class="mt-6 md:mt-0 text-green-600 font-bold text-sm hover:text-green-800 flex items-center gap-2 transition-colors group">
                Lihat Semua <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($galeris as $g)
            <div class="relative group overflow-hidden rounded-2xl aspect-square shadow-sm reveal">
                <img src="{{ asset('storage/'.$g->foto) }}" alt="{{ $g->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <div class="text-white transform translate-y-3 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="text-xs bg-green-500 px-2.5 py-1 rounded-full font-bold uppercase">{{ $g->kategori }}</span>
                        <p class="font-bold text-sm mt-2">{{ $g->judul }}</p>
                        @if($g->deskripsi)
                        <p class="text-white/80 text-xs mt-1 leading-snug line-clamp-2">{{ $g->deskripsi }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
@php $ctaFoto = 'assets/cta-bg.png'; @endphp
<section class="photo-hero islamic-pattern relative overflow-hidden py-28" style="background-image: linear-gradient(135deg, rgba(5,46,22,0.7), rgba(20,83,45,0.6), rgba(22,101,52,0.65)), url('{{ asset('storage/' . $ctaFoto) }}'); background-size: cover; background-position: center;">

    <div class="photo-overlay" style="background: linear-gradient(135deg, rgba(5,46,22,0.45), rgba(20,83,45,0.35), rgba(22,101,52,0.40));"></div>

    {{-- Floating Particles --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-[12]">
        <div class="particle w-1 h-1 bg-green-400/30" style="left:15%; bottom:-10%; animation-duration:14s; animation-delay:0s"></div>
        <div class="particle w-1.5 h-1.5 bg-green-300/20" style="left:50%; bottom:-10%; animation-duration:11s; animation-delay:3s"></div>
        <div class="particle w-1 h-1 bg-emerald-400/25" style="left:75%; bottom:-10%; animation-duration:16s; animation-delay:1s"></div>
    </div>

    <div class="absolute inset-0 pointer-events-none z-[12]">
        <div class="absolute top-10 right-10 w-64 h-64 bg-green-400/10 blob"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-green-300/10 blob"></div>
    </div>

    <div class="max-w-3xl mx-auto px-4 text-center relative z-20 reveal">
        <div class="inline-flex items-center gap-2 glass px-5 py-2.5 rounded-full text-sm font-semibold text-green-200 mb-6">
            <span class="dot-pulse"></span> Pendaftaran Dibuka
        </div>
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5 leading-tight">
            Daftarkan Putra-Putri Anda <br>
            <span class="bg-gradient-to-r from-green-300 via-emerald-400 to-green-300 bg-clip-text text-transparent">Sekarang Juga!</span>
        </h2>
        <p class="text-green-200/80 text-lg mb-10 leading-relaxed">PPSB Tahun Ajaran 2026/2027 telah dibuka. Raih kesempatan terbaik bersama Yayasan Pondok Pesantren Al-Hidayah.</p>
        <a href="{{ route('ppdb') }}" class="btn-main text-white px-10 py-4 rounded-2xl font-extrabold text-lg inline-flex items-center gap-3">
            <i class="fas fa-pen-to-square"></i> Daftar Online Sekarang
        </a>
    </div>
</section>

@endsection

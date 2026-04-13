@extends('layouts.app')
@section('title', 'Beranda — Yayasan Al-Hikmah')
@section('content')

{{-- HERO --}}
<section class="grad-hero relative overflow-hidden min-h-screen flex items-center">
    {{-- Blobs --}}
    <div class="absolute top-20 right-10 w-72 h-72 bg-green-400/10 blob animate-pulse pointer-events-none"></div>
    <div class="absolute bottom-20 left-10 w-56 h-56 bg-green-300/10 blob pointer-events-none" style="animation:pulse 3s infinite 1s"></div>
    <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-green-500/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 py-28 relative z-10 w-full">
        <div class="max-w-3xl mx-auto text-center">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 glass px-4 py-2 rounded-full text-sm font-semibold text-green-200 mb-8">
                <span class="dot-pulse"></span>
                PPDB 2024/2025 Sedang Berlangsung
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                Yayasan Pendidikan
                <span class="block bg-gradient-to-r from-green-300 via-green-400 to-emerald-300 bg-clip-text text-transparent">
                    Al-Hikmah
                </span>
            </h1>
            <p class="text-green-100/80 text-lg md:text-xl mb-10 leading-relaxed max-w-2xl mx-auto">
                Lembaga pendidikan Islam terpercaya sejak 1995. Membentuk generasi cerdas, berakhlak mulia, dan siap menghadapi tantangan global.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('ppdb') }}" class="btn-main text-white px-8 py-4 rounded-2xl font-extrabold text-base inline-flex items-center gap-2">
                    <i class="fas fa-pen-to-square"></i> Daftar PPDB Sekarang
                </a>
                <a href="{{ route('profil') }}" class="btn-outline text-white px-8 py-4 rounded-2xl font-bold text-base inline-flex items-center gap-2">
                    <i class="fas fa-circle-info"></i> Tentang Kami
                </a>
            </div>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-20 max-w-4xl mx-auto">
            @foreach([
                ['29+', 'Tahun Berdiri', 'fa-calendar-check'],
                ['1200+', 'Siswa Aktif', 'fa-users'],
                ['85+', 'Tenaga Pendidik', 'fa-chalkboard-user'],
                ['95%', 'Lulus PTN', 'fa-trophy'],
            ] as $s)
            <div class="glass rounded-2xl p-5 text-center hover:bg-white/15 transition-all">
                <i class="fas {{ $s[2] }} text-green-300 text-xl mb-3 block"></i>
                <div class="text-3xl font-extrabold text-white mb-1">{{ $s[0] }}</div>
                <div class="text-green-200/70 text-xs font-semibold uppercase tracking-wider">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Wave --}}
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none">
        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 100L48 88.7C96 77.3 192 54.7 288 48C384 41.3 480 50.7 576 56C672 61.3 768 62.7 864 58.7C960 54.7 1056 45.3 1152 45.3C1248 45.3 1344 54.7 1392 59.3L1440 64V100H0Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- UNIT SEKOLAH --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="section-label">Unit Pendidikan</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">
                <span class="title-deco">Sekolah Kami</span>
            </h2>
            <p class="text-gray-500 max-w-xl mx-auto mt-6">Dua jenjang pendidikan berkualitas dengan kurikulum nasional plus nilai-nilai Islami</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- SMP --}}
            <div class="card bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100">
                <div class="grad-smp h-56 relative flex items-end p-7 overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full translate-x-10 -translate-y-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-8 translate-y-8"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-3 backdrop-blur">
                            <i class="fas fa-school text-white text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-blue-200 uppercase tracking-widest">Jenjang SMP</span>
                    </div>
                </div>
                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-3">SMP Al-Hikmah</h3>
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
            <div class="card bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100">
                <div class="grad-sma h-56 relative flex items-end p-7 overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full translate-x-10 -translate-y-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-8 translate-y-8"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-3 backdrop-blur">
                            <i class="fas fa-university text-white text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-sky-200 uppercase tracking-widest">Jenjang SMA</span>
                    </div>
                </div>
                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-3">SMA Al-Hikmah</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-5">Pendidikan menengah atas dengan jurusan IPA, IPS, dan Bahasa. Persiapan masuk PTN terbaik Indonesia.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(['IPA','IPS','Bahasa','Olimpiade Sains'] as $f)
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
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="section-label">Mengapa Kami</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3"><span class="title-deco">Keunggulan Kami</span></h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach([
                ['fa-medal','Akreditasi A','Terakreditasi A oleh BAN-S/M dengan standar pendidikan nasional tertinggi.'],
                ['fa-book-quran','Berbasis Islam','Mengintegrasikan nilai-nilai Islam dalam setiap aspek pembelajaran.'],
                ['fa-laptop','Fasilitas Modern','Lab lengkap, perpustakaan digital, dan ruang kelas multimedia.'],
                ['fa-users-gear','Guru Berpengalaman','85+ tenaga pendidik bersertifikat dengan rata-rata 10 tahun pengalaman.'],
                ['fa-trophy','Prestasi Gemilang','Ratusan prestasi akademik dan non-akademik tingkat nasional.'],
                ['fa-heart','Lingkungan Kondusif','Suasana belajar aman, nyaman, dan penuh kasih sayang.'],
            ] as $i => $k)
            <div class="card p-7 rounded-3xl border border-gray-100 bg-white hover:border-green-200 group">
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
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div>
                <span class="section-label">Dokumentasi</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3"><span class="title-deco">Galeri Kegiatan</span></h2>
            </div>
            <a href="{{ route('galeri') }}" class="mt-6 md:mt-0 text-green-600 font-bold text-sm hover:text-green-800 flex items-center gap-2 transition-colors">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($galeris as $g)
            <div class="relative group overflow-hidden rounded-2xl aspect-square shadow-sm">
                <img src="{{ asset('storage/'.$g->foto) }}" alt="{{ $g->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <div class="text-white transform translate-y-3 group-hover:translate-y-0 transition-transform duration-300">
                        <span class="text-xs bg-green-500 px-2.5 py-1 rounded-full font-bold uppercase">{{ $g->kategori }}</span>
                        <p class="font-bold text-sm mt-2">{{ $g->judul }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-24 grad-hero relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-10 right-10 w-64 h-64 bg-green-400/10 blob"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 bg-green-300/10 blob"></div>
    </div>
    <div class="max-w-3xl mx-auto px-4 text-center relative z-10">
        <div class="inline-flex items-center gap-2 glass px-4 py-2 rounded-full text-sm font-semibold text-green-200 mb-6">
            <span class="dot-pulse"></span> Pendaftaran Dibuka
        </div>
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5 leading-tight">
            Daftarkan Putra-Putri Anda <br>
            <span class="bg-gradient-to-r from-green-300 to-emerald-300 bg-clip-text text-transparent">Sekarang Juga!</span>
        </h2>
        <p class="text-green-200/80 text-lg mb-10 leading-relaxed">PPDB Tahun Ajaran 2024/2025 telah dibuka. Raih kesempatan terbaik bersama Yayasan Al-Hikmah.</p>
        <a href="{{ route('ppdb') }}" class="btn-main text-white px-10 py-4 rounded-2xl font-extrabold text-lg inline-flex items-center gap-3">
            <i class="fas fa-pen-to-square"></i> Daftar Online Sekarang
        </a>
    </div>
</section>

@endsection

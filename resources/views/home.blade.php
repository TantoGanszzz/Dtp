@extends('layouts.app')
@section('title', 'Beranda - Yayasan Al-Hikmah')

@section('content')

{{-- Hero Section --}}
<section class="gradient-hero text-white relative overflow-hidden min-h-[88vh] flex items-center">
    {{-- Decorative circles --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-blue-400/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-2xl"></div>

    <div class="max-w-7xl mx-auto px-4 py-24 relative z-10 w-full">
        <div class="max-w-3xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 glass px-4 py-2 rounded-full text-sm font-medium mb-8 text-blue-200">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                PPDB 2024/2025 Sedang Berlangsung
            </div>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight tracking-tight">
                Yayasan Pendidikan
                <span class="bg-gradient-to-r from-blue-300 to-emerald-300 bg-clip-text text-transparent block">Al-Hikmah</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-4 font-medium">Membentuk Generasi Cerdas & Berakhlak Mulia</p>
            <p class="text-blue-200/80 mb-10 max-w-xl mx-auto leading-relaxed">Lembaga pendidikan Islam terpercaya sejak 1995, mengintegrasikan ilmu pengetahuan modern dengan nilai-nilai keislaman.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('ppdb') }}" class="btn-green text-white px-8 py-4 rounded-2xl font-bold text-base inline-flex items-center gap-2">
                    <i class="fas fa-user-plus"></i>Daftar Sekarang
                </a>
                <a href="{{ route('profil') }}" class="glass text-white px-8 py-4 rounded-2xl font-bold text-base inline-flex items-center gap-2 hover:bg-white/15 transition-all">
                    <i class="fas fa-info-circle"></i>Tentang Kami
                </a>
            </div>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-20 max-w-4xl mx-auto">
            @foreach([['29+','Tahun Berpengalaman','fa-history'],['1200+','Siswa Aktif','fa-users'],['85+','Tenaga Pendidik','fa-chalkboard-teacher'],['95%','Lulus PTN','fa-trophy']] as $s)
            <div class="glass rounded-2xl p-5 text-center">
                <i class="fas {{ $s[2] }} text-blue-300 text-xl mb-2"></i>
                <div class="text-3xl font-extrabold text-white mb-1">{{ $s[0] }}</div>
                <div class="text-blue-200 text-xs font-medium">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Wave --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 80L60 69.3C120 58.7 240 37.3 360 32C480 26.7 600 37.3 720 42.7C840 48 960 48 1080 42.7C1200 37.3 1320 26.7 1380 21.3L1440 16V80H1380C1320 80 1200 80 1080 80C960 80 840 80 720 80C600 80 480 80 360 80C240 80 120 80 60 80H0Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- Sekolah Cards --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Unit Pendidikan</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-2 mb-3 section-title">Sekolah Kami</h2>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">Pilihan jenjang pendidikan berkualitas dengan kurikulum nasional plus nilai-nilai Islami</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            {{-- SMP --}}
            <div class="card-hover bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">
                <div class="h-52 gradient-card relative flex items-center justify-center overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-4 right-4 w-32 h-32 border-4 border-white rounded-full"></div>
                        <div class="absolute bottom-4 left-4 w-20 h-20 border-4 border-white rounded-full"></div>
                    </div>
                    <div class="text-center relative z-10">
                        <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-school text-white text-4xl"></i>
                        </div>
                        <span class="bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Jenjang SMP</span>
                    </div>
                </div>
                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-3">SMP Al-Hikmah</h3>
                    <p class="text-gray-500 mb-5 leading-relaxed">Pendidikan menengah pertama dengan kurikulum nasional plus tahfidz Al-Quran dan bahasa Arab-Inggris.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(['Tahfidz','Lab IPA','Bahasa Arab','Olahraga'] as $f)
                        <span class="bg-blue-50 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $f }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('sekolah.smp') }}" class="btn-primary text-white px-6 py-3 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            {{-- SMA --}}
            <div class="card-hover bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">
                <div class="h-52 gradient-green relative flex items-center justify-center overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-4 right-4 w-32 h-32 border-4 border-white rounded-full"></div>
                        <div class="absolute bottom-4 left-4 w-20 h-20 border-4 border-white rounded-full"></div>
                    </div>
                    <div class="text-center relative z-10">
                        <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-university text-white text-4xl"></i>
                        </div>
                        <span class="bg-white/20 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Jenjang SMA</span>
                    </div>
                </div>
                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-3">SMA Al-Hikmah</h3>
                    <p class="text-gray-500 mb-5 leading-relaxed">Pendidikan menengah atas dengan jurusan IPA, IPS, dan Bahasa. Persiapan masuk PTN terbaik Indonesia.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(['IPA','IPS','Bahasa','Olimpiade'] as $f)
                        <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $f }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('sekolah.sma') }}" class="btn-green text-white px-6 py-3 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Berita Terbaru --}}
@if($beritas->count())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
            <div>
                <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Update Terkini</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2">Berita & Kegiatan</h2>
            </div>
            <a href="{{ route('berita') }}" class="mt-4 md:mt-0 text-blue-600 font-bold hover:text-blue-800 transition-colors flex items-center gap-2 text-sm">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-7">
            @foreach($beritas as $i => $b)
            <article class="card-hover bg-white rounded-3xl shadow-md overflow-hidden border border-gray-100 {{ $i === 0 ? 'md:col-span-1' : '' }}">
                <div class="relative overflow-hidden">
                    @if($b->gambar)
                    <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}" class="w-full h-52 object-cover hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-52 gradient-card flex items-center justify-center">
                        <i class="fas fa-newspaper text-white/50 text-5xl"></i>
                    </div>
                    @endif
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur text-blue-700 text-xs font-bold px-3 py-1 rounded-full">
                            {{ $b->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-extrabold text-gray-900 mb-2 line-clamp-2 text-lg leading-snug">{{ $b->judul }}</h3>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($b->isi), 100) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-400 flex items-center gap-1"><i class="fas fa-user"></i>{{ $b->penulis }}</span>
                        <a href="{{ route('berita.show', $b->slug) }}" class="text-blue-600 text-sm font-bold hover:text-blue-800 transition-colors flex items-center gap-1">
                            Baca <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Galeri --}}
@if($galeris->count())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
            <div>
                <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Dokumentasi</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2">Galeri Kegiatan</h2>
            </div>
            <a href="{{ route('galeri') }}" class="mt-4 md:mt-0 text-blue-600 font-bold hover:text-blue-800 transition-colors flex items-center gap-2 text-sm">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($galeris as $g)
            <div class="relative group overflow-hidden rounded-2xl shadow-md img-overlay aspect-square">
                <img src="{{ asset('storage/' . $g->foto) }}" alt="{{ $g->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 flex items-end p-4 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="text-white">
                        <span class="text-xs bg-blue-600 px-2 py-0.5 rounded-full uppercase font-bold">{{ $g->kategori }}</span>
                        <p class="font-bold text-sm mt-1">{{ $g->judul }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Keunggulan --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Mengapa Kami</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-2 section-title">Keunggulan Kami</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-7">
            @foreach([
                ['fa-medal','Akreditasi A','Terakreditasi A oleh BAN-S/M dengan standar pendidikan nasional tertinggi.','blue'],
                ['fa-quran','Berbasis Islam','Mengintegrasikan nilai-nilai Islam dalam setiap aspek pembelajaran dan kehidupan sekolah.','emerald'],
                ['fa-laptop','Fasilitas Modern','Laboratorium lengkap, perpustakaan digital, dan ruang kelas multimedia berteknologi terkini.','blue'],
                ['fa-users-cog','Guru Berpengalaman','85+ tenaga pendidik bersertifikat dengan pengalaman mengajar rata-rata 10 tahun.','emerald'],
                ['fa-trophy','Prestasi Gemilang','Ratusan prestasi akademik dan non-akademik di tingkat regional, nasional, dan internasional.','blue'],
                ['fa-heart','Lingkungan Kondusif','Suasana belajar yang aman, nyaman, dan penuh kasih sayang layaknya keluarga besar.','emerald'],
            ] as $k)
            <div class="card-hover p-7 rounded-3xl border border-gray-100 bg-white shadow-sm hover:border-{{ $k[3] === 'blue' ? 'blue' : 'emerald' }}-100">
                <div class="w-14 h-14 {{ $k[3] === 'blue' ? 'bg-blue-50' : 'bg-emerald-50' }} rounded-2xl flex items-center justify-center mb-5">
                    <i class="fas {{ $k[0] }} {{ $k[3] === 'blue' ? 'text-blue-600' : 'text-emerald-600' }} text-2xl"></i>
                </div>
                <h3 class="font-extrabold text-gray-900 text-lg mb-2">{{ $k[1] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $k[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA PPDB --}}
<section class="py-20 gradient-hero relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
    <div class="max-w-3xl mx-auto px-4 text-center relative z-10">
        <div class="inline-flex items-center gap-2 glass px-4 py-2 rounded-full text-sm font-medium mb-6 text-blue-200">
            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
            Pendaftaran Dibuka
        </div>
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-5 leading-tight">
            Daftarkan Putra-Putri Anda <span class="text-emerald-300">Sekarang!</span>
        </h2>
        <p class="text-blue-200 mb-10 text-lg leading-relaxed">PPDB Tahun Ajaran 2024/2025 telah dibuka. Raih kesempatan terbaik untuk masa depan cerah anak Anda bersama Yayasan Al-Hikmah.</p>
        <a href="{{ route('ppdb') }}" class="btn-green text-white px-10 py-4 rounded-2xl font-extrabold text-lg inline-flex items-center gap-3 shadow-2xl">
            <i class="fas fa-edit"></i>Daftar Online Sekarang
        </a>
    </div>
</section>

@endsection

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

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-4 tracking-tight">
                Yayasan Pondok Pesantren
                <span class="block bg-gradient-to-r from-green-300 via-emerald-400 to-green-300 bg-clip-text text-transparent mt-2">
                    Al-Hidayah
                </span>
            </h1>

            {{-- Typewriter --}}
            <div class="text-xl md:text-2xl font-bold text-green-200/90 mb-6 h-9 flex items-center justify-center gap-2">
                <span>Generasi</span>
                <span id="typewriterText" class="text-white"></span><span class="typewriter-cursor"></span>
            </div>

            <p class="text-green-100/80 text-base md:text-lg mb-10 leading-relaxed max-w-2xl mx-auto">
                Lembaga pendidikan Islam terpercaya sejak 2002. Membentuk generasi cerdas, berakhlak mulia, dan siap menghadapi tantangan global.
            </p>
            <div class="flex flex-wrap justify-center gap-4 mb-14">
                <a href="{{ route('ppdb') }}" class="btn-main text-white px-8 py-4 rounded-2xl font-extrabold text-base inline-flex items-center gap-2">
                    <i class="fas fa-pen-to-square"></i> Daftar PPSB Sekarang
                </a>
                <a href="{{ route('profil') }}" class="btn-outline text-white px-8 py-4 rounded-2xl font-bold text-base inline-flex items-center gap-2">
                    <i class="fas fa-circle-info"></i> Tentang Kami
                </a>
            </div>
        </div>
    </div>

    {{-- Wave --}}
    <div class="absolute bottom-0 left-0 right-0 pointer-events-none z-[15]">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-[60px] md:h-[80px]">
            <path d="M0 120L48 108C96 96 192 72 288 60C384 48 480 48 576 54C672 60 768 72 864 72C960 72 1056 60 1152 54C1248 48 1344 48 1392 48L1440 48V120H0Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

{{-- COUNTDOWN TIMER --}}
<section class="py-16 grad-hero islamic-pattern relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-80 h-80 bg-green-400/10 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-400/10 rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl"></div>
    </div>
    <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-5 py-2 rounded-full text-green-200 text-sm font-bold mb-6">
            <i class="fas fa-hourglass-half text-green-300 animate-spin" style="animation-duration:3s"></i>
            Batas Akhir Pendaftaran PPSB 2026/2027
        </div>
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-10">Jangan Sampai Terlewat!</h2>
        <div id="countdownTimer" class="flex items-center justify-center gap-3 md:gap-5 flex-wrap">
            <div class="countdown-box">
                <div id="cd-days" class="countdown-num">00</div>
                <div class="countdown-label">Hari</div>
            </div>
            <div class="countdown-sep">:</div>
            <div class="countdown-box">
                <div id="cd-hours" class="countdown-num">00</div>
                <div class="countdown-label">Jam</div>
            </div>
            <div class="countdown-sep">:</div>
            <div class="countdown-box">
                <div id="cd-mins" class="countdown-num">00</div>
                <div class="countdown-label">Menit</div>
            </div>
            <div class="countdown-sep">:</div>
            <div class="countdown-box">
                <div id="cd-secs" class="countdown-num">00</div>
                <div class="countdown-label">Detik</div>
            </div>
        </div>
        <p class="text-green-200/70 text-sm mt-8">* Pendaftaran ditutup pada <strong class="text-white">30 Juni 2026</strong></p>
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
            <div class="card tilt-card bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 reveal">
@php $smpFoto = ''; @endphp
                <div class="photo-card h-64 relative flex items-end p-7 overflow-hidden grad-smp" @if($smpFoto) style="background-image: url('{{ asset('storage/' . $smpFoto) }}')" @endif>
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full translate-x-10 -translate-y-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-8 translate-y-8"></div>
                    <div class="absolute top-4 right-4 z-30">
                        <span class="bg-yellow-400 text-yellow-900 text-xs font-extrabold px-3 py-1 rounded-full flex items-center gap-1"><i class="fas fa-star text-xs"></i> Akreditasi A</span>
                    </div>
                    <div class="photo-card-overlay"></div>
                    <div class="relative z-20">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-3 backdrop-blur">
                            <i class="fas fa-school text-white text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-blue-200 uppercase tracking-widest">Jenjang SMP</span>
                    </div>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-2">SMP Unggulan Al-Hidayah</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">Pendidikan menengah pertama berbasis Islam dengan program tahfidz, bahasa Arab, dan kurikulum nasional terintegrasi.</p>
                    <div class="mb-4">
                        <div class="flex justify-between text-xs font-bold text-gray-600 mb-1"><span>Tingkat Kelulusan</span><span class="text-blue-600">98%</span></div>
                        <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden"><div class="h-full rounded-full bg-gradient-to-r from-blue-500 to-blue-400" style="width:98%;transition:width 1.5s ease"></div></div>
                    </div>
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
            <div class="card tilt-card bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 reveal">
@php $smaFoto = ''; @endphp
                <div class="photo-card h-64 relative flex items-end p-7 overflow-hidden grad-sma" @if($smaFoto) style="background-image: url('{{ asset('storage/' . $smaFoto) }}')" @endif>
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full translate-x-10 -translate-y-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-8 translate-y-8"></div>
                    <div class="absolute top-4 right-4 z-30">
                        <span class="bg-yellow-400 text-yellow-900 text-xs font-extrabold px-3 py-1 rounded-full flex items-center gap-1"><i class="fas fa-star text-xs"></i> Akreditasi A</span>
                    </div>
                    <div class="photo-card-overlay"></div>
                    <div class="relative z-20">
                        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-3 backdrop-blur">
                            <i class="fas fa-university text-white text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-sky-200 uppercase tracking-widest">Jenjang SMA</span>
                    </div>
                </div>

                <div class="p-7">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-2">SMA Unggulan Al-Hidayah</h3>
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

{{-- KEUNGGULAN (FLIP CARDS) --}}
<section class="py-24 bg-white section-divider">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-14 reveal">
            <span class="section-label">Mengapa Kami</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3"><span class="title-deco">Keunggulan Kami</span></h2>
            <p class="text-gray-400 text-sm mt-8">Arahkan kursor ke kartu untuk melihat detail</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach([
                ['fa-book-quran','Baca Tulis Al-Quran','Program BTQ terintegrasi dengan metode modern dan bimbingan ustadz berpengalaman.','Metode tartil modern, hafalan bertahap, setoran harian langsung ke ustadz ahli.'],
                ['fa-book-open','Kitab Kuning','Pembelajaran kitab kuning klasik sebagai fondasi keilmuan Islam yang mendalam.','Nahwu Shorof, Fiqih, Tauhid, Akhlak & Tasawuf langsung dari sumber primer.'],
                ['fa-laptop','Fasilitas Modern','Lab lengkap, perpustakaan digital, dan ruang kelas multimedia berstandar tinggi.','Lab komputer, lab IPA, perpustakaan 5000+ judul buku, & ruang multimedia.'],
                ['fa-users-gear','Program Kerja Ke Jepang','Program kerja sama internasional untuk mempersiapkan santri berdaya saing global.','MOU dengan lembaga Jepang, pelatihan bahasa & budaya, penempatan terstruktur.'],
                ['fa-trophy','Prestasi Gemilang','Ratusan prestasi akademik dan non-akademik tingkat regional dan nasional.','Juara MTQ, OSN, LKTI, Pramuka, & berbagai olimpiade tingkat nasional.'],
                ['fa-heart','Thoriqot Syadziliyah','Pendidikan spiritual melalui Thoriqot Syadziliyah Waqodiriyah Wanaqsabandiyah.','Dzikir harian, wirid, muhasabah bersama Romo Kiai setiap malam Jum\'at.'],
            ] as $i => $k)
            <div class="flip-card reveal" style="transition-delay: {{ ($i * 80) }}ms" onclick="this.classList.toggle('flipped')">
                <div class="flip-card-inner">
                    {{-- Front --}}
                    <div class="flip-card-front shadow-sm border border-gray-100">
                        <div class="w-16 h-16 grad-green rounded-2xl flex items-center justify-center mb-5 shadow-md glow-green">
                            <i class="fas {{ $k[0] }} text-white text-2xl"></i>
                        </div>
                        <h3 class="font-extrabold text-gray-900 text-lg mb-2 text-center">{{ $k[1] }}</h3>
                        <p class="text-gray-400 text-xs text-center leading-relaxed">{{ $k[2] }}</p>
                        <div class="mt-4 text-green-500 text-xs font-bold flex items-center gap-1">
                            <i class="fas fa-hand-pointer text-xs"></i> Klik untuk detail
                        </div>
                    </div>
                    {{-- Back --}}
                    <div class="flip-card-back">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
                            <i class="fas {{ $k[0] }} text-white text-xl"></i>
                        </div>
                        <h3 class="font-extrabold text-white text-base mb-3 text-center">{{ $k[1] }}</h3>
                        <p class="text-green-100/90 text-xs text-center leading-relaxed">{{ $k[3] }}</p>
                        <div class="mt-5 text-white/60 text-xs"><i class="fas fa-rotate-left"></i> Klik untuk kembali</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- GALERI --}}
@if($galeris->count())
<section class="py-24 bg-white section-divider">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 reveal">
            <div>
                <span class="section-label">Dokumentasi</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3"><span class="title-deco">Galeri Kegiatan</span></h2>
            </div>
            <a href="{{ route('galeri') }}" class="mt-6 md:mt-0 text-green-600 font-bold text-sm hover:text-green-800 flex items-center gap-2 transition-colors group">
                Lihat Semua <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        <div class="masonry-grid">
            @foreach($galeris as $g)
            <div class="masonry-item reveal">
                <div class="relative group overflow-hidden rounded-2xl shadow-sm cursor-pointer" onclick="openLightbox('{{ asset('storage/'.$g->foto) }}','{{ $g->judul }}')">
                    <img src="{{ asset('storage/'.$g->foto) }}" alt="{{ $g->judul }}" class="w-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <div class="text-white transform translate-y-3 group-hover:translate-y-0 transition-transform duration-300">
                            <span class="text-xs bg-green-500 px-2.5 py-1 rounded-full font-bold uppercase">{{ $g->kategori }}</span>
                            <p class="font-bold text-sm mt-2">{{ $g->judul }}</p>
                        </div>
                    </div>
                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="w-8 h-8 bg-white/90 rounded-full flex items-center justify-center">
                            <i class="fas fa-expand text-gray-700 text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- FAQ ACCORDION --}}
<section class="py-24 bg-gray-50 section-divider">
    <div class="max-w-3xl mx-auto px-4">
        <div class="text-center mb-12 reveal">
            <span class="section-label">Pertanyaan Umum</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3"><span class="title-deco">FAQ PPSB</span></h2>
            <p class="text-gray-500 max-w-xl mx-auto mt-8">Jawaban atas pertanyaan yang sering ditanyakan seputar pendaftaran</p>
        </div>
        <div class="space-y-3 reveal">
            @foreach([
                ['Kapan pendaftaran PPSB dibuka dan ditutup?', 'Pendaftaran PPSB Tahun Ajaran 2026/2027 dibuka mulai 1 Januari 2026 dan ditutup pada 30 Juni 2026. Segera daftarkan putra-putri Anda sebelum kuota penuh.'],
                ['Apakah ada biaya pendaftaran?', 'Pendaftaran online tidak dipungut biaya. Biaya administrasi dan uang pangkal akan diinformasikan setelah dinyatakan diterima, dengan skema cicilan yang tersedia.'],
                ['Apa saja persyaratan untuk mendaftar?', 'Persyaratan meliputi: fotokopi akta kelahiran, fotokopi KK, pas foto 3x4 (4 lembar), fotokopi rapor 2 semester terakhir, dan surat keterangan sehat dari dokter.'],
                ['Apakah tersedia program beasiswa?', 'Ya, tersedia program beasiswa bagi santri berprestasi dan santri dari keluarga kurang mampu. Informasi lebih lanjut dapat ditanyakan langsung ke kantor administrasi yayasan.'],
                ['Bagaimana sistem asrama di Al-Hidayah?', 'Semua santri wajib tinggal di asrama (mondok). Fasilitas asrama meliputi kamar tidur, kamar mandi, ruang belajar, dan kantin. Santri diasuh langsung oleh pengurus asrama 24 jam.'],
                ['Apakah ada jadwal kunjungan orang tua?', 'Kunjungan orang tua diperbolehkan setiap hari Ahad (Minggu) mulai pukul 08.00–17.00 WIB. Di luar jadwal tersebut, komunikasi dapat dilakukan melalui telepon yang telah disediakan.'],
                ['Bagaimana jika anak belum bisa membaca Al-Quran?', 'Tidak perlu khawatir. Kami memiliki program Baca Tulis Al-Quran (BTQ) dari dasar yang akan membimbing santri secara bertahap hingga mahir membaca dan menghafal Al-Quran.'],
                ['Apakah bisa mendaftar untuk SMA jika sebelumnya bukan dari SMP Al-Hidayah?', 'Tentu bisa. Kami menerima pendaftar dari SMP lain selama memenuhi persyaratan akademik dan siap mengikuti program pesantren. Akan ada tes seleksi masuk.'],
            ] as $faq)
            <div class="faq-item bg-white">
                <button class="faq-btn" type="button">
                    <span class="font-bold text-gray-900 text-sm md:text-base">{{ $faq[0] }}</span>
                    <div class="faq-icon flex-shrink-0">
                        <i class="fas fa-plus text-xs"></i>
                    </div>
                </button>
                <div class="faq-body">
                    <div class="faq-body-inner">{{ $faq[1] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

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

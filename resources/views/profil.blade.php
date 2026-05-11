@extends('layouts.app')
@section('title', 'Profil Yayasan')

@section('content')
@php $profilFoto = 'assets/hero-bg.png'; @endphp
<section class="photo-hero islamic-pattern relative overflow-hidden text-white py-20" style="background-image: linear-gradient(135deg, rgba(5,46,22,0.7), rgba(20,83,45,0.6), rgba(22,101,52,0.65)), url('{{ asset('storage/' . $profilFoto) }}'); background-size: cover; background-position: center;">

    <div class="absolute top-0 right-0 w-72 h-72 bg-green-400/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="photo-overlay" style="background: linear-gradient(135deg, rgba(5,46,22,0.45), rgba(20,83,45,0.35), rgba(22,101,52,0.40));"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-20">

        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-green-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-green-400 text-xs"></i>
            <span class="text-white text-sm font-medium">Profil Yayasan</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Profil <span class="text-green-300">Yayasan</span></h1>
        <p class="text-green-200/80 text-lg">Mengenal lebih jauh Yayasan Pondok Pesantren Al-Hidayah</p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-4 gap-8">

        {{-- Sidebar --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-5 sticky top-24">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 px-2">Navigasi</p>
                <nav class="space-y-1">
                    @foreach([
                        ['#sejarah',   'fa-history',      'Sejarah Yayasan'],
                        ['#visi-misi', 'fa-eye',          'Visi & Misi'],
                        ['#struktur',  'fa-sitemap',      'Struktur Organisasi'],
                        ['#kegiatan-harian', 'fa-clock', 'Kegiatan Harian'],
                        ['#kegiatan-mingguan', 'fa-calendar-week', 'Kegiatan Mingguan'],
                        ['#kegiatan-bulanan', 'fa-calendar-alt', 'Kegiatan Bulanan'],
                        ['#kegiatan-tahunan', 'fa-calendar-day', 'Kegiatan Tahunan'],
                        ['#ekstrakurikuler', 'fa-star', 'Ekstrakurikuler'],
                        ['#fasilitas', 'fa-building', 'Fasilitas'],
                    ] as $n)
                    <a href="{{ $n[0] }}" class="sidebar-link">
                        <i class="fas {{ $n[1] }}"></i>{{ $n[2] }}
                    </a>
                    @endforeach
                </nav>
            </div>
        </div>

        {{-- Content --}}
        <div class="lg:col-span-3 space-y-10">

            {{-- Sejarah — Interactive Timeline --}}
            <section id="sejarah" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-history text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Sejarah Yayasan</h2>
                </div>
                <p class="text-gray-600 leading-relaxed mb-10 text-sm">
                    <strong class="text-gray-900">Pondok Pesantren Al-Hidayah</strong> berdiri atas prakarsa
                    <strong class="text-gray-900">KH.R.Mashadi Prawiranegara</strong> sebagai lembaga pendidikan Islam salaf
                    yang menekankan keseimbangan antara pendalaman ilmu agama dan pembentukan akhlak melalui pendekatan tasawuf.
                </p>

                <div class="timeline">
                    @foreach([
                        ['2002', 'fa-mosque',         'Berdirinya Pondok Pesantren',  'Yayasan Pondok Pesantren Al-Hidayah resmi didirikan oleh KH.R.Mashadi Prawiranegara dengan fokus pada pendidikan Islam salaf dan pembentukan akhlakul karimah.'],
                        ['2005', 'fa-book-quran',     'Program Madrasah Diniyah',      'Madrasah Diniyah resmi dibuka sebagai fondasi pembelajaran kitab kuning dan ilmu-ilmu agama Islam secara terstruktur dan berkelanjutan.'],
                        ['2008', 'fa-school',         'Dibukanya SMP Unggulan',        'SMP Unggulan Al-Hidayah resmi beroperasi, mengintegrasikan kurikulum nasional dengan pendidikan pesantren dalam satu atap.'],
                        ['2012', 'fa-university',     'Dibukanya SMA Unggulan',        'SMA Unggulan Al-Hidayah hadir untuk melanjutkan pembinaan santri ke jenjang yang lebih tinggi dengan program IPA unggulan.'],
                        ['2018', 'fa-globe',          'Program Internasional',         'Kerja sama internasional dengan lembaga di Jepang resmi ditandatangani, membuka peluang kerja dan studi lanjut bagi alumni.'],
                        ['2024', 'fa-laptop',         'Digitalisasi & PPDB Online',    'Sistem PPDB Online diluncurkan, memudahkan proses pendaftaran santri baru dari seluruh Indonesia secara digital dan transparan.'],
                    ] as $idx => $tl)
                    <div class="timeline-item">
                        <div class="timeline-content">
                            <div class="timeline-card">
                                <span class="timeline-year">{{ $tl[0] }}</span>
                                <h3 class="font-extrabold text-gray-900 text-base mb-2">{{ $tl[2] }}</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">{{ $tl[3] }}</p>
                            </div>
                        </div>
                        <div class="timeline-dot">
                            <i class="fas {{ $tl[1] }} text-gray-400 text-sm"></i>
                        </div>
                        <div class="timeline-content"></div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Visi Misi --}}
            <section id="visi-misi" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-eye text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Visi & Misi</h2>
                </div>
                <div class="grad-hero rounded-2xl p-6 mb-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-2 text-green-300 font-bold text-sm mb-3 uppercase tracking-wider">
                            <i class="fas fa-eye"></i> Visi
                        </div>
                        <p class="text-white text-lg font-semibold leading-relaxed italic">"Membentuk generasi islam yang berlandaskan nilai-nilai dasar pesantren, berilmu dan beramal, berjiwa dakwah, sabar dan bertawakal kepada Allah SWT, serta mampu menjadi penerus perjuangan dan penjaga cita-cita luhur para kiai dan ulama dalam naungan Ahlusssunnah wal Jama'ah"</p>
                    </div>
                </div>
                <div class="bg-green-50 rounded-2xl p-6 border border-green-100">
                    <div class="flex items-center gap-2 text-green-700 font-bold text-sm mb-4 uppercase tracking-wider">
                        <i class="fas fa-bullseye"></i> Misi
                    </div>
                    <ul class="space-y-3">
                        @foreach([
                            'Menanamkan keimanan dan ketakwaan kepada Allah SWT sebagai lenadasan utama dalam pembentukan karakter santri',
                            'Membentuk santri yang berakhlak mulia, religius dan humanis melalui pengamalan nilai habluminallah dan hablunminannas.',
                            'Membekali santri dengan keterampilan, literasi, serta peguasaan sains dan teknologi yang berlandaskan nilai-nilai Islam.',
                            'Mempersiapkan santri dengan keterampilan, literasi, serta penguasaan sains dan teknologi yang berlandaskan nilai-nilai Islam.'
                        ] as $m)
                        <li class="flex items-start gap-3 text-gray-700 text-sm">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-check text-green-600 text-xs"></i>
                            </div>
                            {{ $m }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            {{-- Struktur --}}
            <section id="struktur" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal tilt-card transition-all duration-300">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-sitemap text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Struktur Organisasi</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach([
                        ['Pengasuh Yayasan', 'KH.R.Mashadi Prawiranegara', 'fa-crown', 'text-amber-500', 'bg-amber-50', 'border-amber-200', 'col-span-full sm:col-span-2 lg:col-span-3 lg:w-2/3 mx-auto'],
                        ['Sekretaris',    '-', 'fa-pen-nib', 'text-blue-500', 'bg-blue-50', 'border-blue-200', ''],
                        ['Bendahara',     'Lu’lu’ul Maknun', 'fa-wallet', 'text-emerald-500', 'bg-emerald-50', 'border-emerald-200', ''],
                        ['Kepala SMP',    'Sulistyowati,S.Pd', 'fa-school', 'text-indigo-500', 'bg-indigo-50', 'border-indigo-200', ''],
                        ['Kepala SMA',    'Muhtarul Aziz,S.E', 'fa-university', 'text-sky-500', 'bg-sky-50', 'border-sky-200', ''],
                    ] as $s)
                    <div class="group p-5 rounded-2xl border border-gray-100 hover:{{ $s[5] }} {{ $s[4] }} hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center {{ $s[6] }}">
                        <div>
                            <div class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">{{ $s[0] }}</div>
                            <div class="font-extrabold text-gray-900 text-sm md:text-base">{{ $s[1] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Kegiatan Harian --}}
            <section id="kegiatan-harian" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Kegiatan Harian</h2>
                </div>
                <div class="overflow-hidden rounded-2xl border border-gray-200">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-green-50 to-emerald-50">
                                <th class="p-4 text-left font-bold text-gray-900 border-b border-gray-200">Waktu</th>
                                <th class="p-4 text-left font-bold text-gray-900 border-b border-gray-200">Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['04:00 - 05:45', 'Sholat Shubuh, Dzikir & Sholat Dhuha'],
                                ['05:45 - 06:00', 'Ngaji Sorogan Al-Qur’an'],
                                ['06:00 - 06:30', 'Piket & Sarapan Pagi'],
                                ['06:30 - 07:00', 'Persiapan Berangkat Sekolah Formal'],
                                ['07:00 - 10:00', 'Kegiatan Belajar Mengajar Formal'],
                                ['10:00 - 10:30', 'Istirahat & Makan Siang'],
                                ['10:30 - 13:00', 'Kegiatan Belajar Mengajar Formal'],
                                ['13:00 - 13-30', 'Sholat Dhuhur'],
                                ['13:30 - 14:30', 'Istirahat & Kegiatan Ekstrakurikuler'],
                                ['14:30 - 15:15', 'Piket dan Persiapan Sholat Ashar'],
                                ['15:15 - 15:45', 'Sholat Ashar Berjamaah'],
                                ['15:45 - 17:00', 'Pembinaan Baca Tulis Al-Qur’an'],
                                ['17:00 - 17:30', 'Makan Sore'],
                                ['17:30 - 18:45', 'Sholat Maghrib & Dzikir Bersama Romo Kiai'],
                                ['18:45 - 19:00', 'Sholat Isya'],
                                ['19:00 - 19:15', 'Persiapan Diniyah'],
                                ['19:15 - 21:15', 'Kegiatan Belajar Mengajar Diniyah'],
                                ['21:15 - 23:30', 'istirahat'],
                                ['23:30 - 00:00', 'Sholat Malam & Dzikir Tahajud'],
                                ['00:00 - 04:00', 'Istirahat'],
                            ] as $h)
                            <tr class="hover:bg-green-50 transition-colors border-b border-gray-100 even:bg-gray-50">
                                <td class="p-4 font-mono text-green-700 font-bold bg-gradient-to-r from-green-100 to-emerald-100">{{ $h[0] }}</td>
                                <td class="p-4 font-semibold text-gray-800">{{ $h[1] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- Kegiatan Mingguan --}}
            <section id="kegiatan-mingguan" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal tilt-card transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-calendar-week text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Kegiatan Mingguan</h2>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    @foreach([
                        ['Rutanin Khususiyah, Thariqoh, Syadziliyah'],
                        ['Waqodiyah Wanasapan diyan, setiap Senin malam Selasa'],
                        ['Istighosah dan Dzikir setiap Kamis malam Jumat'],
                        ['Jum\'at Bersih & Sehat'],
                        ['Pembinaan Seni, Bakat & Olahraga'],
                        ['Pembinaan Qiroatul Qur’an'],
                    ] as $idx => $m)
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-gradient-to-br from-green-50 to-emerald-50/30 border border-green-100 hover:border-green-300 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm group-hover:bg-green-100 transition-colors">
                            <i class="fas fa-calendar-check text-green-500 text-lg group-hover:scale-110 transition-transform"></i>
                        </div>
                        <div class="text-gray-800 font-bold leading-snug pt-1">{{ $m[0] }}</div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Kegiatan Bulanan --}}
            <section id="kegiatan-bulanan" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal tilt-card transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-calendar-alt text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Kegiatan Bulanan</h2>
                </div>
                <div class="grid sm:grid-cols-3 gap-4">
                    @foreach([
                        ['Pengajian Kitab Kuning Bersama (Ahad Legi)'],
                        ['Diba\'iyah Kuboro / Khitobah Kubro'],
                        ['Malam Jum\'at Legi'],
                    ] as $b)
                    <div class="flex flex-col items-center text-center gap-4 p-6 rounded-2xl bg-gradient-to-br from-blue-50 to-sky-50/30 border border-blue-100 hover:border-blue-300 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center flex-shrink-0 shadow-sm group-hover:bg-blue-100 transition-colors">
                            <i class="fas fa-calendar-day text-blue-500 text-xl group-hover:scale-110 transition-transform"></i>
                        </div>
                        <div class="text-gray-800 font-bold leading-snug">{{ $b[0] }}</div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Kegiatan Tahunan --}}
            <section id="kegiatan-tahunan" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal tilt-card transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-calendar-days text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Kegiatan Tahunan</h2>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        ['Haul Akbar Masyayikh dan Dzuriyah', 'fas fa-mosque'],
                        ['Purnawidya SMP-SMA Unggulan', 'fas fa-graduation-cap'],
                        ['Wisuda Binnadzor dan Bil Hifdzi', 'fas fa-trophy'],
                        ['Festival Pesantren dan Acara Kesenian', 'fas fa-music'],
                        ['Masa Ta’aruf Santri Baru', 'fas fa-users'],
                    ] as $t)
                    <div class="group p-6 rounded-2xl border border-gray-100 hover:border-emerald-300 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 bg-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-bl-full opacity-50 group-hover:scale-110 transition-transform"></div>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-emerald-500 transition-colors duration-300 shadow-sm">
                                <i class="{{ $t[1] }} text-xl text-emerald-600 group-hover:text-white transition-colors"></i>
                            </div>
                            <h4 class="font-extrabold text-lg text-gray-900 mb-2 group-hover:text-emerald-700 transition-colors leading-tight">{{ $t[0] }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Ekstrakurikuler --}}
            <section id="ekstrakurikuler" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal tilt-card transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-star text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Ekstrakurikuler</h2>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach([
                        ['Qiro’atul Qur’an', 'fas fa-book-quran'],
                        ['Seni Teater', 'fas fa-theater-masks'],
                        ['Seni Pencak Silat', 'fas fa-hand-fist'],
                        ['Futsal / Sepak Bola', 'fas fa-futbol'],
                        ['Kepramukaan', 'fas fa-campground'],
                        ['Pelatihan Jurnalistik', 'fas fa-newspaper'],
                        ['Pelatihan Public Speaking', 'fas fa-microphone'],
                        ['Pembinaan Praktik Ibadah', 'fas fa-pray'],
                        ['Majlis Al-Banjari & Hadrah', 'fas fa-drum'],
                        ['Pelatihan Desain & Organisasi', 'fas fa-vector-square'],
                        ['Seni, Bakat & Olahraga', 'fas fa-palette'],
                    ] as $e)
                    <div class="group p-5 rounded-2xl border border-gray-100 hover:border-green-300 hover:shadow-lg hover:bg-green-50/50 hover:-translate-y-1 transition-all duration-300 text-center cursor-default">
                        <div class="w-14 h-14 mx-auto mb-3 bg-gradient-to-br from-green-100 to-emerald-100 rounded-2xl flex items-center justify-center group-hover:bg-green-500 transition-colors duration-300 shadow-sm">
                            <i class="{{ $e[1] }} text-xl text-green-600 group-hover:text-white group-hover:animate-bounce transition-colors"></i>
                        </div>
                        <div class="font-bold text-sm text-gray-800 group-hover:text-green-700 leading-tight px-1">{{ $e[0] }}</div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Fasilitas --}}
            <section id="fasilitas" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8 reveal tilt-card transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-building text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Fasilitas</h2>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        ['title' => 'Tenaga Pendidik Profesional', 'icon' => 'fas fa-chalkboard-teacher'],
                        ['title' => 'Lingkungan Tenang, Aman, Islami', 'icon' => 'fas fa-shield-alt'],
                        ['title' => 'Gedung Asrama Memadai', 'icon' => 'fas fa-bed'],
                        ['title' => 'Ruang Belajar Nyaman', 'icon' => 'fas fa-chair'],
                        ['title' => 'Laboratorium Komputer', 'icon' => 'fas fa-laptop'],
                        ['title' => 'Perpustakaan Lengkap', 'icon' => 'fas fa-book-open'],
                        ['title' => 'Sistem Administrasi Terpusat', 'icon' => 'fas fa-server'],
                        ['title' => 'Bantuan Santri Kurang Mampu', 'icon' => 'fas fa-hand-holding-heart'],
                    ] as $f)
                    <div class="group p-6 rounded-2xl border border-gray-100 hover:border-green-300 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 bg-white relative overflow-hidden flex flex-col justify-between">
                        <div class="absolute bottom-0 right-0 w-32 h-32 bg-gradient-to-tl from-green-50 to-transparent rounded-tl-full opacity-50 group-hover:scale-125 transition-transform duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-emerald-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-green-500 transition-colors duration-300 shadow-sm">
                                <i class="{{ $f['icon'] }} text-xl text-green-600 group-hover:text-white transition-colors"></i>
                            </div>
                            <h4 class="font-extrabold text-lg text-gray-900 group-hover:text-green-700 transition-colors leading-tight">{{ $f['title'] }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>



        </div>
    </div>
</div>
@endsection

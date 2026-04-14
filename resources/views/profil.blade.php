@extends('layouts.app')
@section('title', 'Profil Yayasan')

@section('content')
@php $profilFoto = $galeris->isNotEmpty() ? $galeris->random()->foto : ''; @endphp
<section class="photo-hero grad-hero text-white py-16 relative overflow-hidden" @if($profilFoto) style="background-image: url('{{ asset('storage/' . $profilFoto) }}')" @endif>

    <div class="absolute top-0 right-0 w-72 h-72 bg-green-400/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="photo-overlay"></div>
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
                        ['#sambutan',  'fa-comment-dots', 'Sambutan Ketua'],
                    ] as $n)
                    <a href="{{ $n[0] }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-green-50 hover:text-green-700 font-medium text-sm transition-all group">
                        <i class="fas {{ $n[1] }} w-4 text-gray-400 group-hover:text-green-500 transition-colors"></i>{{ $n[2] }}
                    </a>
                    @endforeach
                </nav>
            </div>
        </div>

        {{-- Content --}}
        <div class="lg:col-span-3 space-y-10">

            {{-- Sejarah --}}
            <section id="sejarah" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-history text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Sejarah Yayasan</h2>
                </div>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>Yayasan Pondok Pesantren Al-Hidayah didirikan pada tahun <strong class="text-gray-900">1995</strong> oleh KH. Ahmad Fauzi bersama para tokoh masyarakat setempat. Berawal dari sebuah madrasah kecil dengan 30 siswa, kini telah berkembang menjadi lembaga pendidikan Islam terpercaya dengan lebih dari <strong class="text-gray-900">1.200 siswa aktif</strong>.</p>
                    <p>Selama hampir tiga dekade, yayasan ini telah melahirkan ribuan alumni yang tersebar di berbagai penjuru negeri, berkontribusi dalam berbagai bidang kehidupan dengan tetap menjunjung tinggi nilai-nilai keislaman.</p>
                </div>
                {{-- Timeline --}}
                <div class="mt-8 space-y-1">
                    @foreach([
                        ['1995','Yayasan Al-Hikmah resmi berdiri dengan 30 siswa pertama'],
                        ['2000','Pembangunan gedung SMP Al-Hikmah yang representatif'],
                        ['2005','Pendirian SMA Al-Hikmah dengan 3 jurusan'],
                        ['2015','Meraih Akreditasi A untuk SMP dan SMA'],
                        ['2024','Lebih dari 1.200 siswa aktif dan 85 tenaga pendidik'],
                    ] as $t)
                    <div class="flex gap-4">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 grad-green rounded-full flex items-center justify-center flex-shrink-0 text-white text-xs font-bold shadow-sm">{{ substr($t[0],-2) }}</div>
                            <div class="w-0.5 bg-green-100 flex-1 mt-1"></div>
                        </div>
                        <div class="pb-5">
                            <div class="font-bold text-green-700 text-sm">{{ $t[0] }}</div>
                            <div class="text-gray-600 text-sm mt-0.5">{{ $t[1] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Visi Misi --}}
            <section id="visi-misi" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8">
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
                        <p class="text-white text-lg font-semibold leading-relaxed italic">"Menjadi lembaga pendidikan Islam unggulan yang melahirkan generasi cerdas, berakhlak mulia, dan berdaya saing global."</p>
                    </div>
                </div>
                <div class="bg-green-50 rounded-2xl p-6 border border-green-100">
                    <div class="flex items-center gap-2 text-green-700 font-bold text-sm mb-4 uppercase tracking-wider">
                        <i class="fas fa-bullseye"></i> Misi
                    </div>
                    <ul class="space-y-3">
                        @foreach([
                            'Menyelenggarakan pendidikan berkualitas berbasis nilai-nilai Islam',
                            'Mengembangkan potensi siswa secara holistik (akademik, spiritual, sosial)',
                            'Membangun lingkungan belajar yang kondusif dan inovatif',
                            'Menjalin kemitraan dengan orang tua, masyarakat, dan dunia usaha',
                            'Mempersiapkan lulusan yang siap menghadapi tantangan global',
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
            <section id="struktur" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-sitemap text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Struktur Organisasi</h2>
                </div>
                <div class="space-y-3">
                    @foreach([
                        ['Ketua Yayasan', 'KH. Ahmad Fauzi, M.Pd.I',      'grad-green',    'text-white'],
                        ['Sekretaris',    'Drs. Hasan Basri, M.M',         'bg-gray-100',   'text-gray-900'],
                        ['Bendahara',     'Hj. Siti Aminah, S.E',          'bg-gray-100',   'text-gray-900'],
                        ['Kepala SMP',    'Drs. Muhamad Ridwan, M.Pd',     'bg-green-50',   'text-green-900'],
                        ['Kepala SMA',    'Dr. Fatimah Zahra, M.Pd',       'bg-green-50',   'text-green-900'],
                    ] as $s)
                    <div class="flex items-center gap-4 p-4 {{ $s[2] }} rounded-2xl">
                        <div class="w-11 h-11 {{ $s[2] === 'grad-green' ? 'bg-white/20' : 'bg-white' }} rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i class="fas fa-user {{ $s[3] }} opacity-70"></i>
                        </div>
                        <div>
                            <div class="font-extrabold {{ $s[3] }} text-sm">{{ $s[1] }}</div>
                            <div class="text-xs {{ $s[3] }} opacity-60 mt-0.5">{{ $s[0] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Sambutan --}}
            <section id="sambutan" class="bg-white rounded-3xl shadow-md border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 grad-green rounded-2xl flex items-center justify-center shadow-md">
                        <i class="fas fa-comment-dots text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Sambutan Ketua Yayasan</h2>
                </div>
                <div class="flex items-center gap-4 mb-6 p-4 bg-gray-50 rounded-2xl">
                    <div class="w-16 h-16 grad-green rounded-2xl flex items-center justify-center flex-shrink-0 shadow-md">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <div>
                        <div class="font-extrabold text-gray-900">KH. Ahmad Fauzi, M.Pd.I</div>
                        <div class="text-gray-500 text-sm">Ketua Yayasan Al-Hidayah</div>
                        <div class="flex gap-1 mt-1">
                            @for($i=0;$i<5;$i++)<i class="fas fa-star text-amber-400 text-xs"></i>@endfor
                        </div>
                    </div>
                </div>
                <blockquote class="relative">
                    <i class="fas fa-quote-left text-green-100 text-5xl absolute -top-2 -left-2"></i>
                    <p class="text-gray-600 leading-relaxed pl-8 italic">Bismillahirrahmanirrahim. Assalamu'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT atas segala nikmat dan karunia-Nya. Yayasan Pendidikan Al-Hikmah hadir sebagai wujud nyata komitmen kami dalam mencerdaskan kehidupan bangsa. Kami percaya bahwa pendidikan yang baik adalah investasi terbaik untuk masa depan. Mari bersama-sama kita wujudkan generasi emas Indonesia yang cerdas dan berakhlak mulia.</p>
                </blockquote>
            </section>

        </div>
    </div>
</div>
@endsection

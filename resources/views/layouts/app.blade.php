<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yayasan Pondok Pesantren Al-Hidayah')</title>
<script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        .photo-hero {
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .photo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
            z-index: 10;
        }
        .photo-card {
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .photo-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
            z-index: 10;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { scroll-behavior: smooth; }
body { font-family: 'Plus Jakarta Sans', sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; text-rendering: optimizeLegibility; backface-visibility: hidden; }

        /* Base Colors */
        :root {
            --green-primary: #16a34a;
            --green-light: #22c55e;
            --green-bright: #4ade80;
        }

        /* Gradients */
        .grad-main    { background: linear-gradient(135deg, #14532d 0%, #16a34a 50%, #22c55e 100%); }
        .grad-hero    { background: linear-gradient(135deg, #052e16 0%, #14532d 40%, #166534 100%); }
        .grad-green   { background: linear-gradient(135deg, #16a34a, #22c55e); }
        .grad-smp     { background: linear-gradient(135deg, #1e3a8a, #1d4ed8, #2563eb); }
        .grad-sma     { background: linear-gradient(135deg, #0369a1, #0284c7, #38bdf8); }
        .grad-card    { background: linear-gradient(135deg, #16a34a, #15803d); }
        .grad-footer  { background: #000000; }

        /* Glass */
        .glass { background: rgba(255,255,255,0.1); backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.2); }
        .glass-dark { background: rgba(0,0,0,0.2); backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.1); }

        /* Buttons */
        .btn-main { background: linear-gradient(135deg, #16a34a, #22c55e); box-shadow: 0 4px 20px rgba(34,197,94,0.4); transition: all .3s; }
        .btn-main:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(34,197,94,0.5); }
        .btn-outline { border: 2px solid rgba(255,255,255,0.6); transition: all .3s; }
        .btn-outline:hover { background: rgba(255,255,255,0.15); border-color: white; }
        .btn-smp { background: linear-gradient(135deg, #1e3a8a, #2563eb); box-shadow: 0 4px 20px rgba(37,99,235,0.4); transition: all .3s; }
        .btn-smp:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(37,99,235,0.5); }
        .btn-sma { background: linear-gradient(135deg, #0369a1, #38bdf8); box-shadow: 0 4px 20px rgba(56,189,248,0.4); transition: all .3s; }
        .btn-sma:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(56,189,248,0.5); }

        /* Cards */
        .card { transition: all .35s cubic-bezier(.4,0,.2,1); }
        .card:hover { transform: translateY(-8px); box-shadow: 0 24px 48px rgba(0,0,0,0.1); }

        /* Nav */
        .nav-item { position: relative; transition: color .2s; }
        .nav-item::after { content:''; position:absolute; bottom:-4px; left:0; width:0; height:2px; background: linear-gradient(90deg,#16a34a,#22c55e); border-radius:2px; transition: width .3s; }
        .nav-item:hover::after, .nav-item.active::after { width:100%; }

        /* Blob decorations */
        .blob { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }

        /* PPDB ticker */
        .ticker { background: linear-gradient(90deg, #14532d, #16a34a, #22c55e, #16a34a, #14532d); background-size: 300% 100%; animation: ticker 4s linear infinite; color: white !important; -webkit-text-fill-color: white; text-shadow: 0 0 1px rgba(255,255,255,0.8); }
        @keyframes ticker { 0%{background-position:100% 0} 100%{background-position:-100% 0} }

        /* Font fix for hero and white text */
        .photo-hero *, .grad-hero * { color: white !important; -webkit-text-fill-color: white; -webkit-font-smoothing: antialiased; text-shadow: 0 0 1px rgba(255,255,255,0.5); }

        /* Glow */
        .glow-green { box-shadow: 0 0 30px rgba(34,197,94,0.3); }
        .glow-blue  { box-shadow: 0 0 30px rgba(37,99,235,0.3); }

        /* Badge */
        .badge-green { background: rgba(34,197,94,0.15); color: #16a34a; border: 1px solid rgba(34,197,94,0.3); }
        .badge-blue  { background: rgba(37,99,235,0.1); color: #1d4ed8; border: 1px solid rgba(37,99,235,0.2); }

        /* Dot pulse */
        .dot-pulse { width:8px; height:8px; background:#22c55e; border-radius:50%; animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(1.3)} }

        /* Section label */
        .section-label { font-size:.7rem; font-weight:800; letter-spacing:.15em; text-transform:uppercase; color:#16a34a; }

        /* Underline deco */
        .title-deco { position:relative; display:inline-block; }
        .title-deco::after { content:''; position:absolute; bottom:-6px; left:0; width:100%; height:4px; background:linear-gradient(90deg,#16a34a,#22c55e,transparent); border-radius:2px; }

        /* Global font rendering fix */
        * { -webkit-font-smoothing: antialiased !important; -moz-osx-font-smoothing: grayscale !important; text-rendering: optimizeLegibility !important; }
    </style>
</head>
<body class="bg-gray-50 antialiased">

{{-- PPDB Ticker --}}
<div class="ticker text-white text-center py-2 text-xs font-bold tracking-widest uppercase">
    🎓 &nbsp; PPSB 2026/2027 Resmi Dibuka — Daftarkan Putra-Putri Anda Sekarang &nbsp;
    <a href="{{ route('ppdb') }}" class="underline underline-offset-2 hover:text-green-200 transition-colors">Daftar di sini →</a>
    &nbsp; 🎓
</div>

{{-- Navbar --}}
<nav class="bg-white/95 backdrop-blur-xl sticky top-0 z-50 border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 grad-green rounded-xl flex items-center justify-center shadow-md group-hover:scale-105 transition-transform glow-green">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <div class="leading-tight">
                    <div class="font-extrabold text-gray-900 text-sm">Yayasan Pondok Pesantren Al-Hidayah</div>
                    <div class="text-xs font-semibold text-green-600">Pendidikan Islami Unggulan</div>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-7">
                <a href="{{ route('home') }}"     class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Beranda</a>
                <a href="{{ route('profil') }}"   class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Profil</a>
                <div class="relative group">
                    <button class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700 flex items-center gap-1">
                        Sekolah <i class="fas fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-52 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 translate-y-1 group-hover:translate-y-0">
                        <a href="{{ route('sekolah.smp') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-green-50 transition-colors group/item">
                            <div class="w-8 h-8 grad-smp rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-school text-white text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-800 group-hover/item:text-blue-700">SMP Unggulan Al-Hidayah</div>
                                <div class="text-xs text-gray-400">Menengah Pertama</div>
                            </div>
                        </a>
                        <a href="{{ route('sekolah.sma') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-green-50 transition-colors group/item">
                            <div class="w-8 h-8 grad-sma rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-university text-white text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-800 group-hover/item:text-sky-600">SMA Unggulan Al-Hidayah</div>
                                <div class="text-xs text-gray-400">Menengah Atas</div>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="{{ route('galeri') }}"   class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Galeri</a>
                <a href="{{ route('kontak') }}"   class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Kontak</a>
                <a href="{{ route('ppdb') }}" class="btn-main text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                    <i class="fas fa-pen-to-square text-xs"></i> Daftar PPSB
                </a>
            </div>

            {{-- Mobile Toggle --}}
            <button id="mobileToggle" class="lg:hidden w-9 h-9 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-green-50 transition-colors">
                <i class="fas fa-bars text-gray-700 text-sm"></i>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden lg:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}"       class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Beranda</a>
            <a href="{{ route('profil') }}"     class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Profil</a>
            <a href="{{ route('sekolah.smp') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-semibold text-sm transition-colors"><i class="fas fa-school text-blue-500 w-4"></i>SMP Al-Hikmah</a>
            <a href="{{ route('sekolah.sma') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-sky-50 hover:text-sky-600 font-semibold text-sm transition-colors"><i class="fas fa-university text-sky-500 w-4"></i>SMA Al-Hikmah</a>
            <a href="{{ route('galeri') }}"     class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Galeri</a>
            <a href="{{ route('kontak') }}"     class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Kontak</a>
            <a href="{{ route('ppdb') }}"       class="btn-main text-white px-4 py-2.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 mt-2">
                <i class="fas fa-pen-to-square text-xs"></i>Daftar PPSB
            </a>
        </div>
    </div>
</nav>

{{-- Flash --}}
@if(session('success'))
<div class="max-w-7xl mx-auto px-4 mt-4">
    <div class="bg-green-50 border border-green-200 text-green-800 px-5 py-3.5 rounded-2xl flex items-center justify-between">
        <span class="flex items-center gap-2 text-sm font-semibold"><i class="fas fa-circle-check text-green-500"></i>{{ session('success') }}</span>
        <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-green-600 transition-colors"><i class="fas fa-xmark"></i></button>
    </div>
</div>
@endif

@yield('content')

{{-- Footer --}}
<footer class="grad-footer text-white mt-20 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-green-500/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-green-400/5 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 pt-16 pb-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-12">

            {{-- Brand --}}
            <div class="md:col-span-4">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 grad-green rounded-xl flex items-center justify-center shadow-lg glow-green">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <div>
                        <div class="font-extrabold text-white">Yayasan Pondok Pesantren Al-Hidayah</div>
                        <div class="text-green-400 text-xs font-semibold">Pendidikan Islami Unggulan</div>
                    </div>
                </div>
                <p class="text-green-200/70 text-sm leading-relaxed mb-6">Mendidik generasi bangsa yang cerdas, berakhlak mulia, dan berdaya saing global sejak 2002.</p>
                <div class="flex gap-2">
                    <a href="https://facebook.com" class="w-9 h-9 rounded-xl flex items-center justify-center text-white text-sm transition-all hover:scale-110 hover:shadow-lg" style="background:#1877f240; border:1px solid #1877f260">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com" class="w-9 h-9 rounded-xl flex items-center justify-center text-white text-sm transition-all hover:scale-110 hover:shadow-lg" style="background:#e4405f40; border:1px solid #e4405f60">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com" class="w-9 h-9 rounded-xl flex items-center justify-center text-white text-sm transition-all hover:scale-110 hover:shadow-lg" style="background:#ff000040; border:1px solid #ff000060">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- Links --}}
            <div class="md:col-span-2">
                <h4 class="font-bold text-white text-sm mb-4 uppercase tracking-wider">Halaman</h4>
                <ul class="space-y-2.5">
                    @foreach([['home','Beranda'],['profil','Profil'],['galeri','Galeri'],['kontak','Kontak']] as $l)
                    <li><a href="{{ route($l[0]) }}" class="text-green-200/70 hover:text-white text-sm transition-colors flex items-center gap-2 group">
                        <i class="fas fa-chevron-right text-xs text-green-500 group-hover:translate-x-1 transition-transform"></i>{{ $l[1] }}
                    </a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Sekolah --}}
            <div class="md:col-span-3">
                <h4 class="font-bold text-white text-sm mb-4 uppercase tracking-wider">Unit Sekolah</h4>
                <div class="space-y-3">
                    <a href="{{ route('sekolah.smp') }}" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition-colors border border-white/10">
                        <div class="w-8 h-8 grad-smp rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-school text-white text-xs"></i>
                        </div>
                        <div>
                            <div class="text-white text-sm font-bold">SMP Unggulan Al-Hidayah</div>
                            <div class="text-green-300/60 text-xs">Menengah Pertama</div>
                        </div>
                    </a>
                    <a href="{{ route('sekolah.sma') }}" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition-colors border border-white/10">
                        <div class="w-8 h-8 grad-sma rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-university text-white text-xs"></i>
                        </div>
                        <div>
                            <div class="text-white text-sm font-bold">SMA Unggulan Al-Hidayah</div>
                            <div class="text-green-300/60 text-xs">Menengah Atas</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Kontak --}}
            <div class="md:col-span-3">
                <h4 class="font-bold text-white text-sm mb-4 uppercase tracking-wider">Kontak</h4>
                <ul class="space-y-3">
                    @foreach([
                        ['fas fa-location-dot','Jl. Mojosari-Pacet, Gg. Mbah Gepuk,Dsn. Kedung Rejo, Ds. Simbaringin, kec. Kutorejo, Kab. Mojokerto, Jawa Timur 61392'],
                        ['fas fa-phone','(021) 1234-5678'],
                        ['fab fa-whatsapp','0878-9764-0195'],
                        ['fas fa-envelope','info@alhidayah.sch.id'],
                    ] as $k)
                    <li class="flex items-start gap-3 text-sm text-green-200/70">
                        <i class="{{ $k[0] }} text-green-400 mt-0.5 w-4 text-center flex-shrink-0"></i>{{ $k[1] }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 flex flex-col md:flex-row justify-between items-center gap-3">
            <p class="text-green-300/50 text-xs">© {{ date('Y') }} Yayasan Pondok Pesantren Al-Hidayah. Hak cipta dilindungi.</p>
            <a href="{{ route('login') }}" class="text-green-300/40 hover:text-green-300/70 text-xs transition-colors flex items-center gap-1">
                <i class="fas fa-lock text-xs"></i> Admin
            </a>
        </div>
    </div>
</footer>

<script>
    document.getElementById('mobileToggle').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
</body>
</html>

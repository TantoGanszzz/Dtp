<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yayasan Pondok Pesantren Al-Hidayah')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ═══════════════════════════════════════════
           DESIGN SYSTEM — Al-Hidayah Premium Theme
           ═══════════════════════════════════════════ */

        * { scroll-behavior: smooth; -webkit-font-smoothing: antialiased !important; -moz-osx-font-smoothing: grayscale !important; text-rendering: optimizeLegibility !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; backface-visibility: hidden; }

        :root {
            --green-primary: #16a34a;
            --green-light: #22c55e;
            --green-bright: #4ade80;
            --green-dark: #14532d;
        }

        /* ── Photo Hero ── */
        .photo-hero { position: relative; overflow: hidden; background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; }
        .photo-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(5,46,22,0.85), rgba(20,83,45,0.75), rgba(22,101,52,0.80)); z-index: 10; }
        .photo-card { position: relative; overflow: hidden; background-size: cover; background-position: center; background-repeat: no-repeat; }
        .photo-card-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6)); z-index: 10; }

        /* ── Islamic Geometric Pattern Overlay ── */
        .islamic-pattern::before {
            content: '';
            position: absolute;
            inset: 0;
            z-index: 11;
            opacity: 0.04;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* ── Gradients ── */
        .grad-main    { background: linear-gradient(135deg, #14532d 0%, #16a34a 50%, #22c55e 100%); }
        .grad-hero    { background: linear-gradient(135deg, #052e16 0%, #14532d 40%, #166534 100%); }
        .grad-green   { background: linear-gradient(135deg, #16a34a, #22c55e); }
        .grad-smp     { background: linear-gradient(135deg, #1e3a8a, #1d4ed8, #2563eb); }
        .grad-sma     { background: linear-gradient(135deg, #0369a1, #0284c7, #38bdf8); }
        .grad-card    { background: linear-gradient(135deg, #16a34a, #15803d); }
        .grad-footer  { background: linear-gradient(180deg, #0a0a0a 0%, #000000 100%); }
        .gradient-card  { background: linear-gradient(135deg, #16a34a, #15803d); }
        .gradient-green { background: linear-gradient(135deg, #16a34a, #22c55e); }

        /* ── Premium Glass ── */
        .glass { background: rgba(255,255,255,0.08); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); border: 1px solid rgba(255,255,255,0.15); }
        .glass-dark { background: rgba(0,0,0,0.2); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); border: 1px solid rgba(255,255,255,0.08); }

        /* ── Buttons ── */
        .btn-main { background: linear-gradient(135deg, #16a34a, #22c55e); box-shadow: 0 4px 20px rgba(34,197,94,0.4); transition: all .3s cubic-bezier(.4,0,.2,1); position: relative; overflow: hidden; }
        .btn-main:hover { transform: translateY(-3px) scale(1.02); box-shadow: 0 12px 35px rgba(34,197,94,0.5); }
        .btn-main::after { content:''; position:absolute; top:-50%; left:-50%; width:200%; height:200%; background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg) translateX(-100%); transition: .6s; }
        .btn-main:hover::after { transform: rotate(45deg) translateX(100%); }
        .btn-outline { border: 2px solid rgba(255,255,255,0.5); transition: all .3s; backdrop-filter: blur(8px); background: rgba(255,255,255,0.05); }
        .btn-outline:hover { background: rgba(255,255,255,0.15); border-color: white; transform: translateY(-2px); }
        .btn-smp { background: linear-gradient(135deg, #1e3a8a, #2563eb); box-shadow: 0 4px 20px rgba(37,99,235,0.4); transition: all .3s; position: relative; overflow: hidden; }
        .btn-smp:hover { transform: translateY(-3px); box-shadow: 0 12px 35px rgba(37,99,235,0.5); }
        .btn-smp::after { content:''; position:absolute; top:-50%; left:-50%; width:200%; height:200%; background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg) translateX(-100%); transition: .6s; }
        .btn-smp:hover::after { transform: rotate(45deg) translateX(100%); }
        .btn-sma { background: linear-gradient(135deg, #0369a1, #38bdf8); box-shadow: 0 4px 20px rgba(56,189,248,0.4); transition: all .3s; position: relative; overflow: hidden; }
        .btn-sma:hover { transform: translateY(-3px); box-shadow: 0 12px 35px rgba(56,189,248,0.5); }
        .btn-sma::after { content:''; position:absolute; top:-50%; left:-50%; width:200%; height:200%; background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg) translateX(-100%); transition: .6s; }
        .btn-sma:hover::after { transform: rotate(45deg) translateX(100%); }

        /* ── Premium Cards ── */
        .card { transition: all .4s cubic-bezier(.4,0,.2,1); border: 1px solid rgba(0,0,0,0.05); }
        .card:hover { transform: translateY(-10px); box-shadow: 0 30px 60px rgba(0,0,0,0.12); }
        .card-hover { transition: all .35s cubic-bezier(.4,0,.2,1); }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(0,0,0,0.1); }

        /* ── Nav ── */
        .nav-item { position: relative; transition: color .2s; }
        .nav-item::after { content:''; position:absolute; bottom:-4px; left:50%; width:0; height:2.5px; background: linear-gradient(90deg,#16a34a,#22c55e); border-radius:2px; transition: all .3s cubic-bezier(.4,0,.2,1); transform: translateX(-50%); }
        .nav-item:hover::after, .nav-item.active::after { width:100%; }

        /* ── Blob Decorations ── */
        .blob { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }

        /* ── PPDB Ticker ── */
        .ticker { background: linear-gradient(90deg, #052e16, #14532d, #16a34a, #14532d, #052e16); background-size: 300% 100%; animation: ticker 4s linear infinite; color: white !important; -webkit-text-fill-color: white; }
        @keyframes ticker { 0%{background-position:100% 0} 100%{background-position:-100% 0} }

        /* ── Hero Text Fix ── */
        .photo-hero *, .grad-hero * { color: white !important; -webkit-text-fill-color: white; -webkit-font-smoothing: antialiased; }

        /* ── Glow Effects ── */
        .glow-green { box-shadow: 0 0 30px rgba(34,197,94,0.3); }
        .glow-blue  { box-shadow: 0 0 30px rgba(37,99,235,0.3); }

        /* ── Badges ── */
        .badge-green { background: rgba(34,197,94,0.12); color: #16a34a; border: 1px solid rgba(34,197,94,0.25); }
        .badge-blue  { background: rgba(37,99,235,0.08); color: #1d4ed8; border: 1px solid rgba(37,99,235,0.2); }

        /* ── Dot Pulse ── */
        .dot-pulse { width:8px; height:8px; background:#22c55e; border-radius:50%; animation: pulse 2s infinite; box-shadow: 0 0 8px rgba(34,197,94,0.6); }
        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(1.5)} }

        /* ── Section Label ── */
        .section-label { font-size:.7rem; font-weight:800; letter-spacing:.2em; text-transform:uppercase; color:#16a34a; display: inline-flex; align-items: center; gap: 8px; }
        .section-label::before { content:''; width:20px; height:2px; background: linear-gradient(90deg, #16a34a, #22c55e); border-radius:2px; }

        /* ── Title Decoration ── */
        .title-deco { position:relative; display:inline-block; }
        .title-deco::after { content:''; position:absolute; bottom:-8px; left:0; width:60px; height:4px; background:linear-gradient(90deg,#16a34a,#22c55e); border-radius:99px; }

        /* ── Scroll Reveal Animation ── */
        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(.4,0,.2,1); }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        /* ── Floating Particles ── */
        .particle { position: absolute; border-radius: 50%; pointer-events: none; animation: float-particle linear infinite; }
        @keyframes float-particle {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) rotate(720deg); opacity: 0; }
        }

        /* ── Animated Counter ── */
        .counter { display: inline-block; }

        /* ── Subtle Background Grain ── */
        .bg-grain::after {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            opacity: 0.015;
            pointer-events: none;
            z-index: 9999;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }

        /* ── Section Divider ── */
        .section-divider { position: relative; }
        .section-divider::before { content:''; position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 60px; height: 4px; background: linear-gradient(90deg, transparent, #16a34a, transparent); border-radius: 99px; }
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
<nav class="bg-white/80 backdrop-blur-2xl sticky top-0 z-50 border-b border-gray-100/80 shadow-[0_4px_30px_rgba(0,0,0,0.06)]" id="mainNav">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-[4.5rem]">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center overflow-hidden shadow-md group-hover:scale-105 transition-transform bg-white">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo Yayasan" class="w-full h-full object-cover">
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

                @auth
                    {{-- User sudah login: tampilkan tombol PPSB (jika role user) + dropdown profil --}}
                    @if(auth()->user()->isUser())
                        <a href="{{ route('ppdb') }}" class="btn-main text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                            <i class="fas fa-pen-to-square text-xs"></i> Daftar PPSB
                        </a>
                    @endif
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-sm font-semibold text-gray-600 hover:text-green-700">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-green-600 text-xs"></i>
                            </div>
                            {{ auth()->user()->name }}
                            <i class="fas fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute top-full right-0 mt-3 w-52 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 translate-y-1 group-hover:translate-y-0">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-gray-400">{{ auth()->user()->email }}</div>
                            </div>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-blue-600 hover:bg-blue-50 font-semibold transition-colors">
                                    <i class="fas fa-gauge text-xs w-4"></i>Dashboard Admin
                                </a>
                            @endif
                            <a href="{{ route('profil.akun') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-600 hover:bg-green-50 hover:text-green-700 font-semibold transition-colors">
                                <i class="fas fa-id-card text-xs w-4"></i>Profil Saya
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 font-semibold transition-colors">
                                    <i class="fas fa-right-from-bracket text-xs w-4"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Belum login: tampilkan Login & Daftar --}}
                    <a href="{{ route('login') }}" class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Login</a>
                    <a href="{{ route('register') }}" class="btn-main text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                        <i class="fas fa-pen-to-square text-xs"></i> Daftar PPSB
                    </a>
                @endauth
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

            @auth
                {{-- Info user --}}
                <div class="px-3 py-2.5 mt-2 bg-green-50 rounded-xl">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center"><i class="fas fa-user text-green-600 text-xs"></i></div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-400">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('profil.akun') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">
                    <i class="fas fa-id-card text-green-500 w-4"></i>Profil Saya
                </a>
                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-blue-600 hover:bg-blue-50 font-semibold text-sm transition-colors">
                    <i class="fas fa-gauge w-4"></i>Dashboard Admin
                </a>
                @endif
                @if(auth()->user()->isUser())
                <a href="{{ route('ppdb') }}" class="btn-main text-white px-4 py-2.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 mt-1">
                    <i class="fas fa-pen-to-square text-xs"></i>Daftar PPSB
                </a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-semibold text-sm transition-colors">
                        <i class="fas fa-right-from-bracket text-xs"></i>Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors mt-1">
                    <i class="fas fa-sign-in-alt text-green-500 w-4"></i>Login
                </a>
                <a href="{{ route('register') }}" class="btn-main text-white px-4 py-2.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 mt-2">
                    <i class="fas fa-pen-to-square text-xs"></i>Daftar PPSB
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- Flash --}}
@if(session('success'))
<div id="toast-success" class="fixed top-24 right-4 z-[100] animate-[bounce_1s_ease-in-out]">
    <div class="bg-white border-l-4 border-green-500 shadow-2xl px-6 py-4 rounded-xl flex items-start gap-4 max-w-sm">
        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0 mt-0.5">
            <i class="fas fa-check text-green-600"></i>
        </div>
        <div>
            <h4 class="text-gray-900 font-extrabold text-sm">Pendaftaran Berhasil!</h4>
            <p class="text-gray-600 text-sm mt-1 leading-relaxed">{{ session('success') }}</p>
        </div>
        <button onclick="document.getElementById('toast-success').remove()" class="text-gray-400 hover:text-gray-600 transition-colors ml-2 mt-0.5"><i class="fas fa-xmark"></i></button>
    </div>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-success');
        if(toast) {
            toast.style.transition = 'opacity 0.5s ease';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500);
        }
    }, 5000);
</script>
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
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg overflow-hidden bg-white">
                        <img src="{{ asset('logo.jpg') }}" alt="Logo Yayasan" class="w-full h-full object-cover">
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
    // Mobile menu toggle
    document.getElementById('mobileToggle').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    // Scroll Reveal Animation
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    revealElements.forEach(el => revealObserver.observe(el));

    // Animated Counter
    const counters = document.querySelectorAll('[data-count]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.count);
                const suffix = el.dataset.suffix || '';
                const duration = 2000;
                const start = performance.now();
                function update(now) {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(target * eased) + suffix;
                    if (progress < 1) requestAnimationFrame(update);
                }
                requestAnimationFrame(update);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.3 });
    counters.forEach(el => counterObserver.observe(el));

    // Navbar shadow on scroll
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('mainNav');
        if (nav) {
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
                nav.classList.remove('shadow-[0_4px_30px_rgba(0,0,0,0.06)]');
            } else {
                nav.classList.remove('shadow-lg');
                nav.classList.add('shadow-[0_4px_30px_rgba(0,0,0,0.06)]');
            }
        }
    });
</script>
</body>
</html>

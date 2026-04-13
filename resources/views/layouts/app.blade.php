<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yayasan Pondok Pesantren Al-Hidayah')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: {
                        primary: { 50:'#eff6ff', 100:'#dbeafe', 500:'#3b82f6', 600:'#2563eb', 700:'#1d4ed8', 800:'#1e40af', 900:'#1e3a8a' },
                        emerald: { 500:'#10b981', 600:'#059669', 700:'#047857' }
                    }
                }
            }
        }
    </script>
    <style>
        * { scroll-behavior: smooth; }
        .gradient-hero { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 40%, #065f46 100%); }
        .gradient-card { background: linear-gradient(135deg, #1e40af, #1d4ed8); }
        .gradient-green { background: linear-gradient(135deg, #065f46, #047857); }
        .glass { background: rgba(255,255,255,0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); }
        .card-hover { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
        .nav-link { position: relative; }
        .nav-link::after { content:''; position:absolute; bottom:-2px; left:0; width:0; height:2px; background:#2563eb; transition:width 0.3s; }
        .nav-link:hover::after { width:100%; }
        .btn-primary { background: linear-gradient(135deg, #1e40af, #2563eb); transition: all 0.3s; box-shadow: 0 4px 15px rgba(37,99,235,0.4); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(37,99,235,0.5); }
        .btn-green { background: linear-gradient(135deg, #065f46, #059669); transition: all 0.3s; box-shadow: 0 4px 15px rgba(5,150,105,0.4); }
        .btn-green:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(5,150,105,0.5); }
        .section-title::after { content:''; display:block; width:60px; height:4px; background:linear-gradient(90deg,#2563eb,#059669); border-radius:2px; margin:12px auto 0; }
        .ppdb-banner { background: linear-gradient(90deg, #065f46, #059669, #065f46); background-size: 200% 100%; animation: shimmer 3s infinite; }
        @keyframes shimmer { 0%{background-position:200% 0} 100%{background-position:-200% 0} }
        .stat-card { background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05)); }
        .img-overlay::after { content:''; position:absolute; inset:0; background:linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%); }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">

{{-- PPDB Banner --}}
<div class="ppdb-banner text-white text-center py-2.5 text-sm font-semibold tracking-wide">
    🎉 <span class="opacity-90">PPDB 2024/2025 RESMI DIBUKA!</span>
    <a href="{{ route('ppdb') }}" class="ml-3 bg-white/20 hover:bg-white/30 px-3 py-0.5 rounded-full text-xs font-bold transition-all">Daftar Sekarang →</a>
</div>

{{-- Navbar --}}
<nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-17 py-3">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="w-11 h-11 rounded-xl gradient-card flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform">
                    <i class="fas fa-graduation-cap text-white text-lg"></i>
                </div>
                <div>
                    <div class="font-extrabold text-gray-900 text-base leading-tight">Yayasan Al-Hidayah</div>
                    <div class="text-xs text-blue-600 font-medium">Pendidikan Berkualitas & Islami</div>
                </div>
            </a>

            <div class="hidden md:flex items-center space-x-7">
                <a href="{{ route('home') }}" class="nav-link text-sm font-semibold text-gray-700 hover:text-blue-700 transition-colors py-1">Beranda</a>
                <a href="{{ route('profil') }}" class="nav-link text-sm font-semibold text-gray-700 hover:text-blue-700 transition-colors py-1">Profil</a>
                <div class="relative group">
                    <button class="nav-link text-sm font-semibold text-gray-700 hover:text-blue-700 transition-colors py-1 flex items-center gap-1">
                        Sekolah <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 bg-white shadow-xl rounded-2xl py-2 w-48 hidden group-hover:block border border-gray-100">
                        <a href="{{ route('sekolah.smp') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                            <i class="fas fa-school mr-3 text-blue-500 w-4"></i>SMP Al-Hidayah
                        </a>
                        <a href="{{ route('sekolah.sma') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                            <i class="fas fa-university mr-3 text-emerald-500 w-4"></i>SMA Al-Hidayah
                        </a>
                    </div>
                </div>
                <a href="{{ route('berita') }}" class="nav-link text-sm font-semibold text-gray-700 hover:text-blue-700 transition-colors py-1">Berita</a>
                <a href="{{ route('galeri') }}" class="nav-link text-sm font-semibold text-gray-700 hover:text-blue-700 transition-colors py-1">Galeri</a>
                <a href="{{ route('kontak') }}" class="nav-link text-sm font-semibold text-gray-700 hover:text-blue-700 transition-colors py-1">Kontak</a>
                <a href="{{ route('ppdb') }}" class="btn-green text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-block">
                    <i class="fas fa-edit mr-1.5"></i>Daftar PPDB
                </a>
            </div>

            <button id="menuBtn" class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors">
                <i class="fas fa-bars text-gray-700"></i>
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
        <div class="px-4 py-4 space-y-1">
            <a href="{{ route('home') }}" class="flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-medium transition-colors">Beranda</a>
            <a href="{{ route('profil') }}" class="flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-medium transition-colors">Profil</a>
            <a href="{{ route('sekolah.smp') }}" class="flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-medium transition-colors"><i class="fas fa-school mr-2 text-blue-500"></i>SMP Al-Hikmah</a>
            <a href="{{ route('sekolah.sma') }}" class="flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-medium transition-colors"><i class="fas fa-university mr-2 text-emerald-500"></i>SMA Al-Hikmah</a>
            <a href="{{ route('berita') }}" class="flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-medium transition-colors">Berita</a>
            <a href="{{ route('galeri') }}" class="flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-medium transition-colors">Galeri</a>
            <a href="{{ route('kontak') }}" class="flex items-center px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-medium transition-colors">Kontak</a>
            <a href="{{ route('ppdb') }}" class="flex items-center justify-center px-3 py-2.5 rounded-xl btn-green text-white font-bold mt-2">
                <i class="fas fa-edit mr-2"></i>Daftar PPDB
            </a>
        </div>
    </div>
</nav>

@if(session('success'))
<div class="max-w-7xl mx-auto px-4 mt-4">
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-3.5 rounded-2xl flex items-center justify-between shadow-sm">
        <span class="flex items-center"><i class="fas fa-check-circle mr-2 text-emerald-500"></i>{{ session('success') }}</span>
        <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600 transition-colors"><i class="fas fa-times"></i></button>
    </div>
</div>
@endif

@yield('content')

{{-- Footer --}}
<footer class="bg-gray-900 text-white mt-20">
    <div class="max-w-7xl mx-auto px-4 pt-16 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-5">
                    <div class="w-12 h-12 rounded-xl gradient-card flex items-center justify-center shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <div>
                        <div class="font-extrabold text-lg text-white">Yayasan Al-Hidayah</div>
                        <div class="text-blue-400 text-sm font-medium">Pendidikan Berkualitas & Islami</div>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-5">Mendidik generasi bangsa yang cerdas, berakhlak mulia, dan berdaya saing global sejak 2002. Bersama kami, raih masa depan gemilang.</p>
                <div class="flex space-x-3">
                    <a href="#" class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-500 transition-colors"><i class="fab fa-facebook-f text-sm"></i></a>
                    <a href="#" class="w-9 h-9 bg-sky-500 rounded-lg flex items-center justify-center hover:bg-sky-400 transition-colors"><i class="fab fa-twitter text-sm"></i></a>
                    <a href="#" class="w-9 h-9 bg-pink-600 rounded-lg flex items-center justify-center hover:bg-pink-500 transition-colors"><i class="fab fa-instagram text-sm"></i></a>
                    <a href="#" class="w-9 h-9 bg-green-600 rounded-lg flex items-center justify-center hover:bg-green-500 transition-colors"><i class="fab fa-whatsapp text-sm"></i></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-wider">Tautan Cepat</h4>
                <ul class="space-y-2.5">
                    @foreach([['profil','Profil Yayasan'],['sekolah.smp','SMP Unggulan Al-Hidayah'],['sekolah.sma','SMA Unggulan Al-Hidayah'],['ppdb','PPDB Online'],['galeri','Galeri'],['berita','Berita']] as $l)
                    <li><a href="{{ route($l[0]) }}" class="text-gray-400 hover:text-white text-sm transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs text-blue-500"></i>{{ $l[1] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-wider">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-sm text-gray-400"><i class="fas fa-map-marker-alt text-blue-400 mt-0.5 w-4"></i>Jl. Pendidikan No. 1, Kota</li>
                    <li class="flex items-center gap-3 text-sm text-gray-400"><i class="fas fa-phone text-blue-400 w-4"></i>(021) 1234-5678</li>
                    <li class="flex items-center gap-3 text-sm text-gray-400"><i class="fab fa-whatsapp text-green-400 w-4"></i>0812-3456-7890</li>
                    <li class="flex items-center gap-3 text-sm text-gray-400"><i class="fas fa-envelope text-blue-400 w-4"></i>info@alhidayah.sch.id</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center gap-3">
            <p class="text-gray-500 text-sm">© {{ date('Y') }} Yayasan Pendidikan Al-Hidayah. 2002 - 2026 Hak cipta dilindungi.</p>
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-400 text-xs transition-colors">Admin Panel</a>
        </div>
    </div>
</footer>

<script>
    document.getElementById('menuBtn').addEventListener('click', function() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>

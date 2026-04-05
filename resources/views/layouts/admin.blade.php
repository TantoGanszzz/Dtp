<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Yayasan Al-Hikmah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-card { background: linear-gradient(135deg, #1e40af, #1d4ed8); }
        .sidebar-link { transition: all 0.2s; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.12); }
        .sidebar-link.active { border-left: 3px solid #60a5fa; }
    </style>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside class="w-64 flex-shrink-0 flex flex-col" style="background: linear-gradient(180deg, #0f172a 0%, #1e3a8a 100%);">
        <div class="p-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 gradient-card rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                </div>
                <div>
                    <div class="font-extrabold text-white text-sm">Al-Hikmah</div>
                    <div class="text-blue-300 text-xs">Panel Admin</div>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <p class="text-blue-400/60 text-xs font-bold uppercase tracking-widest px-3 mb-3 mt-1">Menu Utama</p>
            @php
                $menus = [
                    ['admin.dashboard', 'fa-tachometer-alt', 'Dashboard'],
                    ['admin.ppdb.index', 'fa-user-plus', 'Data PPDB'],
                    ['admin.berita.index', 'fa-newspaper', 'Berita'],
                    ['admin.galeri.index', 'fa-images', 'Galeri'],
                    ['admin.sekolah.index', 'fa-school', 'Data Sekolah'],
                ];
            @endphp
            @foreach($menus as $m)
            <a href="{{ route($m[0]) }}" class="sidebar-link {{ request()->routeIs($m[0] . '*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-xl text-blue-100 hover:text-white text-sm font-medium">
                <i class="fas {{ $m[1] }} w-5 text-center text-blue-300"></i>{{ $m[2] }}
            </a>
            @endforeach

            <div class="border-t border-white/10 my-4"></div>
            <p class="text-blue-400/60 text-xs font-bold uppercase tracking-widest px-3 mb-3">Lainnya</p>
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-blue-300 hover:text-white text-sm font-medium">
                <i class="fas fa-globe w-5 text-center"></i>Lihat Website
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-red-400 hover:text-red-300 hover:bg-red-500/10 text-sm font-medium text-left">
                    <i class="fas fa-sign-out-alt w-5 text-center"></i>Logout
                </button>
            </form>
        </nav>

        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3 px-3 py-2">
                <div class="w-8 h-8 gradient-card rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-white text-xs"></i>
                </div>
                <div class="min-w-0">
                    <div class="text-white text-xs font-bold truncate">{{ auth()->user()->name }}</div>
                    <div class="text-blue-400 text-xs truncate">Administrator</div>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div>
                <h1 class="text-lg font-extrabold text-gray-900">@yield('title', 'Dashboard')</h1>
                <p class="text-xs text-gray-400 mt-0.5">Yayasan Pendidikan Al-Hikmah</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="text-xs text-gray-500 hover:text-blue-600 transition-colors flex items-center gap-1.5 bg-gray-100 hover:bg-blue-50 px-3 py-2 rounded-xl font-medium">
                    <i class="fas fa-external-link-alt"></i>Website
                </a>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-3.5 rounded-2xl flex items-center justify-between mb-5 shadow-sm">
                <span class="flex items-center gap-2 text-sm font-medium"><i class="fas fa-check-circle text-emerald-500"></i>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600"><i class="fas fa-times"></i></button>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>

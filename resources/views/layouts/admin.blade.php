<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Al-Hikmah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar { background: linear-gradient(180deg, #052e16 0%, #14532d 60%, #166534 100%); }
        .grad-green { background: linear-gradient(135deg, #16a34a, #22c55e); }
        .nav-item { transition: all .2s; border-left: 3px solid transparent; }
        .nav-item:hover { background: rgba(255,255,255,0.08); border-left-color: rgba(74,222,128,0.5); }
        .nav-item.active { background: rgba(34,197,94,0.15); border-left-color: #4ade80; }
        .nav-item.active i, .nav-item.active span { color: #4ade80; }
        .btn-green { background: linear-gradient(135deg,#16a34a,#22c55e); box-shadow:0 4px 15px rgba(34,197,94,0.3); transition:all .2s; }
        .btn-green:hover { transform:translateY(-1px); box-shadow:0 6px 20px rgba(34,197,94,0.4); }
        .btn-red { background: linear-gradient(135deg,#dc2626,#ef4444); transition:all .2s; }
        .btn-red:hover { transform:translateY(-1px); }
        .card-admin { background:white; border-radius:1.25rem; border:1px solid #f1f5f9; transition:all .2s; }
        .card-admin:hover { box-shadow:0 8px 24px rgba(0,0,0,0.06); }
        .input-field { border:2px solid #e2e8f0; border-radius:.75rem; padding:.75rem 1rem; width:100%; font-size:.875rem; transition:border-color .2s; outline:none; }
        .input-field:focus { border-color:#16a34a; }
        .badge-pending  { background:#fef3c7; color:#92400e; }
        .badge-diterima { background:#d1fae5; color:#065f46; }
        .badge-ditolak  { background:#fee2e2; color:#991b1b; }
        .badge-smp { background:#dbeafe; color:#1e40af; }
        .badge-sma { background:#e0f2fe; color:#0369a1; }
    </style>
</head>
<body class="bg-slate-50 antialiased">
<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside class="sidebar w-64 flex-shrink-0 flex flex-col">
        {{-- Logo --}}
        <div class="px-5 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 grad-green rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                </div>
                <div>
                    <div class="font-extrabold text-white text-sm leading-tight">Al-Hikmah</div>
                    <div class="text-green-400 text-xs font-medium">Panel Admin</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
            <p class="text-green-500/50 text-xs font-bold uppercase tracking-widest px-3 py-2">Menu</p>
            @php
            $navs = [
                ['admin.dashboard',    'fa-gauge',        'Dashboard'],
                ['admin.ppdb.index',   'fa-user-plus',    'Data PPDB'],
                ['admin.berita.index', 'fa-newspaper',    'Berita'],
                ['admin.galeri.index', 'fa-images',       'Galeri'],
                ['admin.sekolah.index','fa-school',       'Data Sekolah'],
            ];
            @endphp
            @foreach($navs as $n)
            <a href="{{ route($n[0]) }}" class="nav-item {{ request()->routeIs($n[0].'*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-r-xl text-green-100/70 hover:text-white text-sm font-semibold">
                <i class="fas {{ $n[1] }} w-4 text-center text-green-400/70 text-sm"></i>
                <span>{{ $n[2] }}</span>
            </a>
            @endforeach

            <div class="border-t border-white/10 my-3"></div>
            <p class="text-green-500/50 text-xs font-bold uppercase tracking-widest px-3 py-2">Lainnya</p>
            <a href="{{ route('home') }}" target="_blank" class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-r-xl text-green-100/70 hover:text-white text-sm font-semibold">
                <i class="fas fa-arrow-up-right-from-square w-4 text-center text-green-400/70 text-sm"></i>
                <span>Lihat Website</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-item w-full flex items-center gap-3 px-3 py-2.5 rounded-r-xl text-red-400/80 hover:text-red-300 hover:bg-red-500/10 text-sm font-semibold text-left">
                    <i class="fas fa-right-from-bracket w-4 text-center text-sm"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>

        {{-- User --}}
        <div class="px-4 py-4 border-t border-white/10">
            <div class="flex items-center gap-3 px-2">
                <div class="w-9 h-9 grad-green rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-white text-xs"></i>
                </div>
                <div class="min-w-0">
                    <div class="text-white text-xs font-bold truncate">{{ auth()->user()->name }}</div>
                    <div class="text-green-400/70 text-xs">Administrator</div>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Topbar --}}
        <header class="bg-white border-b border-slate-100 px-6 py-4 flex items-center justify-between flex-shrink-0 shadow-sm">
            <div>
                <h1 class="text-lg font-extrabold text-gray-900">@yield('title', 'Dashboard')</h1>
                <p class="text-xs text-gray-400 mt-0.5 font-medium">Yayasan Pendidikan Al-Hikmah</p>
            </div>
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-green-600 bg-gray-100 hover:bg-green-50 px-3 py-2 rounded-xl transition-all">
                <i class="fas fa-globe text-xs"></i> Website
            </a>
        </header>

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-5 py-3.5 rounded-2xl flex items-center justify-between mb-5">
                <span class="flex items-center gap-2 text-sm font-semibold"><i class="fas fa-circle-check text-green-500"></i>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-green-600 transition-colors"><i class="fas fa-xmark"></i></button>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>

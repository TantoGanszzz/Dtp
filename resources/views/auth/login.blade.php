<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Yayasan Al-Hikmah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-hero { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #065f46 100%); }
        .glass { background: rgba(255,255,255,0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); }
        input:focus { outline: none; }
    </style>
</head>
<body class="min-h-screen flex">

    {{-- Left Panel --}}
    <div class="hidden lg:flex lg:w-1/2 gradient-hero relative overflow-hidden flex-col items-center justify-center p-12 text-white">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
        <div class="relative z-10 text-center max-w-sm">
            <div class="w-20 h-20 bg-white/10 backdrop-blur rounded-3xl flex items-center justify-center mx-auto mb-8 border border-white/20">
                <i class="fas fa-graduation-cap text-white text-3xl"></i>
            </div>
            <h1 class="text-4xl font-extrabold mb-4 leading-tight">Yayasan Pendidikan<br><span class="text-blue-300">Al-Hikmah</span></h1>
            <p class="text-blue-200 leading-relaxed mb-10">Panel administrasi untuk mengelola data yayasan, PPDB, berita, dan galeri.</p>
            <div class="grid grid-cols-2 gap-4">
                @foreach([['1200+','Siswa Aktif'],['85+','Tenaga Pendidik'],['29+','Tahun Berdiri'],['95%','Lulus PTN']] as $s)
                <div class="glass rounded-2xl p-4 text-center">
                    <div class="text-2xl font-extrabold text-white">{{ $s[0] }}</div>
                    <div class="text-blue-300 text-xs mt-1">{{ $s[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Right Panel --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
        <div class="w-full max-w-md">
            <div class="lg:hidden text-center mb-8">
                <div class="w-14 h-14 bg-blue-800 rounded-2xl flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-900">Yayasan Al-Hikmah</h1>
            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Selamat Datang 👋</h2>
                <p class="text-gray-500 text-sm mb-8">Masuk ke panel admin yayasan</p>

                @if(session('status'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl mb-5 text-sm">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full border-2 border-gray-200 rounded-xl pl-11 pr-4 py-3 focus:border-blue-500 transition-colors text-sm @error('email') border-red-400 @enderror"
                                placeholder="admin@alhikmah.sch.id">
                        </div>
                        @error('email')<p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="password" name="password" id="password" required
                                class="w-full border-2 border-gray-200 rounded-xl pl-11 pr-11 py-3 focus:border-blue-500 transition-colors text-sm @error('password') border-red-400 @enderror"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePass()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye text-sm" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')<p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600">
                            <span class="text-sm text-gray-600 font-medium">Ingat saya</span>
                        </label>
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 font-bold hover:text-blue-800 transition-colors">Lupa password?</a>
                        @endif
                    </div>
                    <button type="submit" class="w-full py-3.5 rounded-2xl font-extrabold text-white text-sm transition-all shadow-lg"
                        style="background: linear-gradient(135deg, #1e40af, #2563eb); box-shadow: 0 4px 15px rgba(37,99,235,0.4);">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <p class="text-center mt-6 text-sm text-gray-400">
                <a href="{{ route('home') }}" class="text-blue-600 font-bold hover:text-blue-800 transition-colors flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i>Kembali ke Website
                </a>
            </p>
        </div>
    </div>

    <script>
        function togglePass() {
            const p = document.getElementById('password');
            const i = document.getElementById('eyeIcon');
            if (p.type === 'password') { p.type = 'text'; i.className = 'fas fa-eye-slash text-sm'; }
            else { p.type = 'password'; i.className = 'fas fa-eye text-sm'; }
        }
    </script>
</body>
</html>

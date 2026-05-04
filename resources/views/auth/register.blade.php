<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — Yayasan Al-Hidayah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-hero { background: linear-gradient(135deg, #052e16 0%, #14532d 40%, #166534 100%); }
        .glass { background: rgba(255,255,255,0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); }
        .islamic-pattern::before { content:''; position:absolute; inset:0; z-index:11; opacity:0.04; pointer-events:none; background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); }
        input:focus { outline: none; }
        .btn-register { background: linear-gradient(135deg, #16a34a, #22c55e); box-shadow: 0 4px 20px rgba(34,197,94,0.4); transition: all .3s; position: relative; overflow: hidden; }
        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(34,197,94,0.5); }
        .btn-register::after { content:''; position:absolute; top:-50%; left:-50%; width:200%; height:200%; background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg) translateX(-100%); transition: .6s; }
        .btn-register:hover::after { transform: rotate(45deg) translateX(100%); }
    </style>
</head>
<body class="min-h-screen flex">

    {{-- Left Panel --}}
    <div class="hidden lg:flex lg:w-1/2 gradient-hero islamic-pattern relative overflow-hidden flex-col items-center justify-center p-12 text-white">
        <div class="absolute top-0 right-0 w-96 h-96 bg-green-400/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-500/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
        <div class="relative z-10 text-center max-w-sm">
            <div class="w-24 h-24 bg-white rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-xl overflow-hidden p-2">
                <img src="{{ asset('logo.jpg') }}" alt="Logo Yayasan" class="w-full h-full object-contain">
            </div>
            <h1 class="text-4xl font-extrabold mb-4 leading-tight">Yayasan Pondok Pesantren<br><span class="text-green-300">Al-Hidayah</span></h1>
            <p class="text-green-200/80 leading-relaxed mb-10">Daftarkan diri Anda untuk mengakses formulir Penerimaan Peserta Santri Baru (PPSB) secara online.</p>
            <div class="grid grid-cols-2 gap-4">
                @foreach([['1200+','Siswa Aktif'],['85+','Tenaga Pendidik'],['29+','Tahun Berdiri'],['95%','Lulus PTN']] as $s)
                <div class="glass rounded-2xl p-4 text-center">
                    <div class="text-2xl font-extrabold text-white">{{ $s[0] }}</div>
                    <div class="text-green-300 text-xs mt-1">{{ $s[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Right Panel --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
        <div class="w-full max-w-md">
            <div class="lg:hidden text-center mb-8">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-3 overflow-hidden bg-white shadow-md p-1">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo Yayasan" class="w-full h-full object-contain">
                </div>
                <h1 class="text-2xl font-extrabold text-gray-900">Yayasan Al-Hidayah</h1>
            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Buat Akun Baru ✨</h2>
                <p class="text-gray-500 text-sm mb-8">Daftar untuk mengisi formulir PPSB Online</p>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap</label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                                class="w-full border-2 border-gray-200 rounded-xl pl-11 pr-4 py-3 focus:border-green-500 transition-colors text-sm @error('name') border-red-400 @enderror"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>
                        @error('name')<p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border-2 border-gray-200 rounded-xl pl-11 pr-4 py-3 focus:border-green-500 transition-colors text-sm @error('email') border-red-400 @enderror"
                                placeholder="email@contoh.com">
                        </div>
                        @error('email')<p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="password" name="password" id="password" required
                                class="w-full border-2 border-gray-200 rounded-xl pl-11 pr-11 py-3 focus:border-green-500 transition-colors text-sm @error('password') border-red-400 @enderror"
                                placeholder="Minimal 8 karakter">
                            <button type="button" onclick="togglePass()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye text-sm" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')<p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>@enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1.5">Konfirmasi Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="password" name="password_confirmation" id="password_confirm" required
                                class="w-full border-2 border-gray-200 rounded-xl pl-11 pr-11 py-3 focus:border-green-500 transition-colors text-sm"
                                placeholder="Ulangi password">
                            <button type="button" onclick="togglePassConfirm()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye text-sm" id="eyeIconConfirm"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-2xl font-extrabold text-white text-sm btn-register">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </button>
                </form>
            </div>

            <p class="text-center mt-6 text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-green-600 font-bold hover:text-green-800 transition-colors">Masuk di sini</a>
            </p>
            <p class="text-center mt-3">
                <a href="{{ route('home') }}" class="text-sm text-green-600 font-bold hover:text-green-800 transition-colors flex items-center justify-center gap-2">
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
        function togglePassConfirm() {
            const p = document.getElementById('password_confirm');
            const i = document.getElementById('eyeIconConfirm');
            if (p.type === 'password') { p.type = 'text'; i.className = 'fas fa-eye-slash text-sm'; }
            else { p.type = 'password'; i.className = 'fas fa-eye text-sm'; }
        }
    </script>
</body>
</html>

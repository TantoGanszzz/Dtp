<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Yayasan Al-Hikmah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="w-full max-w-md">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-xl font-bold text-gray-900 mb-2">Lupa Password</h2>
        <p class="text-sm text-gray-600 mb-6">Masukkan email Anda dan kami akan mengirimkan link reset password.</p>

        @if(session('status'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4 text-sm">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="w-full bg-blue-800 text-white py-3 rounded-lg font-semibold hover:bg-blue-900 transition-colors">
                Kirim Link Reset
            </button>
        </form>
        <p class="text-center mt-4 text-sm">
            <a href="{{ route('login') }}" class="text-blue-700 hover:underline">← Kembali ke Login</a>
        </p>
    </div>
</div>
</body>
</html>

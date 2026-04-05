<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Yayasan Al-Hikmah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="w-full max-w-md">
    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Verifikasi Email</h2>
        <p class="text-sm text-gray-600 mb-6">Terima kasih telah mendaftar! Silakan verifikasi email Anda dengan mengklik link yang telah kami kirimkan.</p>
        @if(session('status') == 'verification-link-sent')
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4 text-sm">Link verifikasi telah dikirim ulang.</div>
        @endif
        <form method="POST" action="{{ route('verification.send') }}" class="mb-4">
            @csrf
            <button type="submit" class="w-full bg-blue-800 text-white py-3 rounded-lg font-semibold hover:bg-blue-900 transition-colors">
                Kirim Ulang Email Verifikasi
            </button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-600 hover:underline">Logout</button>
        </form>
    </div>
</div>
</body>
</html>

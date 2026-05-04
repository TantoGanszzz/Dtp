@extends('layouts.app')
@section('title', 'Profil Akun')

@section('content')
@php $heroFoto = 'assets/hero-bg.png'; @endphp
<section class="photo-hero islamic-pattern relative overflow-hidden text-white py-20" style="background-image: linear-gradient(135deg, rgba(5,46,22,0.7), rgba(20,83,45,0.6), rgba(22,101,52,0.65)), url('{{ asset('storage/' . $heroFoto) }}'); background-size: cover; background-position: center;">
    <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="photo-overlay" style="background: linear-gradient(135deg, rgba(5,46,22,0.45), rgba(20,83,45,0.35), rgba(22,101,52,0.40));"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-20">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-green-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-green-400 text-xs"></i>
            <span class="text-white text-sm font-medium">Profil Akun</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Profil <span class="text-green-300">Akun Saya</span></h1>
        <p class="text-green-200/80 text-lg">Informasi akun dan data pendaftaran Anda</p>
    </div>
</section>

<div class="max-w-4xl mx-auto px-4 py-16">
    <div class="grid md:grid-cols-3 gap-8">

        {{-- Kartu Profil --}}
        <div class="md:col-span-1">
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-lg font-extrabold text-gray-900">{{ auth()->user()->name }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ auth()->user()->email }}</p>
                <div class="mt-4">
                    <span class="inline-flex items-center gap-1.5 text-xs font-bold px-3 py-1.5 rounded-full {{ auth()->user()->isAdmin() ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                        <i class="fas {{ auth()->user()->isAdmin() ? 'fa-shield-halved' : 'fa-user' }}"></i>
                        {{ auth()->user()->isAdmin() ? 'Administrator' : 'Pendaftar' }}
                    </span>
                </div>
                <p class="text-xs text-gray-400 mt-4">Bergabung sejak {{ auth()->user()->created_at->format('d M Y') }}</p>
            </div>
        </div>

        {{-- Detail Informasi --}}
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 text-lg mb-5 flex items-center gap-2">
                    <i class="fas fa-id-card text-green-600"></i>Informasi Akun
                </h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50">
                        <div class="w-9 h-9 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 font-medium">Nama Lengkap</div>
                            <div class="text-sm font-bold text-gray-800">{{ auth()->user()->name }}</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50">
                        <div class="w-9 h-9 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-emerald-600 text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 font-medium">Alamat Email</div>
                            <div class="text-sm font-bold text-gray-800">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50">
                        <div class="w-9 h-9 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-calendar text-purple-600 text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 font-medium">Tanggal Registrasi</div>
                            <div class="text-sm font-bold text-gray-800">{{ auth()->user()->created_at->format('d F Y, H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Riwayat Pendaftaran PPDB (jika user) --}}
            @if(auth()->user()->isUser())
            @php
                $riwayat = \App\Models\Ppdb::where('email', auth()->user()->email)->latest()->get();
            @endphp
            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 text-lg mb-5 flex items-center gap-2">
                    <i class="fas fa-clipboard-list text-green-600"></i>Riwayat Pendaftaran PPSB
                </h3>
                @if($riwayat->count() > 0)
                    @foreach($riwayat as $r)
                    <div class="flex items-center justify-between p-4 rounded-xl bg-gray-50 mb-3">
                        <div>
                            <div class="text-sm font-bold text-gray-900">{{ $r->nama_lengkap }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ $r->pilihan_sekolah }} • {{ $r->created_at->format('d M Y') }}</div>
                        </div>
                        <span class="text-xs font-bold px-3 py-1.5 rounded-full
                            {{ $r->status == 'diterima' ? 'bg-green-100 text-green-700' : ($r->status == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700') }}">
                            {{ ucfirst($r->status) }}
                        </span>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-inbox text-4xl text-gray-200 mb-3 block"></i>
                        <p class="text-gray-400 text-sm font-semibold">Belum ada riwayat pendaftaran</p>
                        <a href="{{ route('ppdb') }}" class="btn-main text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2 mt-4">
                            <i class="fas fa-pen-to-square text-xs"></i>Daftar Sekarang
                        </a>
                    </div>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

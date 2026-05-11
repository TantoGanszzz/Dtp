@extends('layouts.app')
@section('title', 'Riwayat Pendaftaran PPSB')

@section('content')
{{-- Hero --}}
<section class="photo-hero islamic-pattern relative overflow-hidden text-white py-20"
    style="background-image: linear-gradient(135deg, rgba(5,46,22,0.7), rgba(20,83,45,0.6), rgba(22,101,52,0.65)), url('{{ asset('assets/hero-bg.png') }}'); background-size: cover; background-position: center;">
    <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="photo-overlay" style="background: linear-gradient(135deg, rgba(5,46,22,0.45), rgba(20,83,45,0.35), rgba(22,101,52,0.40));"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-20">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-green-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-green-400 text-xs"></i>
            <a href="{{ route('ppdb') }}" class="text-green-300 hover:text-white text-sm transition-colors">PPSB</a>
            <i class="fas fa-chevron-right text-green-400 text-xs"></i>
            <span class="text-white text-sm font-medium">Riwayat Pendaftaran</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Riwayat <span class="text-green-300">Pendaftaran</span></h1>
        <p class="text-green-200/80 text-lg">Lacak status pendaftaran santri baru Anda di sini</p>
    </div>
</section>

<div class="max-w-5xl mx-auto px-4 py-16">

    {{-- Flash success --}}
    @if(session('success'))
    <div class="mb-8 bg-green-50 border border-green-200 rounded-2xl p-5 flex items-start gap-4">
        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
            <i class="fas fa-check text-green-600"></i>
        </div>
        <div>
            <h4 class="text-green-800 font-extrabold">Pendaftaran Berhasil Dikirim!</h4>
            <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    {{-- Header aksi --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900">Daftar Pendaftaran Saya</h2>
            <p class="text-gray-500 text-sm mt-1">Total: <span class="font-bold text-green-600">{{ $riwayat->count() }}</span> pendaftaran</p>
        </div>
        <a href="{{ route('ppdb') }}" class="btn-main text-white px-5 py-3 rounded-xl font-bold text-sm inline-flex items-center gap-2">
            <i class="fas fa-plus text-xs"></i> Daftar Lagi
        </a>
    </div>

    @if($riwayat->isEmpty())
    {{-- Kosong --}}
    <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-16 text-center">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-clipboard-list text-gray-400 text-3xl"></i>
        </div>
        <h3 class="text-xl font-extrabold text-gray-700 mb-2">Belum Ada Pendaftaran</h3>
        <p class="text-gray-500 text-sm mb-6">Anda belum pernah mendaftarkan santri baru. Mulai pendaftaran sekarang!</p>
        <a href="{{ route('ppdb') }}" class="btn-main text-white px-8 py-3 rounded-xl font-bold text-sm inline-flex items-center gap-2">
            <i class="fas fa-pen-to-square text-xs"></i> Mulai Pendaftaran
        </a>
    </div>
    @else
    <div class="space-y-5">
        @foreach($riwayat as $item)
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
            {{-- Header kartu --}}
            <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 gradient-card rounded-2xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user-graduate text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-gray-900 text-lg">{{ $item->nama_lengkap }}</h3>
                        <p class="text-gray-500 text-sm">
                            <i class="fas fa-school text-green-500 mr-1"></i>{{ $item->pilihan_sekolah }} Al-Hidayah
                            &nbsp;·&nbsp;
                            <i class="fas fa-calendar text-gray-400 mr-1"></i>{{ $item->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>
                {{-- Badge Status --}}
                @php
                    $statusConfig = [
                        'pending'  => ['bg-amber-100 text-amber-700 border-amber-200', 'fa-clock', 'Menunggu Verifikasi'],
                        'diterima' => ['bg-green-100 text-green-700 border-green-200', 'fa-circle-check', 'Diterima'],
                        'ditolak'  => ['bg-red-100 text-red-700 border-red-200', 'fa-circle-xmark', 'Ditolak'],
                    ];
                    $cfg = $statusConfig[$item->status] ?? $statusConfig['pending'];
                @endphp
                <div class="flex items-center">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-bold border {{ $cfg[0] }}">
                        <i class="fas {{ $cfg[1] }}"></i>
                        {{ $cfg[2] }}
                    </span>
                </div>
            </div>

            {{-- Detail --}}
            <div class="p-6">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-gray-50 rounded-xl p-3">
                        <div class="text-xs text-gray-400 font-semibold uppercase tracking-wide mb-1">Tempat, Tgl Lahir</div>
                        <div class="text-sm font-bold text-gray-700">{{ $item->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y') }}</div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <div class="text-xs text-gray-400 font-semibold uppercase tracking-wide mb-1">No. HP / WhatsApp</div>
                        <div class="text-sm font-bold text-gray-700">{{ $item->no_hp }}</div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <div class="text-xs text-gray-400 font-semibold uppercase tracking-wide mb-1">Email</div>
                        <div class="text-sm font-bold text-gray-700">{{ $item->email ?? '-' }}</div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3 sm:col-span-2 lg:col-span-3">
                        <div class="text-xs text-gray-400 font-semibold uppercase tracking-wide mb-1">Alamat</div>
                        <div class="text-sm font-bold text-gray-700">{{ $item->alamat }}</div>
                    </div>
                </div>

                {{-- Dokumen --}}
                @php
                    $docs = [
                        'ijazah'        => 'Ijazah/STTB',
                        'akta_kelahiran'=> 'Akta Kelahiran',
                        'pas_foto'      => 'Pas Foto',
                        'kk'            => 'Kartu Keluarga',
                        'surat_sehat'   => 'Surat Sehat',
                    ];
                    $uploadedDocs = array_filter($docs, fn($key) => !empty($item->$key), ARRAY_FILTER_USE_KEY);
                @endphp
                @if(count($uploadedDocs) > 0)
                <div class="mt-4">
                    <div class="text-xs text-gray-400 font-semibold uppercase tracking-wide mb-2">Dokumen Terunggah</div>
                    <div class="flex flex-wrap gap-2">
                        @foreach($uploadedDocs as $key => $label)
                        <a href="{{ asset('storage/' . $item->$key) }}" target="_blank"
                           class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-50 text-green-700 rounded-xl text-xs font-bold border border-green-200 hover:bg-green-100 transition-colors">
                            <i class="fas fa-file-check text-xs"></i>{{ $label }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- No. Pendaftaran --}}
                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                    <span class="text-xs text-gray-400">No. Pendaftaran: <span class="font-bold text-gray-600">#{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}</span></span>
                    <span class="text-xs text-gray-400">Didaftarkan {{ $item->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

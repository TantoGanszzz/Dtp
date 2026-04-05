@extends('layouts.app')
@section('title', $berita->judul)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid lg:grid-cols-3 gap-10">

        {{-- Artikel --}}
        <article class="lg:col-span-2">
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 overflow-hidden">
                @if($berita->gambar)
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                </div>
                @endif
                <div class="p-8 md:p-10">
                    <div class="flex flex-wrap items-center gap-3 mb-5">
                        <span class="bg-blue-50 text-blue-700 text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5">
                            <i class="fas fa-calendar"></i>{{ $berita->created_at->format('d M Y') }}
                        </span>
                        <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5">
                            <i class="fas fa-user"></i>{{ $berita->penulis }}
                        </span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 leading-tight">{{ $berita->judul }}</h1>
                    <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-800 transition-colors text-sm">
                    <i class="fas fa-arrow-left"></i>Kembali ke Berita
                </a>
            </div>
        </article>

        {{-- Sidebar --}}
        <aside class="space-y-6">
            <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 mb-5 text-lg flex items-center gap-2">
                    <i class="fas fa-newspaper text-blue-600"></i>Berita Lainnya
                </h3>
                <div class="space-y-4">
                    @foreach($lainnya as $l)
                    <a href="{{ route('berita.show', $l->slug) }}" class="flex gap-3 group p-3 rounded-2xl hover:bg-blue-50 transition-colors">
                        @if($l->gambar)
                        <img src="{{ asset('storage/' . $l->gambar) }}" alt="{{ $l->judul }}" class="w-16 h-16 object-cover rounded-xl flex-shrink-0">
                        @else
                        <div class="w-16 h-16 gradient-card rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-newspaper text-white/50"></i>
                        </div>
                        @endif
                        <div class="min-w-0">
                            <p class="text-sm font-bold text-gray-900 group-hover:text-blue-700 line-clamp-2 leading-snug transition-colors">{{ $l->judul }}</p>
                            <p class="text-xs text-gray-400 mt-1.5 flex items-center gap-1"><i class="fas fa-calendar"></i>{{ $l->created_at->format('d M Y') }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="gradient-hero rounded-3xl p-6 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <i class="fas fa-user-plus text-3xl mb-3 opacity-80"></i>
                <h3 class="font-extrabold text-lg mb-2">PPDB Dibuka!</h3>
                <p class="text-blue-200 text-sm mb-4">Daftarkan putra-putri Anda sekarang.</p>
                <a href="{{ route('ppdb') }}" class="btn-green text-white px-4 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                    <i class="fas fa-edit"></i>Daftar Sekarang
                </a>
            </div>
        </aside>
    </div>
</div>
@endsection

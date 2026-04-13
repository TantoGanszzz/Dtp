@extends('layouts.app')
@section('title', 'Berita & Kegiatan')

@section('content')
<section class="gradient-hero text-white py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-72 h-72 bg-blue-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-blue-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-blue-400 text-xs"></i>
            <span class="text-white text-sm font-medium">Berita</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Berita & <span class="text-blue-300">Kegiatan</span></h1>
        <p class="text-blue-200 text-lg">Informasi terbaru dari Yayasan Al-Hidayah</p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-12">
    @if($beritas->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-7">
        @foreach($beritas as $b)
        <article class="card-hover bg-white rounded-3xl shadow-md overflow-hidden border border-gray-100">
            <div class="relative overflow-hidden">
                @if($b->gambar)
                <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                <div class="w-full h-52 gradient-card flex items-center justify-center">
                    <i class="fas fa-newspaper text-white/30 text-6xl"></i>
                </div>
                @endif
                <div class="absolute top-4 left-4">
                    <span class="bg-white/90 backdrop-blur text-blue-700 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                        <i class="fas fa-calendar mr-1"></i>{{ $b->created_at->format('d M Y') }}
                    </span>
                </div>
            </div>
            <div class="p-6">
                <h2 class="font-extrabold text-gray-900 mb-2 line-clamp-2 text-lg leading-snug">{{ $b->judul }}</h2>
                <p class="text-gray-500 text-sm mb-5 line-clamp-3 leading-relaxed">{{ Str::limit(strip_tags($b->isi), 120) }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-xs text-gray-400 flex items-center gap-1.5">
                        <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-blue-500 text-xs"></i>
                        </div>
                        {{ $b->penulis }}
                    </span>
                    <a href="{{ route('berita.show', $b->slug) }}" class="btn-primary text-white px-4 py-2 rounded-xl font-bold text-xs inline-flex items-center gap-1.5">
                        Baca <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </article>
        @endforeach
    </div>
    <div class="mt-10 flex justify-center">{{ $beritas->links() }}</div>
    @else
    <div class="text-center py-24">
        <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-5">
            <i class="fas fa-newspaper text-gray-300 text-4xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-400 mb-2">Belum Ada Berita</h3>
        <p class="text-gray-400 text-sm">Berita akan segera ditambahkan.</p>
    </div>
    @endif
</div>
@endsection

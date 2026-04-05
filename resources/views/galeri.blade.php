@extends('layouts.app')
@section('title', 'Galeri Foto')

@section('content')
<section class="gradient-hero text-white py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-72 h-72 bg-blue-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-blue-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-blue-400 text-xs"></i>
            <span class="text-white text-sm font-medium">Galeri</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Galeri <span class="text-blue-300">Foto</span></h1>
        <p class="text-blue-200 text-lg">Dokumentasi kegiatan dan fasilitas yayasan</p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-12">
    {{-- Filter --}}
    <div class="flex flex-wrap gap-3 mb-10 justify-center">
        <a href="{{ route('galeri') }}" class="px-6 py-2.5 rounded-2xl font-bold text-sm transition-all {{ !request('kategori') ? 'gradient-card text-white shadow-lg' : 'bg-white text-gray-600 border border-gray-200 hover:border-blue-300 hover:text-blue-700' }}">
            <i class="fas fa-th mr-2"></i>Semua
        </a>
        @foreach(['kegiatan' => 'fa-running', 'fasilitas' => 'fa-building', 'event' => 'fa-calendar-star'] as $kat => $icon)
        <a href="{{ route('galeri', ['kategori' => $kat]) }}" class="px-6 py-2.5 rounded-2xl font-bold text-sm transition-all capitalize {{ request('kategori') == $kat ? 'gradient-card text-white shadow-lg' : 'bg-white text-gray-600 border border-gray-200 hover:border-blue-300 hover:text-blue-700' }}">
            <i class="fas {{ $icon }} mr-2"></i>{{ ucfirst($kat) }}
        </a>
        @endforeach
    </div>

    @if($galeris->count())
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($galeris as $g)
        <div class="relative group overflow-hidden rounded-2xl shadow-md img-overlay aspect-square card-hover">
            <img src="{{ asset('storage/' . $g->foto) }}" alt="{{ $g->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            <div class="absolute inset-0 flex items-end p-4 z-10 opacity-0 group-hover:opacity-100 transition-all duration-300">
                <div class="text-white transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                    <span class="text-xs bg-blue-600 px-2.5 py-1 rounded-full uppercase font-bold">{{ $g->kategori }}</span>
                    <p class="font-bold text-sm mt-2 leading-tight">{{ $g->judul }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-10 flex justify-center">{{ $galeris->links() }}</div>
    @else
    <div class="text-center py-24">
        <div class="w-24 h-24 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-5">
            <i class="fas fa-images text-gray-300 text-4xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-400 mb-2">Belum Ada Foto</h3>
        <p class="text-gray-400 text-sm">Foto akan segera ditambahkan.</p>
    </div>
    @endif
</div>
@endsection

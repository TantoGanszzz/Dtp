@extends('layouts.app')
@section('title', 'Galeri Foto')

@section('content')
@php $galeriFoto = 'assets/hero-bg.png'; @endphp
<section class="photo-hero islamic-pattern relative overflow-hidden text-white py-20" style="background-image: linear-gradient(135deg, rgba(5,46,22,0.7), rgba(20,83,45,0.6), rgba(22,101,52,0.65)), url('{{ asset('storage/' . $galeriFoto) }}'); background-size: cover; background-position: center;">
    <div class="absolute top-0 right-0 w-72 h-72 bg-green-400/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="photo-overlay" style="background: linear-gradient(135deg, rgba(5,46,22,0.45), rgba(20,83,45,0.35), rgba(22,101,52,0.40));"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-20">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-green-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-green-400 text-xs"></i>
            <span class="text-white text-sm font-medium">Galeri</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Galeri <span class="text-green-300">Foto</span></h1>
        <p class="text-green-200/80 text-lg">Dokumentasi kegiatan dan fasilitas yayasan</p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Kolom Galeri (Kiri, 8/12 bagian) -->
        <div class="lg:col-span-8">
            @if($galeris->count())
            <div class="flex flex-col gap-6 justify-start">
                @foreach($galeris as $g)
                <a href="{{ route('galeri.show', $g->id) }}" class="flex flex-col md:flex-row gap-5 group hover:bg-gray-50 p-3 -mx-3 rounded-2xl transition-colors">
                    <!-- Image Container -->
                    <div class="w-full md:w-64 shrink-0">
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden bg-gray-100">
                            <img src="{{ asset('storage/' . $g->foto) }}" alt="{{ $g->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                    
                    <!-- Content Container -->
                    <div class="flex flex-col justify-center py-2">
                        <div class="flex gap-2">
                            <span class="text-xs bg-green-500 text-white px-2.5 py-1 rounded-full uppercase font-bold">{{ $g->kategori }}</span>
                            @if($g->unit && $g->unit != 'umum')
                                <span class="text-xs bg-blue-500 text-white px-2.5 py-1 rounded-full uppercase font-bold">{{ $g->unit }}</span>
                            @endif
                        </div>
                        <p class="font-bold text-lg mt-2 leading-tight text-gray-900 group-hover:text-green-600 transition-colors">{{ $g->judul }}</p>
                        @if($g->deskripsi)
                        <div class="text-gray-600 text-sm mt-2 leading-relaxed line-clamp-2 prose-sm">{!! strip_tags($g->deskripsi) !!}</div>
                        @endif
                        <span class="text-green-600 text-xs font-bold mt-4 flex items-center gap-1 group-hover:gap-2 transition-all">Baca Selengkapnya <i class="fas fa-arrow-right"></i></span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="mt-10 flex justify-center">{{ $galeris->links() }}</div>
            @else
            <div class="text-center py-24 bg-white rounded-3xl border border-gray-100">
                <div class="w-24 h-24 bg-green-50 rounded-3xl flex items-center justify-center mx-auto mb-5">
                    <i class="fas fa-images text-green-200 text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-400 mb-2">Belum Ada Foto</h3>
                <p class="text-gray-400 text-sm">Foto akan segera ditambahkan.</p>
            </div>
            @endif
        </div>

        <!-- Kolom Sidebar (Kanan, 4/12 bagian) -->
        <div class="lg:col-span-4 space-y-8">
            
            <!-- Pencarian & Kategori -->
            <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100/50">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-folder-open text-green-500"></i> Kategori
                </h3>
                
                <div class="flex flex-col gap-2">
                    <a href="{{ route('galeri') }}" class="flex items-center justify-between px-4 py-3 rounded-xl transition-all {{ !request('kategori') ? 'bg-green-50 text-green-600 font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-th w-5 text-center"></i>
                            <span>Semua</span>
                        </div>
                    </a>
                    
                    @foreach(['kegiatan' => 'fa-running', 'fasilitas' => 'fa-building', 'event' => 'fa-calendar-star', 'prestasi' => 'fa-medal'] as $kat => $icon)
                    <a href="{{ route('galeri', ['kategori' => $kat]) }}" class="flex items-center justify-between px-4 py-3 rounded-xl transition-all capitalize {{ request('kategori') == $kat ? 'bg-green-50 text-green-600 font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
                        <div class="flex items-center gap-3">
                            <i class="fas {{ $icon }} w-5 text-center"></i>
                            <span>{{ $kat == 'prestasi' ? 'Siswa Berprestasi' : ucfirst($kat) }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Kontak Info -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-3xl p-6 text-white shadow-lg shadow-green-500/20 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2"></div>
                <h3 class="text-lg font-bold mb-2 relative z-10">Punya Pertanyaan?</h3>
                <p class="text-green-100 text-sm mb-5 relative z-10">Hubungi kami untuk informasi lebih lanjut mengenai kegiatan yayasan.</p>
                <a href="{{ route('kontak') }}" class="block text-center bg-white text-green-600 font-bold py-3 rounded-xl hover:bg-green-50 transition-colors relative z-10 shadow-sm">
                    Hubungi Kami
                </a>
            </div>

        </div>
    </div>
</div>
@endsection

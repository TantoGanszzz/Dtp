@extends('layouts.app')
@section('title', $galeri->judul . ' - Galeri')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        
        <!-- Breadcrumb -->
        <div class="flex items-center gap-3 mb-8 text-sm">
            <a href="{{ route('home') }}" class="text-green-600 hover:text-green-800 font-medium transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <a href="{{ route('galeri') }}" class="text-green-600 hover:text-green-800 font-medium transition-colors">Galeri</a>
            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
            <span class="text-gray-500 truncate">{{ $galeri->judul }}</span>
        </div>

        @php
            $imagePath = public_path('storage/' . $galeri->foto);
            $isPortrait = false;
            if (file_exists($imagePath)) {
                $size = @getimagesize($imagePath);
                if ($size && $size[1] > $size[0]) {
                    $isPortrait = true;
                }
            }
        @endphp

        @if($isPortrait)
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row">
            <!-- Portrait Hero Image -->
            <div class="w-full md:w-5/12 bg-gray-900 relative flex items-center justify-center p-6 md:p-10">
                <div class="absolute inset-0 bg-gradient-to-tr from-green-900/20 to-transparent"></div>
                <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-auto max-h-[85vh] object-contain rounded-2xl shadow-2xl relative z-10 border border-white/10">
            </div>
            
            <!-- Content Side -->
            <div class="w-full md:w-7/12 p-8 md:p-12 flex flex-col">
                <div class="mb-6">
                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase mb-3 shadow-sm">{{ $galeri->kategori }}</span>
                    @if($galeri->unit && $galeri->unit != 'umum')
                        <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase mb-3 shadow-sm ml-2">{{ strtoupper($galeri->unit) }}</span>
                    @endif
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-4">{{ $galeri->judul }}</h1>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="fas fa-calendar text-gray-400"></i>
                        <span>{{ $galeri->created_at->format('d M Y') }}</span>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 pt-8 flex-1">
                    <article class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        @if($galeri->deskripsi)
                            {!! $galeri->deskripsi !!}
                        @else
                            <p class="text-gray-400 italic">Tidak ada deskripsi detail untuk foto ini.</p>
                        @endif
                    </article>
                </div>
                
                <!-- Action / Back -->
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <a href="{{ route('galeri') }}" class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition-colors">
                        <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Landscape Hero Image -->
            <div class="w-full relative bg-gray-900 flex items-center justify-center overflow-hidden rounded-t-3xl border-b border-gray-100">
                <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-auto max-h-[75vh] object-contain">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-6 left-6 right-6 z-10">
                    <span class="inline-block bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase mb-3 shadow-md">{{ $galeri->kategori }}</span>
                    @if($galeri->unit && $galeri->unit != 'umum')
                        <span class="inline-block bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase mb-3 shadow-md ml-2">{{ strtoupper($galeri->unit) }}</span>
                    @endif
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white leading-tight shadow-sm">{{ $galeri->judul }}</h1>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 md:p-12">
                <div class="flex items-center gap-4 mb-8 border-b border-gray-100 pb-6 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar text-gray-400"></i>
                        <span>{{ $galeri->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                <article class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    @if($galeri->deskripsi)
                        {!! $galeri->deskripsi !!}
                    @else
                        <p class="text-gray-400 italic">Tidak ada deskripsi detail untuk foto ini.</p>
                    @endif
                </article>

                <!-- Action / Back -->
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <a href="{{ route('galeri') }}" class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-800 transition-colors">
                        <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                    </a>
                </div>
            </div>
        </div>
        @endif
        
    </div>
</section>

<style>
/* Styling khusus agar hasil Trix (rich-text) terlihat rapi */
article.prose h1, article.prose h2, article.prose h3 { color: #111827; font-weight: 800; margin-top: 2em; margin-bottom: 1em; }
article.prose p { margin-bottom: 1.5em; }
article.prose ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1.5em; }
article.prose ol { list-style-type: decimal; padding-left: 1.5em; margin-bottom: 1.5em; }
article.prose a { color: #16a34a; text-decoration: underline; }
article.prose a:hover { color: #15803d; }
article.prose blockquote { border-left: 4px solid #16a34a; padding-left: 1em; color: #4b5563; font-style: italic; }
</style>
@endsection

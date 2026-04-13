@extends('layouts.app')
@section('title', 'Kontak')

@section('content')
<section class="gradient-hero text-white py-16 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-72 h-72 bg-blue-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('home') }}" class="text-blue-300 hover:text-white text-sm transition-colors">Beranda</a>
            <i class="fas fa-chevron-right text-blue-400 text-xs"></i>
            <span class="text-white text-sm font-medium">Kontak</span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Hubungi <span class="text-blue-300">Kami</span></h1>
        <p class="text-blue-200 text-lg">Kami siap membantu Anda</p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid lg:grid-cols-2 gap-12">

        {{-- Info Kontak --}}
        <div class="space-y-6">
            <div>
                <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Informasi</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-6">Cara Menghubungi Kami</h2>
            </div>

            <div class="grid gap-4">
                @foreach([
                    ['fa-map-marker-alt','Alamat Kantor','Jl. Pendidikan No. 1, Kelurahan Maju, Kecamatan Sejahtera, Kota Bahagia 12345','gradient-card','text-white','#'],
                    ['fab fa-whatsapp','WhatsApp','0812-3456-7890 (Panitia PPDB)','bg-emerald-600','text-white','https://wa.me/6281234567890'],
                    ['fas fa-phone','Telepon Kantor','(021) 1234-5678','bg-blue-100','text-blue-700','tel:02112345678'],
                    ['fas fa-envelope','Email','info@alhikmah.sch.id','bg-red-100','text-red-700','mailto:info@alhikmah.sch.id'],
                ] as $k)
                <a href="{{ $k[5] }}" class="flex items-start gap-4 p-5 bg-white rounded-2xl shadow-sm border border-gray-100 card-hover group">
                    <div class="w-12 h-12 {{ $k[3] }} rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="{{ $k[0] }} {{ $k[4] }} text-lg"></i>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-sm group-hover:text-blue-700 transition-colors">{{ $k[1] }}</div>
                        <div class="text-gray-500 text-sm mt-0.5">{{ $k[2] }}</div>
                    </div>
                    <i class="fas fa-arrow-right text-gray-300 group-hover:text-blue-500 transition-colors ml-auto mt-1"></i>
                </a>
                @endforeach
            </div>

            {{-- Jam Operasional --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-clock text-blue-600"></i>Jam Operasional
                </h3>
                <div class="space-y-3">
                    @foreach([['Senin – Jumat','07.00 – 16.00 WIB',true],['Sabtu','07.00 – 12.00 WIB',true],['Jumat','Tutup',false]] as $j)
                    <div class="flex justify-between items-center py-2 border-b border-gray-50 last:border-0">
                        <span class="text-sm text-gray-600 font-medium">{{ $j[0] }}</span>
                        <span class="text-sm font-bold {{ $j[2] ? 'text-gray-900' : 'text-red-500' }} bg-{{ $j[2] ? 'blue' : 'red' }}-50 px-3 py-1 rounded-full">{{ $j[1] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Maps --}}
        <div>
            <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Lokasi</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-6">Temukan Kami di Sini</h2>
            <div class="rounded-3xl overflow-hidden shadow-xl border border-gray-100">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.194741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTEnNDEuMSJTIDEwNsKwNDknMTAuNCJF!5e0!3m2!1sid!2sid!4v1234567890"
                    width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="mt-5 p-5 bg-blue-50 rounded-2xl border border-blue-100">
                <p class="text-blue-800 text-sm font-medium flex items-start gap-2">
                    <i class="fas fa-info-circle mt-0.5 flex-shrink-0"></i>
                    Yayasan Al-Hidayah mudah dijangkau dengan kendaraan umum maupun pribadi. Tersedia area parkir yang luas.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

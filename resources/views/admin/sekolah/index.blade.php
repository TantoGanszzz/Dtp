@extends('layouts.admin')
@section('title', 'Data Sekolah')
@section('content')

<div class="flex justify-end mb-5">
    @if($sekolahs->count() < 2)
    <a href="{{ route('admin.sekolah.create') }}" class="btn-green text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
        <i class="fas fa-plus text-xs"></i> Tambah Sekolah
    </a>
    @endif
</div>

<div class="grid md:grid-cols-2 gap-6">
    @forelse($sekolahs as $s)
    <div class="card-admin overflow-hidden">
        @if($s->foto)
        <img src="{{ asset('storage/'.$s->foto) }}" class="w-full h-44 object-cover">
        @else
        <div class="w-full h-44 flex items-center justify-center {{ $s->jenjang == 'SMP' ? 'grad-smp' : 'grad-sma' }}">
            <i class="fas {{ $s->jenjang == 'SMP' ? 'fa-school' : 'fa-university' }} text-white/30 text-5xl"></i>
        </div>
        @endif
        <div class="p-6">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <span class="badge-{{ strtolower($s->jenjang) }} text-xs font-bold px-2.5 py-1 rounded-full">{{ $s->jenjang }}</span>
                    <h3 class="font-extrabold text-gray-900 text-lg mt-2">{{ $s->nama }}</h3>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.sekolah.edit', $s) }}" class="text-blue-600 hover:text-blue-800 text-xs font-bold flex items-center gap-1 transition-colors">
                        <i class="fas fa-pen text-xs"></i> Edit
                    </a>
                    <form action="{{ route('admin.sekolah.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus data sekolah ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold flex items-center gap-1 transition-colors">
                            <i class="fas fa-trash text-xs"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed">{{ $s->profil }}</p>
        </div>
    </div>
    @empty
    <div class="col-span-2 card-admin p-16 text-center">
        <i class="fas fa-school text-5xl text-slate-200 mb-4 block"></i>
        <p class="text-gray-400 font-bold mb-2">Belum ada data sekolah</p>
        <a href="{{ route('admin.sekolah.create') }}" class="text-green-600 text-sm font-bold hover:text-green-800 transition-colors">+ Tambah sekarang</a>
    </div>
    @endforelse
</div>
@endsection

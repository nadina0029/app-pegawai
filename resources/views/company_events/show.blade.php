@extends('master')

@section('title', 'Detail Event')
@section('page-title', 'Detail Kegiatan')

@section('content')
<div class="max-w-3xl mx-auto mt-6">
    <div class="glass-panel rounded-3xl p-10 border border-white/10 relative overflow-hidden">
        
        {{-- Background Gradient (Ganti #06B6D4 dengan tanda kutip tunggal) --}}
        <div class="absolute top-0 left-0 w-full h-2 opacity-80" 
             style="background: linear-gradient(to right, transparent, {{ $companyEvent->warna ?? '#06B6D4' }}, transparent);"></div>
             
        <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl -z-10"></div>

        <div class="flex justify-between items-start mb-6">
            <div>
                {{-- DATE TEXT --}}
                <p class="text-xs font-bold text-cyan-400 uppercase tracking-wider mb-1">
                    {{ \Carbon\Carbon::parse($companyEvent->tanggal_mulai)->translatedFormat('l, d F Y') }}
                </p>
                <h1 class="text-3xl font-bold text-white">{{ $companyEvent->judul }}</h1>
            </div>
            {{-- Icon Box --}}
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg" style="background-color: {{ $companyEvent->warna ?? '#06B6D4' }}">
                <i class="fas fa-calendar-check text-white text-xl"></i>
            </div>
        </div>

        {{-- Waktu Grid --}}
        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                <p class="text-xs text-slate-400 uppercase mb-1">Mulai</p>
                <p class="text-xl font-mono text-white font-bold">
                    {{ \Carbon\Carbon::parse($companyEvent->tanggal_mulai)->format('H:i') }}
                </p>
            </div>
            <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                <p class="text-xs text-slate-400 uppercase mb-1">Selesai</p>
                <p class="text-xl font-mono text-white font-bold">
                    {{ \Carbon\Carbon::parse($companyEvent->tanggal_selesai)->format('H:i') }}
                </p>
            </div>
        </div>

        <div class="space-y-6">
            <div>
                <h4 class="text-sm font-bold text-white mb-2 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-cyan-400"></i> Lokasi
                </h4>
                <p class="text-slate-300">{{ $companyEvent->lokasi ?? 'Tidak ada lokasi' }}</p>
            </div>
            
            <div>
                <h4 class="text-sm font-bold text-white mb-2 flex items-center gap-2">
                    <i class="fas fa-align-left text-cyan-400"></i> Deskripsi
                </h4>
                <p class="text-slate-300 leading-relaxed">
                    {{ $companyEvent->deskripsi ?? 'Tidak ada deskripsi tambahan.' }}
                </p>
            </div>
        </div>

        <div class="flex items-center justify-between mt-10 pt-6 border-t border-white/10">
            <a href="{{ route('company-events.index') }}" class="px-5 py-2.5 rounded-xl text-slate-400 hover:bg-white/5 transition">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>

            <div class="flex gap-3">
                {{-- Tombol Hapus --}}
                <form action="{{ route('company-events.destroy', $companyEvent->id) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?');">
                    @csrf @method('DELETE')
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 text-rose-400 hover:bg-rose-500 hover:text-white transition" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                
                {{-- Tombol Edit --}}
                <a href="{{ route('company-events.edit', $companyEvent->id) }}" 
                   class="px-6 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl shadow-lg shadow-cyan-500/30 transition">
                    Edit Kegiatan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
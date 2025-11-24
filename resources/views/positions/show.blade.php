@extends('master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Informasi Posisi')

@section('content')
<div class="max-w-4xl mx-auto mt-6">

    <div class="glass-panel rounded-3xl p-8 md:p-10 border border-white/10 relative overflow-hidden">
        
        {{-- Dekorasi Latar --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl -z-10"></div>

        {{-- CONTAINER UTAMA (Flex Row) --}}
        <div class="flex flex-col md:flex-row gap-6 md:gap-10 items-center justify-between">
            
            {{-- BAGIAN KIRI: Ikon & Nama Jabatan (Sejajar) --}}
            <div class="flex items-center gap-6 w-full md:w-auto">
                {{-- Ikon --}}
                <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30 shrink-0">
                    <i class="fas fa-id-badge text-4xl text-white"></i>
                </div>

                {{-- Nama Jabatan --}}
                <div>
                    {{-- Nama Jabatan (Besar & Putih) --}}
                    {{-- Menggunakan nama_departemen sesuai database kamu --}}
                    <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                        {{ $position->nama_departemen }}
                    </h1>
                </div>
            </div>

            {{-- BAGIAN KANAN: Detail Gaji (Card) --}}
            <div class="w-full md:w-auto min-w-[300px]">
                <div class="bg-slate-900/50 rounded-2xl p-6 border border-emerald-500/20 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-3 opacity-20 group-hover:opacity-40 transition-opacity">
                        <i class="fas fa-coins text-6xl text-emerald-500"></i>
                    </div>

                    {{-- Gaji Bulanan --}}
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-semibold mb-2">Gaji Pokok (Bulan)</p>
                        <div class="flex items-baseline gap-1">
                            <span class="text-sm text-emerald-400 font-bold">Rp</span>
                            <span class="text-3xl font-mono font-bold text-white tracking-wide">
                                {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer Tombol --}}
        <div class="flex items-center justify-between mt-10 pt-6 border-t border-white/10">
            <a href="{{ route('positions.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition font-medium">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>
@endsection
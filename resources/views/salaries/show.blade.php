@extends('master')

@section('title', 'Detail Gaji')
@section('page-title', 'Slip Gaji Karyawan')

@section('content')
<div class="max-w-4xl mx-auto mt-6">

    <div class="glass-panel rounded-3xl p-8 md:p-10 border border-white/10 relative overflow-hidden">
        
        {{-- Dekorasi Latar (Rose & Pink) --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-rose-500/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl -z-10"></div>

        {{-- HEADER: Identitas & Periode --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8 border-b border-white/10 pb-8">
            <div class="flex items-center gap-5">
                {{-- Avatar --}}
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center text-white text-3xl font-bold shadow-lg shadow-rose-500/20">
                    {{ substr($salary->employee->nama_lengkap ?? 'U', 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-white">
                        {{ $salary->employee->nama_lengkap ?? 'Karyawan Tidak Ditemukan' }}
                    </h2>
                    <p class="text-slate-400 text-sm mt-1">
                        Jabatan: <span class="text-rose-300">{{ $salary->employee->jabatan->nama_departemen ?? '-' }}</span>
                    </p>
                </div>
            </div>

            {{-- Periode Badge --}}
            <div class="text-right">
                <p class="text-xs text-slate-500 uppercase font-bold tracking-widest mb-1">Periode Gaji</p>
                <div class="text-2xl text-white font-bold flex items-center gap-2 md:justify-end font-mono">
                    <i class="fas fa-calendar-check text-rose-500"></i>
                    {{-- Coba parse format m-Y, jika gagal pakai format standar --}}
                    @php
                        try {
                            $date = \Carbon\Carbon::createFromFormat('m-Y', $salary->bulan);
                        } catch (\Exception $e) {
                            $date = \Carbon\Carbon::parse($salary->bulan);
                        }
                    @endphp
                    {{ $date->translatedFormat('F Y') }}
                </div>
            </div>
        </div>

        {{-- BODY: Rincian Gaji --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            {{-- KOLOM KIRI: PEMASUKAN (Income) --}}
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-emerald-400 uppercase tracking-wider flex items-center gap-2 border-b border-white/5 pb-2">
                    <i class="fas fa-arrow-down"></i> Pemasukan
                </h3>
                
                {{-- Gaji Pokok --}}
                <div class="flex justify-between items-center p-4 rounded-xl bg-emerald-500/5 border border-emerald-500/10">
                    <span class="text-slate-300 text-sm">Gaji Pokok</span>
                    <span class="text-white font-mono font-medium">
                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                    </span>
                </div>

                {{-- Tunjangan --}}
                <div class="flex justify-between items-center p-4 rounded-xl bg-emerald-500/5 border border-emerald-500/10">
                    <span class="text-slate-300 text-sm">Tunjangan & Bonus</span>
                    <span class="text-white font-mono font-medium">
                        Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}
                    </span>
                </div>

                {{-- Subtotal Pemasukan --}}
                <div class="flex justify-between items-center px-4 pt-2">
                    <span class="text-xs text-slate-500">Total Kotor</span>
                    <span class="text-emerald-400 font-mono text-sm">
                        + Rp {{ number_format($salary->gaji_pokok + $salary->tunjangan, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            {{-- KOLOM KANAN: POTONGAN & NETTO --}}
            <div class="space-y-6 flex flex-col h-full">
                
                {{-- Potongan --}}
                <div>
                    <h3 class="text-sm font-bold text-rose-400 uppercase tracking-wider flex items-center gap-2 border-b border-white/5 pb-2 mb-4">
                        <i class="fas fa-arrow-up"></i> Potongan
                    </h3>
                    <div class="flex justify-between items-center p-4 rounded-xl bg-rose-500/5 border border-rose-500/10">
                        <span class="text-slate-300 text-sm">Potongan (Absen/Lain)</span>
                        <span class="text-white font-mono font-medium">
                            Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                {{-- TOTAL BERSIH (Highlight) --}}
                <div class="mt-auto">
                    <div class="p-6 rounded-2xl bg-gradient-to-r from-rose-600 to-pink-600 shadow-lg shadow-rose-500/30 text-white relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 text-white/10">
                            <i class="fas fa-wallet text-8xl"></i>
                        </div>
                        
                        <p class="text-xs font-bold text-white/80 uppercase tracking-widest mb-1">Total Gaji Bersih</p>
                        <p class="text-4xl font-mono font-bold tracking-tight relative z-10">
                            Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- FOOTER: Tombol --}}
        <div class="flex items-center justify-between mt-10 pt-6 border-t border-white/10">
            <a href="{{ route('salaries.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition font-medium">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>

{{-- Style Khusus Print --}}
<style>
    @media print {
        body * { visibility: hidden; }
        .glass-panel, .glass-panel * { visibility: visible; }
        .glass-panel { position: absolute; left: 0; top: 0; width: 100%; margin: 0; padding: 20px; border: 1px solid #000; box-shadow: none; background: white !important; color: black !important; }
        /* Paksa background putih saat print */
        .bg-gradient-to-r, .bg-gradient-to-br { background: none !important; border: 1px solid #ccc; }
        .text-white { color: black !important; }
        button, a { display: none !important; }
    }
</style>
@endsection
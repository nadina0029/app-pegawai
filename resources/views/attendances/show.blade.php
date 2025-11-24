@extends('master')

@section('title', 'Detail Absensi')
@section('page-title', 'Detail Absensi')

@section('content')
<div class="max-w-4xl mx-auto mt-6">

    <div class="glass-panel rounded-3xl p-8 md:p-10 border border-white/10 relative overflow-hidden">
        
        {{-- Dekorasi Latar (Amber & Orange) --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl -z-10"></div>

        {{-- HEADER: Profil & Tanggal --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10 border-b border-white/10 pb-8">
            <div class="flex items-center gap-5">
                {{-- Avatar Besar --}}
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center text-white text-3xl font-bold shadow-lg shadow-amber-500/20">
                    {{ substr($attendance->employee->nama_lengkap ?? 'U', 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-white">
                        {{ $attendance->employee->nama_lengkap ?? 'Karyawan Tidak Ditemukan' }}
                    </h2>
                    <p class="text-slate-400 text-sm mt-1">
                        ID Karyawan: <span class="font-mono text-amber-400">{{ $attendance->karyawan_id }}</span>
                    </p>
                </div>
            </div>

            {{-- Tanggal Besar --}}
            <div class="text-right">
                <p class="text-xs text-slate-500 uppercase font-bold tracking-widest mb-1">Tanggal Absensi</p>
                <div class="text-2xl text-white font-bold flex items-center gap-2 md:justify-end">
                    <i class="fas fa-calendar-day text-amber-500"></i>
                    {{ \Carbon\Carbon::parse($attendance->tanggal)->translatedFormat('d F Y') }}
                </div>
            </div>
        </div>

        {{-- BODY: Grid Waktu & Status --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            {{-- KOTAK 1: Status Kehadiran --}}
            <div class="glass-panel bg-white/5 rounded-2xl p-6 flex flex-col items-center justify-center text-center border border-white/5">
                <p class="text-xs text-slate-400 uppercase font-semibold mb-3">Status Kehadiran</p>
                
                @php
                    $status = strtolower($attendance->status_absensi);
                    $badgeStyle = match($status) {
                        'hadir' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20 shadow-emerald-500/20',
                        'izin'  => 'bg-amber-500/10 text-amber-400 border-amber-500/20 shadow-amber-500/20',
                        'sakit' => 'bg-blue-500/10 text-blue-400 border-blue-500/20 shadow-blue-500/20',
                        'alpha' => 'bg-rose-500/10 text-rose-400 border-rose-500/20 shadow-rose-500/20',
                        default => 'bg-slate-500',
                    };
                    $icon = match($status) {
                        'hadir' => 'fa-check-circle',
                        'izin' => 'fa-clock',
                        'sakit' => 'fa-hospital',
                        'alpha' => 'fa-times-circle',
                        default => 'fa-question',
                    };
                @endphp

                <div class="inline-flex flex-col items-center justify-center w-20 h-20 rounded-full border-2 {{ $badgeStyle }} mb-2 shadow-lg">
                    <i class="fas {{ $icon }} text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white capitalize">{{ $status }}</h3>
            </div>

            {{-- KOTAK 2: Waktu Masuk --}}
            <div class="glass-panel bg-emerald-500/5 rounded-2xl p-6 border border-emerald-500/10 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fas fa-sign-in-alt text-6xl text-emerald-500"></i>
                </div>
                <p class="text-xs text-emerald-400 uppercase font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-arrow-right"></i> Jam Masuk
                </p>
                <p class="text-4xl font-mono font-bold text-white tracking-wider">
                    {{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '--:--' }}
                </p>
                <p class="text-xs text-slate-500 mt-2">WIB (Waktu Server)</p>
            </div>

            {{-- KOTAK 3: Waktu Keluar --}}
            <div class="glass-panel bg-rose-500/5 rounded-2xl p-6 border border-rose-500/10 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fas fa-sign-out-alt text-6xl text-rose-500"></i>
                </div>
                <p class="text-xs text-rose-400 uppercase font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> Jam Keluar
                </p>
                <p class="text-4xl font-mono font-bold text-white tracking-wider">
                    {{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '--:--' }}
                </p>
                <p class="text-xs text-slate-500 mt-2">WIB (Waktu Server)</p>
            </div>

        </div>

        {{-- FOOTER: Tombol --}}
        <div class="flex items-center justify-between mt-10 pt-6 border-t border-white/10">
            <a href="{{ route('attendances.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition font-medium">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>
@endsection
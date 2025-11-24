@extends('master')

@section('title', 'Detail Pegawai')
@section('page-title', 'Profil Pegawai')

@section('content')
<div class="max-w-4xl mx-auto relative">
    
    {{-- Dekorasi Background --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-500/20 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-cyan-500/20 rounded-full blur-3xl -z-10"></div>

    {{-- KARTU UTAMA --}}
    <div class="glass-panel rounded-3xl overflow-hidden border border-white/10 shadow-2xl relative">
        
        {{-- 1. Banner Atas (Gradient) --}}
        <div class="h-40 bg-gradient-to-r from-indigo-900 via-purple-900 to-slate-900 relative">
            <div class="absolute inset-0 bg-pattern opacity-10"></div> {{-- Opsional: Pattern --}}
        </div>

        <div class="px-8 pb-8">
            {{-- 2. Foto Profil & Identitas Utama --}}
            <div class="relative flex flex-col md:flex-row items-center md:items-end -mt-16 mb-8 gap-6">
                {{-- Avatar Besar --}}
                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 p-1 shadow-2xl shadow-indigo-500/30">
                    <div class="w-full h-full rounded-full bg-slate-900 flex items-center justify-center border-4 border-slate-900">
                        <span class="text-4xl font-bold text-white">
                            {{ substr($employee->nama_lengkap, 0, 1) }}
                        </span>
                    </div>
                </div>

                {{-- Nama & Jabatan --}}
                <div class="text-center md:text-left flex-1">
                    <h2 class="text-3xl font-bold text-white mb-1">{{ $employee->nama_lengkap }}</h2>
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                        <span class="text-indigo-300 font-medium bg-indigo-500/10 px-3 py-1 rounded-lg border border-indigo-500/20">
                            {{ $employee->jabatan->nama_jabatan ?? 'Tanpa Jabatan' }}
                        </span>
                        <span class="text-slate-400 text-sm">
                            <i class="fas fa-building mr-1"></i> {{ $employee->departemen->nama_departemen ?? '-' }}
                        </span>
                    </div>
                </div>

                {{-- Status Badge (Pojok Kanan) --}}
                <div class="mb-2">
                    @if(strtolower($employee->status) === 'aktif')
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 shadow-[0_0_15px_rgba(16,185,129,0.2)]">
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                            </span>
                            <span class="font-semibold tracking-wide">Pegawai Aktif</span>
                        </span>
                    @else
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-rose-500/10 text-rose-400 border border-rose-500/20">
                            <i class="fas fa-ban"></i>
                            <span class="font-semibold tracking-wide">Nonaktif</span>
                        </span>
                    @endif
                </div>
            </div>

            {{-- 3. Grid Informasi Detail --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- Kelompok Kontak --}}
                <div class="glass-panel p-5 rounded-2xl bg-white/5 border border-white/5 space-y-4">
                    <h4 class="text-sm font-semibold text-slate-400 uppercase tracking-wider border-b border-white/10 pb-2 mb-2">
                        Kontak & Alamat
                    </h4>
                    
                    {{-- Email --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Alamat Email</p>
                            <p class="text-white font-medium">{{ $employee->email }}</p>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center text-purple-400 shrink-0">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Nomor Telepon</p>
                            <p class="text-white font-medium">{{ $employee->nomor_telepon }}</p>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-pink-500/20 flex items-center justify-center text-pink-400 shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Alamat Domisili</p>
                            <p class="text-white font-medium text-sm leading-relaxed">{{ $employee->alamat }}</p>
                        </div>
                    </div>
                </div>

                {{-- Kelompok Personal & Karir --}}
                <div class="glass-panel p-5 rounded-2xl bg-white/5 border border-white/5 space-y-4">
                    <h4 class="text-sm font-semibold text-slate-400 uppercase tracking-wider border-b border-white/10 pb-2 mb-2">
                        Data Personal
                    </h4>

                    {{-- Tanggal Lahir --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-cyan-500/20 flex items-center justify-center text-cyan-400 shrink-0">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Tanggal Lahir</p>
                            <p class="text-white font-medium">
                                {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>

                    {{-- Tanggal Masuk --}}
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 shrink-0">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Bergabung Sejak</p>
                            <p class="text-white font-medium">
                                {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->translatedFormat('d F Y') }}
                            </p>
                            <p class="text-xs text-slate-500 mt-1">
                                ({{ \Carbon\Carbon::parse($employee->tanggal_masuk)->diffForHumans() }})
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- 4. Footer Tombol --}}
            <div class="mt-8 pt-6 border-t border-white/10 flex justify-between items-center">
                <a href="{{ route('employees.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-white/5 transition font-medium">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
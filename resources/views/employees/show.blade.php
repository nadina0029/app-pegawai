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
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
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
            </div> {{-- End Grid MD:grid-cols-2 --}}

            {{-- START: INFORMASI GAJI (Tambahan Baru) --}}
            @if($employee->salary) {{-- Cek apakah data gaji ada --}}
            <div class="mt-8">
                <h3 class="text-xl font-bold text-white mb-4 border-b border-rose-500/20 pb-2 flex items-center gap-2">
                    <i class="fas fa-wallet text-rose-400"></i> Informasi Gaji Terkini
                </h3>
                
                {{-- BULAN DAN TAHUN GAJI (BARU) --}}
                <p class="text-slate-400 text-sm mb-4 flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-rose-300"></i>
                    Periode: 
                    <span class="font-mono text-white font-bold">
                        @php
                            $salaryDate = $employee->salary->bulan;
                            try {
                                // Coba parse format standar (Y-m, Y-m-d)
                                $periodDate = \Carbon\Carbon::parse($salaryDate);
                            } catch (\Exception $e) {
                                // Fallback: Coba format non-standar m-Y (misal: 11-2025)
                                $periodDate = \Carbon\Carbon::createFromFormat('m-Y', $salaryDate);
                            }
                        @endphp
                        {{ $periodDate->translatedFormat('F Y') }}
                    </span>
                </p>
                {{-- END BULAN DAN TAHUN GAJI --}}


                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    
                    {{-- Gaji Pokok --}}
                    <div class="p-4 rounded-xl bg-rose-500/5 border border-rose-500/10">
                        <p class="text-xs text-slate-400 uppercase">Gaji Pokok</p>
                        <p class="text-xl font-mono text-white font-bold mt-1">
                            Rp {{ number_format($employee->salary->gaji_pokok ?? 0, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- Tunjangan/Potongan --}}
                    <div class="p-4 rounded-xl bg-rose-500/5 border border-rose-500/10">
                        <p class="text-xs text-slate-400 uppercase">Tunjangan / Potongan</p>
                        <p class="text-base font-mono text-emerald-400">
                             + Rp {{ number_format($employee->salary->tunjangan ?? 0, 0, ',', '.') }}
                        </p>
                        <p class="text-base font-mono text-rose-400">
                            - Rp {{ number_format($employee->salary->potongan ?? 0, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- Total Gaji Bersih --}}
                    <div class="p-4 rounded-xl bg-gradient-to-r from-rose-600/90 to-pink-600/90 shadow-lg shadow-rose-500/30">
                        <p class="text-xs text-white/80 uppercase">Take Home Pay</p>
                        <p class="text-2xl font-mono text-white font-bold mt-1">
                            Rp {{ number_format($employee->salary->total_gaji ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            @else
            {{-- State jika data gaji tidak ditemukan --}}
            <div class="mt-8 p-6 rounded-2xl bg-slate-800/50 border border-white/10 text-center">
                <i class="fas fa-info-circle text-rose-400 mb-2"></i>
                <p class="text-slate-400 text-sm">Data gaji terkini pegawai ini belum tercatat.</p>
            </div>
            @endif
            {{-- END: INFORMASI GAJI --}}

            {{-- 4. Footer Tombol --}}
            <div class="mt-8 pt-6 border-t border-white/10 flex justify-between items-center">
                <a href="{{ route('employees.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-white/5 transition font-medium">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <div class="flex gap-3">
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-rose-500/10 text-rose-400 hover:bg-rose-500 hover:text-white transition" title="Hapus Pegawai">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <a href="{{ route('employees.edit', $employee->id) }}"
                       class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/30 transition hover:-translate-y-1">
                        <i class="fas fa-edit"></i> Edit Profil
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@extends('master')

@section('title', 'Detail Departemen')
@section('page-title', 'Overview Divisi')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">

    {{-- 1. HERO SECTION: Info Utama Departemen --}}
    <div class="glass-panel rounded-3xl p-10 border border-white/10 relative overflow-hidden text-center">
        {{-- Dekorasi Latar --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl -z-10"></div>
        
        {{-- Ikon Besar --}}
        <div class="w-24 h-24 mx-auto bg-gradient-to-br from-indigo-600 to-purple-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-indigo-500/40 mb-6 transform hover:rotate-6 transition-transform duration-500">
            <i class="fas fa-building text-4xl text-white"></i>
        </div>

        {{-- Nama Departemen --}}
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">
            {{ $department->nama_departemen }}
        </h2>

        {{-- Statistik Kecil --}}
        <div class="flex justify-center gap-4 mt-6">
            <div class="px-4 py-2 rounded-full bg-white/5 border border-white/10 text-slate-300 text-sm flex items-center gap-2">
                <i class="fas fa-users text-indigo-400"></i>
                {{-- PERBAIKAN DISINI: Cek dulu apakah employees ada, baru di-count --}}
                <span class="font-bold text-white">
                    {{ $department->employees ? $department->employees->count() : 0 }}
                </span> Pegawai
            </div>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex items-center justify-between px-2">
            <h3 class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fas fa-users text-indigo-400"></i> Anggota Tim
            </h3>
        </div>

        {{-- Cek apakah ada pegawai --}}
        @if($department->employees && $department->employees->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($department->employees as $employee)
                <a href="{{ route('employees.show', $employee->id) }}" class="group glass-panel p-4 rounded-xl border border-white/5 hover:bg-white/5 transition flex items-center gap-4">
                    {{-- Avatar Kecil --}}
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-slate-700 to-slate-800 flex items-center justify-center text-white font-bold text-sm ring-2 ring-white/10 group-hover:ring-indigo-500 transition-all">
                        {{ substr($employee->nama_lengkap, 0, 1) }}
                    </div>
                    
                    <div>
                        <h4 class="text-white font-medium group-hover:text-indigo-300 transition-colors">
                            {{ $employee->nama_lengkap }}
                        </h4>
                        <p class="text-xs text-slate-500">
                            {{-- Panggil Jabatan dengan aman --}}
                            {{ $employee->jabatan->nama_jabatan ?? 'Anggota' }}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        @else
            {{-- State Kosong --}}
            <div class="glass-panel p-8 rounded-2xl text-center border-dashed border border-white/10">
                <p class="text-slate-500">Belum ada pegawai di departemen ini.</p>
            </div>
        @endif
    </div>

    {{-- Footer Tombol --}}
    <div class="flex justify-end pt-4 border-t border-white/10">
        <a href="{{ route('departments.index') }}"
           class="inline-flex items-center gap-2 px-6 py-3 bg-white/5 hover:bg-white/10 text-white text-sm font-medium rounded-xl transition border border-white/10">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
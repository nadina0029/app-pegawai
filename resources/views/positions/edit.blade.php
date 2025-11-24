@extends('master')

@section('title', 'Edit Jabatan')
@section('page-title', 'Ubah Data Jabatan')

@section('content')
<div class="max-w-2xl mx-auto mt-6">
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="glass-panel rounded-3xl p-10 border border-white/10 relative overflow-hidden">
            
            {{-- Dekorasi Cahaya Latar (Sedikit berbeda: Amber & Emerald untuk Edit) --}}
            <div class="absolute top-0 right-0 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-emerald-500/10 rounded-full blur-3xl -z-10"></div>

            {{-- Input Fields --}}
            <div class="space-y-8">
                
                {{-- Nama Jabatan --}}
                <div>
                    <label for="nama_departemen" class="block text-xs font-bold text-emerald-400 uppercase tracking-wider mb-2 ml-1">
                        Nama Jabatan
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-id-card-alt text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                        </div>
                        <input type="text" id="nama_departemen" name="nama_departemen"
                               value="{{ old('nama_departemen', $position->nama_departemen) }}"
                               class="glass-input w-full rounded-2xl pl-12 py-4 text-lg focus:ring-2 focus:ring-emerald-500 transition-all placeholder-slate-600"
                               required>
                    </div>
                </div>

                {{-- Gaji Pokok --}}
                <div>
                    <label for="gaji_pokok" class="block text-xs font-bold text-emerald-400 uppercase tracking-wider mb-2 ml-1">
                        Gaji Pokok
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 font-bold group-focus-within:text-emerald-400 transition-colors">Rp</span>
                        </div>
                        <input type="number" id="gaji_pokok" name="gaji_pokok"
                               value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                               class="glass-input w-full rounded-2xl pl-12 py-4 text-lg font-mono focus:ring-2 focus:ring-emerald-500 transition-all placeholder-slate-600 tracking-wide appearance-none"
                               required>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <span class="text-xs text-slate-500">/ Bulan</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-between mt-12 pt-6 border-t border-white/10">
                <a href="{{ route('positions.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition font-medium">
                    <i class="fas fa-arrow-left"></i> Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition-all transform hover:scale-105">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>

        </div>
    </form>
</div>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
    input[type=number] { -moz-appearance: textfield; }
</style>
@endsection
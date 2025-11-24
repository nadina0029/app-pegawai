@extends('master')

@section('title', 'Edit Departemen')
@section('page-title', 'Edit Data Departemen')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="glass-panel rounded-3xl p-10 border border-white/10 relative overflow-hidden">
            
            {{-- Dekorasi Cahaya Latar (Sedikit berbeda warna untuk membedakan Edit vs Create) --}}
            <div class="absolute top-0 right-0 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-indigo-500/10 rounded-full blur-3xl -z-10"></div>

            {{-- Input Field --}}
            <div class="space-y-6">
                <div>
                    <label for="nama_departemen" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                        Nama Departemen
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-building text-slate-500 group-focus-within:text-amber-400 transition-colors"></i>
                        </div>
                        <input type="text" id="nama_departemen" name="nama_departemen"
                               value="{{ old('nama_departemen', $department->nama_departemen) }}"
                               class="glass-input w-full rounded-xl pl-11 py-4 text-lg focus:ring-2 focus:ring-amber-500 transition-all placeholder-slate-600"
                               required>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-between mt-10 pt-6 border-t border-white/10">
                <a href="{{ route('departments.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition font-medium">
                    <i class="fas fa-arrow-left"></i> Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/30 transition-all transform hover:scale-105">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>

        </div>
    </form>
</div>
@endsection
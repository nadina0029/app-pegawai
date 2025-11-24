@extends('master')

@section('title', 'Data Departemen')
@section('page-title', 'Daftar Departemen')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-20">
    @forelse($departments as $department)
    {{-- Card Glassmorphism --}}
    <div class="group glass-panel p-6 rounded-2xl border border-white/10 relative overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-indigo-500/10">
        
        {{-- Dekorasi Glow di Pojok --}}
        <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-500/10 rounded-full blur-2xl group-hover:bg-indigo-500/20 transition-all"></div>

        <div class="relative z-10 flex flex-col h-full justify-between">
            <div>
                {{-- Header Kartu: Ikon & Nama --}}
                <div class="flex items-start justify-between mb-4">
                    {{-- Ikon Besar --}}
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-700 flex items-center justify-center text-white shadow-lg shadow-indigo-500/30 transform group-hover:rotate-6 transition-transform duration-300">
                        <i class="fas fa-building text-2xl"></i>
                    </div>
                </div>

                {{-- Nama Departemen --}}
                <h3 class="text-xl font-bold text-white mb-1 group-hover:text-indigo-300 transition-colors">
                    {{ $department->nama_departemen }}
                </h3>
            </div>

            {{-- Footer Kartu: Tombol Aksi --}}
            <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
                <span class="text-xs text-slate-500 font-medium">Actions</span>
                
                <div class="flex gap-2">
                    {{-- Detail --}}
                    <a href="{{ route('departments.show', $department->id) }}" 
                       class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 text-blue-400 hover:bg-blue-500 hover:text-white transition-all border border-white/5" 
                       title="Lihat Detail">
                        <i class="fas fa-eye text-sm"></i>
                    </a>

                    {{-- Edit --}}
                    <a href="{{ route('departments.edit', $department->id) }}" 
                       class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 text-amber-400 hover:bg-amber-500 hover:text-white transition-all border border-white/5" 
                       title="Edit">
                        <i class="fas fa-pen-to-square text-sm"></i>
                    </a>

                    {{-- Hapus --}}
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus departemen ini? Data pegawai di dalamnya mungkin akan terdampak.')" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" 
                                class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 text-rose-400 hover:bg-rose-500 hover:text-white transition-all border border-white/5" 
                                title="Hapus">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    {{-- Tampilan Jika Kosong --}}
    <div class="col-span-full glass-panel p-12 rounded-2xl text-center border-dashed border-2 border-white/10">
        <div class="w-20 h-20 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-folder-open text-3xl text-slate-600"></i>
        </div>
        <h3 class="text-lg font-medium text-white">Belum ada Departemen</h3>
        <p class="text-slate-400 text-sm mt-1">Silakan tambahkan departemen baru untuk memulai.</p>
    </div>
    @endforelse
</div>

{{-- Floating Action Button (FAB) --}}
<a href="{{ route('departments.create') }}"
   class="fixed bottom-8 right-8 z-50 w-14 h-14 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-[0_0_20px_rgba(79,70,229,0.5)] flex items-center justify-center transition-all duration-300 hover:scale-110 hover:rotate-90"
   title="Tambah Departemen">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
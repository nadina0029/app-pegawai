@extends('master')

@section('title', 'Data Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
{{-- Container dibuat Glass --}}
<div class="glass-panel rounded-2xl overflow-hidden border border-white/10">
    <div class="overflow-x-auto">
        {{-- Tabel Transparan --}}
        <table class="min-w-full divide-y divide-white/10 text-slate-300">
            {{-- Header Gelap dengan Aksen Indigo --}}
            <thead class="bg-indigo-500/10 text-indigo-300">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-user mr-1"></i> Nama Lengkap</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-building mr-1"></i> Departemen</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-user-tie mr-1"></i> Jabatan</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-calendar-alt mr-1"></i> Tanggal Masuk</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-check-circle mr-1"></i> Masa Aktif</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold"><i class="fas fa-cogs mr-1"></i> Aksi</th>
                </tr>
            </thead>
            {{-- Body dengan Divider Tipis --}}
            <tbody class="divide-y divide-white/5">
                @foreach($employees as $employee)
                <tr class="hover:bg-white/5 transition duration-200">
                    <td class="px-4 py-3">{{ $employee->nama_lengkap }}</td>
                    <td class="px-4 py-3">{{ $employee->departemen->nama_departemen ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $employee->jabatan->nama_departemen ?? '-' }}</td>
                    <td class="px-4 py-3 font-mono text-slate-400">{{ $employee->tanggal_masuk }}</td>
                    <td class="px-4 py-3">
                        @if(strtolower($employee->status) === 'aktif')
                            {{-- Badge Hijau Neon --}}
                            <span class="px-2 py-1 text-xs rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Aktif</span>
                        @else
                            {{-- Badge Merah Neon --}}
                            <span class="px-2 py-1 text-xs rounded-full bg-rose-500/10 text-rose-400 border border-rose-500/20">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center space-x-3 text-base">
                        {{-- Tombol Aksi Warna-warni --}}
                        <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-400 hover:text-blue-300 transition" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="text-amber-400 hover:text-amber-300 transition" title="Edit">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-rose-400 hover:text-rose-300 transition" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Tombol Tambah --}}
<a href="{{ route('employees.create') }}"
   class="w-14 h-14 flex items-center justify-center fixed bottom-24 right-10 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-[0_0_20px_rgba(79,70,229,0.5)] transition duration-300 hover:scale-110"
   title="Tambah Pegawai">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
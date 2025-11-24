@extends('master')

@section('title', 'Data Gaji')
@section('page-title', 'Daftar Penggajian')

@section('content')
{{-- Container Glassmorphism --}}
<div class="glass-panel rounded-2xl overflow-hidden border border-white/10 mb-20">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-white/10 text-slate-300">

            {{-- Header Gelap (Nuansa Rose) --}}
            <thead class="bg-rose-500/10 text-rose-300">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-id-card mr-2"></i> Karyawan
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-calendar-alt mr-2"></i> Periode
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-money-bill-wave mr-2"></i> Gaji Pokok
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-wallet mr-2"></i> Total Gaji
                    </th>
                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-cogs mr-2"></i> Aksi
                    </th>
                </tr>
            </thead>

            {{-- Body Tabel --}}
            <tbody class="divide-y divide-white/5">
                @forelse($salaries as $salary)
                <tr class="hover:bg-white/5 transition duration-200 group">

                    {{-- Nama Karyawan --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center text-white text-xs font-bold shadow-md shadow-rose-500/20">
                                {{ substr($salary->employee->nama_lengkap ?? 'U', 0, 1) }}
                            </div>
                            <div>
                                <p class="font-medium text-white group-hover:text-rose-300 transition-colors">
                                    {{ $salary->employee->nama_lengkap ?? 'ID: '.$salary->karyawan_id }}
                                </p>
                                <p class="text-xs text-slate-500">{{ $salary->employee->jabatan->nama_departemen ?? '-' }}</p>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-medium bg-white/5 border border-white/10 text-slate-300">
                            @php
                            try {
                            $date = \Carbon\Carbon::parse($salary->bulan);
                            } catch (\Exception $e) {
                            $date = \Carbon\Carbon::createFromFormat('m-Y', $salary->bulan);
                            }
                            @endphp
                            {{ $date->translatedFormat('F Y') }}
                        </span>
                    </td>

                    {{-- Gaji Pokok --}}
                    <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-400">
                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                    </td>

                    {{-- Total Gaji --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-mono text-sm font-bold text-rose-400 text-shadow-sm">
                            Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                        </span>
                    </td>

                    {{-- Tombol Aksi --}}
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('salaries.show', $salary->id) }}"
                                class="p-2 rounded-lg text-blue-400 hover:bg-blue-500/10 transition" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('salaries.edit', $salary->id) }}"
                                class="p-2 rounded-lg text-amber-400 hover:bg-amber-500/10 transition" title="Edit">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus data gaji ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg text-rose-400 hover:bg-rose-500/10 transition" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                        Belum ada data.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Floating Action Button (Warna Rose) --}}
<a href="{{ route('salaries.create') }}"
    class="fixed bottom-8 right-8 z-50 w-14 h-14 bg-rose-600 hover:bg-rose-500 text-white rounded-full shadow-[0_0_20px_rgba(225,29,72,0.5)] flex items-center justify-center transition-all duration-300 hover:scale-110 hover:rotate-90"
    title="Tambah Gaji">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
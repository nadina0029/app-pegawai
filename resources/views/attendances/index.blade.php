@extends('master')

@section('title', 'Data Absensi')
@section('page-title', 'Riwayat Kehadiran')

@section('content')
{{-- Container Glassmorphism --}}
<div class="glass-panel rounded-2xl overflow-hidden border border-white/10 mb-20">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-white/10 text-slate-300">
            {{-- Header Gelap (Nuansa Amber/Gold) --}}
            <thead class="bg-amber-500/10 text-amber-400">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-id-card mr-2"></i> Karyawan
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-calendar-day mr-2"></i> Tanggal
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-check-circle mr-2"></i> Status
                    </th>
                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-cogs mr-2"></i> Aksi
                    </th>
                </tr>
            </thead>
            
            {{-- Body Tabel --}}
            <tbody class="divide-y divide-white/5">
                @forelse($attendances as $attendance)
                <tr class="hover:bg-white/5 transition duration-200 group">
                    
                    {{-- Nama Karyawan --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-3">
                            {{-- Avatar Amber --}}
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center text-white text-xs font-bold shadow-md">
                                {{ substr($attendance->employee->nama_lengkap ?? 'U', 0, 1) }}
                            </div>
                            <span class="font-medium text-white group-hover:text-amber-300 transition-colors">
                                {{ $attendance->employee->nama_lengkap ?? 'ID: '.$attendance->karyawan_id }}
                            </span>
                        </div>
                    </td>

                    {{-- Tanggal --}}
                    <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-slate-400">
                        {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}
                    </td>

                    {{-- Status Badge --}}
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        @php
                            $status = strtolower($attendance->status_absensi);
                            $badgeClass = match($status) {
                                'hadir' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20', // Hadir tetap hijau
                                'izin'  => 'bg-amber-500/10 text-amber-400 border-amber-500/20 shadow-[0_0_10px_rgba(245,158,11,0.2)]', // Izin jadi highlight kuning
                                'sakit' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                                'alpha' => 'bg-rose-500/10 text-rose-400 border-rose-500/20',
                                default => 'bg-slate-500/10 text-slate-400 border-slate-500/20',
                            };
                            $icon = match($status) {
                                'hadir' => 'fa-check',
                                'izin'  => 'fa-clock',
                                'sakit' => 'fa-hospital',
                                'alpha' => 'fa-times',
                                default => 'fa-minus',
                            };
                        @endphp
                        
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium border {{ $badgeClass }}">
                            <i class="fas {{ $icon }}"></i> {{ ucfirst($status) }}
                        </span>
                    </td>

                    {{-- Tombol Aksi --}}
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end gap-2">
                            {{-- Detail --}}
                            <a href="{{ route('attendances.show', $attendance->id) }}" 
                               class="p-2 rounded-lg text-blue-400 hover:bg-blue-500/10 transition" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            
                            {{-- Edit --}}
                            <a href="{{ route('attendances.edit', $attendance->id) }}" 
                               class="p-2 rounded-lg text-amber-400 hover:bg-amber-500/10 transition" title="Edit">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            {{-- Hapus --}}
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                    <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-clipboard-list text-4xl mb-3 opacity-50"></i>
                            <p>Belum ada data absensi hari ini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Floating Action Button (Warna Amber) --}}
<a href="{{ route('attendances.create') }}"
   class="fixed bottom-8 right-8 z-50 w-14 h-14 bg-amber-500 hover:bg-amber-400 text-white rounded-full shadow-[0_0_20px_rgba(245,158,11,0.5)] flex items-center justify-center transition-all duration-300 hover:scale-110 hover:rotate-90"
   title="Catat Absensi">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
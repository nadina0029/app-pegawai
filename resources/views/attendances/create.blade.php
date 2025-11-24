@extends('master')

@section('title', 'Form Absensi')
@section('page-title', 'Catat Kehadiran')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <form action="{{ route('attendances.store') }}" method="POST" id="attendanceForm">
        @csrf

        <div class="glass-panel rounded-3xl p-8 md:p-10 border border-white/10 relative overflow-hidden">
            
            {{-- Dekorasi Latar (Nuansa Amber/Gold) --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl -z-10"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- KOLOM KIRI: Identitas & Tanggal --}}
                <div class="space-y-6">
                    {{-- Nama Karyawan --}}
                    <div>
                        <label for="karyawan_id" class="block text-xs font-bold text-amber-400 uppercase tracking-wider mb-2 ml-1">
                            Nama Karyawan
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-slate-500 group-focus-within:text-amber-400 transition-colors"></i>
                            </div>
                            <select id="karyawan_id" name="karyawan_id"
                                    class="glass-input w-full rounded-2xl pl-12 py-3 focus:ring-2 focus:ring-amber-500 transition-all appearance-none cursor-pointer bg-slate-900"
                                    required>
                                <option value="" disabled selected>Pilih Karyawan...</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" class="bg-slate-900 text-white">{{ $employee->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-xs text-slate-500"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div>
                        <label for="tanggal" class="block text-xs font-bold text-amber-400 uppercase tracking-wider mb-2 ml-1">
                            Tanggal Absensi
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-slate-500 group-focus-within:text-amber-400 transition-colors"></i>
                            </div>
                            <input type="date" id="tanggal" name="tanggal"
                                   value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                   class="glass-input w-full rounded-2xl pl-12 py-3 focus:ring-2 focus:ring-amber-500 transition-all cursor-pointer"
                                   required>
                        </div>
                    </div>

                    {{-- Status Absensi --}}
                    <div>
                        <label for="status_absensi" class="block text-xs font-bold text-amber-400 uppercase tracking-wider mb-2 ml-1">
                            Status Kehadiran
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-check-circle text-slate-500 group-focus-within:text-amber-400 transition-colors"></i>
                            </div>
                            <select id="status_absensi" name="status_absensi"
                                    class="glass-input w-full rounded-2xl pl-12 py-3 focus:ring-2 focus:ring-amber-500 transition-all appearance-none cursor-pointer bg-slate-900"
                                    required>
                                <option value="hadir" selected class="bg-slate-900 text-white">Hadir</option>
                                <option value="izin" class="bg-slate-900 text-white">Izin</option>
                                <option value="sakit" class="bg-slate-900 text-white">Sakit</option>
                                <option value="alpha" class="bg-slate-900 text-white">Alpha</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-xs text-slate-500"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN: Jam Kerja --}}
                <div class="space-y-6" id="timeFieldsContainer">
                    <div class="p-6 rounded-2xl bg-slate-900/50 border border-amber-500/20 h-full flex flex-col justify-center transition-all duration-300" id="timeBox">
                        <h4 class="text-sm font-semibold text-slate-300 mb-4 border-b border-white/10 pb-2">Detail Waktu</h4>
                        
                        {{-- Waktu Masuk --}}
                        <div class="mb-4">
                            <label for="waktu_masuk" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Jam Masuk
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-sign-in-alt text-emerald-500"></i>
                                </div>
                                <input type="time" id="waktu_masuk" name="waktu_masuk"
                                       class="glass-input w-full rounded-xl pl-12 py-3 focus:ring-2 focus:ring-emerald-500 transition-all bg-slate-800/50 border-slate-700"
                                       placeholder="08:00">
                            </div>
                        </div>

                        {{-- Waktu Keluar --}}
                        <div>
                            <label for="waktu_keluar" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Jam Keluar
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-sign-out-alt text-rose-500"></i>
                                </div>
                                <input type="time" id="waktu_keluar" name="waktu_keluar"
                                       class="glass-input w-full rounded-xl pl-12 py-3 focus:ring-2 focus:ring-rose-500 transition-all bg-slate-800/50 border-slate-700"
                                       placeholder="17:00">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-between mt-10 pt-6 border-t border-white/10">
                <a href="{{ route('attendances.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition font-medium">
                    <i class="fas fa-arrow-left"></i> Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-8 py-3 bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold rounded-xl shadow-lg shadow-amber-500/30 transition-all transform hover:scale-105">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
            </div>

        </div>
    </form>
</div>

{{-- SCRIPT LOGIKA JAM --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status_absensi');
        const waktuMasuk = document.getElementById('waktu_masuk');
        const waktuKeluar = document.getElementById('waktu_keluar');
        const timeBox = document.getElementById('timeBox');

        function toggleWaktuFields() {
            const status = statusSelect.value;
            
            if (status !== 'hadir') {
                // Jika tidak hadir, kosongkan dan disable
                waktuMasuk.value = '';
                waktuKeluar.value = '';
                waktuMasuk.disabled = true;
                waktuKeluar.disabled = true;
                
                // Efek Visual Disable (Opacity & Blur)
                timeBox.classList.add('opacity-50', 'pointer-events-none', 'grayscale');
            } else {
                // Jika hadir, enable
                waktuMasuk.disabled = false;
                waktuKeluar.disabled = false;
                
                // Hapus Efek Visual
                timeBox.classList.remove('opacity-50', 'pointer-events-none', 'grayscale');
            }
        }

        statusSelect.addEventListener('change', toggleWaktuFields);
        toggleWaktuFields(); // Jalankan saat load
    });
</script>
@endpush
@endsection
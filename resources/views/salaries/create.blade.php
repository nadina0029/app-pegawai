@extends('master')

@section('title', 'Form Gaji')
@section('page-title', 'Input Gaji')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <form action="{{ route('salaries.store') }}" method="POST" id="salaryForm">
        @csrf

        <div class="glass-panel rounded-3xl p-8 md:p-10 border border-white/10 relative overflow-hidden">
            
            {{-- Dekorasi Latar (Rose & Pink) --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-rose-500/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl -z-10"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- KOLOM KIRI --}}
                <div class="space-y-6">
                    
                    {{-- Nama Karyawan --}}
                    <div>
                        <label class="block text-xs font-bold text-rose-400 uppercase tracking-wider mb-2 ml-1">Nama Karyawan</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-slate-500 group-focus-within:text-rose-400 transition-colors"></i>
                            </div>
                            <select id="karyawan_id" name="karyawan_id" required
                                    class="glass-input w-full rounded-2xl pl-12 py-3 focus:ring-2 focus:ring-rose-500 transition-all appearance-none cursor-pointer bg-slate-900">
                                <option value="" disabled selected>Pilih Karyawan...</option>
                                @foreach($employees as $employee)
                                    {{-- PERBAIKAN DISINI: Menggunakan (int) agar .00 hilang --}}
                                    <option value="{{ $employee->id }}" 
                                            data-gaji="{{ (int)($employee->jabatan->gaji_pokok ?? 0) }}"
                                            class="bg-slate-900 text-white">
                                        {{ $employee->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-xs text-slate-500"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Bulan --}}
                    <div>
                        <label class="block text-xs font-bold text-rose-400 uppercase tracking-wider mb-2 ml-1">Periode Gaji</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-slate-500 group-focus-within:text-rose-400 transition-colors"></i>
                            </div>
                            <input type="month" id="bulan" name="bulan"
                                   class="glass-input w-full rounded-2xl pl-12 py-3 focus:ring-2 focus:ring-rose-500 transition-all cursor-pointer"
                                   required>
                        </div>
                    </div>

                    {{-- Gaji Pokok --}}
                    <div>
                        <label class="block text-xs font-bold text-rose-400 uppercase tracking-wider mb-2 ml-1">Gaji Pokok (Otomatis)</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-slate-400 font-bold">Rp</span>
                            </div>
                            <input type="text" id="gaji_pokok_display" readonly
                                   class="glass-input w-full rounded-2xl pl-12 py-3 bg-slate-800/50 text-slate-300 cursor-not-allowed border-slate-700 font-mono"
                                   placeholder="0">
                            <input type="hidden" id="gaji_pokok" name="gaji_pokok">
                        </div>
                    </div>

                </div>

                {{-- KOLOM KANAN --}}
                <div class="space-y-6">
                    <div class="p-6 rounded-2xl bg-slate-900/50 border border-rose-500/20 h-full flex flex-col justify-center">
                        
                        {{-- Tunjangan --}}
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-emerald-400 uppercase tracking-wider mb-2">+ Tunjangan / Bonus</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-emerald-500 font-bold">+</span>
                                </div>
                                <input type="text" id="tunjangan_display" 
                                       class="glass-input w-full rounded-xl pl-12 py-3 focus:ring-2 focus:ring-emerald-500 transition-all border-emerald-500/30 font-mono"
                                       placeholder="0">
                                <input type="hidden" id="tunjangan" name="tunjangan" value="0">
                            </div>
                        </div>

                        {{-- Potongan --}}
                        <div class="mb-6">
                            <label class="block text-xs font-bold text-rose-400 uppercase tracking-wider mb-2">- Potongan</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-rose-500 font-bold">-</span>
                                </div>
                                <input type="text" id="potongan_display" 
                                       class="glass-input w-full rounded-xl pl-12 py-3 focus:ring-2 focus:ring-rose-500 transition-all border-rose-500/30 font-mono"
                                       placeholder="0">
                                <input type="hidden" id="potongan" name="potongan" value="0">
                            </div>
                        </div>

                        {{-- Total Gaji --}}
                        <div class="mt-auto pt-4 border-t border-white/10">
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Gaji Diterima</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-0 flex items-center pointer-events-none">
                                    <span class="text-rose-400 font-bold text-lg">Rp</span>
                                </div>
                                <input type="text" id="total_gaji_display" readonly
                                       class="w-full bg-transparent border-none text-3xl font-mono font-bold text-white focus:ring-0 p-0 pl-8"
                                       placeholder="0">
                                <input type="hidden" id="total_gaji" name="total_gaji">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Tombol --}}
            <div class="flex items-center justify-between mt-10 pt-6 border-t border-white/10">
                <a href="{{ route('salaries.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition font-medium">
                    <i class="fas fa-arrow-left"></i> Batal
                </a>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-8 py-3 bg-rose-600 hover:bg-rose-500 text-white font-bold rounded-xl shadow-lg shadow-rose-500/30 transition-all transform hover:scale-105">
                    <i class="fas fa-save"></i> Simpan Gaji
                </button>
            </div>

        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectKaryawan = document.getElementById('karyawan_id');
        
        const gpDisplay = document.getElementById('gaji_pokok_display');
        const gpHidden = document.getElementById('gaji_pokok');
        const tjDisplay = document.getElementById('tunjangan_display');
        const tjHidden = document.getElementById('tunjangan');
        const ptDisplay = document.getElementById('potongan_display');
        const ptHidden = document.getElementById('potongan');
        const totalDisplay = document.getElementById('total_gaji_display');
        const totalHidden = document.getElementById('total_gaji');

        // 1. Fungsi Format Ribuan
        function formatRupiah(angka) {
            let number_string = angka.toString().replace(/[^,\d]/g, '');
            return number_string.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // 2. Fungsi Bersihkan Format
        function cleanNumber(value) {
            return parseInt(value.toString().replace(/\./g, '')) || 0;
        }

        // 3. Hitung Total
        function hitungTotal() {
            const gp = cleanNumber(gpHidden.value);
            const tj = cleanNumber(tjHidden.value);
            const pt = cleanNumber(ptHidden.value);
            
            const total = gp + tj - pt;
            
            totalHidden.value = total;
            totalDisplay.value = formatRupiah(total);
        }

        // 4. Bind Event Input
        function bindInput(displayElem, hiddenElem) {
            displayElem.addEventListener('keyup', function() {
                let rawValue = this.value.replace(/\./g, '');
                hiddenElem.value = rawValue;
                this.value = formatRupiah(rawValue);
                hitungTotal();
            });
        }

        bindInput(tjDisplay, tjHidden);
        bindInput(ptDisplay, ptHidden);

        // 5. Event Pilih Karyawan
        selectKaryawan.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const gaji = selectedOption.getAttribute('data-gaji');
            
            // gaji disini sudah integer bersih dari PHP
            gpHidden.value = gaji || 0;
            gpDisplay.value = formatRupiah(gaji || 0);
            
            hitungTotal();
        });
    });
</script>
@endpush
@endsection
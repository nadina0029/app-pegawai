@extends('master')

@section('title', 'Form Jabatan')
@section('page-title', 'Tambah Jabatan Baru')

@section('content')
<div class="max-w-2xl mx-auto mt-6">
    {{-- Tambahkan ID pada form agar mudah di-handle JS --}}
    <form action="{{ route('positions.store') }}" method="POST" id="positionForm">
        @csrf

        <div class="glass-panel rounded-3xl p-10 border border-white/10 relative overflow-hidden">
            
            {{-- Dekorasi Cahaya Latar (Emerald & Teal) --}}
            <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-500/20 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-teal-500/20 rounded-full blur-3xl -z-10"></div>

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
                               class="glass-input w-full rounded-2xl pl-12 py-4 text-lg focus:ring-2 focus:ring-emerald-500 transition-all placeholder-slate-600"
                               placeholder="Contoh: Senior Marketing" autofocus required>
                    </div>
                </div>

                {{-- Gaji Pokok (DIPERBARUI) --}}
                <div>
                    <label for="gaji_pokok_display" class="block text-xs font-bold text-emerald-400 uppercase tracking-wider mb-2 ml-1">
                        Gaji Pokok
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 font-bold group-focus-within:text-emerald-400 transition-colors">Rp</span>
                        </div>
                        
                        {{-- Input Tampilan (Ada titiknya) --}}
                        <input type="text" id="gaji_pokok_display" 
                               class="glass-input w-full rounded-2xl pl-12 py-4 text-lg font-mono focus:ring-2 focus:ring-emerald-500 transition-all placeholder-slate-600 tracking-wide"
                               placeholder="0" required>
                        
                        {{-- Input Asli (Hidden, untuk dikirim ke database) --}}
                        <input type="hidden" id="gaji_pokok" name="gaji_pokok">

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
                        class="inline-flex items-center gap-2 px-8 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/30 transition-all transform hover:scale-105">
                    <i class="fas fa-check-circle"></i> Simpan Posisi
                </button>
            </div>

        </div>
    </form>
</div>

{{-- SCRIPT FORMATTER RUPIAH --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const displayInput = document.getElementById('gaji_pokok_display');
        const hiddenInput = document.getElementById('gaji_pokok');
        const form = document.getElementById('positionForm');

        // Fungsi format angka ke ribuan (contoh: 1000 -> 1.000)
        function formatRupiah(angka) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        // Event Listener saat mengetik
        displayInput.addEventListener('keyup', function(e) {
            // Format tampilan
            displayInput.value = formatRupiah(this.value);
            
            // Simpan angka murni ke input hidden
            // Hapus titik sebelum disimpan
            hiddenInput.value = displayInput.value.replace(/\./g, ''); 
        });

        // Pastikan saat submit, data hidden sudah terisi benar
        form.addEventListener('submit', function() {
            hiddenInput.value = displayInput.value.replace(/\./g, '');
        });
    });
</script>
@endpush
@endsection
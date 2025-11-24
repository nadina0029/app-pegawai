@extends('master')

@section('title', 'Tambah Event')
@section('page-title', 'Jadwal Baru')

@section('content')
<div class="max-w-2xl mx-auto mt-6">
    <form action="{{ route('company-events.store') }}" method="POST" id="eventCreateForm">
        @csrf

        <div class="glass-panel rounded-3xl p-10 border border-white/10 relative overflow-hidden">
            
            {{-- Dekorasi Latar (Cyan & Sky Blue) --}}
            <div class="absolute top-0 right-0 w-40 h-40 bg-cyan-500/20 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-sky-500/20 rounded-full blur-3xl -z-10"></div>

            <div class="text-center mb-8">
                <p class="text-sm text-slate-400 mt-2">Agenda tanggal: <span class="font-bold text-cyan-300">{{ request('date') }}</span></p>
            </div>

            {{-- HIDDEN INPUT UNTUK BASE DATE --}}
            <input type="hidden" id="base_date" value="{{ request('date') }}">
            {{-- FINAL HIDDEN INPUTS YANG DIKIRIM KE CONTROLLER --}}
            <input type="hidden" name="tanggal_mulai" id="final_tanggal_mulai">
            <input type="hidden" name="tanggal_selesai" id="final_tanggal_selesai">
            
            <div class="space-y-6">
                {{-- Nama Kegiatan --}}
                <div>
                    <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Nama Kegiatan</label>
                    <input type="text" name="judul" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" placeholder="Rapat..." required autofocus>
                </div>

                {{-- Waktu Mulai & Selesai (HANYA JAM) --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Jam Mulai</label>
                        <input type="time" id="jam_mulai_input" value="09:00" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Jam Selesai</label>
                        <input type="time" id="jam_selesai_input" value="10:00" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" required>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Lokasi</label>
                        <input type="text" name="lokasi" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" placeholder="Meeting Room">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Warna</label>
                        <input type="color" name="warna" class="w-full h-[50px] glass-input rounded-xl cursor-pointer p-1" value="#06B6D4">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all resize-none"></textarea>
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t border-white/10">
                <a href="{{ route('company-events.index') }}" class="text-slate-400 hover:text-white transition font-medium text-sm">Batal</a>
                <button type="submit" class="px-8 py-3 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl shadow-lg shadow-cyan-500/30 transition transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('eventCreateForm');
    const baseDate = document.getElementById('base_date').value;
    const jamMulai = document.getElementById('jam_mulai_input');
    const jamSelesai = document.getElementById('jam_selesai_input');
    const finalMulai = document.getElementById('final_tanggal_mulai');
    const finalSelesai = document.getElementById('final_tanggal_selesai');

    form.addEventListener('submit', function(e) {
        
        if (!baseDate) {
            alert('Gagal: Tanggal dasar tidak ditemukan. Harap ulangi dari Kalender.');
            e.preventDefault();
            return;
        }
        finalMulai.value = baseDate + 'T' + jamMulai.value + ':00';
        finalSelesai.value = baseDate + 'T' + jamSelesai.value + ':00';
    });
});
</script>
@endpush
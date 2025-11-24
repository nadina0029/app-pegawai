@extends('master')

@section('title', 'Edit Event')
@section('page-title', 'Ubah Jadwal')

@section('content')
<div class="max-w-2xl mx-auto mt-6">
    <form action="{{ route('company-events.update', $companyEvent->id) }}" method="POST" id="eventEditForm">
        @csrf
        @method('PUT')

        <div class="glass-panel rounded-3xl p-10 border border-white/10 relative overflow-hidden">
            
            {{-- Dekorasi Latar (Cyan & Sky Blue) --}}
            <div class="absolute top-0 right-0 w-40 h-40 bg-cyan-500/20 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-sky-500/20 rounded-full blur-3xl -z-10"></div>

            {{-- PHP PARSING UNTUK NILAI AWAL --}}
            @php
                // Carbon parse() diperlukan untuk memisahkan tanggal (YYYY-MM-DD) dan waktu (HH:mm)
                $baseDate = \Carbon\Carbon::parse($companyEvent->tanggal_mulai)->toDateString(); 
                $startTime = \Carbon\Carbon::parse($companyEvent->tanggal_mulai)->format('H:i'); 
                $endTime = \Carbon\Carbon::parse($companyEvent->tanggal_selesai)->format('H:i'); 
            @endphp
            
            {{-- FINAL HIDDEN INPUTS YANG DIKIRIM KE CONTROLLER --}}
            <input type="hidden" name="tanggal_mulai" id="final_tanggal_mulai">
            <input type="hidden" name="tanggal_selesai" id="final_tanggal_selesai">


            <div class="space-y-6">
                
                {{-- Nama Kegiatan --}}
                <div>
                    <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Nama Kegiatan</label>
                    <input type="text" name="judul" value="{{ $companyEvent->judul }}" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" required>
                </div>

                {{-- Tanggal Kegiatan --}}
                <div>
                    <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_edit" id="tanggal_edit" value="{{ $baseDate }}" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" required>
                </div>

                {{-- Jam Mulai & Selesai (HANYA JAM) --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Jam Mulai</label>
                        <input type="time" id="jam_mulai_input" value="{{ $startTime }}" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Jam Selesai</label>
                        <input type="time" id="jam_selesai_input" value="{{ $endTime }}" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all" required>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Lokasi</label>
                        <input type="text" name="lokasi" value="{{ $companyEvent->lokasi }}" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Warna</label>
                        <input type="color" name="warna" value="{{ $companyEvent->warna }}" class="w-full h-[50px] glass-input rounded-xl cursor-pointer p-1">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-cyan-400 uppercase tracking-wider mb-2 ml-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="glass-input w-full rounded-xl pl-4 py-3 focus:ring-2 focus:ring-cyan-500 transition-all resize-none">{{ $companyEvent->deskripsi }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t border-white/10">
                <a href="{{ route('company-events.index') }}" class="text-slate-400 hover:text-white transition font-medium text-sm">Batal</a>
                <button type="submit" class="px-8 py-3 bg-cyan-500 hover:bg-cyan-600 text-white font-bold rounded-xl shadow-lg shadow-cyan-500/30 transition transform hover:scale-105">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('eventEditForm');
    const tanggalEdit = document.getElementById('tanggal_edit');
    const jamMulai = document.getElementById('jam_mulai_input');
    const jamSelesai = document.getElementById('jam_selesai_input');
    const finalMulai = document.getElementById('final_tanggal_mulai');
    const finalSelesai = document.getElementById('final_tanggal_selesai');
    
    // 1. Fungsi untuk mengisi hidden input sebelum submit
    form.addEventListener('submit', function(e) {
        
        const dateValue = tanggalEdit.value;
        
        if (!dateValue) {
            alert('Gagal: Tanggal kegiatan tidak boleh kosong.');
            e.preventDefault();
            return;
        }

        // 2. Gabungkan Tanggal (Visible Date Input) + Jam (Visible Time Input)
        // Format yang dihasilkan: YYYY-MM-DDT08:00:00 (sesuai kebutuhan DB/Controller)
        finalMulai.value = dateValue + 'T' + jamMulai.value + ':00';
        finalSelesai.value = dateValue + 'T' + jamSelesai.value + ':00';
    });
});
</script>
@endpush
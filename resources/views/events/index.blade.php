@extends('master')

@section('title', 'Kalender Kegiatan')
@section('page-title', 'Agenda Perusahaan')

@section('content')
<style>
    /* Override FullCalendar untuk Dark Mode */
    :root {
        --fc-border-color: rgba(255, 255, 255, 0.1);
        --fc-page-bg-color: transparent;
        --fc-neutral-bg-color: rgba(255, 255, 255, 0.05);
        --fc-list-event-hover-bg-color: rgba(255, 255, 255, 0.1);
        --fc-today-bg-color: rgba(99, 102, 241, 0.15);
    }
    .fc { color: #cbd5e1; }
    .fc-theme-standard td, .fc-theme-standard th { border-color: var(--fc-border-color); }
    .fc-col-header-cell-cushion { color: #f8fafc; padding: 8px !important; }
    .fc-daygrid-day-number { color: #94a3b8; }
    .fc-button-primary { 
        background-color: #4f46e5 !important; 
        border: none !important; 
        border-radius: 0.5rem !important;
    }
    .fc-button-active { background-color: #4338ca !important; }
    .fc-event { border: none; border-radius: 4px; }
    
    /* Custom Scrollbar untuk list */
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 10px; }
</style>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Kalender Utama --}}
    <div class="lg:col-span-2">
        <div class="glass-panel p-6 rounded-2xl h-[600px]">
            <div id="calendar" class="h-full"></div>
        </div>
    </div>

    {{-- List Agenda --}}
    <div class="lg:col-span-1">
        <div class="glass-panel p-6 rounded-2xl h-[600px] overflow-hidden flex flex-col">
            <h3 class="text-lg font-semibold text-white mb-4 border-b border-white/10 pb-2">Agenda Bulan Ini</h3>
            <div id="calendarList" class="flex-grow overflow-y-auto custom-scrollbar"></div>
        </div>
    </div>
</div>

<div id="eventModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-[60] hidden transition-opacity">
    <div class="glass-panel p-8 rounded-2xl w-full max-w-lg border border-white/10 shadow-2xl transform scale-100 transition-transform">
        <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400">
                <i class="fas fa-calendar-plus"></i>
            </div>
            Tambah Kegiatan
        </h2>
        
        <form id="eventForm" class="space-y-4">
            <input type="hidden" name="tanggal_dipilih">

            <div>
                <label class="block text-xs font-medium text-slate-400 uppercase mb-1">Nama Kegiatan</label>
                <input type="text" name="judul" class="glass-input w-full rounded-lg px-4 py-2" required placeholder="Rapat Bulanan...">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-400 uppercase mb-1">Mulai</label>
                    <input type="time" name="jam_mulai" class="glass-input w-full rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 uppercase mb-1">Selesai</label>
                    <input type="time" name="jam_selesai" class="glass-input w-full rounded-lg px-4 py-2" required>
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 uppercase mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="2" class="glass-input w-full rounded-lg px-4 py-2 resize-none"></textarea>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 uppercase mb-1">Lokasi</label>
                <input type="text" name="lokasi" class="glass-input w-full rounded-lg px-4 py-2">
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 uppercase mb-1">Warna Label</label>
                <input type="color" name="warna" class="w-full h-10 glass-input rounded-lg cursor-pointer" value="#4f46e5">
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-white/10 mt-2">
                <button type="button" id="cancelBtn" class="px-4 py-2 rounded-lg text-slate-300 hover:bg-white/5 transition">Tutup</button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white shadow-lg shadow-indigo-500/25">Simpan Event</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const calendarListEl = document.getElementById('calendarList');
    const modal = document.getElementById('eventModal');
    const form = document.getElementById('eventForm');
    const cancelBtn = document.getElementById('cancelBtn');

    // Calendar Utama (Grid)
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        events: '/api/events',
        dateClick: function(info) {
            form.tanggal_dipilih.value = info.dateStr;
            modal.classList.remove('hidden');
        }
    });

    // Calendar List (Side)
    const calendarList = new FullCalendar.Calendar(calendarListEl, {
        initialView: 'listMonth',
        locale: 'id',
        headerToolbar: {
            left: '',
            center: 'title',
            right: ''
        },
        events: '/api/events'
    });

    calendar.render();
    calendarList.render();

    // Close Modal
    cancelBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        form.reset();
    });

    // Klik di luar modal untuk menutup
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            form.reset();
        }
    });

    // Submit Form
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        const tanggal = form.tanggal_dipilih.value;
        const jamMulai = form.jam_mulai.value;
        const jamSelesai = form.jam_selesai.value;

        // Gabungkan tanggal dan jam
        data.tanggal_mulai = `${tanggal}T${jamMulai}:00`;
        data.tanggal_selesai = `${tanggal}T${jamSelesai}:00`;

        fetch('/kalender/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(() => {
            calendar.refetchEvents();
            calendarList.refetchEvents();
            form.reset();
            modal.classList.add('hidden');
            alert('Event berhasil ditambahkan!');
        })
        .catch(err => {
            console.error(err);
            alert('Terjadi kesalahan saat menyimpan.');
        });
    });
});
</script>
@endpush
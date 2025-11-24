@extends('master')

@section('title', 'Kalender Kegiatan')
@section('page-title', 'Agenda Perusahaan')

@section('content')
<style>
    /* --- 1. CUSTOM FULLCALENDAR STYLING (CYAN THEME) --- */
    :root {
        --fc-border-color: rgba(255, 255, 255, 0.05);
        --fc-page-bg-color: transparent;
        --fc-neutral-bg-color: rgba(255, 255, 255, 0.05);
        /* Warna Hover List Events diubah menjadi Cyan */
        --fc-list-event-hover-bg-color: rgba(6, 182, 212, 0.1); 
        /* Warna Hari Ini diubah menjadi Cyan */
        --fc-today-bg-color: rgba(6, 182, 212, 0.15); 
    }

    .fc { color: #e2e8f0; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.8rem; }
    .fc-toolbar-title { font-size: 1.1rem !important; font-weight: 700; }
    .fc-header-toolbar { margin-bottom: 0.75rem !important; }
    .fc-theme-standard td, .fc-theme-standard th { border-color: var(--fc-border-color); }
    .fc-col-header-cell-cushion { padding: 4px 0 !important; color: #94a3b8; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 0.05em; }
    .fc-daygrid-day-number { color: #cbd5e1; padding: 4px 8px !important; font-weight: 500; font-size: 0.75rem; }
    
    /* Buttons Cyan Focus */
    .fc-button {
        background-color: rgba(255, 255, 255, 0.05) !important; border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: #e2e8f0 !important; padding: 0.25rem 0.6rem !important; font-size: 0.7rem !important; border-radius: 0.4rem !important;
        box-shadow: none !important;
    }
    .fc-button:hover { background-color: rgba(255, 255, 255, 0.1) !important; }
    /* Warna Aktif/Today Button diubah menjadi Cyan */
    .fc-button-active { background-color: #06B6D4 !important; border-color: #06B6D4 !important; color: white !important; } 

    /* List View Fix for dark mode text */
    .fc-list { border: none !important; font-size: 0.8rem; }
    .fc-list-day-cushion { background-color: rgba(255, 255, 255, 0.05) !important; }
    .fc-list-day-text, .fc-list-day-side-text { color: #e2e8f0 !important; font-weight: bold; text-decoration: none !important; }
    .fc-list-event td { border-color: rgba(255, 255, 255, 0.05) !important; }
    .fc-list-event-title { color: #cbd5e1 !important; } 
    .fc-list-event-time { color: #94a3b8 !important; }
    .fc-list-event:hover td { background-color: rgba(255, 255, 255, 0.05) !important; cursor: pointer; }
    .fc-list-empty-cushion { background-color: transparent !important; color: #64748b; }
</style>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-10 h-[calc(100vh-220px)] min-h-[400px]">
    
    {{-- KOLOM KIRI: List Agenda (5/12) --}}
    <div class="lg:col-span-5 flex flex-col gap-4 h-full">
        
        {{-- Card Info (Header Kecil) --}}
        <div class="glass-panel p-3 rounded-2xl border border-white/10 bg-gradient-to-b from-cyan-500/10 to-transparent flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-cyan-500 flex items-center justify-center text-white shadow-lg shadow-cyan-500/30">
                    <i class="fas fa-calendar-day text-xs"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-white">Agenda</h3>
                    <p class="text-[10px] text-slate-400">Tekan tanggal untuk menambahkan agenda</p>
                </div>
            </div>
        </div>

        {{-- List Agenda (Isi Full Height) --}}
        <div class="glass-panel p-0 rounded-2xl border border-white/10 flex-grow overflow-hidden flex flex-col relative">
            <div class="p-3 border-b border-white/5 bg-white/5">
                <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Daftar Kegiatan</h4>
            </div>
            {{-- Container List FullCalendar --}}
            <div id="calendarList" class="flex-grow overflow-y-auto custom-scrollbar"></div>
        </div>
    </div>

    {{-- KOLOM KANAN: Kalender Utama (7/12) --}}
    <div class="lg:col-span-7 h-full">
        <div class="glass-panel p-4 rounded-2xl border border-white/10 relative overflow-hidden shadow-xl h-full flex flex-col">
            {{-- Dekorasi Latar (Cyan) --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl -z-10"></div>
            
            {{-- Calendar Container (Full Height) --}}
            <div id="calendar" class="flex-grow"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/id.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const calendarListEl = document.getElementById('calendarList');
    
    // URL API yang sudah terpisah
    const eventsApiUrl = "{{ route('company-events.api') }}"; 

    // 1. Config Calendar Utama
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id',
        height: '100%',
        headerToolbar: { left: 'prev,next', center: 'title', right: 'today' },
        buttonText: { today: 'Hari Ini' },
        
        events: {
            url: eventsApiUrl,
            method: 'GET',
            failure: function() {
                alert('Gagal memuat data agenda. Periksa koneksi atau Controller.'); 
            },
        },
        
        dayMaxEvents: true,
        eventColor: '#06B6D4', // Cyan
        displayEventTime: false, 

        dateClick: function(info) {
            window.location.href = "{{ route('company-events.create') }}?date=" + info.dateStr;
        },

        eventClick: function(info) {
            info.jsEvent.preventDefault(); 
            window.location.href = "{{ url('/company-events') }}/" + info.event.id;
        }
    });

    // 2. Config Calendar List
    const calendarList = new FullCalendar.Calendar(calendarListEl, {
        initialView: 'listMonth',
        locale: 'id',
        headerToolbar: false,
        events: {
            url: eventsApiUrl,
            method: 'GET',
        },
        height: '100%',
        eventClick: function(info) {
            info.jsEvent.preventDefault(); 
            window.location.href = "{{ url('/company-events') }}/" + info.event.id;
        }
    });

    calendar.render();
    calendarList.render();
});
</script>
@endpush
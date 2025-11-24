@extends('master')

@section('title', 'Dashboard')
@section('page-title', 'Selamat Datang di App-Pegawai')

@section('content')
{{-- Hero Section --}}
<div class="glass-panel rounded-3xl p-8 mb-10 flex flex-col lg:flex-row items-center gap-12 relative overflow-hidden group">
    {{-- Background accent --}}
    <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl transition-all duration-700 group-hover:bg-indigo-500/20"></div>

    {{-- Kiri: Teks dan Tombol --}}
    <div class="flex-1 z-10 text-center lg:text-left order-2 lg:order-1">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4 leading-tight">
            Sistem Manajemen Pegawai <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Modern & Terintegrasi</span>
        </h2>
        <p class="text-slate-400 mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed text-lg">
            Pantau kinerja tim, kelola administrasi, dan akses data real-time dalam satu platform yang dirancang untuk efisiensi.
        </p>

        {{-- Tombol Scroll ke Bawah --}}
        <a href="#features-grid" class="inline-flex items-center gap-2 px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/30 transition-all hover:-translate-y-1">
            Mulai Eksplorasi <i class="fas fa-arrow-down animate-bounce ml-2"></i>
        </a>
    </div>

    {{-- Kanan: Gambar Lokal --}}
    <div class="flex-1 flex justify-center z-10 order-1 lg:order-2">
        {{-- UBAH DISINI: Saya ganti 'max-w-lg' jadi 'max-w-sm' agar gambar lebih kecil & proporsional --}}
        <div class="relative w-full max-w-sm p-4">
            
            {{-- Gambar dengan efek Blending --}}
            <img src="{{ asset('img/gambar1.png') }}"
                 alt="Ilustrasi Dashboard"
                 class="w-full h-auto object-contain animate-float hover:scale-105 transition-transform duration-500 mix-blend-screen"
                 style="mask-image: linear-gradient(to bottom, black 85%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent 100%);">
            
            {{-- Dekorasi efek cahaya --}}
            <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-indigo-600/30 rounded-full blur-2xl -z-10"></div>
            <div class="absolute -top-10 -left-10 w-32 h-32 bg-cyan-600/30 rounded-full blur-2xl -z-10"></div>
        </div>
    </div>
</div>

{{-- Features Grid (TIDAK BERUBAH) --}}
<div id="features-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 scroll-mt-32">
    @php
    $features = [
    ['title' => 'Manajemen Pegawai', 'desc' => 'Database lengkap pegawai aktif.', 'icon' => 'fas fa-users', 'url' => '/employees', 'color' => 'text-cyan-400', 'bg' => 'bg-cyan-500/10', 'border' => 'border-cyan-500/20'],
    ['title' => 'Departemen', 'desc' => 'Struktur divisi perusahaan.', 'icon' => 'fas fa-building', 'url' => '/departments', 'color' => 'text-purple-400', 'bg' => 'bg-purple-500/10', 'border' => 'border-purple-500/20'],
    ['title' => 'Jabatan', 'desc' => 'Posisi dan jenjang karir.', 'icon' => 'fas fa-briefcase', 'url' => '/positions', 'color' => 'text-emerald-400', 'bg' => 'bg-emerald-500/10', 'border' => 'border-emerald-500/20'],
    ['title' => 'Absensi', 'desc' => 'Monitor kehadiran realtime.', 'icon' => 'fas fa-clock', 'url' => '/attendances', 'color' => 'text-amber-400', 'bg' => 'bg-amber-500/10', 'border' => 'border-amber-500/20'],
    ['title' => 'Gaji & Tunjangan', 'desc' => 'Laporan payroll otomatis.', 'icon' => 'fas fa-wallet', 'url' => '/salaries', 'color' => 'text-rose-400', 'bg' => 'bg-rose-500/10', 'border' => 'border-rose-500/20'],
    ['title' => 'Kalender Event', 'desc' => 'Jadwal kegiatan kantor.', 'icon' => 'fas fa-calendar-day', 'url' => route('events.index'), 'color' => 'text-blue-400', 'bg' => 'bg-blue-500/10', 'border' => 'border-blue-500/20'],
    ];
    @endphp

    @foreach ($features as $feature)
    <a href="{{ url($feature['url']) }}"
        class="group relative glass-panel p-6 rounded-2xl transition-all duration-300 hover:-translate-y-2 hover:bg-slate-800/80">

        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
            <i class="fas fa-arrow-right text-slate-400"></i>
        </div>

        <div class="w-14 h-14 rounded-xl {{ $feature['bg'] }} {{ $feature['border'] }} border flex items-center justify-center mb-4 transition-transform group-hover:scale-110 group-hover:rotate-3">
            <i class="{{ $feature['icon'] }} text-2xl {{ $feature['color'] }}"></i>
        </div>

        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-indigo-300 transition-colors">{{ $feature['title'] }}</h3>
        <p class="text-sm text-slate-400 leading-relaxed">{{ $feature['desc'] }}</p>
    </a>
    @endforeach
</div>
@endsection
@extends('master')

@section('title', 'Detail Absensi')
@section('page-title', 'Informasi Absensi')

@section('content')
<div class="max-w-3xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md transition hover:shadow-lg">
    <div class="flex items-center gap-3 mb-4">
        <i class="fas fa-calendar-check text-indigo-600 text-2xl"></i>
        <h2 class="text-xl font-bold">Detail Absensi</h2>
    </div>

    <div class="space-y-4 text-sm">
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Nama Karyawan</span>
            <span class="text-gray-900">{{ $attendance->employee->nama_lengkap ?? 'ID: '.$attendance->karyawan_id }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Tanggal</span>
            <span class="text-gray-900">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Waktu Masuk</span>
            <span class="text-gray-900">{{ $attendance->waktu_masuk ?? '-' }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Waktu Keluar</span>
            <span class="text-gray-900">{{ $attendance->waktu_keluar ?? '-' }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Status Absensi</span>
            @php
                $status = strtolower($attendance->status_absensi);
                $badge = [
                    'hadir' => 'bg-green-100 text-green-700',
                    'izin' => 'bg-yellow-100 text-yellow-700',
                    'sakit' => 'bg-blue-100 text-blue-700',
                    'alpha' => 'bg-red-100 text-red-700',
                ][$status] ?? 'bg-gray-100 text-gray-700';
            @endphp
            <span class="px-2 py-1 text-xs rounded-full {{ $badge }}">
                {{ ucfirst($attendance->status_absensi) }}
            </span>
        </div>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('attendances.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Kembali ke Daftar Absensi
        </a>
    </div>
</div>
@endsection
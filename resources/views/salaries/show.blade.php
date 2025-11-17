@extends('master')

@section('title', 'Detail Gaji')
@section('page-title', 'Informasi Gaji Karyawan')

@section('content')
<div class="max-w-3xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md transition hover:shadow-lg">
    <div class="flex items-center gap-3 mb-4">
        <i class="fas fa-money-check-alt text-indigo-600 text-2xl"></i>
        <h2 class="text-xl font-bold">Detail Gaji Karyawan</h2>
    </div>

    <div class="space-y-4 text-sm">
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Nama Karyawan</span>
            <span class="text-gray-900">{{ $salaries->employee->nama_lengkap ?? 'ID: '.$salaries->karyawan_id }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Bulan</span>
            <span class="text-gray-900">{{ $salaries->bulan }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Gaji Pokok</span>
            <span class="text-gray-900">Rp {{ number_format($salaries->gaji_pokok, 2, ',', '.') }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Tunjangan</span>
            <span class="text-gray-900">Rp {{ number_format($salaries->tunjangan, 2, ',', '.') }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Potongan</span>
            <span class="text-gray-900">Rp {{ number_format($salaries->potongan, 2, ',', '.') }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Total Gaji</span>
            <span class="text-green-700 font-semibold">Rp {{ number_format($salaries->total_gaji, 2, ',', '.') }}</span>
        </div>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('salaries.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Kembali ke Daftar Gaji
        </a>
    </div>
</div>
@endsection
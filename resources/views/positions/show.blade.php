@extends('master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Informasi Jabatan')

@section('content')
<div class="max-w-xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md transition hover:shadow-lg">
    <div class="space-y-4 text-sm">
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Nama Jabatan</span>
            <span class="text-gray-900">{{ $position->nama_departemen }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Gaji Pokok</span>
            <span class="text-gray-900">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('positions.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Kembali ke Daftar Jabatan
        </a>
    </div>
</div>
@endsection
@extends('master')

@section('title', 'Detail Pegawai')
@section('page-title', 'Informasi Pegawai')

@section('content')
<div class="max-w-3xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md transition hover:shadow-lg">
    <div class="space-y-4 text-sm">
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Nama Lengkap</span>
            <span class="text-gray-900">{{ $employee->nama_lengkap }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Departemen</span>
            <span class="text-gray-900">{{ $employee->departemen->nama_departemen ?? '-' }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Jabatan</span>
            <span class="text-gray-900">{{ $employee->jabatan->nama_departemen ?? '-' }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Email</span>
            <span class="text-gray-900">{{ $employee->email }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Nomor Telepon</span>
            <span class="text-gray-900">{{ $employee->nomor_telepon }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Tanggal Lahir</span>
            <span class="text-gray-900">{{ $employee->tanggal_lahir }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Alamat</span>
            <span class="text-gray-900">{{ $employee->alamat }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Tanggal Masuk</span>
            <span class="text-gray-900">{{ $employee->tanggal_masuk }}</span>
        </div>
        <div class="flex justify-between items-center border-b pb-2">
            <span class="font-medium text-gray-600">Status</span>
            <span class="text-gray-900">
                @if($employee->status === 'aktif')
                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Aktif</span>
                @else
                    <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">Nonaktif</span>
                @endif
            </span>
        </div>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('employees.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Kembali ke Daftar Pegawai
        </a>
    </div>
</div>
@endsection
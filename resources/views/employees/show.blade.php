@extends('master')

@section('title', 'Detail Pegawai')
@section('page-title', 'Informasi Pegawai')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-700">
            <tbody class="divide-y divide-gray-700 text-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-1/3">Nama Lengkap</th>
                    <td class="px-4 py-3">{{ $employee->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Departemen</th>
                    <td class="px-4 py-3">{{ $employee->departemen->nama_departemen ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Jabatan</th>
                    <td class="px-4 py-3">{{ $employee->jabatan->nama_departemen ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Email</th>
                    <td class="px-4 py-3">{{ $employee->email }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Nomor Telepon</th>
                    <td class="px-4 py-3">{{ $employee->nomor_telepon }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Tanggal Lahir</th>
                    <td class="px-4 py-3">{{ $employee->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Alamat</th>
                    <td class="px-4 py-3">{{ $employee->alamat }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Tanggal Masuk</th>
                    <td class="px-4 py-3">{{ $employee->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Status</th>
                    <td class="px-4 py-3">{{ $employee->status }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 text-right">
            <a href="{{ route('employees.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Kembali ke Daftar Pegawai
            </a>
        </div>
    </div>
@endsection
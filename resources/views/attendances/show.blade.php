@extends('master')

@section('title', 'Detail Absensi')
@section('page-title', 'Informasi Absensi')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-700">
            <tbody class="divide-y divide-gray-700 text-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-1/3">ID Karyawan</th>
                    <td class="px-4 py-3">{{ $attendance->karyawan_id }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Tanggal</th>
                    <td class="px-4 py-3">{{ $attendance->tanggal }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Waktu Masuk</th>
                    <td class="px-4 py-3">{{ $attendance->waktu_masuk ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Waktu Keluar</th>
                    <td class="px-4 py-3">{{ $attendance->waktu_keluar ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Status Absensi</th>
                    <td class="px-4 py-3">{{ ucfirst($attendance->status_absensi) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 text-right">
            <a href="{{ route('attendances.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Kembali ke Daftar Absensi
            </a>
        </div>
    </div>
@endsection
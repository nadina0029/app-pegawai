@extends('master')

@section('title', 'Detail Gaji')
@section('page-title', 'Informasi Gaji Karyawan')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-700">
            <tbody class="divide-y divide-gray-700 text-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-1/3">ID Karyawan</th>
                    <td class="px-4 py-3">{{ $salaries->karyawan_id }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Bulan</th>
                    <td class="px-4 py-3">{{ $salaries->bulan }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Gaji Pokok</th>
                    <td class="px-4 py-3">Rp {{ number_format($salaries->gaji_pokok, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Tunjangan</th>
                    <td class="px-4 py-3">Rp {{ number_format($salaries->tunjangan, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Potongan</th>
                    <td class="px-4 py-3">Rp {{ number_format($salaries->potongan, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Total Gaji</th>
                    <td class="px-4 py-3">Rp {{ number_format($salaries->total_gaji, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 text-right">
            <a href="{{ route('salaries.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Kembali ke Daftar Gaji
            </a>
        </div>
    </div>
@endsection
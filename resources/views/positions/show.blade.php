@extends('master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Informasi Jabatan')

@section('content')
    <div class="max-w-xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
        <table class="min-w-full divide-y divide-gray-700">
            <tbody class="divide-y divide-gray-700 text-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300 w-1/3">Nama Jabatan</th>
                    <td class="px-4 py-3">{{ $position->nama_departemen }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-300">Gaji Pokok</th>
                    <td class="px-4 py-3">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-6 text-right">
            <a href="{{ route('positions.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Kembali ke Daftar Jabatan
            </a>
        </div>
    </div>
@endsection
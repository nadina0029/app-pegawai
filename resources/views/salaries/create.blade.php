@extends('master')

@section('title', 'Form Gaji')
@section('page-title', 'Input Data Gaji')

@section('content')
    <form action="{{ route('salaries.store') }}" method="POST" class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
        @csrf

        <div>
            <label for="karyawan_id" class="block text-sm font-medium text-gray-300">Nama Karyawan</label>
            <select id="karyawan_id" name="karyawan_id" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="bulan" class="block text-sm font-medium text-gray-300">Bulan</label>
            <input type="text" id="bulan" name="bulan" placeholder="Misal: 10-2025" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="gaji_pokok" class="block text-sm font-medium text-gray-300">Gaji Pokok</label>
            <input type="number" step="0.01" id="gaji_pokok" name="gaji_pokok" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="tunjangan" class="block text-sm font-medium text-gray-300">Tunjangan</label>
            <input type="number" step="0.01" id="tunjangan" name="tunjangan" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="potongan" class="block text-sm font-medium text-gray-300">Potongan</label>
            <input type="number" step="0.01" id="potongan" name="potongan" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="total_gaji" class="block text-sm font-medium text-gray-300">Total Gaji</label>
            <input type="number" step="0.01" id="total_gaji" name="total_gaji" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Simpan
            </button>
        </div>
    </form>
@endsection
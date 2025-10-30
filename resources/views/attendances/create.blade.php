@extends('master')

@section('title', 'Form Absensi')
@section('page-title', 'Input Data Absensi')

@section('content')
    <form action="{{ route('attendances.store') }}" method="POST" class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
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
            <label for="tanggal" class="block text-sm font-medium text-gray-300">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="waktu_masuk" class="block text-sm font-medium text-gray-300">Waktu Masuk</label>
            <input type="time" id="waktu_masuk" name="waktu_masuk" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="waktu_keluar" class="block text-sm font-medium text-gray-300">Waktu Keluar</label>
            <input type="time" id="waktu_keluar" name="waktu_keluar" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="status_absensi" class="block text-sm font-medium text-gray-300">Status Absensi</label>
            <select id="status_absensi" name="status_absensi" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
                <option value="alpha">Alpha</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Simpan
            </button>
        </div>
    </form>
@endsection
@extends('master')

@section('title', 'Edit Absensi')
@section('page-title', 'Ubah Data Absensi')

@section('content')
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="karyawan_id" class="block text-sm font-medium text-gray-300">Nama Karyawan</label>
            <select name="karyawan_id" id="karyawan_id" required class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}"
                        {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-300">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="waktu_masuk" class="block text-sm font-medium text-gray-300">Waktu Masuk</label>
            <input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="waktu_keluar" class="block text-sm font-medium text-gray-300">Waktu Keluar</label>
            <input type="time" name="waktu_keluar" id="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="status_absensi" class="block text-sm font-medium text-gray-300">Status Absensi</label>
            <select name="status_absensi" id="status_absensi" required class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Update
            </button>
        </div>
    </form>
@endsection
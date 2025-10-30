@extends('master')

@section('title', 'Edit Gaji')
@section('page-title', 'Ubah Data Gaji Karyawan')

@section('content')
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="karyawan_id" class="block text-sm font-medium text-gray-300">Nama Karyawan</label>
            <select name="karyawan_id" id="karyawan_id" required class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}"
                        {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="gaji_pokok" class="block text-sm font-medium text-gray-300">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="tunjangan" class="block text-sm font-medium text-gray-300">Tunjangan</label>
            <input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="potongan" class="block text-sm font-medium text-gray-300">Potongan</label>
            <input type="number" name="potongan" id="potongan" value="{{ old('potongan', $salary->potongan) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="total_gaji" class="block text-sm font-medium text-gray-300">Total Gaji</label>
            <input type="number" name="total_gaji" id="total_gaji" value="{{ old('total_gaji', $salary->total_gaji) }}" required class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Update
            </button>
        </div>
    </form>
@endsection
@extends('master')

@section('title', 'Edit Data Pegawai')
@section('page-title', 'Ubah Data Pegawai')

@section('content')
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-300">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $employee->email) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="nomor_telepon" class="block text-sm font-medium text-gray-300">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-300">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-300">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $employee->alamat) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="tanggal_masuk" class="block text-sm font-medium text-gray-300">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="departemen_id" class="block text-sm font-medium text-gray-300">Departemen</label>
            <select name="departemen_id" id="departemen_id" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($departements as $departemen)
                    <option value="{{ $departemen->id }}" {{ old('departemen_id', $employee->departemen_id) == $departemen->id ? 'selected' : '' }}>
                        {{ $departemen->nama_departemen }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jabatan_id" class="block text-sm font-medium text-gray-300">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                        {{ $jabatan->nama_departemen }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-300">Status</label>
            <select name="status" id="status" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
                <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak aktif" {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Update
            </button>
        </div>
    </form>
@endsection
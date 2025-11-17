@extends('master')

@section('title', 'Edit Data Pegawai')
@section('page-title', 'Ubah Data Pegawai')

@section('content')
<form action="{{ route('employees.update', $employee->id) }}" method="POST"
      class="max-w-3xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md space-y-6 transition hover:shadow-lg">
    @csrf
    @method('PUT')

    <div>
        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-user mr-1 text-indigo-600"></i> Nama Lengkap
        </label>
        <input type="text" name="nama_lengkap" id="nama_lengkap"
               value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-envelope mr-1 text-indigo-600"></i> Email
        </label>
        <input type="email" name="email" id="email"
               value="{{ old('email', $employee->email) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-phone mr-1 text-indigo-600"></i> Nomor Telepon
        </label>
        <input type="text" name="nomor_telepon" id="nomor_telepon"
               value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-calendar-day mr-1 text-indigo-600"></i> Tanggal Lahir
        </label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
               value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-map-marker-alt mr-1 text-indigo-600"></i> Alamat
        </label>
        <input type="text" name="alamat" id="alamat"
               value="{{ old('alamat', $employee->alamat) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-calendar-check mr-1 text-indigo-600"></i> Tanggal Masuk
        </label>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk"
               value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="departemen_id" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-building mr-1 text-indigo-600"></i> Departemen
        </label>
        <select name="departemen_id" id="departemen_id"
                class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            @foreach($departements as $departemen)
                <option value="{{ $departemen->id }}"
                    {{ old('departemen_id', $employee->departemen_id) == $departemen->id ? 'selected' : '' }}>
                    {{ $departemen->nama_departemen }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="jabatan_id" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-user-tie mr-1 text-indigo-600"></i> Jabatan
        </label>
        <select name="jabatan_id" id="jabatan_id"
                class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            @foreach($jabatans as $jabatan)
                <option value="{{ $jabatan->id }}"
                    {{ old('jabatan_id', $employee->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                    {{ $jabatan->nama_departemen }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-toggle-on mr-1 text-indigo-600"></i> Status
        </label>
        <select name="status" id="status"
                class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="tidak aktif" {{ old('status', $employee->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
    </div>

    <div class="flex justify-between items-center pt-4">
        <a href="{{ route('employees.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Batal
        </a>
        <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-save text-sm"></i> Update
        </button>
    </div>
</form>
@endsection
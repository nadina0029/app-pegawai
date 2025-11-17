@extends('master')

@section('title', 'Form Input Pegawai')
@section('page-title', 'Tambah Pegawai')

@section('content')
<form action="{{ route('employees.store') }}" method="POST"
      class="max-w-3xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md space-y-6 transition hover:shadow-lg">
    @csrf

    <div>
        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-user mr-1 text-indigo-600"></i> Nama Lengkap
        </label>
        <input type="text" id="nama_lengkap" name="nama_lengkap"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Contoh: Kim Taehyung">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-envelope mr-1 text-indigo-600"></i> Email
        </label>
        <input type="email" id="email" name="email"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Contoh: taehyung@email.com">
    </div>

    <div>
        <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-phone mr-1 text-indigo-600"></i> Nomor Telepon
        </label>
        <input type="text" id="nomor_telepon" name="nomor_telepon"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Contoh: 081234567890">
    </div>

    <div>
        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-calendar-day mr-1 text-indigo-600"></i> Tanggal Lahir
        </label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-map-marker-alt mr-1 text-indigo-600"></i> Alamat
        </label>
        <textarea id="alamat" name="alamat" rows="3"
                  class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Contoh: Jl. Kenjeran No. 123, Surabaya"></textarea>
    </div>

    <div>
        <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-calendar-check mr-1 text-indigo-600"></i> Tanggal Masuk
        </label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="departemen_id" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-building mr-1 text-indigo-600"></i> Departemen
        </label>
        <select name="departemen_id" id="departemen_id"
                class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="" disabled selected>Pilih Departemen</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="jabatan_id" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-user-tie mr-1 text-indigo-600"></i> Jabatan
        </label>
        <select name="jabatan_id" id="jabatan_id"
                class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="" disabled selected>Pilih Jabatan</option>
            @foreach($positions as $posisi)
                <option value="{{ $posisi->id }}">{{ $posisi->nama_departemen }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-toggle-on mr-1 text-indigo-600"></i> Status
        </label>
        <select id="status" name="status"
                class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>
    </div>

    <div class="flex justify-between items-center pt-4">
        <a href="{{ route('employees.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Batal
        </a>
        <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-save text-sm"></i> Simpan
        </button>
    </div>
</form>
@endsection
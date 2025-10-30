@extends('master')

@section('title', 'Form Input Pegawai')
@section('page-title', 'Tambah Pegawai')

@section('content')
    <form action="{{ route('employees.store') }}" method="POST" class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
        @csrf

        <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-300">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
            <label for="nomor_telepon" class="block text-sm font-medium text-gray-300">Nomor Telepon</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-300">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-300">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500"></textarea>
        </div>

        <div>
            <label for="tanggal_masuk" class="block text-sm font-medium text-gray-300">Tanggal Masuk</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
        </div>

        <div>
            <label for="departemen_id" class="block text-sm font-medium text-gray-300">Departemen</label>
            <select name="departemen_id" id="departemen_id" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jabatan_id" class="block text-sm font-medium text-gray-300">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
                @foreach($positions as $posisi)
                    <option value="{{ $posisi->id }}">{{ $posisi->nama_departemen }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-300">Status</label>
            <select id="status" name="status" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">Simpan</button>
        </div>
    </form>
@endsection
@extends('master')

@section('title', 'Form Jabatan')
@section('page-title', 'Tambah Jabatan')

@section('content')
<form action="{{ route('positions.store') }}" method="POST"
      class="max-w-xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md space-y-6 transition-all duration-300 hover:shadow-lg">
    @csrf

    <div>
        <label for="nama_jabatan" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-user-tie mr-1 text-indigo-600"></i> Nama Jabatan
        </label>
        <input type="text" id="nama_jabatan" name="nama_jabatan"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Contoh: Music Director">
    </div>

    <div>
        <label for="gaji_pokok" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-money-bill-wave mr-1 text-indigo-600"></i> Gaji Pokok
        </label>
        <input type="number" id="gaji_pokok" name="gaji_pokok"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Contoh: 35000000">
    </div>

    <div class="flex justify-between items-center">
        <a href="{{ route('positions.index') }}"
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
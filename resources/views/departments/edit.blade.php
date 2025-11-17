@extends('master')

@section('title', 'Edit Departemen')
@section('page-title', 'Ubah Data Departemen')

@section('content')
<form action="{{ route('departments.update', $department->id) }}" method="POST"
      class="max-w-xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md space-y-6 transition-all duration-300 hover:shadow-lg">
    @csrf
    @method('PUT')

    <div>
        <label for="nama_departemen" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-building mr-1 text-indigo-600"></i> Nama Departemen
        </label>
        <input type="text" name="nama_departemen" id="nama_departemen"
               value="{{ old('nama_departemen', $department->nama_departemen) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div class="flex justify-between items-center">
        <a href="{{ route('departments.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Batal
        </a>

        <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-save text-sm"></i> Simpan Perubahan
        </button>
    </div>
</form>
@endsection
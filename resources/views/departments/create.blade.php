@extends('master')

@section('title', 'Form Departemen')
@section('page-title', 'Tambah Departemen')

@section('content')
    <form action="{{ route('departments.store') }}" method="POST" class="max-w-xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
        @csrf

        <div>
            <label for="nama_departemen" class="block text-sm font-medium text-gray-300">Nama Departemen</label>
            <input type="text" id="nama_departemen" name="nama_departemen" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Simpan
            </button>
        </div>
    </form>
@endsection
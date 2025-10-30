@extends('master')

@section('title', 'Edit Departemen')
@section('page-title', 'Ubah Data Departemen')

@section('content')
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="max-w-xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_departemen" class="block text-sm font-medium text-gray-300">Nama Departemen</label>
            <input type="text" name="nama_departemen" id="nama_departemen" value="{{ old('nama_departemen', $department->nama_departemen) }}" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="text-right">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
                Update
            </button>
        </div>
    </form>
@endsection
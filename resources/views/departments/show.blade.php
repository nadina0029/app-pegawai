@extends('master')

@section('title', 'Detail Departemen')
@section('page-title', 'Informasi Departemen')

@section('content')
<div class="max-w-xl mx-auto bg-gray-500 text-white p-6 rounded-lg shadow-md transition-all duration-300 ease-in-out hover:shadow-lg">
    <div class="flex items-center gap-4 mb-6">
        <i class="fas fa-building text-white text-3xl"></i>
        <div>
            <p class="text-white text-base">{{ $department->nama_departemen }}</p>
        </div>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('departments.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-black hover:text-white text-black text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Kembali
        </a>
    </div>
</div>
@endsection
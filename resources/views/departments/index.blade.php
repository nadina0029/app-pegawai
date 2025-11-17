@extends('master')

@section('title', 'Data Departemen')
@section('page-title', 'Daftar Departemen')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($departments as $department)
    <div class="bg-white text-black rounded-lg shadow-md p-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="fas fa-building text-wblack text-base"></i>
                <span class="text-base font-semibold">{{ $department->nama_departemen }}</span>
            </div>
            <div class="flex items-center gap-3 text-base">
                <a href="{{ route('departments.show', $department->id) }}" class="text-black hover:text-gray-400" title="Detail">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('departments.edit', $department->id) }}" class="text-black hover:text-gray-400" title="Edit">
                    <i class="fas fa-pen-to-square"></i>
                </a>
                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-black hover:text-gray-400" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<a href="{{ route('departments.create') }}"
    class="w-14 h-14 flex items-center justify-center fixed bottom-24 right-10 bg-white hover:bg-gray-200 text-black rounded-full shadow-lg transition duration-300"
    title="Tambah Departemen">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
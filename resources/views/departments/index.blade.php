@extends('master')

@section('title', 'Data Departemen')
@section('page-title', 'Daftar Departemen')

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-lg shadow-md">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Nama Departemen</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700 text-gray-100">
                @foreach($departments as $department)
                    <tr class="hover:bg-gray-700/50 transition">
                        <td class="px-4 py-2">{{ $department->nama_departemen }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('departments.show', $department->id) }}" class="text-indigo-400 hover:underline">Detail</a>
                            <a href="{{ route('departments.edit', $department->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-400 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('departments.create') }}"
       class="w-14 h-14 text-center fixed bottom-15 right-10 bg-white hover:bg-gray-600 text-black rounded-full p-4 shadow-lg transition duration-300"
       title="Tambah Departemen">
        <i class="fas fa-plus text-xl"></i>
    </a>
@endsection
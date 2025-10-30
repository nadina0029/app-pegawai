@extends('master')

@section('title', 'Data Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-lg shadow-md">
        <thead class="bg-gray-700 text-gray-300">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold">Nama Lengkap</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Departemen</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Jabatan</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal Masuk</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Masa Aktif</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700 text-gray-100">
            @foreach($employees as $employee)
            <tr class="hover:bg-gray-700/50 transition">
                <td class="px-4 py-2">{{ $employee->nama_lengkap }}</td>
                <td class="px-4 py-2">{{ $employee->departemen->nama_departemen ?? '-' }}</td>
                <td class="px-4 py-2">{{ $employee->jabatan->nama_departemen ?? '-' }}</td>
                <td class="px-4 py-2">{{ $employee->tanggal_masuk }}</td>
                <td class="px-4 py-2">{{ $employee->status }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('employees.show', $employee->id) }}" class="text-indigo-400 hover:underline">Detail</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
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
<a href="{{ route('employees.create') }}"
    class="w-14 h-14 text-center fixed bottom-15 right-10 bg-white hover:bg-gray-600 text-black rounded-full p-4 shadow-lg transition duration-300"
    title="Tambah Pegawai">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
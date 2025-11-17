@extends('master')

@section('title', 'Data Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-300 bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-user mr-1"></i> Nama Lengkap</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-building mr-1"></i> Departemen</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-user-tie mr-1"></i> Jabatan</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-calendar-alt mr-1"></i> Tanggal Masuk</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-check-circle mr-1"></i> Masa Aktif</th>
                <th class="px-4 py-3 text-center text-sm font-semibold"><i class="fas fa-cogs mr-1"></i> Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-gray-800">
            @foreach($employees as $employee)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $employee->nama_lengkap }}</td>
                <td class="px-4 py-2">{{ $employee->departemen->nama_departemen ?? '-' }}</td>
                <td class="px-4 py-2">{{ $employee->jabatan->nama_departemen ?? '-' }}</td>
                <td class="px-4 py-2">{{ $employee->tanggal_masuk }}</td>
                <td class="px-4 py-2">
                    @if($employee->status === 'aktif')
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Aktif</span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">Nonaktif</span>
                    @endif
                </td>
                <td class="px-4 py-2 text-center space-x-3 text-base">
                    <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-600 hover:text-blue-800" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-yellow-600 hover:text-yellow-800" title="Edit">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('employees.create') }}"
   class="w-14 h-14 flex items-center justify-center fixed bottom-24 right-10 bg-white hover:bg-gray-200 text-black rounded-full shadow-lg transition duration-300"
   title="Tambah Pegawai">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
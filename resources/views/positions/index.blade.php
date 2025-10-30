@extends('master')

@section('title', 'Data Jabatan')
@section('page-title', 'Daftar Jabatan')

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-lg shadow-md">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Nama Jabatan</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Gaji Pokok</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700 text-gray-100">
                @foreach($positions as $position)
                    <tr class="hover:bg-gray-700/50 transition">
                        <td class="px-4 py-2">{{ $position->nama_departemen }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('positions.show', $position->id) }}" class="text-indigo-400 hover:underline">Detail</a>
                            <a href="{{ route('positions.edit', $position->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="inline">
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

    <a href="{{ route('positions.create') }}"
       class="w-14 h-14 text-center fixed bottom-15 right-10 bg-white hover:bg-gray-600 text-black rounded-full p-4 shadow-lg transition duration-300"
       title="Tambah Jabatan">
        <i class="fas fa-plus text-xl"></i>
    </a>
@endsection
@extends('master')

@section('title', 'Data Gaji')
@section('page-title', 'Tabel Gaji Karyawan')

@section('content')
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-lg shadow-md">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">ID Karyawan</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Bulan</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Gaji Pokok</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Tunjangan</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Potongan</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Total Gaji</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700 text-gray-100">
                @foreach($salaries as $salary)
                    <tr class="hover:bg-gray-700/50 transition">
                        <td class="px-4 py-2">{{ $salary->karyawan_id }}</td>
                        <td class="px-4 py-2">{{ $salary->bulan }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($salary->potongan, 2, ',', '.') }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('salaries.show', $salary->id) }}" class="text-indigo-400 hover:underline">Detail</a>
                            <a href="{{ route('salaries.edit', $salary->id) }}" class="text-yellow-400 hover:underline">Edit</a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data gaji ini?')" class="text-red-400 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('salaries.create') }}"
       class="w-14 h-14 text-center fixed bottom-15 right-10 bg-white hover:bg-gray-600 text-black rounded-full p-4 shadow-lg transition duration-300"
       title="Tambah Gaji">
        <i class="fas fa-plus text-xl"></i>
    </a>
@endsection
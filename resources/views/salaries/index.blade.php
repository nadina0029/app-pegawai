@extends('master')

@section('title', 'Data Gaji')
@section('page-title', 'Tabel Gaji Karyawan')

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-300 bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-id-card mr-1"></i> Karyawan</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-calendar-alt mr-1"></i> Bulan</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-money-bill-wave mr-1"></i> Gaji Pokok</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-calculator mr-1"></i> Total Gaji</th>
                <th class="px-4 py-3 text-center text-sm font-semibold"><i class="fas fa-cogs mr-1"></i> Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-gray-800">
            @foreach($salaries as $salary)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $salary->employee->nama_lengkap ?? 'ID: '.$salary->karyawan_id }}</td>
                <td class="px-4 py-2">{{ $salary->bulan }}</td>
                <td class="px-4 py-2">Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                <td class="px-4 py-2 font-semibold text-green-700">Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</td>
                <td class="px-4 py-2 text-center space-x-3 text-base">
                    <a href="{{ route('salaries.show', $salary->id) }}" class="text-blue-600 hover:text-blue-800" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('salaries.edit', $salary->id) }}" class="text-yellow-600 hover:text-yellow-800" title="Edit">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data gaji ini?')">
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

<a href="{{ route('salaries.create') }}"
   class="w-14 h-14 flex items-center justify-center fixed bottom-24 right-10 bg-white hover:bg-gray-200 text-black rounded-full shadow-lg transition duration-300"
   title="Tambah Gaji">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
@extends('master')

@section('title', 'Data Absensi')
@section('page-title', 'Tabel Attendance')

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-300 bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-id-card mr-1"></i> Karyawan</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-calendar-day mr-1"></i> Tanggal</th>
                <th class="px-4 py-3 text-left text-sm font-semibold"><i class="fas fa-check-circle mr-1"></i> Status</th>
                <th class="px-4 py-3 text-center text-sm font-semibold"><i class="fas fa-cogs mr-1"></i> Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-gray-800">
            @foreach($attendances as $attendance)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $attendance->employee->nama_lengkap ?? 'ID: '.$attendance->karyawan_id }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>
                <td class="px-4 py-2">
                    @php
                        $status = strtolower($attendance->status_absensi);
                        $badge = [
                            'hadir' => 'bg-green-100 text-green-700',
                            'izin' => 'bg-yellow-100 text-yellow-700',
                            'sakit' => 'bg-blue-100 text-blue-700',
                            'alpha' => 'bg-red-100 text-red-700',
                        ][$status] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="px-2 py-1 text-xs rounded-full {{ $badge }}">
                        {{ ucfirst($attendance->status_absensi) }}
                    </span>
                </td>
                <td class="px-4 py-2 text-center space-x-3 text-base">
                    <a href="{{ route('attendances.show', $attendance->id) }}" class="text-blue-600 hover:text-blue-800" title="Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('attendances.edit', $attendance->id) }}" class="text-yellow-600 hover:text-yellow-800" title="Edit">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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

<a href="{{ route('attendances.create') }}"
   class="w-14 h-14 flex items-center justify-center fixed bottom-24 right-10 bg-white hover:bg-gray-200 text-black rounded-full shadow-lg transition duration-300"
   title="Tambah Absensi">
    <i class="fas fa-plus text-xl"></i>
</a>
@endsection
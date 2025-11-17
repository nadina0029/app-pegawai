@extends('master')

@section('title', 'Form Absensi')
@section('page-title', 'Input Data Absensi')

@section('content')
<form action="{{ route('attendances.store') }}" method="POST"
    class="max-w-3xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md space-y-6 transition hover:shadow-lg">
    @csrf

    <div>
        <label for="karyawan_id" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-user mr-1 text-indigo-600"></i> Nama Karyawan
        </label>
        <select id="karyawan_id" name="karyawan_id"
            class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="" disabled selected>Pilih Karyawan</option>
            @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-calendar-day mr-1 text-indigo-600"></i> Tanggal
        </label>
        <input type="date" id="tanggal" name="tanggal"
            value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
            class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="status_absensi" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-check-circle mr-1 text-indigo-600"></i> Status Absensi
        </label>
        <select id="status_absensi" name="status_absensi"
            class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="" disabled selected>Pilih Status</option>
            <option value="hadir">Hadir</option>
            <option value="izin">Izin</option>
            <option value="sakit">Sakit</option>
            <option value="alpha">Alpha</option>
        </select>
    </div>

    <div>
        <label for="waktu_masuk" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-sign-in-alt mr-1 text-indigo-600"></i> Waktu Masuk
        </label>
        <input type="time" id="waktu_masuk" name="waktu_masuk"
            class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="Contoh: 08:00">
    </div>

    <div>
        <label for="waktu_keluar" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-sign-out-alt mr-1 text-indigo-600"></i> Waktu Keluar
        </label>
        <input type="time" id="waktu_keluar" name="waktu_keluar"
            class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="Contoh: 17:00">
    </div>

    <div class="flex justify-between items-center pt-4">
        <a href="{{ route('attendances.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Batal
        </a>
        <button type="submit"
            class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-save text-sm"></i> Simpan
        </button>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status_absensi');
        const waktuMasuk = document.getElementById('waktu_masuk');
        const waktuKeluar = document.getElementById('waktu_keluar');

        function toggleWaktuFields() {
            const status = statusSelect.value;
            if (status !== 'hadir') {
                waktuMasuk.value = '';
                waktuKeluar.value = '';
                waktuMasuk.readOnly = true;
                waktuKeluar.readOnly = true;
                waktuMasuk.classList.add('bg-gray-100', 'cursor-not-allowed');
                waktuKeluar.classList.add('bg-gray-100', 'cursor-not-allowed');
            } else {
                waktuMasuk.readOnly = false;
                waktuKeluar.readOnly = false;
                waktuMasuk.classList.remove('bg-gray-100', 'cursor-not-allowed');
                waktuKeluar.classList.remove('bg-gray-100', 'cursor-not-allowed');
            }
        }

        statusSelect.addEventListener('change', toggleWaktuFields);
        toggleWaktuFields(); // jalankan saat pertama kali halaman dibuka
    });
</script>
@endsection
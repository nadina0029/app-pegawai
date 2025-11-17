@extends('master')

@section('title', 'Edit Gaji')
@section('page-title', 'Ubah Data Gaji Karyawan')

@section('content')
<form action="{{ route('salaries.update', $salary->id) }}" method="POST"
      class="max-w-3xl mx-auto bg-white text-gray-800 p-6 rounded-lg shadow-md space-y-6 transition hover:shadow-lg">
    @csrf
    @method('PUT')

    <div>
        <label for="karyawan_id" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-user mr-1 text-indigo-600"></i> Nama Karyawan
        </label>
        <select name="karyawan_id" id="karyawan_id" required
                class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm bg-white focus:ring-indigo-500 focus:border-indigo-500">
            <option value="" disabled>Pilih Karyawan</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}"
                    data-gaji="{{ $employee->jabatan->gaji_pokok ?? 0 }}"
                    {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                    {{ $employee->nama_lengkap }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="gaji_pokok" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-money-bill-wave mr-1 text-indigo-600"></i> Gaji Pokok
        </label>
        <input type="number" step="0.01" name="gaji_pokok" id="gaji_pokok"
               value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm bg-gray-100 text-gray-700 cursor-not-allowed focus:ring-0 focus:border-gray-300" readonly>
    </div>

    <div>
        <label for="tunjangan" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-gift mr-1 text-indigo-600"></i> Tunjangan
        </label>
        <input type="number" step="0.01" name="tunjangan" id="tunjangan"
               value="{{ old('tunjangan', $salary->tunjangan) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm bg-white focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="potongan" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-minus-circle mr-1 text-indigo-600"></i> Potongan
        </label>
        <input type="number" step="0.01" name="potongan" id="potongan"
               value="{{ old('potongan', $salary->potongan) }}"
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm bg-white focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label for="total_gaji" class="block text-sm font-medium text-gray-700 mb-1">
            <i class="fas fa-calculator mr-1 text-indigo-600"></i> Total Gaji
        </label>
        <input type="number" step="0.01" name="total_gaji" id="total_gaji"
               value="{{ old('total_gaji', $salary->total_gaji) }}" required
               class="block w-full rounded-md border border-gray-300 px-4 py-2 text-sm bg-gray-100 text-gray-700 cursor-not-allowed focus:ring-0 focus:border-gray-300" readonly>
    </div>

    <div class="flex justify-between items-center pt-4">
        <a href="{{ route('salaries.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-md transition">
            <i class="fas fa-arrow-left text-sm"></i> Batal
        </a>
        <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition">
            <i class="fas fa-save text-sm"></i> Update
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectKaryawan = document.getElementById('karyawan_id');
        const gajiPokokInput = document.getElementById('gaji_pokok');
        const tunjanganInput = document.getElementById('tunjangan');
        const potonganInput = document.getElementById('potongan');
        const totalGajiInput = document.getElementById('total_gaji');

        function hitungTotalGaji() {
            const gajiPokok = parseFloat(gajiPokokInput.value) || 0;
            const tunjangan = parseFloat(tunjanganInput.value) || 0;
            const potongan = parseFloat(potonganInput.value) || 0;
            const total = gajiPokok + tunjangan - potongan;
            totalGajiInput.value = total.toFixed(2);
        }

        selectKaryawan.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const gaji = selectedOption.getAttribute('data-gaji');
            gajiPokokInput.value = gaji || '';
            hitungTotalGaji();
        });

        tunjanganInput.addEventListener('input', hitungTotalGaji);
        potonganInput.addEventListener('input', hitungTotalGaji);

        // Hitung ulang saat halaman dimuat
        hitungTotalGaji();
    });
</script>
@endsection
@extends('master')

@section('title', 'Edit Data Pegawai')
@section('page-title', 'Perbarui Data Pegawai')

@section('content')
<div class="max-w-5xl mx-auto">
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="glass-panel rounded-3xl p-8 border border-white/10 relative overflow-hidden">
            {{-- Dekorasi Background (Sama dengan Create) --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl -z-10"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl -z-10"></div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- KOLOM KIRI: DATA PRIBADI --}}
                <div class="space-y-5">
                    <h3 class="text-lg font-semibold text-white border-b border-white/10 pb-2 mb-4 flex items-center gap-2">
                        <i class="fas fa-user-edit text-indigo-400"></i> Data Pribadi
                    </h3>

                    {{-- Nama Lengkap --}}
                    <div>
                        <label for="nama_lengkap" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-slate-500"></i>
                            </div>
                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                                class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all"
                                required>
                        </div>
                    </div>

                    {{-- Grid untuk Email & No HP --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Email
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-slate-500"></i>
                                </div>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $employee->email) }}"
                                    class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all"
                                    required>
                            </div>
                        </div>
                        <div>
                            <label for="nomor_telepon" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                No. Telepon
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-slate-500"></i>
                                </div>
                                <input type="text" id="nomor_telepon" name="nomor_telepon"
                                    value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                                    class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all"
                                    required>
                            </div>
                        </div>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label for="tanggal_lahir" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                            Tanggal Lahir
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-day text-slate-500"></i>
                            </div>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                                class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all" required>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="alamat" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                            Alamat Domisili
                        </label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="glass-input w-full rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500 transition-all resize-none"
                            required>{{ old('alamat', $employee->alamat) }}</textarea>
                    </div>
                </div>

                {{-- KOLOM KANAN: DATA PEKERJAAN --}}
                <div class="space-y-5">
                    <h3 class="text-lg font-semibold text-white border-b border-white/10 pb-2 mb-4 flex items-center gap-2">
                        <i class="fas fa-briefcase text-purple-400"></i> Data Kepegawaian
                    </h3>

                    {{-- Tanggal Masuk --}}
                    <div>
                        <label for="tanggal_masuk" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                            Tanggal Masuk
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-check text-slate-500"></i>
                            </div>
                            <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                                value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                                class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all" required>
                        </div>
                    </div>

                    {{-- Departemen & Jabatan --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="departemen_id" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Departemen
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-building text-slate-500"></i>
                                </div>
                                <select name="departemen_id" id="departemen_id"
                                    class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all appearance-none cursor-pointer bg-slate-900" required>
                                    @foreach($departements as $departemen)
                                    <option value="{{ $departemen->id }}"
                                        class="bg-slate-900 text-white"
                                        {{ old('departemen_id', $employee->departemen_id) == $departemen->id ? 'selected' : '' }}>
                                        {{ $departemen->nama_departemen }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-xs text-slate-500"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="jabatan_id" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Jabatan
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-id-badge text-slate-500"></i>
                                </div>
                                <select name="jabatan_id" id="jabatan_id"
                                    class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all appearance-none cursor-pointer bg-slate-900" required>
                                    @foreach($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}"
                                        class="bg-slate-900 text-white"
                                        {{ old('jabatan_id', $employee->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                                        {{ $jabatan->nama_departemen }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-xs text-slate-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div>
                        <label for="status" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                            Status Pegawai
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-toggle-on text-slate-500"></i>
                            </div>
                            <select id="status" name="status"
                                class="glass-input w-full rounded-xl pl-11 py-3 focus:ring-2 focus:ring-indigo-500 transition-all appearance-none cursor-pointer bg-slate-900" required>
                                <option value="aktif" class="bg-slate-900 text-white" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" class="bg-slate-900 text-white" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-xs text-slate-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end items-center gap-4 mt-8 pt-6 border-t border-white/10">
                <a href="{{ route('employees.index') }}"
                    class="px-6 py-2.5 rounded-xl text-slate-300 hover:text-white hover:bg-white/5 transition font-medium text-sm">
                    Batal
                </a>
                <button type="submit"
                    class="px-8 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/30 transition-all transform hover:scale-105 flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_departemen'
    ];

    // 👇 TAMBAHKAN INI AGAR BISA MENGAMBIL DATA PEGAWAI
    public function employees()
    {
        // 'departemen_id' adalah nama kolom di tabel employees yang menghubungkan ke sini
        return $this->hasMany(Employee::class, 'departemen_id');
    }
}
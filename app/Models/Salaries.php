<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
    protected $fillable = [
        'karyawan_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji'
    ];
}

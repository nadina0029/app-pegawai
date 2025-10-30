<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function departemen()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'departemen_id',
        'jabatan_id',
        'status',
    ];
}

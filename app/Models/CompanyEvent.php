<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyEvent extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'warna',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEvent extends Model
{
    use HasFactory;

    protected $table = 'company_events';

    protected $fillable = [
        'judul', 
        'deskripsi',
        'tanggal_mulai', 
        'tanggal_selesai', 
        'lokasi', 
        'warna', 
    ];
    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];
}
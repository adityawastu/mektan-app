<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaLokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'latitude',
        'longitude',
        'recorded_at',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',    // Mengkonversi ke desimal dengan 7 angka di belakang koma
        'longitude' => 'decimal:7',   // Mengkonversi ke desimal dengan 7 angka di belakang koma
        'recorded_at' => 'datetime',  // Mengkonversi ke objek Carbon untuk manipulasi tanggal/waktu
    ];
}

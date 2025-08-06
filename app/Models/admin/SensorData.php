<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SensorData extends Model
{
    use HasFactory;

    protected $table = 'sensor_data'; // Nama tabel

    // Non-auto increment primary key
    protected $primaryKey = 'sensor_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'sensor_id',
        'lat',
        'lng',
        'speed',
        'loadvoltage',
        'busvoltage',
        'shuntvoltage',
    ];

    // Relasi satu sensor digunakan oleh satu alsintan
    public function alsintan()
    {
        return $this->hasOne(DataAlsintan::class, 'sensor_id', 'sensor_id');
    }
}

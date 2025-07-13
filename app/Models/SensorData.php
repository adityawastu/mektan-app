<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SensorData extends Model
{
    use HasFactory;

    protected $table = 'sensor_data'; // nama tabel di database

    protected $fillable = [
        'lat',
        'lng',
        'speed',
        'loadvoltage',
        'busvoltage',
        'shuntvoltage',
    ];
}

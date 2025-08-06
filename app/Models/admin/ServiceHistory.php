<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_alsintan_id',
        'service_datetime',
        'pic',
        'mechanic',
        'notes',
    ];

    public function alsintan()
    {
        return $this->belongsTo(DataAlsintan::class, 'data_alsintan_id');
    }
}

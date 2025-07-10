<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataAlsintan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'merk_id',
        'stock',
        'description',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }
}

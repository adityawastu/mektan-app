<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    public function alsintans()
    {
        return $this->hasMany(DataAlsintan::class);
    }
}

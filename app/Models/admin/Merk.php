<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    public function alsintans()
    {
        return $this->hasMany(DataAlsintan::class);
    }
}

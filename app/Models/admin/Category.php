<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function alsintans()
    {
        return $this->hasMany(DataAlsintan::class);
    }
}

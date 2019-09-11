<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
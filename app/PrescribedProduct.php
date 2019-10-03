<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescribedProduct extends Model
{
    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
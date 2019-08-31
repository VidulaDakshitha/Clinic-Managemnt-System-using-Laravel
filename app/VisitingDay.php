<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitingDay extends Model
{
    // visiting days belong to a doctor
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
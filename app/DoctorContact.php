<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorContact extends Model
{
    public $timestamps =false; 
    
    // belongs to a single doctor
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
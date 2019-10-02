<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public $timestamps = false;
    // an appointment is belong to a doctor
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    //  and also to a patient
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
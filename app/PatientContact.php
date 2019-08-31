<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientContact extends Model
{
    // contact number belongs to a patient
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
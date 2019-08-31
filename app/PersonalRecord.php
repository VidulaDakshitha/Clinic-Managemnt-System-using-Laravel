<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    // an order is belonged to a patient
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
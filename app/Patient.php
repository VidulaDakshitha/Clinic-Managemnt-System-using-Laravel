<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // A patient has many phone numbers
    public function patientcontacts()
    {
        return $this->hasMany('App\PatientContact');
    }

    // A patient has many appointments
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }

    // A patient has many feedbacks
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }

    // A patient has many orders
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    // A patient has a personal record
    public function personalrecord()
    {
        return $this->hasOne('App\PersonalRecord');
    }
}
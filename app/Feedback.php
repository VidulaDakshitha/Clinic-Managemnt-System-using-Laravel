<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    
    protected $primaryKey = 'feedback_id';
    
    // an order is belonged to a patient
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }


}
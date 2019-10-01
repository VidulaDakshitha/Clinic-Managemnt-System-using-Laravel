<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{

    public $timestamps = false;

    protected $fillable = ['date','patient_id','disease','description'];
    protected $primarykey = 'record_id';
    
    // an order is belonged to a patient
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
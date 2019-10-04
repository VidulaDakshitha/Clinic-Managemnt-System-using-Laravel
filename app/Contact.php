<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';
    //
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}

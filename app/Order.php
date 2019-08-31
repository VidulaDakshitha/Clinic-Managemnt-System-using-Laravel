<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // an order is belonged to a patient
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    // orders belongs to many products
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
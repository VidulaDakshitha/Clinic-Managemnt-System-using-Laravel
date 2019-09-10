<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // an order is belonged to a patient
    protected $fillable=['order_id','patient_id','date','status','total_payment'];
    protected $primaryKey = 'order_id';
    public $timestamps = false;


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

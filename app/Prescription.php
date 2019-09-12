<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model


{

    protected $fillable=['id','doctor_id','patient_id','description','created_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

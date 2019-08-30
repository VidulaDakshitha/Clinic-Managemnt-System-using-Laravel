<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    // a supplier has many emails
    public function supplieremails()
    {
        return $this->hasMany('App\SupplierEmail');
    }
    
    // a supplier has many contact numbers
    public function suppliercontacts()
    {
        return $this->hasMany('App\SupplierEmail');
    }

    // supplier belongs to many products
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
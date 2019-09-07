<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'supplier_id';

    protected $guarded = [];

    public $timestamps = false;
    // a supplier has many emails
    public function supplieremails()
    {
        return $this->hasMany('App\SupplierEmail', 'supplier_id');
    }
    
    // a supplier has many contact numbers
    public function suppliercontacts()
    {
        return $this->hasMany('App\SupplierContact', 'supplier_id');
    }

    // supplier belongs to many products
    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_supplier', 'supplier_id', 'product_id')->withTimestamps();
    }
}
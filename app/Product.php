<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $guarded = [];
    public $timestamps = false;
    // product belongs to many orders
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    // product belongs to many suppliers
    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier', 'product_supplier', 'product_id', 'supplier_id')->withTimestamps();
    }
}
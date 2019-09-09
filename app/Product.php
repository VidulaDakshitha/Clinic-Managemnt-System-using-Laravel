<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $fillable=['product_id','name','selling_price','quantity','potency','expiry_date','type','brand','description','product_image'];
    protected $primaryKey = 'product_id';


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

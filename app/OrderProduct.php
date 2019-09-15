<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable=['id','order_id','product_id','quantity','price'];
    protected $table = 'order_product';
    public $timestamps = false;

}

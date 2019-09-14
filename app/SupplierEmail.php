<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierEmail extends Model
{
    //
    protected $guarded = [];

    public $timestamps = false;

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }
}
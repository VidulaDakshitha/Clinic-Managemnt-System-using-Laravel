<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    protected $fillable = ['patientID', 'orderID', 'cardNum', 'bank', 'serialNum', 'cardType'];
}

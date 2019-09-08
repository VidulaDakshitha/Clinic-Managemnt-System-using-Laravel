<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    protected $fillable = ['cardNum', 'bank', 'serialNum', 'cardType'];
}

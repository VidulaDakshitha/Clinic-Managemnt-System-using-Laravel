<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentRecord extends Model
{
    public $timestamps = false;

    protected $fillable = ['date','description'];
    protected $primarykey = 'record_id';
}

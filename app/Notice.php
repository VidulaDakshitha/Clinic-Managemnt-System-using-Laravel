<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    // a notice is belongs to a doctor
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    protected $primaryKey = 'notice_id';
}
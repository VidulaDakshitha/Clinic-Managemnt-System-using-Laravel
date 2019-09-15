<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // an article is belongs to a doctor
    public function doctor()
    {
        return $this->belongsTo('App\User');

        
    }

    protected $primaryKey = 'article_id';
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function board()
    {
        return $this->belongsTo('App\Board');
    }
}

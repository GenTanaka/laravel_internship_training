<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}

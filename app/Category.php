<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //make relationship between category and posts
    public function posts(){
        return $this->hasMany('App\Post');
    }
}

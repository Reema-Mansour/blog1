<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

  use SoftDeletes;

  protected $fillable=[
    'title','content','featured','category_id','slug'
  ];

  public function getFeaturedAttribute($featured){
    
        return asset($featured);
      }

  protected $dates = ['deleted_at'];
  
    //each post belong to one and only one category
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
      return $this->belongToMany('App\Tag');
    }

}

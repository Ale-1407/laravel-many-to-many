<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'cover'
    ];

    public function category(){
        //Il post ha una sola categoria associata
        return $this->belongsTo('App\Category');
    }

    public function tags(){
    return $this->belongsToMany('App\Tag');
  }

}



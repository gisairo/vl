<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //prevent mass assignment known issue with orms
     protected $fillable = ['title', 'body', 'category_id', 'category'];

     public function category()
     {
           return $this->belongsTo('App\Category');
     }
}

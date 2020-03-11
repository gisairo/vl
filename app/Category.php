<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //prevent mass assignment exploit present in ORMs
    protected $fillable = ['title', 'body'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
}

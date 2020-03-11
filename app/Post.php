<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //prevent mass assignment known issue with orms
     protected $fillable = ['title', 'body'];
}
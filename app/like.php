<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $fillable=['liked','user_id','tweet_id'];
    //

}

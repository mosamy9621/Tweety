<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tweet extends Model
{
    protected $fillable =['name'];
    use SoftDeletes,Likeable;

    public  function owner(){
        return $this->belongsTo(User::class,'user_id');
    }


    //
}

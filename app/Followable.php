<?php


namespace App;


trait Followable
{
    public  function  follows(User $user){
        $this->following()->save($user);
    }
    public  function  unfollows(User $user){
        $this->following()->detach($user);
    }
    public function following(){
        return $this->belongsToMany(User::class,'follows','user_id','following_id');
    }
    public function isFollowing(User $user){
        return $this->following()->where('following_id',$user->id)->exists();
    }
}
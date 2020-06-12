<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;
use mysql_xdevapi\Exception;

trait Likeable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub('select likes.tweet_id , sum(likes.liked) likes_no , sum(!likes.liked) dislikes_no from likes GROUP by likes.tweet_id'
        ,'Liked_table','tweets.id','=','Liked_table.tweet_id'
        );
//        select * from tweets
//left join
//        (select likes.tweet_id , count(likes.liked) likes , count(!likes.liked) dislikes from likes GROUP by likes.tweet_id) Liked_table
//on tweets.id = Liked_table.tweet_id
//    }
    }
    public function like(User $user=null,$action=true){

        // this is only because the tweet_id and user_id are unique together so updateOrCreate trys to insert at first
        //and it fails
            if($this->like_exist($user)) {

                if($action==$this->getLike($user)) {
                    $this->likes()->where('user_id', $user->id)->delete([
                        'liked' => $action
                    ]);

                }
                else {
                    $this->likes()->where('user_id', $user->id)->update([
                        'liked' => $action
                    ]);
                }
                return;
            }

        $this->likes()->create([
                  'user_id' => $user->id,
                  'liked' => $action
              ]);

    }
    public function dislike(User $user=null){
        $this->like($user,false);
    }
    public function likes(){
        return $this->hasMany(like::class);
    }
    public function isLikedBy(User $user){
        return (bool) $user->likes->where('tweet_id',$this->id)->where('liked',true)->count();
    }

    public function isDislikedBy(User $user){
        return (bool) $user->likes->where('tweet_id',$this->id)->where('liked',false)->count();
    }

    public function like_exist(User $user){
        return $this->likes()->where('user_id',$user->id)->where('tweet_id',$this->id)->exists();
    }

    public function getLike(User $user){
        return (bool) $this->likes()->where('user_id',$user->id)->where('tweet_id',$this->id)->pluck('liked')[0];
    }

}
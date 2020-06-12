<?php /** @noinspection ALL */

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_name','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute()
    {
       // dd($this);
        if(!$this->attributes['avatar']){
            $this->attributes['avatar']='avatars/temp.jpg';
        }

        return asset('storage/'.$this->attributes['avatar']);
    }
    public  function tweets(){
        return $this->hasMany(tweet::class);
    }
    public function timeLine(){
        $friends=$this->following()->pluck('id');

        return tweet::whereIn('user_id',$friends)
            ->orWhere('user_id',$this->id)
            ->withlikes()
            ->latest()->get();
    }
    public function likes(){
        return $this->hasMany(like::class);
    }




}

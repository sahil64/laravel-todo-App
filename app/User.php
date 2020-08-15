<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //protected $hidden = [
    //    'password', 'remember_token',
    //];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Changing field value while inserting data
    public function setPasswordAttribute($password){
        $this->attributes['password']=$password;
    }

    // changing field value while retrieving data
    public function getNameAttribute($name){
        return ucfirst($name);
    }

    public static function uploadAvatar($image){
        (new self())->deleteOldImage();
        $fileName=$image->getClientOriginalName();
        $image->storeAs('images',$fileName,'public');
        auth()->user()->update(['avatar' => $fileName]);
    } 
   
    protected function deleteOldImage(){
        if ($this->avatar){
            Storage::delete('/public/images/'. $this->avatar);
        }
    }

    public function todos(){
        return $this->hasMany(Todo::class);
    }
}

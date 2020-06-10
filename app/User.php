<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password' , 'admin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function photo(){
        return $this->morphOne('App\Photo','photoable');
    }

    public function courses(){
        return $this->belongsToMany('App\Course');
    }

    public function Quizzes(){
        return $this->belongsToMany('App\Quiz');
    }

    public function tracks(){
        return $this->belongsToMany('App\Track');
    }
}

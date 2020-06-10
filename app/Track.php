<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable =[ 'name' ];

    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}

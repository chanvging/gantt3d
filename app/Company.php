<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function members(){
        return $this->belongsToMany('App\User');
    }
    
    public function projects(){
        return $this->hasMany('App\Project');
    }
}

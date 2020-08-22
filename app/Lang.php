<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    //
    protected $fiilable = [
      'lang'
    ];
    public function posts(){
      return $this->hasMany('App\Post');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function texts(){
      return $this->hasMany('App\Text');
    }
}

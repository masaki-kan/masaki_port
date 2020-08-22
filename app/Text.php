<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    //
    protected $fillable = [
      'title' ,
      'body' ,
      'post_id' ,
      'user_id',
      'path',
      'name',
    ];
    public function contents(){
      return $this->hasMany('App\Content');
    }
    public function post(){
      return $this->belongsTo('App\Post');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function lang(){
      return $this->belongsTo('App\Lang');
    }

}

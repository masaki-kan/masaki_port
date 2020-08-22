<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    //
    protected $fillable = [
      'lang_id','text','user_id','post_id',
    ];

    public function texts(){
      return $this->hasMany('App\Text');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function lang(){
      return $this->belongsTo('App\Lang');
    }
}

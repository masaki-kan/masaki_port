<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    //
    protected $fillable = [
      'map_title','user_id','body','user_id','data','image',
    ];
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function MapListImages(){
      return $this->hasMany('App\MapListImage');
    }
}

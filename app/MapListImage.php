<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapListImage extends Model
{
    //
    protected $fillable = [
      'map_id','gallery',
    ];
    public function map(){
      return $this->belongsTo('App\Map');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $fillable = [
      'text_id',
       'path',
       'name',
    ];

    public function text(){
      return $this->belongsTo('App\Text');
    }


}

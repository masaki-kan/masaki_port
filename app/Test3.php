<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test3 extends Model
{
    //
    protected $table = 'test3s';
    protected $fillable = [

      'body', 'test2_id',
    ];


    public function test2(){
      return $this->belongsTo('App\Test2');
    }
}

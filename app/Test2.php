<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test2 extends Model
{
    //
    protected $table = 'test2s';
    protected $fillable = [

      'body', 'test1_id',
    ];

    public function test3(){
      return $this->hasOne('App\Test3');
    }

    public function test1(){
      return $this->belongsTo('App\Test1');
    }
}

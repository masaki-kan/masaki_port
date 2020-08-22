<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test1 extends Model{

    //

    protected $table = 'test1s';
    protected $fillable = [

      'title',
    ];

    public function test2(){
      return $this->hasOne('App\Test2');
    }
}

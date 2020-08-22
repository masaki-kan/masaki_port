<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lang;

class LangController extends Controller
{
    //
    public function __construct(){
      return $this->middleware('auth');
    }
    public function index(){
      $langs = Lang::all();
      return view('app_test.home' , [ 'langs' => $langs ]);
    }

}

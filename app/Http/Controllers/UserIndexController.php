<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;

class UserIndexController extends Controller
{
    //
    //ログインしていなかったらログイン画面に
    public function __construct(){
      $this->middleware('auth');
    }

    public function index($user_id){
      $users = User::where('id', $user_id)->first();
      return view('app_test.user',['users' => $users]);
    }

    public function create($user_id){
      $users = User::find($user_id);
      return view('app_test.user_create',['users' => $users]);
    }

    public function edit(Request $request){

      $user = User::find($request->id);
      $user->name = $request->name;
      $user->email = $request->email;

      if( isset($request->img_name) ){
        Storage::disk('public')->delete('users', $user->img_name);
        $image = $request->img_name;
        //取得した拡張子を小文字に変換
        $image_file_ext = mb_strtolower( $image->getClientOriginalExtension() );
        $iamge_data = $user->id . '.' . $image_file_ext;
        $request->img_name->storeAs('public/users' , $iamge_data);
        $request->img_name = $iamge_data;
        $user->img_name = $request->img_name;
      }
      $user->save();
      return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;

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

        $user_fileData = file_get_contents($image->getRealPath());
        //拡張子ごとの６４エンコード処理
        if ($image_file_ext === 'jpg'){
          $user_data_url = 'data:image/jpg;base64,'. base64_encode($user_fileData);
        }
        if ($image_file_ext === 'jpeg'){
          $user_data_url = 'data:image/jpeg;base64,'. base64_encode($user_fileData);
        }
        if ($image_file_ext === 'png'){
          $user_data_url = 'data:image/png;base64,'. base64_encode($user_fileData);
        }
        if ($image_file_ext === 'gif'){
          $user_data_url = 'data:image/gif;base64,'. base64_encode($user_fileData);
        }
        if ($image_file_ext === 'hief'){
          $user_data_url = 'data:image/hief;base64,'. base64_encode($user_fileData);
        }
        $user_image = Image::make($user_data_url);
        //リサイズしてファイル保存
        $user_image->resize(400,400)->save(storage_path() . '/app/public/users/' . $image_data );
        $user->img_name = $user_data_url;
      }
      $user->save();
      return redirect()->back();
    }
}

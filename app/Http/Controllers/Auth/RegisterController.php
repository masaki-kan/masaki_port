<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'sex' => 'required',
            'img_name' => 'file|image',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if( $data['img_name'] ){
            //requestからimsgesmmを渡す
            $images = $data['img_name'];

            $images_name = $data['name'];
            //$imagesからファイル名のみを取得
            //$images_onlyname = pathinfo($images_name,PATHINFO_FILENAME);
            //$imagesから拡張子のみを取得(拡張子が大文字でも小文字の変換)
            $images_ext = mb_strtolower( $images->getClientOriginalExtension() );
            //ファイル名＋拡張子にする
            $image_data = $images_name . '.' . $images_ext;
            //画像ファイルパスを取得
            $user_fileData = file_get_contents($images->getRealPath());
            //拡張子ごとの６４エンコード処理
            if ($images_ext === 'jpg'){
              $user_data_url = 'data:image/jpg;base64,'. base64_encode($user_fileData);
            }
            if ($images_ext === 'jpeg'){
              $user_data_url = 'data:image/jpg;base64,'. base64_encode($user_fileData);
            }
            if ($images_ext === 'png'){
              $user_data_url = 'data:image/png;base64,'. base64_encode($user_fileData);
            }
            if ($images_ext === 'gif'){
              $user_data_url = 'data:image/gif;base64,'. base64_encode($user_fileData);
            }
            if ($images_ext === 'hief'){
              $user_data_url = 'data:image/hief;base64,'. base64_encode($user_fileData);
            }
            $image = Image::make($user_data_url);
            //リサイズしてファイル保存
            $image->resize(400,400)->save(storage_path() . '/app/public/users/' . $image_data );
            $data['img_name'] = $user_data_url;
            }

        return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'sex' => $data['sex'],
          'img_name' => $data['img_name'],
         ]);

    }
}

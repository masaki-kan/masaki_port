<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/map';

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
                //$imagesからファイル名（拡張子付き）で取得
            $images_name = $images->getClientOriginalName();
                //$imagesからファイル名のみを取得
            $images_onlyname = pathinfo($images_name,PATHINFO_FILENAME);
                //$imagesから拡張子のみを取得
            $images_ext = $images->getClientOriginalExtension();
            //拡張子が大文字でも小文字の変換
            $images_ext_i = mb_strtolower($images_ext);
                //ファイル名＋拡張子にする
            $image_data = $images_onlyname . '.' . time(). '.' . $images_ext_i;



            $data['img_name']->storeAs('/public/users' , $image_data );

            $base64_data = base64_encode( file_get_contents($data['img_name']->getRealPath()) );
              }

        return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'sex' => $data['sex'],
          'img_name' => $image_data,
         ]);

    }
}

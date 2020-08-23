<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Map;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class MapController extends Controller
{
    //ログイン認証
    public function __construct(){
      return $this->middleware('auth');
    }
    //ホーム画面
    public function index(){
      $maps = Map::orderBy('id', 'desc')->paginate(10);
      return view('map' , ['maps' => $maps]);
    }
    //リストの詳細表示
    public function show($id){
      $address = Map::where('id' , $id)->first();
      return view('result' , [ 'address' => $address ] );
    }
    //リスト追加画面表示
    public function store(){
      return view('store');
    }
    //リスト追加処理
    public function add(Request $request){
      $validators = Validator::make( $request->all() , [
        'map_title' => 'required|max:50',
        'body' => 'required|min:5',
        'data' => 'required',
        'image' => 'required',
      ]);
      if($validators->fails()){
        return redirect()->back()->withErrors($validators)->withInput();
      }
      $data = new Map;
      $data->map_title = $request->map_title;
      $data->body = $request->body;
      $data->data = $request->data;
      $data->user_id = Auth::user()->id;
      if( isset($request->image) ){
        $image = $request->image;
        $filename = $request->map_title;
        $file = mb_strtolower($image->getClientOriginalExtension());
        //ファイル名＋拡張子
        $filedata = $filename. '.' . $file;
        //画像ファイルパスを取得
        $fileData = file_get_contents($image->getRealPath());
        //拡張子ごとの６４エンコード処理
        if ($file === 'jpg'){
          $data_url = 'data:image/jpg;base64,'. base64_encode($fileData);
        }
        if ($file === 'jpeg'){
          $data_url = 'data:image/jpeg;base64,'. base64_encode($fileData);
        }
        if ($file === 'png'){
          $data_url = 'data:image/png;base64,'. base64_encode($fileData);
        }
        if ($file === 'gif'){
          $data_url = 'data:image/gif;base64,'. base64_encode($fileData);
        }
        if ($file === 'hief'){
          $data_url = 'data:image/hief;base64,'. base64_encode($fileData);
        }
        $request->image =  $data_url;
        //$image = Image::make($data_url);
        //リサイズしてファイル保存
        //$image->resize(400,400)->save(storage_path() . '/app/public/mapimage/' . $filedata );
        //ファイル名＋拡張子を入れる
        //$data->image = $data_url;
      }
      $data->save();
      return redirect('/');
    }
    //リスト削除処理
    public function destroy($id){
      $delete = Map::where('id' , $id)->first();
      Storage::disk('public')->delete('/mapimage/' . $delete->image);
      Map::where('id' , $id)->delete();
      return redirect('/');
    }
    //リスト画面表示
    public function search(){
      $datas = Map::orderBy('id', 'desc')->get();
      return view('search' ,['datas' => $datas]);
    }
    //検索処理
    public function input(Request $request){

      $key = $request->input('key');
      $data_key = $request->input('data');
      if( !empty($key) && empty($data_key)){

      $datas = Map::where('map_title' , 'Like' , '%'.$key.'%')->get();

    }elseif( ( !empty($key) && !empty($data_key) ) ){

      $datas = Map::where('map_title' , 'Like' , '%'.$key.'%')->
      where('data' , $data_key)->get();

    }elseif( ( empty($key) && !empty($data_key) ) ){

      $datas = Map::where('data' , $data_key)->get();

    }
      return view('search' ,['datas' => $datas]);
    }

    public function mapcreate($id){
      $creates = Map::where('id' , $id) ->first();
      return view('mapcreate' , [ 'creates' => $creates ]);
    }

    public function create(Request $request){

      $created_data = Map::find('id' ,$request->id);
      $created_data->body = $request->body;
      if( isset($request->image) ){
        $created_image = $request->image;
        $created_filename = $request->map_title;
        $created_file = mb_strtolower($created_image->getClientOriginalExtension());
        //ファイル名＋拡張子
        $created_filedata = $created_filename. '.' . $created_file;
        //画像ファイルパスを取得
        $created_fileData = file_get_contents($created_image->getRealPath());
        //拡張子ごとの６４エンコード処理
        if ($created_file === 'jpg'){
          $created_data_url = 'data:image/jpg;base64,'. base64_encode($created_fileData);
        }
        if ($created_file === 'jpeg'){
          $created_data_url = 'data:image/jpg;base64,'. base64_encode($created_fileData);
        }
        if ($created_file === 'png'){
          $created_data_url = 'data:image/png;base64,'. base64_encode($created_fileData);
        }
        if ($created_file === 'gif'){
          $created_data_url = 'data:image/gif;base64,'. base64_encode($created_fileData);
        }
        if ($created_file === 'hief'){
          $created_data_url = 'data:image/hief;base64,'. base64_encode($created_fileData);
        }
        $image = Image::make($created_data_url);
        //リサイズしてファイル保存
        $image->resize(400,400)->save(storage_path() . '/app/public/mapimage/' . $created_filedata );
        //ファイル名＋拡張子を入れる
        $created_data->image = $created_filedata;
      }
      $created_data->save();
      return redirect()->back();
    }

    //google検索
    public function googlesearch(){
      return view('googlesearch');
    }

}

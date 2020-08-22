<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\PhotoRequest;
use Validator;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\lang;
use App\Post;
use App\User;
use Log;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngineProvider;


class PhotoIndexCotroller extends Controller
{
    //
    //ログインしていなかったらログイン画面に
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($lang_id){
      $datas = lang::where('id', $lang_id)->first();

      // CustomSearchEngineライブラリ
      $searchModel = new LaravelGoogleCustomSearchEngine();

      // リクエスト送信
      if( $lang_id == 0 ){
    $searchKeyword = 'HTML';
    }
      if( $lang_id == 1 ){
    $searchKeyword = 'CSS';
    }
      if( $lang_id == 2 ){
    $searchKeyword = 'SCSS';
    }
      if( $lang_id == 3 ){
    $searchKeyword = 'PHP';
    }
      if( $lang_id == 4 ){
    $searchKeyword = 'Javascript';
    }
    if( $lang_id == 5 ){
    $searchKeyword = 'Ruby on Lails';
    }

      // get first 10 results for query 'リクエスト'
      $results = $searchModel->getResults($searchKeyword);

      Log::info('$searchKeyword -> '.print_r($searchKeyword, 1));
      Log::info('$results -> '.print_r($results, 1));

      return view('app_test.index' , compact('results') , [ 'datas' => $datas]);
    }

    public function new(){

      return view('app_test.new');

    }

    public function store(Request $request){

      $validate = Validator::make($request->all(),[
        'text' => 'required|max:50',
      ]);
      if( $validate->fails() ){
        return redirect()->back()->withErrors($validate)->withInput();
      }

      $store = new Post;
      $file = $request->all();
      unset( $file['_token'] );
      $store->fill($file)->save();
      return redirect()->back();
    }

    public function destroy($id){
      //モデルPhotoから$idを抽出したものを$deleteに渡す
      Post::find($id)->delete();
      //$deleteのカラムimagesを$delete_imagesに渡す
      //$delete_images = $delete->images;
      //Storageになる$delete_imagesを探して削除
      //Storage::disk('public')->delete('/images/' . $delete_images);
      //$idレコードを削除
      //Photo::find($id)->delete();

      return redirect()->back();
    }

}

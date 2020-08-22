<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Map;
use App\MapListImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    //
    //ギャラリー処理
    public function gallery(Request $request){

      $validators = Validator::make( $request->all() , [
        'gallery' => 'required',
      ]);
      if( $validators->fails() ){
        return redirect()->back()->withErrors($validators)->withInput();

      }
      $gallerys = new MapListImage;
      $gallerys->map_id = $request->map_id;
      if( isset($request->gallery) ){
        $gallery_image = $request->gallery;
        //$gallery_filename = $gallery_image->getClientOriginalName();
        $gallery_ext = mb_strtolower($gallery_image->getClientOriginalExtension());
        //ファイル名＋拡張子
        $gallery_filedata = time() . '.' . $gallery_ext;
        //画像ファイルパスを取得
        $gallery_path = file_get_contents($gallery_image->getRealPath());
        //拡張子ごとの６４エンコード処理
        if ($gallery_ext === 'jpg'){
          $allery_url = 'data:image/jpg;base64,'. base64_encode($gallery_path);
        }
        if ($gallery_ext === 'jpeg'){
          $gallery_url = 'data:image/jpeg;base64,'. base64_encode($gallery_path);
        }
        if ($gallery_ext === 'png'){
          $gallery_url = 'data:image/png;base64,'. base64_encode($gallery_path);
        }
        if ($gallery_ext === 'gif'){
          $gallery_url = 'data:image/gif;base64,'. base64_encode($gallery_path);
        }
        if ($gallery_ext === 'hief'){
          $gallery_url = 'data:image/hief;base64,'. base64_encode($gallery_path);
        }
        $gallery_image = Image::make($gallery_url);
        //リサイズしてファイル保存
        $gallery_image->resize(400,400)->save(storage_path() . '/app/public/mapimage/' . $gallery_filedata );
        //ファイル名＋拡張子を入れる
        $gallerys->gallery = $gallery_filedata;
      }
      $gallerys->save();
      return redirect()->back();
    }
}

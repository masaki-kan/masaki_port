<?php

namespace App\Services;

class UploadService{

  public static function fileUpload($images){

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

  $InputFile = $images->storeAs('/public/images' , $image_data );

  $list = [$InputFile, $image_data];

  return $list;

  }

}

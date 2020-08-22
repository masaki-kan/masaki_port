<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngineProvider;

use App\Post;

class GoogleSearchController extends Controller
{
    //
    public function index($lang_id){
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

    // get first 10 results for query '猫とは'
    $results = $searchModel->getResults($searchKeyword);

    Post::debug('$searchKeyword -> '.print_r($searchKeyword, 1));
    Post::debug('$results -> '.print_r($results, 1));

    return view('googleCustomSearch', [
        'results' => '',
    ]);


}
}

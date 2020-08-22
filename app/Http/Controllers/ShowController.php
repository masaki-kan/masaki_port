<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\User;
use App\Content;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index($show_id){
      $datas = Text::where('id', $show_id)->first();
      return view('app_test.show',[ 'datas' => $datas  ]);
    }

    public function store(Request $request){

            $a = new Content;
            $file = $request->all();
            unset($file['_token']);

             //画像複数アップロード
             //保存フォルダを作成する（）
             $p = new \DateTime();
             $p->setTimeZone( new \DateTimeZone('Asia/Tokyo'));
             $q = $p->format('Y/m');//日付表示の形式を（年/月）変更
             $path = sprintf('/public/images/%s', $q );

             $data = $request->except('_token');
              foreach( $file['images'] as $key ){
                 $filename = '';
                 $filename = time() . '_' . $key->getClientOriginalName();

             $key->storeAs( $path , $filename );
             $data = [
               'path' => sprintf('/images/%s', $q ),
               'name' => sprintf('/%s', $filename ),
               'text_id' => $request->text_id,
             ];

             $a->fill($data)->save();
           }
           return redirect()->back();
         }
}

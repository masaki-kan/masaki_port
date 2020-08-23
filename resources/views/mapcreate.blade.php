@extends('layouts.mapindex')

@section('content')
<div class="map_title_c">
  <div class="register_form">
<h2>{{$creates->map_title}}</h2>
                  <form class="" method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $creates->id }}">
                      <input type="hidden" name="map_title" value="{{ $creates->map_title }}">
                      <label for="img_name" class="">画像</label>
                         <p><img src="$creates->image"></p>
                      <div class="form_cont">
                          <input id="img_name" type="file" class="" name="image">
                      </div>

                      <label for="img_name" class="">メモ</label>
                          <textarea id="img_name" type="text" rows="8" cols="80" name="body" value="">{{ old('body' ,$creates->body) }}</textarea>

                          <div class="form_cont">
                              <div class="submit">
                                  <button type="submit" class="submit_button">
                                      編集
                                  </button>
                                  <button class="submit_button">
                                      <a href="{{ route('gmap' , $creates->id ) }}">戻る</a>
                                  </button>
                              </div>
                          </div>

                  </form>

                    </div>
                  </div>
@endsection

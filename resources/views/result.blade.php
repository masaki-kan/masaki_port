@extends('layouts.mapindex')

@section('content')
<h2>{{ $address->map_title }}</h2>
<div class="map_title_c">
  @if( $address->user_id == Auth::user()->id )
  <label><a href="{{ route('mapcreate' , $address->id ) }}">リスト編集</a></label>
  <label><a href="{{ route('map_delete' , $address->id ) }}">リスト削除</a></label>
  @endif
  <div class="result_flex">
  <div class="result_flex_l_content">
<img src="/storage/mapimage/{{ $address->image }}" id="image">
  <div class="body">
    <p>{!! nl2br(e($address->body)) !!}</p>
  </div>
  </div>

<div class="result_flex_r_content">
@include('swiper')
<form class="swiper_input" action="{{ route('gallery') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="map_id" value="{{ $address->id }}">
<div class="label_input">
  @if( $errors->has('gallery') )
<p>{{ $errors->first('gallery') }}</p>
  @endif
<label for="gallery">ギャラリー追加</label>
<input type="file" name="gallery" id="gallery" style="display:none;">
</div>
<button for="submit">追加</button>
<input type="submit" value="" id="submit" style="display:none;">
</form>
</div>
</div>

<h3>アクセス</h3>
@include('googlemap')
</div>

@endsection

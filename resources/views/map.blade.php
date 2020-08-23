@extends('layouts.mapindex')

@section('content')
<h2>お気にりの場所リスト</h2>

<div class="map_title_c">
@foreach( $maps as $map )

<div class="c_flex">
  <div class="c_flex_l_content">
<p id="map_image">
@if( $map->image->getClientOriginalExtension() == jpeg )
  <img src="data:image/jpeg;base64,{{ $map->image }}"></p>
  @endif
  </div>

<div class="c_flex_r_content">
   <label id="title"><a href="{{ route('gmap' , $map->id ) }}">{{ $map->map_title }}</a></label>
<!--<button id="map"><a href="{{ route('gmap' , $map->map_title ) }}">map</a></button>-->
<!--<button id="delete"><a href="{{ route('map_delete' , $map->id ) }}" onclick="return confirm('{{$map->map_title}}を削除しますか？')">削除</a></button>-->
<p id="title">{!! nl2br(e($map->body)) !!}</p>
<p id="title">{{ $map->data }}</p>

</div>
<div class="c_flex_r_user">
<img src="/storage/users/{{ $map->user->img_name }}">
<p>{{ $map->user->name }}</p>
</div>
</div>
@endforeach
</div>
<div class="pagenavi">
{{ $maps->links() }}
</div>

@endsection

@extends('layouts.mapindex')

@section('content')
<h2>リスト検索</h2>
<div class="map_title_c">
  <div class="register_form">
<form action="{{ route('input') }}" method="GET" class="" id="">
{{ csrf_field() }}
<div class="form_cont">
    <label>検索</label>
<input class="" type="text" name="key" value="{{ old('key') }}">
</div>

<div class="form_cont">
    <label>日付</label>
<input type="date" name="data" value="{{ old('data') }}" placeholder="日付を入力してください">
</div>


<div class="form_cont">
    <div class="submit">
        <button type="submit" class="submit_button">
            リスト検索
        </button>
    </div>
</div>
</form>
</div>
</div>

<div class="map_title_c">
@foreach( $datas as $data )

<div class="c_flex">
  <div class="c_flex_l_content">
<p id="map_image"><img src="{{ $data->image }}"></p>
  </div>

<div class="c_flex_r_content">
   <p id="title"><a href="{{ route('gmap' , $data->id ) }}">{{ $data->map_title }}</a></p>
<p id="title">{{ $data->data }}</p>
<p id="title">{{ $data->body }}</p>

</div>
</div>
@endforeach
</div>

@endsection

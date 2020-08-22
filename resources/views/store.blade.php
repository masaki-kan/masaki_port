@extends('layouts.mapindex')

@section('content')
<h2>追加</h2>
<div class="map_title_c">
<div class="register_form">
<form class="" action="{{ route('add') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

<label for="">名前</label>
<div class="form_cont">
@if( $errors->has('map_title'))
<p>{{ $errors->first('map_title') }}</p>
@endif
<input type="text" name="map_title" value="{{ old('map_title') }}" placeholder="例：本町 店名">
</div>

<label for="">日付</label>
<div class="form_cont">
@if( $errors->has('data'))
<p>{{ $errors->first('data') }}</p>
@endif
<input type="date" name="data" value="{{ old('data') }}" placeholder="日付を入力してください">
</div>

<label for="">メモ</label>
@if( $errors->has('body'))
{ $errors->first('body') }}
@endif
<textarea type="text" rows="8" cols="80" name="body" placeholder="20文字以上で">{{ old('body') }}</textarea>

<label for="image">写真</label>
<div class="form_cont">
@if( $errors->has('image') )
<p>{{ $errors->first('image') }}</p>
@endif
<input type="file" name="image" value="" id="">
</div>

<div class="form_cont">
    <div class="submit">
        <button type="submit" class="submit_button">
            追加
        </button>
    </div>
</div>

</form>
</div>
</div>
@endsection

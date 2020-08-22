@extends('layouts.home')
@section('content')
<div class="new_form">
<form action="{{ route('contentstore') }}" method="POST" enctype="multipart/form-data" id="">
{{ csrf_field() }}

<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
<input type="hidden" name="post_id" value="{{ $datas->id }}">

<div id="text">
<textarea type="text" name="body" id="text">{{ old('body') }}</textarea>
<label for="images"><img src="{{ asset('images/index/camera_button.png') }}"></label>
<input type="file" name="images[]" value="" multiple placeholder="" id="images" style="display:none;">
<input type="submit" value="送信" class="submit">
</div>
</form>
</div>

@endsection

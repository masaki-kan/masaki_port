@extends('layouts.home')
@section('content')
<div class="content_h">
<h2>言語選択</h2>
</div>

<div class="content_c">

@foreach( $langs as $lang)
@if( $lang->lang == 0 )
<p class="content_p"><a href="{{ route('home' , $lang->id) }}"><img src="{{ asset('images/index/HTML.png') }}"></a></p>
@endif
@if( $lang->lang == 1 )
<p class="content_p"><a href="{{ route('home' , $lang->id) }}"><img src="{{ asset('images/index/CSS.png') }}"></a></p>
@endif
@if( $lang->lang == 2 )
<p class="content_p"><a href="{{ route('home' , $lang->id) }}"><img src="{{ asset('images/index/SCSS.png') }}"></a></p>
@endif
@if( $lang->lang == 3 )
<p class="content_p"><a href="{{ route('home' , $lang->id) }}"><img src="{{ asset('images/index/PHP.png') }}"></a></p>
@endif
@if( $lang->lang == 4 )
<p class="content_p"><a href="{{ route('home' , $lang->id) }}"><img src="{{ asset('images/index/Javascript.png') }}"></a></p>
@endif
@if( $lang->lang == 5 )
<p class="content_p"><a href="{{ route('home' , $lang->id) }}"><img src="{{ asset('images/index/Ruby_on_Lails.png') }}"></a></p>
@endif
@endforeach
</div>

@endsection

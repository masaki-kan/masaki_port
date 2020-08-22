@extends('layouts.home')
@section('content')
<div class="content_h">
<h2>リスト</h2>
<script async src="https://cse.google.com/cse.js?cx=007995143874963981147:xaimbvzyhbe"></script>
<div class="gcse-searchbox"></div>
</div>

<div class="content_c">
@if( $datas->lang == 0 )
<p class="content_p"><img src="{{ asset('images/index/HTML.png') }}">
  <a href="{{ route('new',$datas->id) }}">リスト追加</a></p>
@endif
@if( $datas->lang == 1 )
<p class="content_p"><img src="{{ asset('images/index/CSS.png') }}">
<a href="{{ route('new',$datas->id) }}">リスト追加</a></p>
@endif
@if( $datas->lang == 2 )
<p class="content_p"><img src="{{ asset('images/index/SCSS.png') }}">
<a href="{{ route('new',$datas->id) }}">リスト追加</a></p>
@endif
@if( $datas->lang == 3 )
<p class="content_p"><img src="{{ asset('images/index/PHP.png') }}">
<a href="{{ route('new',$datas->id) }}">リスト追加</a></p>
@endif
@if( $datas->lang == 4 )
<p class="content_p"><img src="{{ asset('images/index/Javascript.png') }}">
<a href="{{ route('new',$datas->id) }}">リスト追加</a></p>
@endif
@if( $datas->lang == 5 )
<p class="content_p"><img src="{{ asset('images/index/Ruby_on_Lails.png') }}">
<a href="{{ route('new',$datas->id) }}">リスト追加</a></p>
@endif
</div>
<div class="content">
@foreach( $datas->posts as $data)
{{ $data->text }}
@endforeach


</div>
<div class="gcse-searchresults"></div>
@endsection

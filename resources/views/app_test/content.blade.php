@extends('layouts.home')
@section('content')

<div class="content_list">
@include('app_test.content_lang')
<p>{!! nl2br(e($datas->text)) !!}</p>
<p>作成者：{{ $datas->user->name }}</p>
</div>

<div class="">
@foreach( $datas->texts as $text )
<p>{{ $text->user->name }}</p>
<p><a href="{{ route( 'show', $text->id ) }}">{{ $text->title }}</a></p>
{!! nl2br(e($text->body)) !!}
@endforeach
</div>


@endsection

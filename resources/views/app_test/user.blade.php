@extends('layouts.mapindex')
@section('content')

<div class="user_content">
　<h2>プロフィール</h2>
<label>ユーザー名</label>
  <p><img src="{{ asset( 'storage/users/'.$users->img_name ) }}"></p>
  <p>{{ $users->name }}</p>
  <label>メールアドレス</label>
<p>{{ $users->email }}</p>
　<label>性別</label>
@if( $users->sex === 0)
<p>男</p>
@elseif( $users->sex === 1)
<p>女</p>
@endif
</div>

<div class="user_create">
<p><a href="/user_create/{{ $users->id }}">プロフィール編集</a></p>
</div>
@endsection

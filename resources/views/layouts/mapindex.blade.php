<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/index.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
  <header>
  <div class="header_nav ">
@guest
<ul id="nav_box">
  <li><a href="{{ route('login') }}">ログイン</a></li>
  <li><a href="{{ route('register') }}">登録</a></li>
</ul>
@else
<ul id="nav_box">
<li><a href="{{ route('user',Auth::user()->id) }}/">{{ Auth::user()->name }}がログイン</a></li>
<li><a href="/">ホーム</a></li>
<li><a href="{{ route('mapadd') }}">リスト追加</a></li>
<li><a href="{{ route('search') }}">リスト検索</a></li>
<li><a href="{{ route('googlesearch') }}">google検索</a></li>
<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
</ul>
@endguest
</div>

</header>
  <div id="main">
          @yield('content')
  </div>
</body>

</html>

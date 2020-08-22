@extends('layouts.mapindex')

@section('content')
<div class="register_form">
  <h2>アカウント登録</h2>
                    <form class="" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                            <label for="name" class="">Name</label>

                            <div class="form_cont">
                                <input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="email" class="">E-Mail Address</label>

                            <div class="form_cont">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <label for="" class="">性別</label>

                            <p class="form_radio" for="inlineRadio1">男
                              <input class="" name="sex" value="0" type="radio" id="inlineRadio1" checked></p>

                            <p class="form_radio" for="inlineRadio2">女
                              <input class="" name="sex" value="1" type="radio" id="inlineRadio2"></p>

                            @if ($errors->has('sex'))
                                <span class="">
                                    <strong>{{ $errors->first('sex') }}</strong>
                                </span>
                            @endif


                            <label for="password" class="">Password</label>

                            <div class="form_cont">
                                <input id="password" type="password" class="" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                          <label for="password-confirm" class="">確認用Password</label>
                        <div class="form_cont">
                            <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                        </div>

                        <label for="img_name" class="">画像</label>

                        <div class="form_cont">
                            <input id="img_name" type="file" class="" name="img_name" required>

                            @if ($errors->has('img_name'))
                                <span class="">
                                    <strong>{{ $errors->first('img_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form_cont">
                            <div class="submit">
                                <button type="submit" class="submit_button">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
@endsection

@extends('layouts.mapindex')

@section('content')
<div class="login_form">
  <h2>ログイン</h2>
                    <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                            <label for="email" class="">E-Mail Address</label>

                            <div class="form_cont">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus placeholder="アドレス入力してください">

                                @if ($errors->has('email'))
                                    <span class="">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="password" class="">Password</label>

                            <div class="form_cont">
                                <input id="password" type="password" class="" name="password" required placeholder="パスワード入力してください">

                                @if ($errors->has('password'))
                                    <span class="">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form_cont">
                            <div class="submit">
                                <button type="submit" class="submit_button">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
</div>
@endsection

@extends('layouts.mapindex')
@section('content')
<div class="register_form">
  <h2>プロフィール編集</h2>
                    <form class="" method="POST" action="{{ route('useredit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $users->id }}">
                            <label for="name" class="">Name</label>

                            <div class="form_cont">
                                <input id="name" type="text" class="" name="name" value="{{ old( 'name' , $users->name ) }}" required>

                                @if ($errors->has('name'))
                                    <span class="">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="email" class="">E-Mail Address</label>

                            <div class="form_cont">
                                <input id="email" type="email" class="" name="email" value="{{ old( 'email' , $users->email ) }}" required>

                                @if ($errors->has('email'))
                                    <span class="">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                          <div class="form_cont">
                        <label for="img_name" class="">画像</label>
                           <p><img src="{{ $users->img_name }}"></p>
                           </div>

                        <div class="form_cont">
                            <input id="img_name" type="file" class="" name="img_name">

                            @if ($errors->has('img_name'))
                                <span class="">
                                    <strong>{{ $errors->first('img_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form_cont">
                            <div class="submit">
                                <button type="submit" class="submit_button">
                                    編集
                                </button>
                            </div>
                        </div>
                    </form>
@endsection

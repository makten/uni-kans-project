@extends('layouts.master')

@section('content')

    <div class="container">


        <div class="transparent-div" style="margin-top: 150px;">


                <center>
                <img style="height: 190px; width: 190px; border-radius: 50%; margin-top: 50px;" id="profile-img" class="profile-img-card"
                     src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
                </center>


            <div class="row" style="padding-top: 50px; border-radius: 5px;">

                {!!Form::open(array('url' => '/login', 'class' => 'form-horizontal'))!!}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
                        {!! Form::email('email', old('email'),['class'=>'form-control', 'placeholder' => 'Email', 'required']) !!}

                        @if ($errors->has('email'))
                            <span class="errorMsg">
                                {{ $errors->first('email') }}
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">

                    <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
                        {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Password', 'required']) !!}
                        @if ($errors->has('password'))
                            <span class="errorMsg">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">--}}
                        {{--<div class="checkbox">--}}
                            {{--<label style="color: #ffffff;">--}}
                                {{--<input type="checkbox" name="remember"> Remember Me--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                <center>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
                            {!!Form::button('<i class="fa fa-sign-in"></i> Sign in',['class'=>'btn btn-primary', 'type'=>'submit'])!!}
                        </div>
                    </div>
                </center>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>
                </div>

                {!!Form::close()!!}

            </div>
        </div>

    </div>

@endsection
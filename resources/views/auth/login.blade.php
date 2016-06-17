@extends('layouts.master')

@section('content')

    <div class="modal-body col-md-10 col-md-offset-1" style=" margin-top: -20px; border-radius: 5px; padding: 1px;">

        <div class="col-xs-12 col-xs-offset- card card-container" style="padding-top: 70px; background: url('/images/background_img/mainbg.jpg')">
            <div class="col-md-8 col-md-offset-2 transparent-div" style="margin-bottom: 40px; padding-top: 20px;">

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>

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

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="checkbox">
                            <label style="color: #ffffff;">
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>


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
    </div>

@endsection
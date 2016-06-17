<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"
               style="letter-spacing: 0.5em; font-weight: bolder;">Unikans</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-collapsible">
            {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li><a href="#">Dashboard</a></li>--}}
            {{--<li><a href="#">Settings</a></li>--}}
            {{--<li><a href="#">Profile</a></li>--}}
            {{--<li><a href="#">Help</a></li>--}}
            {{--</ul>--}}

            <ul class="nav navbar-nav navbar-left">
                <li class="{{ (Request::is('/') ? 'active' : '') }}">
                    <a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
                    <a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                {{--<li class="{{ (Request::is('Themas') ? 'active' : '') }}">--}}
                {{--<a href="{{ URL::to('about') }}">Thema's</a>--}}
                {{--</li>--}}

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li class="{{ (Request::is('/login') ? 'active' : '') }}"><a href="{{ URL::to('/login') }}"><i
                                    class="fa fa-sign-in"></i> Inloggen</a></li>
                    <li class="{{ (Request::is('/register') ? 'active' : '') }}"><a
                                href="{{ URL::to('/register') }}">Aanmelden</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i
                                    class="fa fa-user"></i> {{ Auth::user()->first_name . ' '. Auth::user()->last_name }}
                            <i
                                    class="fa fa-caret-down"></i></a>

                        <ul style="margin-top: 3px; width: 300px; background-color: #8bb624;"
                            class="dropdown-menu col-md-4" role="menu">
                            @if(Auth::check())
                                <img id="profile-img" class="profile-img-card"
                                     src="{{str_replace(public_path(), '', Auth::user()->avatar)}}"/>
                            @else
                                <img id="profile-img" class="profile-img-card"
                                     src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
                            @endif
                            <center>

                                <p style="color: white; padding: 2px;">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</p>
                            </center>

                            {{--<li><a href="#">Help?</a></li>--}}
                            {{--<li><a href="#">Language</a></li>--}}
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ URL::to('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif
                    <li role="separator" class="divider"></li>
            </ul>


                {{--<form class="navbar-form" role="search">--}}
                    {{--<div class="input-group col-sm-4">--}}
                        {{--<input type="text" class="form-control input-sm" placeholder="Search" name="q">--}}
                        {{--<div class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}

                <div class="visible-xs" style="margin-bottom: 10px;">
                    {!! Form::open(['route' => 'proposities.search', 'class' => '', 'id' => 'search_form']) !!}

                    <div class="input-group col-xs-10 col-xs-offset-0 col-sm-3 col-sm-offset-7" style="margin-top: 15px;">
                        {!! Form::text('keyword', old('keyword'), ['class' => 'form-control input-sm', 'placeholder' => 'Zoek....', 'style' => 'font-weight: bold;']) !!}
                        <span class="visible-xs input-group-btn">
                        <button type="submit" class="btn btn-default btn-sm">Zoek</button>
                    </span>
                    </div>
                    {!! Form::close() !!}
                </div>




        </div>
    </div>
</nav>


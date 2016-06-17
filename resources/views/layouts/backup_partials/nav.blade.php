<div class="navbar navbar-custom">
    <nav class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"
               style="letter-spacing: 0.5em; font-weight: bolder;">Unikans</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-left">
                <li class="{{ (Request::is('/') ? 'active' : '') }}">
                    <a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a>
                </li>
                @if(Auth::guest())
                    <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
                        {{--<a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>--}}
                    </li>
                @elseif(Auth::user()->hasRole('admin'))
                        <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
                            <a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>

                @endif

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
            </ul>


        </div>


    </nav>
</div>


<script type="text/javascript">
    $(document).ready(function () {

        $('#loginForm').bootstrapValidator({
            live: 'enabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: 'De gebruikersnaam is ongeldig',
                    validators: {
                        notEmpty: {
                            message: 'gebruikersnaam is verplicht'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            // message: 'The username must be more than 6 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_]+$/,
                            // message: 'The username can only consist of alphabetical, number and underscore'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'wachtwoord is verplicht'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            // message: 'The username must be more than 6 and less than 30 characters long'
                        }

                        // emailAddress: {
                        // message: 'The input is not a valid email address'
                        // }
                    }
                }
            }
        });
    });

</script>
@extends('layouts.dashboardmaster')

@section('content')
    @include('auth.register_form')
    @include('auth.addclient')
    @include('auth.role_form')
    @include('administration.content.create_propositieteam')


    <div class="col-sm-2 col-md-2 sidebar-offcanvas adminTools bg-dark" id="sidebar" role="navigation">


        <ul class="nav nav-sidebar bg-dark" style="color: white; margin-top: 60px;">

            <div class="hidden-xs admin-profilecard">
                <center>

                    @if(Auth::check())
                        <figure class="profile-fig">
                            <img id="profile-img" class="profile-img-card"
                                 src="{{str_replace(public_path(), '', Auth::user()->avatar)}}"/>

                            <h4 style="color: white; padding: 2px;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                            <p class="hidden-xs" style="color: white; padding: 2px;"> {{ Auth::user()->email }}</p>
                        </figure>
                    @else
                        <figure class="snip1344">
                            <img id="profile-img" class="profile-img-card"
                                 src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
                        </figure>
                    @endif

                </center>

            </div>

            </li>

            <li class="active">
                <a href="/dashboard"><i class="fa fa-list"></i> &nbsp; Overview</a>
                {{--<a class="visible-xs" href="/dashboard"><i class="fa fa-list"></i></a>--}}
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#addUserModal" data-whatever="@mdo">
                    <i class="fa fa-user"></i> &nbsp; Propositielid toev.
                </a>
                {{--<a class="visible-xs" href="#" data-toggle="modal" data-target="#addUserModal" data-whatever="@mdo">--}}
                {{--<i class="fa fa-user"></i>--}}
                {{--</a>--}}
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#addClientModal">
                    <i class="fa fa-building"></i> &nbsp; Add client
                </a>
                {{--<a class="visible-xs" href="#" data-toggle="modal" data-target="#addClientModal">--}}
                {{--<i class="fa fa-building"></i>--}}
                {{--</a>--}}
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#addRoleModal">
                    <i class="fa fa-rocket"></i> &nbsp; Add Role
                </a>
                {{--<a class="visible-xs" href="#" data-toggle="modal" data-target="#addRoleModal">--}}
                {{--<i class="fa fa-rocket"></i>--}}
                {{--</a>--}}
            </li>
            <li>
                <a href="{{ url('admin/propositie/create') }}">
                    <i class="fa fa-cart-plus"></i> &nbsp; Propositie toevoegen
                </a>
                {{--<a class="visible-xs" href="{{ url('/addProduct') }}">--}}
                {{--<i class="fa fa-cart-plus"></i>--}}
                {{--</a>--}}
            </li>

            @if (Auth::guest())
                <li><a class="hidden-xs" href="{{ url('/login') }}">Login</a></li>
            @else
                <li><a class="hidden-xs" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>
                        Logout</a>
                </li>
            @endif

        </ul>


    </div><!--/span-->

    <div class="col-sm-10 col-md-10 main" style="margin-top: 40px;">
        @include('flash::message')

                <!--toggle sidebar button-->
        <p class="visible-xs">
            <button id="menu-toggle" type="button" class="btn btn-success btn-xs" data-toggle="offcanvas"><i
                        class="fa fa-arrows-h"></i></button>
        </p>

        {{--<h1 class="page-header">--}}
        {{--Dashboard--}}
        {{--<p class="lead">(<a href="http://www.bootply.com/128936">with off-canvas sidebar</a>)</p>--}}
        {{--</h1>--}}

        {{--<div class="row placeholders">--}}
        {{--<div class="col-xs-6 col-sm-3 placeholder text-center">--}}
        {{--<img src="//placehold.it/200/6666ff/fff" class="center-block img-responsive img-circle"--}}
        {{--alt="Generic placeholder thumbnail">--}}
        {{--<h4>Label</h4>--}}
        {{--<span class="text-muted">Something else</span>--}}
        {{--</div>--}}
        {{--<div class="col-xs-6 col-sm-3 placeholder text-center">--}}
        {{--<img src="//placehold.it/200/66ff66/fff" class="center-block img-responsive img-circle"--}}
        {{--alt="Generic placeholder thumbnail">--}}
        {{--<h4>Label</h4>--}}
        {{--<span class="text-muted">Something else</span>--}}
        {{--</div>--}}
        {{--<div class="col-xs-6 col-sm-3 placeholder text-center">--}}
        {{--<img src="//placehold.it/200/6666ff/fff" class="center-block img-responsive img-circle"--}}
        {{--alt="Generic placeholder thumbnail">--}}
        {{--<h4>Label</h4>--}}
        {{--<span class="text-muted">Something else</span>--}}
        {{--</div>--}}
        {{--<div class="col-xs-6 col-sm-3 placeholder text-center">--}}
        {{--<img src="//placehold.it/200/66ff66/fff" class="center-block img-responsive img-circle"--}}
        {{--alt="Generic placeholder thumbnail">--}}
        {{--<h4>Label</h4>--}}
        {{--<span class="text-muted">Something else</span>--}}
        {{--</div>--}}
        {{--</div>--}}

        <hr>


        <h2 class="sub-header">Section title</h2>
        @include('pages.searchform')
        <div class="table-responsive">

            @include("layouts.tables.admin_tables")

        </div>

    </div><!--/row-->
    </div>
    <script>
        $(document).ready(function () {
            $('[data-toggle=offcanvas]').click(function () {
                $('.row-offcanvas').toggleClass('active');
            });


            $("#update").on("click", function (e) {

            });


        });


        function rotateThis(sender) {

            var $icon = $(sender).find(".icon-refresh"),
                    animateClass = "icon-refresh-animate";

            $icon.addClass(animateClass);
            // setTimeout is to indicate some async operation
            window.setTimeout(function () {
                $icon.removeClass(animateClass);
            }, 2000);
        }


    </script>
@endsection


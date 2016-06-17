<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
    <section class="sidebar" style="margin-top: 10px;">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{Auth::user()->userprofile->avatar_resized}}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->first_name. ' '.Auth::user()->last_name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            @endif


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">ADMIN PANEL</li>
                <li class="{{ (Request::is('home') ? 'active' : '') }}"><a href="{{ url('home') }}"><i
                                class='fa fa-list'></i> <span>Overview</span></a></li>

                <li class="treeview {{ (Request::is('user/create') ? 'active' : '') }}{{ (Request::is('client/create') ? 'active' : '') }}{{ (Request::is('product/create') ? 'active' : '') }}">
                    <a href="#"><i class="fa fa-table"></i><span>CRUD</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    {{--<ul class="treeview-menu">--}}
                        {{--<li class="{{ (Request::is('user/create') ? 'active' : '') }}"><a--}}
                                    {{--href="{{route('user.create')}}"> &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i> Add--}}
                                {{--User</a></li>--}}
                        {{--<li class="{{ (Request::is('client/create') ? 'active' : '') }}"><a--}}
                                    {{--href="{{route('client.create')}}"> &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus"></i>--}}
                                {{--Add Client</a></li>--}}
                        {{--<li class="{{ (Request::is('product/create') ? 'active' : '') }}"><a--}}
                                    {{--href="{{route('product.create')}}"> &nbsp;&nbsp;&nbsp;<i--}}
                                        {{--class="fa fa-shopping-cart"></i> Add Product</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </li>

                <li class="{{ (Request::is('/openinghours') ? 'active' : '') }}"><a href="#"><i
                                class='fa fa-calendar-o'></i> <span>Opening Hours</span></a></li>
                <li class="{{ (Request::is('/discountmanager') ? 'active' : '') }}"><a href="#"><i
                                class='fa fa-star'></i> <span>Discounts</span></a></li>
                <li class="{{ (Request::is('/ordersmanager') ? 'active' : '') }}"><a href="#"><i
                                class='fa fa-shopping-cart'></i> <span>Orders</span></a></li>
                <li class="{{ (Request::is('/paymentmanager') ? 'active' : '') }}"><a href="#"><i
                                class='fa fa-money'></i> <span>Payment</span></a></li>
                <li class="{{ (Request::is('/servicesmanager') ? 'active' : '') }}"><a href="#"><i
                                class='fa fa-sitemap'></i> <span>Services</span></a></li>
            </ul><!-- /.sidebar-menu -->


    </section>
    <!-- /.sidebar -->
</aside>

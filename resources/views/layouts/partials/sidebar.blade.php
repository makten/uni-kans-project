<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
    <section class="sidebar" style="margin-top: 10px;">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{str_replace('C:\Users\Hafiz\Dropbox\MyProjects\Projects\mytemplate-project\public', '', Auth::user()->userprofile->avatar_thumbnail)}}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->first_name. ' '.Auth::user()->last_name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            @endif


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" style="font-size: 15px; font-weight: 400">
                <li class="header">ADMIN PANEL</li>
                <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
                    <a href="/api/dashboard">
                        <i class='fa fa-list pull-left'></i> <span>Overview</span>
                    </a>
                </li>

                <li class="treeview {{ (Request::is('user/create') ? 'active' : '') }}{{ (Request::is('client/create') ? 'active' : '') }}{{ (Request::is('product/create') ? 'active' : '') }}">
                    <a>
                        <i class="fa fa-table pull-left"></i><span>Personsbeheer</span><i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <li class="{{ (Request::is('user/create') ? 'active' : '') }}">
                            <a href="/user/create">
                                <i class="fa fa-user pull-left"></i> Gebruiker toevoegen
                            </a>
                        </li>
                        <li class="{{ (Request::is('client/create') ? 'active' : '') }}">
                            <a href="/team/create">
                                &nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus pull-left"></i>
                                Team lid toevoegen
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="{{ (Request::is('content') ? 'active' : '') }}">
                    <a href="{{route('propositie.create')}}">
                        <i class='fa fa-table pull-left'></i> <span>Propositie aanmaken</span>
                    </a>
                </li>

                <li class="{{ (Request::is('/discountmanager') ? 'active' : '') }}">
                    <a href="/thema/create">
                        <i class='fa fa-deviantart pull-left'></i> <span>Thema toevoegen</span>
                    </a>
                </li>

                <li class="{{ (Request::is('/servicesmanager') ? 'active' : '') }}">
                    <a href="/markt/create">
                        <i class='fa fa-sitemap pull-left'></i> <span>Markt toevoegen</span>
                    </a>
                </li>
            </ul><!-- /.sidebar-menu -->


    </section>
    <!-- /.sidebar -->
</aside>

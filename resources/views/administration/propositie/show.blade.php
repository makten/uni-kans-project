@extends('layouts.dashboardmaster')

@section('main-content')

    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Details</div>

                    <proposities-show pro-id="{{ $propositie->id }}">
                    </proposities-show>

                </div>
            </div>

        </div>
    </div>


    <template id="propositie_show">

        <div class="container-fluid">

            {{--<div class="row" v-if="viewers.length > 1">--}}
            {{--<div class="col-md-12">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading">Also Viewing</div>--}}

            {{--<div class="panel-body">--}}
            {{--<table class="table table-borderless m-b-none">--}}
            {{--<thead>--}}
            {{--<th></th>--}}
            {{--<th>Name</th>--}}
            {{--</thead>--}}

            {{--<tbody>--}}
            {{--<tr v-for="viewer in viewersExceptMe">--}}
            {{--<!-- Photo -->--}}
            {{--<td>--}}
            {{--<img :src="viewer.photo_url" class="spark-profile-photo">--}}
            {{--</td>--}}

            {{--<!-- Name -->--}}
            {{--<td>--}}
            {{--<div class="btn-table-align">--}}
            {{--@{{ viewer.name }}--}}
            {{--</div>--}}
            {{--</td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
            {{--</table>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}


            <div class="row" v-if="task">

                <!------ General and team details ------------->
                <div class="col-md-3 col-md-offset-0">
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <h4>Algemeen</h4>
                            <hr>

                            <!--Card image-->
                            <div class="ripplelink view overlay hm-white-slight">

                                <img src="/uploads/innovations\0c0394290f8166fd0fdf8c53af67f450.jpg" height="180"
                                     width="200" alt="Propositie foto">
                                <a>
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Button-->

                            <a class="btn-floating btn-action btn-fab">
                                <img src="{{Auth::user()->userprofile->avatar_resized}}" alt="User profile">
                            </a>

                            <!--Card content-->
                            <div class="card-block">
                                <!--Title-->

                                <div>
                                    <h3 class="card-title">@{{{ task.pro_name  | highlight query }}}</h3>
                                </div>
                                <hr>

                            </div>
                            <!--/.Card content-->
                            <br/>

                            <!-------------------Team details-------------->
                            <h4>Propositie Team</h4>
                            <hr>


                            {{--<div class="paragraphs" style="position: relative; background: lightskyblue;">--}}
                            {{--<div class="row">--}}
                            {{--<div class="span4">--}}
                            {{--<div class="clearfix content-heading">--}}
                            {{--<img class="img-circle pull-left" src="{{Auth::user()->userprofile->avatar_resized}}"/>--}}
                            {{--<h3>Experience &nbsp </h3>--}}
                            {{--</div>--}}
                            {{--<p>Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            <div class="media">
                                <div>
                                <a class="pull-left" href="#">
                                    <img class="img-circle media-object"
                                         src="{{Auth::user()->userprofile->avatar_resized}}"  alt="User profile">
                                </a>
                                </div>

                                <div class="media-body">

                                    <div class="col-xs-12 comment-header media-heading">
                                        <h4 class="media-heading">{{Auth::user()->first_name .' '. Auth::user()->first_name}} </h4>
                                        •
                                        <span class="label label-default tiny-badge">Propositiehouder</span>
                                        •

                                        <span><i id="basic-addon1" class="time-ago addon right"
                                                 title="Gezien @{{humanReadable(task.created_at) }}">
                                                Gezien @{{humanReadable(task.created_at) }}</i>
                                        </span>

                                    </div>

                                    {{--task.created_at | moment "fromNow"--}}

                                    Some activities maybe ?.. Feeds perhaps


                                </div>

                            </div>

                            <br/>

                            <!-------------------Team details------------->

                            <!-- Card footer -->
                            <div class="card-data" style="background-color: #6a6a6a; color: #ffffff; height: 35px; ">
                                <ul class="list-inline">
                                    <li><i class="fa fa-clock-o"></i> @{{ task.created_at | moment "D-M-Y"}}</li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i>12</a></li>
                                    <li><a href="#"><i class="fa fa-facebook"> </i>21</a></li>
                                    <li><a href="#"><i class="fa fa-twitter"> </i>5</a></li>
                                </ul>
                            </div>

                            <!-- Card footer -->


                        </div>

                        {{--<p class="m-b-none">--}}
                        {{--This task was created by @{{ task.user.first_name }}--}}
                        {{--on @{{ task.created_at | moment "Y-M-D" }}.--}}
                        {{--</p>--}}
                    </div>

                </div>
                <!------ General and team details ------------->

                <!------ Main content section ------------->
                <div class="col-md-7 col-md-offset-0">

                    <div class="panel panel-default">

                        <div class="panel-body">

                            <h4>Description</h4>
                            <!--Card content-->
                            <div class="card-block">
                                <hr>
                                <!--Text-->
                                <p class="card-text" style="text-align: justify">@{{ task.pro_description }}</p>

                                <a href="/" class="link-text"><h5>Meer lezen <i class="fa fa-chevron-right"></i></h5>
                                </a>

                                <h4>More info</h4>
                                <hr>
                                <p>Status</p>
                                <p>Docs</p>
                                <p>Views</p>
                                <p>Likes</p>

                                <h4>Some more details here</h4>
                                <hr/>

                                <p>Status</p>
                                <p>Docs</p>
                                <p>Views</p>
                                <p>Likes</p>

                            </div><!--/.Card content-->

                            <!-- Card footer -->
                            <div class="card-data" style="background-color: #6a6a6a; color: #ffffff; height: 35px; ">
                                <ul class="list-inline">
                                    <li><i class="fa fa-clock-o"></i> @{{ task.created_at | moment "D-M-Y"}}</li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i>12</a></li>
                                    <li><a href="#"><i class="fa fa-facebook"> </i>21</a></li>
                                    <li><a href="#"><i class="fa fa-twitter"> </i>5</a></li>
                                </ul>
                            </div>

                            <!-- Card footer -->

                            {{--</div> <!--Card-->--}}
                            {{--</div><!--Card-wrapper-->--}}

                        </div>

                        {{--<p class="m-b-none">--}}
                        {{--This task was created by @{{ task.user.first_name }}--}}
                        {{--on @{{ task.created_at | moment "Y-M-D" }}.--}}
                        {{--</p>--}}
                    </div>

                </div>
                <!------ Main content section ------------->

                <!------ Related Items Sections ------------->
                <div class="col-md-2 col-md-offset-0">

                    <div class="panel panel-default">

                        <div class="panel-body">

                            <h4>Related items</h4>
                            <!--Card content-->
                            <div class="card-block">
                                <hr>
                                <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                                class="fa fa-chevron-right"></i></h5></a>
                                <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                                class="fa fa-chevron-right"></i></h5></a>
                                <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                                class="fa fa-chevron-right"></i></h5></a>
                                <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                                class="fa fa-chevron-right"></i></h5></a>
                                <a href="/" class="link-text"><h5>oluptas veritatis. Ad sed autem et et et facilis Do <i
                                                class="fa fa-chevron-right"></i></h5></a>


                            </div><!--/.Card content-->

                        </div>

                    </div>

                </div>
                <!------ /Related Items Sections ------------->


            </div>
        </div>


    </template>
@endsection

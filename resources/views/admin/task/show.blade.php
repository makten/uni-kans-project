@extends('layouts.dashboardmaster')

@section('main-content')
    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    {{$task}}


                    <showtask  user="{{$task->creator}}" current-team="{{ $task->team_id }}" task-id="{{ $task->id }}">

                    </showtask>


                </div>

            </div>
        </div>





        <template id="showtasktemplate">
            <div class="container">
                <pre>@{{ viewers }}</pre>
                {{--<div class="row" v-if="viewers.length > 1">--}}
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Also Viewing</div>

                            <div class="panel-body">
                                <table class="table table-borderless m-b-none">
                                    <thead>
                                    <th></th>
                                    <th>Name</th>
                                    </thead>

                                    <tbody>
                                    <tr v-for="viewer in viewers">
                                        <!-- Photo -->
                                        <td>
                                            <img :src="viewer.photo_url" class="spark-profile-photo">
                                        </td>

                                        <!-- Name -->
                                        <td>
                                            <div class="btn-table-align">
                                                @{{ viewer.name }}
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" v-if="task">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">@{{ task.name }}</div>

                            <div class="panel-body">
                                <p class="m-b-none">
                                    This task was created by @{{ task.creator.first_name }} on @{{ task.created_at | moment "D-M-Y" }}.
                                </p>
                            </div>
                        </div>
                    </div>
                {{--</div>--}}
            </div>
        </template>

@endsection
@extends('layouts.dashboardmaster')

@section('main-content')

    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">


                    <taskshome user="user" current-team="currentTeam"></taskshome>


            </div>

        </div>
    </div>


        <template id="taskshometemplate">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New ---- Task</div>
                            <input type="text" v-model="mark">
                            @{{ mark | marked }}

                            <div class="panel-body">
                                <form class="form-horizontal" role="form" @submit.prevent="create">
                                    {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                                    <!-- Name -->
                                    <div class="form-group m-b-none" >
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="name" v-model="name">


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" v-if="tasks.length > 0">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Current ----- Tasks</div>

                            <div class="panel-body">
                                <table class="table table-borderless m-b-none">
                                    <thead>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                    </thead>

                                    <tbody>
                                    <tr v-for="task in tasks">
                                        <!-- Name -->
                                        <td>
                                            <div class="btn-table-align">
                                                @{{ task.name }}
                                            </div>
                                        </td>

                                        <!-- View Button -->
                                        <td>
                                            <a href="/teams/@{{ task.team_id }}/tasks/@{{ task.id }}">
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </a>
                                        </td>

                                        <!-- Delete Button -->
                                        <td>
                                            <button class="btn btn-danger-outline" @click="deleteTask(task)">
                                            <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </template>
@endsection

@extends('layouts.app')

@section('htmlheader_title')
    Overview
@endsection


@section('main-content')
    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Overview</div>

                    <div class="panel-body">
                        {{--@include('layouts.tables_partials.admin_tables')--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
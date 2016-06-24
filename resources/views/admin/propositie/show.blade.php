@extends('layouts.dashboardmaster')

@section('main-content')

    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">Details</div>--}}

                    <show-propositie user="{{Auth::user()}}" pro-id="{{ $propositie->id }}">
                    </show-propositie>

                </div>
            </div>

        </div>
    </div>

@endsection

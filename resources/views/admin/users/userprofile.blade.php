@extends('layouts.dashboardmaster')

@section('htmlheader_title')
    Overview
@endsection

@section('main-content')
    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">

                <user-profile :user-id="{{$user->id}}">
                </user-profile>

            </div>

        </div>
    </div>

@endsection

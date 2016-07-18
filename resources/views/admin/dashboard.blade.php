@extends('layouts.dashboardmaster')

@section('htmlheader_title')
    Overview
@endsection

@section('main-content')
    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                    <dashboard-overview>
                    </dashboard-overview>
            </div>

        </div>
    </div>

@endsection

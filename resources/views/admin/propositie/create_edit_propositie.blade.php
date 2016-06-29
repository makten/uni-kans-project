@extends('layouts.dashboardmaster')

@section('htmlheader_title')
    Overview
@endsection

@section('main-content')


    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create</div>


                    @if(isset($propositie))
                        <createpropositie propositie="{{$propositie}}" user-id="{{ $user }}" subject="Edit propositie">
                        </createpropositie>
                    @else
                        <createpropositie user-id="{{ $user }}" subject="Create propositie">
                        </createpropositie>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
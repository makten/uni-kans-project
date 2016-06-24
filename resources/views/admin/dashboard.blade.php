@extends('layouts.dashboardmaster')

@section('htmlheader_title')
    Overview
@endsection

@section('main-content')
    <div class="spark-screen">
        <div class="row">
            <div class="col-md-12">
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Overview</div>--}}

                    <dashboard-overview>
                    </dashboard-overview>
                {{--</div>--}}
            </div>

        </div>
    </div>
    </div>

    {{--<template id="dashboard_overview">--}}


        {{--<div class="panel-body">--}}
            {{--<h3>Overview page</h3>--}}
            {{--<div class="panel-body">--}}
                {{--<input type="text" v-model="filterPros" class="input-control input-sm">--}}
                {{--<table class="table table-borderless m-b-none">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th v-for="pro_column in pro_columns">--}}
                            {{--<a :class="{'active' sortKey==pro_column}"--}}
                            {{--@click="sortBy(pro_column)">--}}
                            {{--@{{ pro_column | uppercase}}--}}
                            {{--</a>--}}
                        {{--</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}

                    {{--<tbody>--}}
                    {{--<tr v-for="propositie in proposities |filterBy filterPros |orderBy sortKey reverse">--}}

                        {{--<!-- Id -->--}}
                        {{--<td>--}}
                            {{--<div class="btn-table-align">--}}
                                {{--@{{ propositie.id }}--}}
                            {{--</div>--}}
                        {{--</td>--}}

                        {{--<!--Avatar-->--}}
                        {{--<td>--}}
                            {{--<div class="btn-table-align intable-image">--}}
                                {{--<!--<img src="@{{getImg(content.pro_avatar)}}">-->--}}
                            {{--</div>--}}
                        {{--</td>--}}

                        {{--<!-- Name -->--}}
                        {{--<td>--}}
                            {{--<div class="btn-table-align">--}}
                                {{--<a href="/propositie/@{{ propositie.id }}/show">--}}
                                    {{--@{{ propositie.pro_name }}--}}
                                {{--</a>--}}

                            {{--</div>--}}
                        {{--</td>--}}

                        {{--<!-- Contact -->--}}
                        {{--<td>--}}
                            {{--<div class="btn-table-align">--}}
                                {{--<a href="">--}}
                                    {{--@{{ propositie.user.first_name +' '+ propositie.user.last_name }}--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</td>--}}

                        {{--<td>--}}
                            {{--<div class="btn-table-align">--}}
                                {{--@{{ propositie.pro_name }}--}}
                            {{--</div>--}}
                        {{--</td>--}}

                        {{--<td>--}}
                            {{--<div class="btn-table-align">--}}
                                {{--@{{ propositie.pro_slug }}--}}
                            {{--</div>--}}
                        {{--</td>--}}

                        {{--<!-- View Button -->--}}


                        {{--<td>--}}
                            {{--<a href="/propositie/@{{ propositie.id }}/show">--}}
                                {{--<button class="btn btn-primary">--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</button>--}}
                            {{--</a>--}}
                        {{--</td>--}}

                        {{--<!-- Delete Button -->--}}
                        {{--<td>--}}
                            {{--<button class="btn btn-danger-outline" @click="deletePropositie(propositie)">--}}
                            {{--<i class="fa fa-times"></i>--}}
                            {{--</button>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}

    {{--</template>--}}

    {{--<style>--}}
        {{--a.active {--}}
            {{--color: red;--}}
        {{--}--}}

        {{--.intable-image {--}}

        {{--}--}}

        {{--.intable-image img {--}}
            {{--height: 50px;--}}
            {{--width: 70px;--}}
        {{--}--}}
    {{--</style>--}}
@endsection

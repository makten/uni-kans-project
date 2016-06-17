@extends('layouts.master')

@section('content')
    @include('auth.register_form')
    @include('auth.addclient')
    @include('auth.role_form')
    @include('administration.content.create_propositieteam')
    @include('layouts.backup_partials.master_wrapper')

@endsection

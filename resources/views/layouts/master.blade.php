<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {!! Html::script('/js/jquery.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/bootstrap-switch.min.js') !!}
    {!! Html::script('/js/jquery.form.js') !!}


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    {!! Html::style('/css/chosen.css') !!}
    {!! Html::style('/css/app.css') !!}
    {!! Html::style('/css/query_css.css') !!}
    {!! Html::style('/css/bootstrap-theme.css') !!}
    {!! Html::style('/css/jquery-dataTable.min.css') !!}
    {!! Html::style('/css/jquery-ui.css') !!}
    {!! Html::style('/css/bootstrapValidator.css') !!}
    {!! Html::style('/css/bootstrap-switch.min.css') !!}


</head>
<body>

{{-- <div class="welcome"> --}}
    {{--@include('layouts.partials.nav')--}}
{{-- </div> --}}


    <div class="container" style="padding: 3px;">
        @include('flash::message')
        @yield('content')
    </div>




<script type="text/javascript">
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(2000).slideUp(150);
</script>
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/ripples.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/plugins/selectize.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/plugins/jquery.dropdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/moments.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/moments_with_locale.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/default_script.js') }}" type="text/javascript"></script>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>




</body>
</html>
<head>
    <meta charset="UTF-8">
    <title> HafizAbass - @yield('htmlheader_title', 'Title here') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">

    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css" rel="stylesheet" type="text/css"/>

    <!-- Theme style -->
    <link href="{{ asset('/css/AdminDashboard.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Skin -->
    @if(isset($userSettings))
        <link href="{{ asset('/css/skins/'.$userSettings->skin.'.css') }}" rel="stylesheet" type="text/css"/>
        <input id="skin-value" type="hidden" value="{{$userSettings->skin}}">
    @else
        <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css"/>
        @endif
                <!-- iCheck -->
        {{--<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css"/>--}}
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/s/dt/dt-1.10.10,af-2.1.0,b-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fh-3.1.0,r-2.0.0,sc-1.4.0,se-1.1.0/datatables.min.css"/>



        <!-- Styles Customized-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/cust/bootstrap-material-design.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/cust/ripples.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/cust/-datetimepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/es5-shim/2.0.8/es5-shim.min.js"></script><![endif]-->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--Datatables-->
        {!! Html::style('/css/jquery-dataTable.min.css') !!}
        {!! Html::style('/css/landing.css') !!}
        {!! Html::style('/css/cust/selectize.css') !!}
        {!! Html::style('/css/cust/jquery.dropdown.css') !!}
        {!! Html::style('/css/animate.css') !!}
</head>

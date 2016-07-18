<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">


@section('htmlheader')
@include('layouts.partials.htmlheader')
@show


@if(isset($userSettings))
<body id='admin_app' class="{{$userSettings->skin}} sidebar-mini">
@else
<body id='admin_app' class="skin-blue sidebar-mini">
@endif

<div class="wrapper">

@include('layouts.partials.mainheader')

@include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

@include('layouts.partials.contentheader')

        <!-- Main content -->
<section class="content">
                    @include('flash::message')
@yield('main-content')
</section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->



@include('layouts.partials.controlsidebar')

@include('layouts.partials.footer')

</div>
<!-- ./wrapper -->

@section('scripts')
@include('layouts.partials.scripts')
@show


</body>
</html>
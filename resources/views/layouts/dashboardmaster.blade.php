<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>


@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show



<body>

@if(isset($userSettings))
    <body id='app-body' class="{{$userSettings->skin}} sidebar-mini">
    @else
        <body id='app-body' class="skin-blue sidebar-mini">
        @endif

        <div class="wrapper">

            @include('layouts.partials.mainheader')

            @include('layouts.partials.sidebar')

                    <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                {{--@include('layouts.partials.contentheader')--}}

                        <!-- Main content -->
                <section class="content">
                    @include('flash::message')
                    @yield('main-content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('layouts.partials.controlsidebar')

            @include('layouts.partials.footer')

        </div><!-- ./wrapper -->

        @section('scripts')
            @include('layouts.partials.scripts')
        @show

        <script type="text/javascript">
            $('#flash-overlay-modal').modal();
            $('div.alert').not('.alert-important').delay(4000).slideUp(300);

            $('.table-responsive').on('show.bs.dropdown', function () {
                $('.table-responsive').css( "overflow", "inherit" );
            });

            $('.table-responsive').on('hide.bs.dropdown', function () {
                $('.table-responsive').css( "overflow", "auto" );
            })
        </script>



        </body>
</html>




{!! Html::script('/js/default_script.js') !!}
{!! Html::script('/js/bootstrapValidator.min.js') !!}
{!! Html::script('/js/sorttable.js') !!}
{!! Html::script('/js/jquery-dataTable.min.js') !!}
{!! Html::script('/js/language/nl_NL.js') !!}
{!! Html::script('/js/dashboard_script.js') !!}
{!! Html::script('/js/themechanger_script.js') !!}

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/s/dt/dt-1.10.10,af-2.1.0,b-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fh-3.1.0,r-2.0.0,sc-1.4.0,se-1.1.0/datatables.min.js"></script>

        <script type="text/javascript">
            $('#flash-overlay-modal').modal();
            $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>

</body>
</html>
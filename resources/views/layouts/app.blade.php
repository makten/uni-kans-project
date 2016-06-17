<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

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

                @include('layouts.partials.contentheader')

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
                $('.table-responsive').css("overflow", "inherit");
            });

            $('.table-responsive').on('hide.bs.dropdown', function () {
                $('.table-responsive').css("overflow", "auto");
            })
        </script>

        </body>
</html>
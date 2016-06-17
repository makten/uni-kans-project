@extends('layouts.master')

@section('content')


    <div class="col-xs-12">

        {{--{{$keyword or "Default"}}--}}
        @if(isset($keyword))
            {!! Form::open(['url' => '/search', 'class' => 'form-horizontal', 'id' => 'result_searchbox']) !!}

            <div class="input-group col-md-7 col-md-offset-5">
                <h3>Zoeken</h3>
            </div>
            <div class="form-group" style=" margin-bottom:0px;">
                <div class="input-group col-md-7 col-md-offset-5">
                    {!! Form::text('keyword', $keyword, ['id'=>'checkVal', 'class' => 'form-control input-sm', 'placeholder' => 'Zoek....']) !!}
                    <span class="input-group-btn">
                        <button type="button" id="sendQuery" class="btn btn-default btn-sm">Zoek</button>
                    </span>
                </div>
            </div>
            <div class="input-group col-md-7 col-md-offset-5">
                <p style="font-size: 12px; font-family: Monaco, Consolas, Lucida Console, dejavu sans mono, monospace;">Aantal gevonden resultaten: {{$gevonden}}</p>
                {{--Geen zoekresultaten gevonden--}}
            </div>
            {!! Form::close() !!}
        @endif


        <div class="col-xs-12" style="padding: 0;">

            @foreach($proposities as $i => $propo)
                <div class="col-xs-12"
                     style="padding: 0; margin-bottom: 10px;  border-top: 1px solid grey; border-bottom: 1px solid grey">

                    <div class="col-xs-3" style="padding: 0;"><img
                                src="{{str_replace(public_path(), '', $propo->pro_avatar)}}"/></div>

                    <div id="{{$i}}" class="col-xs-9 cont"
                         style="padding: 0px; padding-left: 5px; text-align: justify;">
                        <a href="{{ route('propositie.show', ['id' => $propo->id]) }}"><h4>{{$propo->pro_name}}</h4></a>
                        <div class="col-xs-8" style="padding: 0;">
                            <div class="hidden-xs">{!! highlight($propo->pro_description, $keyword, 'yellow')!!}</div>
                        {{--<span class="peep" data-text="{{$propo->pro_description}}">--}}
                            {{--<div class="hidden-xs">{!! highlight($propo->pro_description, $keyword, 'yellow')!!}</div>--}}
                            {{--substr($propo->pro_description, 0, 40)--}}
                            {{--<div class="visible-xs">{{substr($propo->pro_description, 0, 20)}}</div>--}}
                        {{--</span>--}}
                        </div>
                        {{--<div>&nbsp;</div>--}}
                        {{--<div class="col-xs-1 col-xs-offset-3" style="background-color: lightblue; padding: 0; color: green; text-align: right; display: block; float: right; top: 80%; right: 5px;">--}}
                        {{--<i class="fa fa-chevron-right"></i>--}}
                        {{--</div>--}}

                        {{--<span class="complete_desc">{{$propo->pro_description}}</span>--}}
                        {{--<span class="more" onclick="toggleMore('{{$i}}', '{{$propo->pro_description}}')">meer...</span>--}}
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-9 col-xs-offset-3 details">
                            CONTACTPERSOON: {{$propo->user->first_name .' '. $propo->user->last_name}}
                            | AANGEMAAKT OP: {{formatDateOnly($propo->created_at)}}
                        </div>
                    </div>

                </div>
            @endforeach


        </div>


    </div>

    <script>

        $(document).ready(function(){
            //Prevent search with empty field on this page using Enter
            $('#result_searchbox').keypress(function (e) {
                if(e.which == 13)
                {
                    e.preventDefault();
                    var val = $('#checkVal').val();
                    if(val != '')
                    {
                        $('#result_searchbox').submit();
                    }
                }
            })
            //Prevent search with empty field on this page using search button
            $('#sendQuery').click(function () {
                var val = $('#checkVal').val();
                if(val != '')
                {
                    $('#result_searchbox').submit();
                }
            });
        })


        var h = $('.cont')[0].scrollHeight;

        $('.peep').click(function () {
            var oldText = $(this).text();
            var newText = $(this).data('text');
            $(this).text(newText).data('text', oldText);

        });

        //$(document).click(function () {
        //    $('.peep').animate({
        //        'width': 300
        //    })
        //})


        //        $(".more").toggle(function(){
        //            $(this).text("minder..").siblings(".complete_desc").show();
        //        }, function(){
        //            $(this).text("meer..").siblings(".complete_desc").hide();
        //        });

        function toggleMore(id, content) {
            container = $('#' + id);
            var h = $('#' + id)[0].scrollHeight;
//    alert(content);

            $('#' + id).next('span').html(content);


//        e.stopPropagation();
            $('#' + id).animate({
                'height': h
            })

        }

        //var h = $('div')[0].scrollHeight;

        //$('.more').click(function (e) {
        //    e.stopPropagation();
        //    $('div').animate({
        //        'height': h
        //    })
        //});

        //$(document).click(function () {
        //    $('div').animate({
        //        'height': '50px'
        //    })
        //})
    </script>

@endsection

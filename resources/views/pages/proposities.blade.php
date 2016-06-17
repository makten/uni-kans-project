@extends('layouts.master')

@section('content')
    @include('pages.searchform')

    <div class="col-sm-10 col-sm-offset-1"
         style="box-shadow: 0 0 2px 2px #e9e9e9; border-radius: 3px; padding: 5px; margin-bottom: 5px;">


        <div class="col-xs-12" style="padding: 0;">

            @foreach($proposities as $i => $prop)

                <div class="col-xs-12"
                     style="padding: 0; margin-bottom: 10px;  border-top: 1px solid #ededed; border-bottom: 1px solid #ededed; position: relative;">

                    <div class="col-xs-3" style="padding: 0;">
                        <img src="{{str_replace(public_path(), '', $prop->pro_avatar)}}"/>
                    </div>


                    <div class="col-xs-9" style="padding: 0; margin-bottom: 15px;">

                    <div id="{{$i}}" class="col-xs-12 cont">

                        <a href="{{ route('propositie.show', ['id' => $prop->id]) }}"><h4>{{$prop->pro_name}}</h4>
                        </a>

                            <div class="visible-xs" style="padding-bottom: 25px; margin-bottom: 10px;">{!!substr($prop->pro_description, 0, 250) !!}....</div>
                            <div class="hidden-xs" style="padding-bottom: 25px; margin-bottom: 10px;">{!!substr($prop->pro_description, 0, 400) !!}....</div>

                    </div>




                    </div>
                    {{--<hr/>--}}

                    <div class="col-xs-9 details cus">

                        <span>{{$prop->pro_themas}}</span> | <span>{{$prop->pro_marktsegmenten}}</span>
                        <hr/>
                           <span>
                              <i title="Contactpersoon" id="basic-addon1"  class="addon right fa fa-user"></i> :
                               {{$prop->user->first_name .' '. $prop->user->last_name}}
                               | <i title="Aangemaakt datum" id="basic-addon1"  class="addon right fa fa-clock-o"></i> :
                               {{formatDateOnly($prop->created_at)}}
                            </span>
                    </div>


                </div>
            @endforeach
            {!! $proposities->render()!!}

        </div>


    </div>

    <script>

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

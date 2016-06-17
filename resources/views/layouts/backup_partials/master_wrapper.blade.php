@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="col-xs-12" style="box-shadow: 0 0 2px 2px #e9e9e9; border-radius: 3px; padding: 5px; margin-bottom: 5px;">


    {{-- Sidebar area --}}
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12" style="padding: 2px;">


        <h4>Team</h4>

        <div class="col-md-12 col-xs-12 team_container" style="padding: 2px;"> {{--Team continer--}}
            @foreach($teamMembers as $member)
                <a href="#">
                    <img id="profile-img" class="xs_screen visible-xs visible-sm"
                         src="{{str_replace(public_path(), '', $member->avatar)}}"/>

                    <div class="col-md-12 mem_profile hidden-xs hidden-sm"
                         style="border-radius: 10px; padding: 0; margin-bottom: 5px;">
                        <div class="col-xs-3">
                            <img src="{{str_replace(public_path(), '', $member->avatar)}}" alt="teamlid_profile_foto"
                                 class="profile"/>
                        </div>

                        <div class="col-xs-9" style="">
                            <h4>{{$member->first_name . ' '. $member->last_name }}
                                <span>Team Lead</span>
                                <span>{{$member->email}}</span>
                            </h4>
                        </div>
                    </div>
            @endforeach
        </div>{{--End Team continer--}}


        <div class="hidden-xs hidden-sm col-md-12 col-xs-12 team_container" style="margin-top: 20px;">

            <div class="col-md-12" style="border-radius: 10px; margin-bottom: 5px;">
                <a href="/"><i class="fa fa-group"></i> Word lid van het team </a><br/>
                <a href="/"><i class="fa fa-leanpub"></i> Word coach van het team </a><br/>
            </div>
        </div>
        <br/>

        <div class="hidden-xs  hidden-sm col-md-12 col-xs-12 team_container"
             style="margin-top: 20px; background-color: #f0f0f0;">

            <div class="col-md-12" style="border-radius: 10px; margin-bottom: 5px;">

                <a href="propositie/{{ $prop->id }}#tab3"
                   onclick=" $('#reacties_tab').addClass('active'); $('#beschrijving_tab, #documenten_tab').removeClass('active')"
                   data-toggle="tab"><i class="fa fa-comment"></i> Reageer </a><br/>
                <a href="#"><i class="fa fa-info-circle"></i> Volg </a><br/>
                <a href="#"><i class="fa fa-envelope"></i> Stuur door </a><br/>
                <a href="#"><i class="fa fa-star"></i> Rate </a><br/>

            </div>
        </div>
    </div> {{--End of sidebar--}}



    {{--Content area--}}
    <div class="col-md-9 col-xs-12" style="padding: 2px;">

        <div class="hidden-xs project_header col-xs-12"
             style="padding-left: 0; background-color: #f0f0f0; margin-bottom: 5px; border-radius: 0 15px 0 0">
            <div class="col-xs-12 col-sm-4" style="padding-left: 0px;">
                <img src="{{str_replace(public_path(), '', $prop->pro_avatar)}}" alt="propositie_foto"
                     style="width: 100%; height: 80%;">
            </div>
            <div class="hidden-xs col-sm-8 headerText">
                {{--<div class="center-div center" style="margin-top: 20%;">--}}
                <span>{{$prop->pro_name}}</span>
                {{--</div>--}}
            </div>

        </div>

        <div class="visible-xs col-xs-12"
             style="padding-left: 0; padding-right: 0; background-color: #f0f0f0; margin-bottom: 5px; border-radius: 0 0px 0 0">
            <img src="{{str_replace(public_path(), '', $prop->pro_avatar)}}" alt="propositie_foto" style="width: 100%;">
        </div>


        <ul class="nav nav-tabs directory">
            <li id="beschrijving_tab" class="active hidden-xs">
                <a href="#tab1" data-toggle="tab"><i class="fa fa-book"></i> <strong>Beschrijving</strong></a>
            </li>
            <li class="active">
                <a href="#tab1" data-toggle="tab" class="visible-xs"><i class="fa fa-book fa-2x"></i></a>
            </li>

            <li id="documenten_tab"><a href="#tab2" data-toggle="tab" class="hidden-xs"><i class="fa fa-file-text"></i>
                    <strong>Documenten</strong></a></li>
            <li><a href="#tab2" data-toggle="tab" class="visible-xs"><i class="fa fa-file-text fa-2x"></i></a></li>

            <li id="reacties_tab"><a href="#tab3" data-toggle="tab" class="hidden-xs"><i class="fa fa-comments"></i>
                    <strong>Reacties</strong></a></li>
            <li><a href="#tab3" data-toggle="tab" class="visible-xs"><i class="fa fa-comments fa-2x"></i></a></li>
        </ul>


        <div class="tab-content" style="padding-left: -10px;">

            <div class="tab-pane active" id="tab1">

                <div class="col-lg-12" style="border-radius: 5px 5px 0 0">
                    <div class="col-md-2">
                        <h4>Naam:</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            {!! $prop->pro_name !!}
                        </p>
                        <hr/>
                    </div>

                    <div class="col-md-2">
                        <h4>Status</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            {!! $prop->pro_status !!}
                        </p>
                        <hr/>
                    </div>


                    <div class="col-md-2">
                        <h4>Beschrijving:</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            {!! $prop->pro_description !!}
                        </p>
                        <hr/>

                    </div>


                    <div class="col-md-2">
                        <h4>Markten:</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            {!! $prop->pro_marktsegmenten !!}
                        </p>
                        <hr/>
                    </div>

                    <div class="col-md-2">
                        <h4>Contactpersoon:</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            {!! $prop->user->first_name .' '. $prop->user->last_name  !!}
                        </p>
                        <hr/>
                    </div>

                    <div class="col-md-2">
                        <h4>Uniek:</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            {!! $prop->pro_uniek !!}
                        </p>
                        <hr/>
                    </div>

                    <div class="col-md-2">
                        <h4>Revenuen:</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            {!! $prop->pro_revenuen !!}
                        </p>
                        <hr/>
                    </div>

                    <div class="col-md-2">
                        <h4>Thema's:</h4>
                    </div>
                    <div class="col-md-10" style="padding-top: 10px; text-align: justify;">
                        <p>
                            <?php $out = []; ?>
                            @foreach($prop->themas as $thema)
                            <?php array_push($out, $thema->thema_name) ?>
                            @endforeach
                            {!! implode('<strong>, </strong>', $out)!!}
                        <hr/>
                    </div>


                    {{-- Sidebar replacement on mobile screens--}}
                    <div class="visible-xs visible-sm col-xs-12"
                         style="margin-top: 20px; margin-bottom: 3px; border-radius: 3px; background-color: #f0f0f0; ">

                        <div class="col-md-12" style="margin-bottom: 5px;">
                            <a href="#"><i class="fa fa-group"></i> Word lid van het team </a><br/>
                            <a href="#"><i class="fa fa-leanpub"></i> Word coach van het team </a><br/>
                        </div>


                        <div class="col-md-12">

                            <a href="#"><i class="fa fa-comment"></i> Reageer </a><br/>
                            <a href="#"><i class="fa fa-info-circle"></i> Volg </a><br/>
                            <a href="#"><i class="fa fa-envelope"></i> Stuur door </a><br/>
                            <a href="#"><i class="fa fa-star"></i> Rate </a>

                        </div>
                    </div> {{-- End Sidebar replacement on mobile screens--}}


                    {{--Info Footer--}}
                    <div class="col-xs-12" style="background-color: #f0f0f0; border-radius: 3px;">
                        <div class="col-xs-6"><i class="fa fa-clock-o">
                            </i> <span
                                    style="font-size: 11px; font-family: Monaco, Consolas, Lucida Console, dejavu sans mono, monospace"> Aangemaakt op: {!! formatDateOnly($prop->created_at) !!} </span>
                            <br>
                            <i class="fa fa-clock-o"></i>
                            <span style="font-size: 11px; font-family: Monaco, Consolas, Lucida Console, dejavu sans mono, monospace">Gewijzigd op: {!! formatDateOnly($prop->updated_at) !!}</span>
                        </div>

                        <div class="col-xs-2" style="padding-top: 10px;"><i class="fa fa-eye"></i> 2</div>
                        <div class="col-xs-2" style="padding-top: 10px;"><i
                                    class="fa fa-group"></i> {!! count($teamMembers) !!}</div>
                        <div class="col-xs-2" style="padding-top: 10px;"><i class="fa fa-comments"></i> 14</div>
                    </div> {{--End Info Footer--}}

                </div>

            </div>


            <div class="tab-pane" id="tab2">{{--Documenten tab--}}
                <div class="col-xs-12">

                    <div class="col-sm-6" style="padding-top: 10px; text-align: justify;">
                        <h4 style="color: #8ab524;">SALES TOOLKIT</h4>
                        <span><i class="fa fa-file-pdf-o"></i> <a
                                    href="{{str_replace(public_path(), '', $prop->pro_saleskit)}}">Sales toolkit
                                document</a></span>
                    </div>

                    <div class="col-sm-6" style="padding-top: 10px; text-align: justify;">

                        <h4 style="color: #8ab524;">MARKTINFORMATIE</h4>
                        <span><i class="fa fa-file-word-o"></i> <a
                                    href="{{str_replace(public_path(), '', $prop->pro_marktinfo)}}">Marktinfo
                                document</a></span>
                        <hr/>
                    </div>

                    <div class="col-sm-6" style="padding-top: 10px; text-align: justify;">
                        <h4 style="color: #8ab524;">TECHNISCHE DOCUMENT</h4>
                        <span><i class="fa fa-file-pdf-o"></i> <a
                                    href="{{str_replace(public_path(), '', $prop->pro_technical_doc)}}">Technische
                                document</a></span>
                    </div>

                </div>

            </div>{{--End Documenten tab--}}


            <div class="tab-pane" id="tab3" style="background-color: #f7f5ee; padding: 5px;">{{--Reacties tab--}}
                <br/>

                @if($prop->reacties->count())
                    <ul class="media-list">
                        <li>{!! dumpComments($prop->nestedReacties)!!}</li>
                    </ul>
                @endif

                {!! Form::open(['route' => 'comment.store', 'class' => 'form-vertical', 'id' => $prop->id .'_'. $prop->pro_slug]) !!}
                {{--{!! Form::open(['route' => 'comment.store', 'class' => 'form-vertical', 'id' => 'CommentForm']) !!}--}}
                <div class="col-sm-10 col-sm-offset-1" style="margin-top: 10px;">
                                <textarea name="message" class="form-control send-message" rows="3"
                                          placeholder="Schrijf uw bericht hier..."></textarea>
                    {{Form::hidden('propositie_id', $prop->id)}}
                    <div class="btn-panel">
                        <a type="button" id="refresh" class="col-lg-4 btn text-right send-message-btn pull-right"
                           role="button" onclick="sendComment('{{$prop->id .'_'. $prop->pro_slug}}')"><i class="fa fa-plus"></i> Reageer</a>
                        {{--<button type="submit" id="refresh" class="col-lg-4 btn text-right send-message-btn pull-right"--}}
                           {{--role="button" onclick="sendComment()"><i class="fa fa-plus"></i> Reageer</button>--}}
                    </div>
                </div>
                {{Form::close()}}


            </div>

        </div>{{--End Reacties tab--}}


    </div>


</div> {{--End of content--}}

</div>


@include('layouts.backup_partials.dashboard_foot')

<script>

    function sendComment($form)
    {
//        var options = {
//            target:        '/comment',   // target element(s) to be updated with server response
//            beforeSubmit:  showRequest,  // pre-submit callback
////            success:       showResponse  // post-submit callback
//
//            // other available options:
//            //url:       url         // override for form's 'action' attribute
//            //type:      type        // 'get' or 'post', override for form's 'method' attribute
//            //dataType:  null        // 'xml', 'script', or 'json' (expected server response type)
//            //clearForm: true        // clear all form fields after successful submit
//            //resetForm: true        // reset the form after successful submit
//
//            // $.ajax options can be used here too, for example:
//            //timeout:   3000
//        };
//        // bind 'myForm' and provide a simple callback function
//            $('#CommentForm').ajaxForm(function() {
//                alert("Thank you for your comment!");
//            });

        $('#'+$form).submit();
    }


    // pre-submit callback
    function showRequest(formData, jqForm, options) {
        // formData is an array; here we use $.param to convert it to a string to display it
        // but the form plugin does this for you automatically when it submits the data
        var queryString = $.param(formData);

        // jqForm is a jQuery object encapsulating the form element.  To access the
        // DOM element for the form do this:
        // var formElement = jqForm[0];

        alert('About to submit: \n\n' + queryString);

        // here we could return false to prevent the form from being submitted;
        // returning anything other than false will allow the form submit to continue
        return true;
    }

    // post-submit callback
    function showResponse(responseText, statusText, xhr, $form)  {
        // for normal html responses, the first argument to the success callback
        // is the XMLHttpRequest object's responseText property

        // if the ajaxForm method was passed an Options Object with the dataType
        // property set to 'xml' then the first argument to the success callback
        // is the XMLHttpRequest object's responseXML property

        // if the ajaxForm method was passed an Options Object with the dataType
        // property set to 'json' then the first argument to the success callback
        // is the json data object returned by the server

        alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
                '\n\nThe output div should have already been updated with the responseText.');
    }

    $(document).ready(function () {
        if (window.location.hash == '#tab1') {
            $('#reacties_tab').removeClass('active');
            $('#documenten_tab').removeClass('active');
            $('#beschrijving_tab').addClass('active');
        }
        if (window.location.hash == '#tab2') {
            $('#reacties_tab').removeClass('active');
            $('#documenten_tab').addClass('active');
            $('#beschrijving_tab').removeClass('active');
        }
        if (window.location.hash == '#tab3') {
            $('#reacties_tab').addClass('active');
            $('#documenten_tab').removeClass('active');
            $('#beschrijving_tab').removeClass('active');
        }
    })

    // Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
        $('.directory a[href="#' + url.split('#')[1] + '"]').tab('show');

    }

    // Change hash for page-reload
    $('.directory a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
        window.scrollTo(0, 0);
    })

    $('#refresh').click(function () {
//        alert('yo');
        $.ajax({
            url: 'http://192.168.178.10/test',
            type: "GET",
            cache: false,
            success: function (response) {
                var data = jQuery.map(Object.keys(response), function (k) {
                    return response[k]
                });

                $('#chatBox').prepend(
                        '<div class="col-xs-12"> <div class="col-md-4">' +
                        '<div class="col-md-12 mem_profile" style="border-radius: 10px; padding: 0; margin-bottom: 5px; background-color: transparent; color: black;">' +
                        '<div class="col-xs-3"><img src="/images/logos/Me.jpg" alt="profile-sample1" class="profile"/></div>' +
                        '<div class="col-xs-9"> ' +
                        '<h4>{{Auth::user()->first_name . " ". Auth::user()->last_name }}<span>Team Lead</span> <span>{{Auth::user()->last_login}}</span> </h4> </div>' +
                        '</div></div> <div class="col-md-8" style="padding-top: 10px; text-align: justify;"> <p>' + response + '</p> <hr/> </div></div>'
                );

            }
        });
    });


    $("#stock_stat").chosen({
        disable_search_threshold: 5,
        no_results_text: "Oops, niets gevonden!",
        width: "95%"
    });

    //Tooltip popups
    $(".top").tooltip({
        placement: "top"
    });
    $(".right").tooltip({
        placement: "right"
    });
    $(".bottom").tooltip({
        placement: "bottom"
    });
    $(".left").tooltip({
        placement: "left"
    });


    $('#verstuurData').keypress(function (e) {
        if (e.which == 13) {
            return false;
        }

    });

    $('#edit_user .permissions').bootstrapSwitch();

    $("#edit_user #user_role").chosen({
        disable_search_threshold: 5,
        no_results_text: "Oops, niets gevonden!",
        width: "95%"
    });

    $('#showHideNewCat').click(function () {
        $('#addNewCat').toggle(300);
    })


    $('#toggleSalesField').click(function () {
        $('#sale_date_div').toggle(300);

        if ($('#sale_date_div').not(':visible')) {
            $('#sale_date_from, #sale_date_till').val('');

        }


        $(this).text(function (i, text) {
            return text === "Cancel" ? "Schedule" : "Cancel";
        })
    })


    // Show hide menu items
    //
    $('#btn_general, #btn_generalb').click(function () {
        $('#sec_general').show(200);
        $('#sec_inventory').hide();
        $('#sec_delivery').hide();
        $('#sec_payment').hide();
        $('#sec_extra').hide();
    })

    $('#btn_inventory, #btn_inventoryb').click(function () {
        $('#sec_general').hide();
        $('#sec_inventory').show(200);
        $('#sec_delivery').hide();
        $('#sec_payment').hide();
        $('#sec_extra').hide();
    })

    $('#btn_delivery, #btn_deliveryb').click(function () {
        $('#sec_general').hide();
        $('#sec_inventory').hide();
        $('#sec_delivery').show(200);
        $('#sec_payment').hide();
        $('#sec_extra').hide();
    })

    $('#btn_payment, #btn_paymentb').click(function () {
        $('#sec_general').hide();
        $('#sec_inventory').hide();
        $('#sec_delivery').hide();
        $('#sec_payment').show(200);
        $('#sec_extra').hide();
    })

    $('#btn_extra, #btn_extrab').click(function () {
        $('#sec_general').hide();
        $('#sec_inventory').hide();
        $('#sec_delivery').hide();
        $('#sec_payment').hide();
        $('#sec_extra').show(200);
    })
</script>



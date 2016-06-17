@extends('layouts.dashboardmaster')

@section('content')
    @include('auth.register_form')
    @include('auth.addclient')
    @include('auth.role_form')
    @include('administration.content.create_propositieteam')




    <div class="col-sm-2 col-md-2 sidebar-offcanvas adminTools" id="sidebar" role="navigation">

        <ul class="nav nav-sidebar" style="color: white; margin-top: 60px;">

            <div class="hidden-xs admin-profilecard">

                <center>

                    @if(Auth::check())
                        <figure class="profile-fig">
                            <img id="profile-img" class="profile-img-card"
                                 src="{{str_replace(public_path(), '', Auth::user()->avatar)}}"/>

                            <h4 style="color: white; padding: 2px;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                            <p class="hidden-xs" style="color: white; padding: 2px;"> {{ Auth::user()->email }}</p>
                        </figure>
                    @else
                        <figure class="snip1344">
                            <img id="profile-img" class="profile-img-card"
                                 src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
                        </figure>
                    @endif

                </center>

            </div>

            </li>

            <li>
                <a href="/dashboard"><i class="fa fa-list"></i> &nbsp; Overview</a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#addUserModal" data-whatever="@mdo">
                    <i class="fa fa-user"></i> &nbsp; Propositielid toev.
                </a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#addClientModal">
                    <i class="fa fa-building"></i> &nbsp; Add client
                </a>
                {{--<a class="visible-xs" href="#" data-toggle="modal" data-target="#addClientModal">--}}
                {{--<i class="fa fa-building"></i>--}}
                {{--</a>--}}
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#addRoleModal">
                    <i class="fa fa-rocket"></i> &nbsp; Add Role
                </a>
                {{--<a class="visible-xs" href="#" data-toggle="modal" data-target="#addRoleModal">--}}
                {{--<i class="fa fa-rocket"></i>--}}
                {{--</a>--}}
            </li>
            <li class="active">
                <a href="{{ url('/addProduct') }}">
                    <i class="fa fa-cart-plus"></i> &nbsp; Propositie toevoegen
                </a>
                {{--<a class="visible-xs" href="{{ url('/addProduct') }}">--}}
                {{--<i class="fa fa-cart-plus"></i>--}}
                {{--</a>--}}
            </li>

            @if (Auth::guest())
                <li><a class="hidden-xs" href="{{ url('/login') }}">Login</a></li>
            @else
                <li><a class="hidden-xs" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
                </li>
            @endif

        </ul>


    </div><!--/span-->

    <div class="col-sm-10 col-md-10 main" style="margin-top: 40px;">

        <!--toggle sidebar button-->
        <p class="visible-xs">
            <button id="menu-toggle" type="button" class="btn btn-success btn-xs" data-toggle="offcanvas"><i
                        class="fa fa-arrows-h"></i></button>
        </p>
        <hr>


        <h2 class="sub-header"><i class="fa fa-gear"></i> NIEUW PROPOSITIE</h2>
        <hr/>
        <div class="table-responsive" style="border-radius: 5px; padding: 5px;">
            <h4 style="margin-bottom: 1px;"><i class="fa fa-plus-square"></i> Algemeen informatie</h4>
            <hr/>

            <fieldset class="col-xs-12">

                @if(isset($propositie))
                    {!! Form::model($propositie, array('url' => URL::to('/admin/propositie') . '/' . $propositie->id .'/update', 'method' => 'put', 'id' => 'propositie_form', 'class' => 'form-vertical', 'files'=> true)) !!}
                @else
                    {!! Form::open(['route' => 'propositie.store', 'class' => 'form-vertical', 'id' => 'propositie_form', 'files'=> true]) !!}
                @endif


                <div class="col-xs-12 col-md-10 form-group">
                    <div class="form-group{{ $errors->has('pro_name') ? ' has-error' : '' }}">
                        {!! Form::label('pro_name', 'Naam', array()) !!}
                        {!! Form::text('pro_name', old('pro_name'), array('class' => 'form-control input-sm input-sm')) !!}
                        @if ($errors->has('pro_name'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-md-10 form-group">
                    <div class="form-group{{ $errors->has('pro_slug') ? ' has-error' : '' }}">
                        {!! Form::label('pro_slug', 'Slug', array()) !!}<span> <i
                                    title="Dit is een naam om deze propositie unique te maken" id="basic-addon1"
                                    class="addon right fa fa-info-circle"></i></span>
                        {!! Form::text('pro_slug', old('pro_slug'), array('class' => 'form-control input-sm')) !!}
                        @if ($errors->has('pro_slug'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_slug') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-md-10 form-group">
                    <div class="form-group{{ $errors->has('pro_description') ? ' has-error' : '' }}">
                        {!! Form::label('pro_description', 'Beschrijving', array()) !!}
                        {!! Form::textarea('pro_description', old('pro_description'), array('class' => 'form-control input-sm')) !!}
                        @if ($errors->has('pro_description'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-md-10 form-group">
                    <div class="form-group{{ $errors->has('pro_status') ? ' has-error' : '' }}">
                        {!! Form::label('pro_status', 'Status', array()) !!}
                        {!! Form::select('pro_status', ['In progress' => 'In progress', 'In pilot' => 'In pilot', 'Roll-out' => 'Roll-out', 'Definitief' => 'Definitief'], ['class' =>'form-control input-sm', 'required']) !!}
                        @if ($errors->has('pro_status'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-md-10 form-group">
                    <div class="form-group{{ $errors->has('pro_avatar') ? ' has-error' : '' }}">
                        {!! Form::label('pro_avatar', 'Foto', array('class' => 'control-label')) !!}
                        {{ Form::file('pro_avatar', ['class' => 'file input-xs', 'multiple data-show-upload' => 'false', 'data-show-caption' => 'true', 'id' => 'propositie_avatar']) }}
                        @if ($errors->has('pro_avatar'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_avatar') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="col-xs-12">
                    <br/>
                    <h4 style="margin-bottom: 1px;"><i class="fa fa-plus-square"></i> DOCUMENTEN</h4>
                    <hr/>
                </div>

                <fieldset class="scheduler-border col-md-10">

                    <div class="control-group">
                        <div class="control col-md-4">
                            {!! Form::label('pro_saleskit', 'Sales Toolkit', array('class' => 'control-label doc-label')) !!}
                            <sub style="color: grey; font-size: 9px;"> (Max. 2MB)</sub>
                            {{ Form::file('pro_saleskit', ['class' => 'file input-xs', 'multiple data-show-upload' => 'false', 'data-show-caption' => 'true', 'id' => 'doc_saleskit']) }}
                        </div>

                        <div class="control col-md-4">
                            {!! Form::label('pro_marktinfo', 'Marktinformatie', array('class' => 'control-label doc-label')) !!}
                            <sub style="color: grey; font-size: 9px;"> (Max. 2MB)</sub>
                            {{ Form::file('pro_marktinfo', ['class' => 'file input-xs', 'multiple data-show-upload' => 'false', 'data-show-caption' => 'true', 'id' => 'doc_marktinfo']) }}
                        </div>
                        <div class="control col-md-4">
                            {!! Form::label('pro_technical_doc', 'Marktinformatie', array('class' => 'control-label doc-label')) !!}
                            <sub style="color: grey; font-size: 9px;"> (Max. 2MB)</sub>
                            {{ Form::file('pro_technical_doc', ['class' => 'file input-xs', 'multiple data-show-upload' => 'false', 'data-show-caption' => 'true', 'id' => 'doc_technical_doc']) }}

                        </div>

                    </div>

                </fieldset>

            </fieldset>

            <div class="col-xs-12">
                <br/>
                <h4 style="margin-bottom: 1px;"><i class="fa fa-plus-square"></i> Propositie group</h4>
                <hr/>
            </div>


            <fieldset class="scheduler-border col-md-10">
                <legend class="scheduler-border">Marktsegment</legend>
                <div class="control-group">
                    <div class="form-group{{ $errors->has('pro_marktsegmenten') ? ' has-error' : '' }}">
                        <div class="controls col-md-4">
                            @if(isset($editMarkt))

                                @foreach($marktsegmenten as $markt)
                                    @if(in_array($markt, $editMarkt))
                                        <label class="checkbox">
                                            {{Form::checkbox('pro_marktsegmenten[]', $markt, 1)}}
                                            {{$markt}}
                                        </label>
                                    @else
                                        <label class="checkbox">
                                            {{Form::checkbox('pro_marktsegmenten[]', $markt, 0)}}
                                            {{$markt}}
                                        </label>
                                    @endif
                                @endforeach
                            @else
                                @foreach($marktsegmenten as $markt)
                                    <label class="checkbox">
                                        {{Form::checkbox('pro_marktsegmenten[]', $markt)}}
                                        {{$markt}}
                                    </label>
                                @endforeach
                            @endif

                        </div>
                        @if ($errors->has('pro_marktsegmenten'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_marktsegmenten') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
            </fieldset>


            <fieldset class="scheduler-border col-md-10">
                <legend class="scheduler-border">Thema</legend>
                <div class="control-group">

                    <div class="form-group{{ $errors->has('pro_themas') ? ' has-error' : '' }}">
                        <div class="controls col-md-3">

                            @if(isset($editThemas))

                                @foreach($themas as $thema)
                                    @if(in_array($thema, $editThemas))
                                        <label class="checkbox">
                                            {{Form::checkbox('pro_themas[]', $thema, 1)}}
                                            {{$thema}}
                                        </label>
                                    @else
                                        <label class="checkbox">
                                            {{Form::checkbox('pro_themas[]', $thema, 0)}}
                                            {{$thema}}
                                        </label>
                                    @endif
                                @endforeach
                            @else
                                @foreach($themas as $thema)
                                    <label class="checkbox">
                                        {{Form::checkbox('pro_themas[]', $thema)}}
                                        {{$thema}}
                                    </label>
                                @endforeach
                            @endif

                            @if ($errors->has('pro_themas'))
                                <span class="help-block">
                               <strong>{{ $errors->first('pro_themas') }}</strong>
                            </span>
                            @endif
                        </div>


                    </div>
                </div>
            </fieldset>

            <div class="col-xs-12">
                <br/>
                <h4 style="margin-bottom: 1px;"><i class="fa fa-plus-square"></i> Aanvullende Informatie</h4>
                <hr/>
            </div>

            <fieldset class="col-xs-12">
                <div class="col-xs-12 col-md-10 form-group">
                    <div class="form-group{{ $errors->has('pro_uniek') ? ' has-error' : '' }}">
                        {!! Form::label('pro_uniek', 'Uniek', array()) !!}
                        {!! Form::textarea('pro_uniek', old('pro_uniek'), array('class' => 'form-control input-sm', 'rows'=>'3')) !!}
                        @if ($errors->has('pro_uniek'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_uniek') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-md-10 form-group">
                    <div class="form-group{{ $errors->has('pro_revenuen') ? ' has-error' : '' }}">
                        {!! Form::label('pro_revenuen', 'Revenuen', array()) !!}
                        {!! Form::text('pro_revenuen', old('pro_revenuen'), array('class' => 'form-control input-sm')) !!}
                        @if ($errors->has('pro_revenuen'))
                            <span class="help-block">
                               <strong>{{ $errors->first('pro_revenuen') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </fieldset>


            <div class="col-xs-12">
                <br/>
                <h4 style="margin-bottom: 1px;"><i class="fa fa-plus-square"></i> Extra</h4>
                <hr/>
            </div>

            <fieldset class="scheduler-border col-md-10">
                <legend class="scheduler-border">References</legend>
                <div class="control-group">
                    <div class="control col-md-5">
                        <div class="addMore" style="margin: 5px;">
                            <button id="add" class="btn btn-success btn-xs" type="button"> +</button>
                        </div>
                        <div id="items">
                            <div class="controls form-group">
                                {!! Form::text('pro_references[]', old('pro_references[]'), array('class' => 'form-control input-sm', 'placeholder' => 'http://')) !!}
                            </div>
                        </div>
                    </div>
                </div>

            </fieldset>
            {{--<center>--}}
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                {{--{!! Form::submit(' Opslaan ',['class'=>'btn btn-primary', 'style'=>'padding-left: 100px; padding-right: 100px;']) !!}--}}
            </div>
            {{--</center>--}}


            {!! Form::close() !!}

        </div>

    </div><!--/row-->

    <script>
        $(document).ready(function () {
            $('[data-toggle=offcanvas]').click(function () {
                $('.row-offcanvas').toggleClass('active');
            });


            $("#add").click(function (e) {
                $("#items").append('<div class="form-group"><button type="button" class="btn btn-danger btn-xs delete" > - </button>{!! Form::text("pro_references[]", old("pro_references"), array("class" => "input-sm form-control input-sm", "placeholder" => "http://")) !!}</div>');
            });


            // FORM VALIDATOR --------------------------------------------------------
            $('#test-').bootstrapValidator({
                live: 'enabled',
                message: 'Dit is geen geldig invoer',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    pro_naam: {
                        validators: {
                            notEmpty: {
                                message: 'De naam veld is verplicht'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                // message: 'The username must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                // message: 'The username can only consist of alphabetical, number and underscore'
                            }
                        }
                    },
                    pro_slug: {
                        validators: {
                            notEmpty: {
                                message: 'Dit veld is verplicht'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                // message: 'The username must be more than 6 and less than 30 characters long'
                            },

                            // emailAddress: {
                            // message: 'The input is not a valid email address'
                            // }
                        }
                    }
                }

            })
        });

        $("body").on("click", ".delete", function (e) {
            $(this).parent("div").remove();
        });

        $("#propositie_avatar").fileinput(
                {
                    'showUpload': true,
                    'previewFileType': 'any',
                    browseLabel: "Bladeren..",
                    'showRemove': 'true',
                    'removeLabel': 'Verwijderen',
                    'removeClass': 'btn btn-danger',
                    allowedFileExtensions: ['png', 'jpg', 'jpeg'],
                    msgInvalidFileExtension: 'Ongeldig bestaand type "{name}". Alleen "{extensions}" bestaand typen zijn toegestaand',
                    maxFileSize: '2048',
                    msgSizeTooLarge: 'Bestaand "{name}" ({size} KB) is te groot! Max. bestaand grote is {maxSize} KB. Probeer met een andere bestaand!'


                });
        $("#doc_technical_doc").fileinput(
                {
                    'showUpload': true,
                    'previewFileType': 'any',
                    browseLabel: "Bladeren..",
                    'showRemove': 'true',
                    'removeLabel': 'Verwijderen',
                    'removeClass': 'btn btn-danger',
                    allowedFileExtensions: ['docx', 'doc', 'txt', 'pdf'],
                    msgInvalidFileExtension: 'Ongeldig bestaand type "{name}". Alleen "{extensions}" bestaand typen zijn toegestaand',
                    maxFileSize: '2048',
                    msgSizeTooLarge: 'Bestaand "{name}" ({size} KB) is te groot! Max. bestaand grote is {maxSize} KB. Probeer met een andere bestaand!'


                });

        $("#doc_marktinfo").fileinput(
                {
                    'showUpload': true,
                    'previewFileType': 'any',
                    browseLabel: "Bladeren..",
                    'showRemove': 'true',
                    'removeLabel': 'Verwijderen',
                    'removeClass': 'btn btn-danger',
                    allowedFileExtensions: ['docx', 'doc', 'txt', 'pdf'],
                    msgInvalidFileExtension: 'Ongeldig bestaand type "{name}". Alleen "{extensions}" bestaand typen zijn toegestaand',
                    maxFileSize: '2048',
                    msgSizeTooLarge: 'Bestaand "{name}" ({size} KB) is te groot! Max. bestaand grote is {maxSize} KB. Probeer met een andere bestaand!'


                });

        $("#doc_saleskit").fileinput(
                {
                    'showUpload': true,
                    'previewFileType': 'any',
                    browseLabel: "Bladeren..",
                    'showRemove': 'true',
                    'removeLabel': 'Verwijderen',
                    'removeClass': 'btn btn-danger',
                    allowedFileExtensions: ['docx', 'doc', 'txt', 'pdf'],
                    msgInvalidFileExtension: 'Ongeldig bestaand type "{name}". Alleen "{extensions}" bestaand typen zijn toegestaand',
                    resizeImage: true,
                    maxImageWidth: 200,
                    maxImageHeight: 200,
                    resizePreference: 'width'


                });




    </script>
@endsection


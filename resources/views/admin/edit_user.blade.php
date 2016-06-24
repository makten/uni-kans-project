@extends('layouts.dashboardmaster')

@section('main-content')
    {{--@include('auth.register_form')--}}
    {{--@include('auth.addclient')--}}
    {{--@include('auth.role_form')--}}
    {{--@include('administration.manage_user')--}}
    {{--@include('administration.manage_client')--}}
    {{--@include('administration.modals.user_link')--}}

    @include('layouts.partials.dashboard_wrapper')


    {!! Form::model($user, ['route'=>['user.assignRole', $user->id], 'id'=>'edit_user', 'class'=>'form-horizontal'] )!!}

    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">First Name</label>

        <div class="col-md-6">

            {!! Form::text('first_name', old('first_name'), ['class'=>'form-control input-md', 'readonly']) !!}

            @if ($errors->has('first_name'))
                <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Last Name</label>

        <div class="col-md-6">

            {!! Form::text('last_name', old('last_name'), ['class'=>'form-control input-md', 'readonly']) !!}

            @if ($errors->has('last_name'))
                <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            {!! Form::text('email', old('email'), ['class'=>'form-control input-md', 'readonly']) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Permissions</label>

        <div class="col-md-6">

            {{--@if($num_perms > 0)--}}

            <div class="table-responsive" style="font-size: 11px;">
                <table class="table">
                    <tr>
                        <th style="text-align: center; padding: 1px;">Create</th>
                        <th style="text-align: center; padding: 1px;">Edit</th>
                        {{--<th style="text-align: center; padding: 1px;">Edit</th>--}}
                        <th style="text-align: center; padding: 1px;">Delete</th>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 2px;">

                            @if(in_array('user.create', $perms))
                                <input name="permissions[]" type="checkbox" value='1'
                                       class="permissions" data-on-text="Allow" data-off-text="Deny"
                                       data-size="mini" checked/>
                            @else
                                <input name="permissions[]" type="checkbox" value='1'
                                       class="permissions" data-on-text="Allow" data-off-text="Deny"
                                       data-size="mini" />
                            @endif
                        </td>

                        <td style="text-align: center; padding: 2px;">
                            @if(in_array('user.edit', $perms))
                            <input name="permissions[]" type="checkbox" value='2'
                                   class="permissions" data-on-text="Allow" data-off-text="Deny"
                                   data-size="mini" checked/>
                            @else
                                <input name="permissions[]" type="checkbox" value='2'
                                       class="permissions" data-on-text="Allow" data-off-text="Deny"
                                       data-size="mini"/>
                            @endif
                        </td>

                        <td style="text-align: center; padding: 2px;">
                            @if(in_array('user.delete', $perms))
                            <input name="permissions[]" type="checkbox" value='3'
                                   class="permissions" data-on-text="Allow" data-off-text="Deny"
                                   data-size="mini" checked/>
                            @else
                                <input name="permissions[]" type="checkbox" value='3'
                                       class="permissions" data-on-text="Allow" data-off-text="Deny"
                                       data-size="mini"/>
                            @endif
                        </td>
                        {{--<td style="text-align: center; padding: 2px;">--}}
                            {{--<input name="permissions[]" type="checkbox" value='4'--}}
                                   {{--class="permissions" data-on-text="Allow" data-off-text="Deny"--}}
                                   {{--data-size="mini"/>--}}
                        {{--</td>--}}
                    </tr>
                </table>
            </div>

        {{--@endif--}}
        </div>

    </div>


    <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Role</label>

        <div class="col-md-2">
            {!!Form::select('user_role', getRoles(), old('user_role'), ['class'=>'form-controller', 'id'=>'user_role'])!!}

            @if ($errors->has('user_role'))
                <span class="help-block">
                            <strong>{{ $errors->first('user_role') }}</strong>
                        </span>
            @endif
        </div>
    </div>

    <div class="form-group">

        <div class="col-md-4 col-lg-offset-6">

            <button type="submit" class="btn btn-primary btn-xs">
                <i class="fa fa-btn fa-user"></i> Save
            </button>
        </div>
    </div>



    {!! Form::close() !!}

    @include('layouts.backup_partials.dashboard_foot')

    <script>
        $('#edit_user .permissions').bootstrapSwitch();

        $("#edit_user #user_role").chosen({
            disable_search_threshold: 5,
            no_results_text: "Oops, niets gevonden!",
            width: "95%"
        });
    </script>

@endsection




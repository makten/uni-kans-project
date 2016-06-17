<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal_bg">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addRoleLabel">New Role</h4>
            </div>
            <div class="modal-body modal_bg">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('role.store') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-xs-3 control-label">Name</label>

                        <div class="col-xs-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">Slug</label>

                        <div class="col-xs-6">
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">Description</label>

                        <div class="col-xs-6">
                            <textarea class="form-control" name="description"
                                      value="{{ old('description') }}"> </textarea>


                            @if ($errors->has('description'))
                                <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">Level</label>

                        <div class="col-xs-2">
                            {!!Form::select('level', getRolesLevel(), old('user_role'), ['class'=>'form-controller input-xs', 'id'=>'level'])!!}

                            @if ($errors->has('level'))
                                <span class="help-block">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
                        <label class="col-xs-3 control-label">Permissions</label>

                        <div class="table-responsive modal_bg" style="font-size: 11px;">
                            <table class="table">
                                <tr>
                                    <th style="text-align: center;">Add</th>
                                    <th style="text-align: center;">View</th>
                                    <th style="text-align: center;">Edit</th>
                                    <th style="text-align: center;">Delete</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="make-switch" data-on="info" data-off="success">
                                            <input name="permissions[]" type="checkbox" value='user.add'
                                                   class="permissions" data-on-text="Allow" data-off-text="Deny"
                                                   data-size="mini"/>
                                        </div>
                                    </td>
                                    <td>
                                        <input name="permissions[]" type="checkbox" value='user.view'
                                               class="permissions" data-on-text="Allow" data-off-text="Deny"
                                               data-size="mini"/>
                                    </td>
                                    <td>
                                        <input name="permissions[]" type="checkbox" value='user.edit'
                                               class="permissions" data-on-text="Allow" data-off-text="Deny"
                                               data-size="mini"/>
                                    </td>
                                    <td>
                                        <input name="permissions[]" type="checkbox" value='user.delete'
                                               class="permissions" data-on-text="Allow" data-off-text="Deny"
                                               data-size="mini"/>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
            </div>
            <div class="modal-footer modal_bg">
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-xs">
                    Add
                </button>
            </div>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#addUserModal').modal('show');
    @endif

    $('.permissions').bootstrapSwitch();

    $("#level").chosen({
        disable_search_threshold: 5,
        no_results_text: "Oops, niets gevonden!",
        width: "95%"
    });
</script>
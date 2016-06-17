<div class="modal fade" id="linkUserModal" tabindex="-1" role="dialog" aria-labelledby="linkUserLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header  modal_bg">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="linkUserLabel">New User</h4>
            </div>
            <div class="modal-body modal_bg">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('user.store') }}">
                    {!! csrf_field() !!}


                    <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Client ID</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs" id="client_id" name="client_id"
                                   value="{{ old('client_id') }}">

                            @if ($errors->has('client_id'))
                                <span class="help-block">
                            <strong>{{ $errors->first('client_id') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">First Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs" id="li_name" name="first_name"
                                   value="{{ old('first_name') }}">

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
                            <input type="text" class="form-control input-xs" name="last_name"
                                   value="{{ old('last_name') }}">

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
                            <input type="email" class="form-control input-xs" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control input-xs" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control input-xs" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>


            </div>
            <div class="modal-footer modal_bg">
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-xs">
                    <i class="fa fa-btn fa-user"></i> Register
                </button>
            </div>
        </div>
        </form>
    </div>
</div>


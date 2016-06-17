<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  modal_bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addClientLabel">New Client</h4>
      </div>
      <div class="modal-body modal_bg">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('client.store') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('c_kvk') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">KVK nr. *</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" id="c_kvk" name="c_kvk" value="{{ old('c_kvk') }}" required>

                    @if ($errors->has('kvk'))
                        <span class="help-block">
                            <strong>{{ $errors->first('c_kvk') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Name *</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="c_name" value="{{ old('c_name') }}" required>

                    @if ($errors->has('c_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('c_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('c_type') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Type</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="c_type" value="{{ old('c_type') }}">

                    @if ($errors->has('c_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('c_type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('c_postcode') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Postcode *</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="c_postcode" required>

                    @if ($errors->has('c_postcode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('c_postcode') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('c_street') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Street *</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="c_street" required>

                    @if ($errors->has('c_street'))
                        <span class="help-block">
                            <strong>{{ $errors->first('c_street') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('c_city') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">City *</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="c_city" required>

                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('c_city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- <div class="form-group"> --}}
                {{-- <div class="col-md-6 col-md-offset-4"> --}}
                    
                {{-- </div> --}}
            {{-- </div> --}}
        
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

<script type="text/javascript">
@if (count($errors) > 0)
    $('#addClientModal').modal('show');
@endif
</script>
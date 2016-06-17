<div class="hidden-xs">
    {!! Form::open(['route' => 'proposities.search', 'class' => 'form-horizontal', 'id' => 'search_form']) !!}

    <div class="input-group col-xs-4 col-xs-offset-8" style="margin-bottom: 30px;">
        {!! Form::text('keyword', old('keyword'), ['class' => 'form-control input-sm', 'placeholder' => 'Zoek....']) !!}
        <span class=" input-group-btn">
                        <button type="submit" class="btn btn-default btn-sm">Zoek</button>
                    </span>
    </div>
    {!! Form::close() !!}
</div>

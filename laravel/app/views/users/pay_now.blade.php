@if (Sentry::check())

{{ Form::open(array('route' => array('pay.now'), 'class' => 'form-horizontal')) }}

	{{ Form::hidden('entry_id', $entry->id) }}

	<div class="form-group">
        {{ Form::label('qty', 'Quantity', array('class' => 'col-lg-3 control-label')) }}
		<div class="col-lg-3">
			{{ Form::text('qty', null, array('class' => 'form-control')) }}
			{{ ($errors->has('qty') ? $errors->first('qty', '<span class="input-error">:message</span>') : '') }}
		</div>
    </div>

    <div class="form-group">
		<div class="col-lg-offset-3 col-lg-9">
			{{ Form::submit('Pay now!', array('class' => 'btn btn-success btn-large')) }}
		</div>
	</div>

{{ Form::close() }}

@else

<div class="form-group">
	<div class="col-lg-offset-3 col-lg-9">
		<a class="btn btn-success btn-large" href="{{ URL::route('admin.user.register') }}">Register</a>
	</div>
</div>

@endif
@if (Sentry::check())

	@if ($entry->remaining <= 0)

	<div class="alert alert-danger alert-block">
		<h4>No more jobs available for this offer</h4>
	</div>

	@else

	{{ Form::open(array('route' => array('pay.now'), 'class' => 'form-horizontal')) }}

		{{ Form::hidden('entry_id', $entry->id) }}	

		<h3>If you want this you can pay now:</h3>
		
		<div class="form-group">
	        {{ Form::label('demand', 'Quantity', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-3">
				{{ Form::text('demand', null, array('class' => 'form-control')) }}
				{{ ($errors->has('demand') ? $errors->first('demand', '<span class="input-error">:message</span>') : '') }}
			</div>
	    </div>

		<div class="form-group">
	        {{ Form::label('subject', 'Subject', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-6">
				{{ Form::text('subject', null, array('rows' => 3, 'class' => 'form-control')) }}
				{{ ($errors->has('subject') ? $errors->first('subject', '<span class="input-error block">:message</span>') : '') }}
			</div>
	    </div>

		<div class="form-group">
	        {{ Form::label('body', 'Message', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-6">
				{{ Form::textarea('body', null, array('rows' => 3, 'class' => 'form-control')) }}
				{{ ($errors->has('body') ? $errors->first('body', '<span class="input-error block">:message</span>') : '') }}
			</div>
	    </div>
		
	    <div class="form-group">
			<div class="col-lg-offset-3 col-lg-9">
				{{ Form::submit('Pay now!', array('class' => 'btn btn-success btn-large btn-disabled')) }}
			</div>
		</div>

	{{ Form::close() }}

	@endif

@else

<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>If you want to buy this please <a href="{{ URL::route('admin.user.login') }}">login</a> or <a href="{{ URL::route('admin.user.register') }}">register</a>.</h4>
	
</div>

@endif
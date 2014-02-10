@if (Sentry::check())

	{{ Form::open(array('route' => array('bid'), 'class' => 'form-horizontal')) }}

		{{ Form::hidden('entry_id', $entry->id) }}	

		<div class="form-group">
	        {{ Form::label('price', 'Quantity', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-3">
				{{ Form::text('price', null, array('class' => 'form-control')) }}
				{{ ($errors->has('price') ? $errors->first('price', '<span class="input-error">:message</span>') : '') }}
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
				{{ Form::submit('Bid now!', array('class' => 'btn btn-success btn-large btn-disabled')) }}
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
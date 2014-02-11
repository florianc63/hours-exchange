@extends('_layouts.default')

{{-- Web site Title --}}

@section('title')

@parent

{{ $user->first_name }} {{ $user->last_name }} Profile

@stop



{{-- Content --}}

@section('content')

	<h2>{{ $user->first_name }} {{ $user->last_name }}'s Profile</h2>

	<dl class="dl-horizontal">
		<dt>About me: </dt><dd>{{ $user->details->descr }}</dd>
		<dt>Mobile: </dt><dd>{{ $user->details->mobile }}</dd>
	 	<dt>Adress: </dt><dd>{{ $user->details->address }}</dd>
	 	<dt>City: </dt><dd>{{ $user->details->city }}</dd>
	 	<dt>Country: </dt><dd>{{ $user->details->country }}</dd>
	 	<dt>LinkedIn Profile:</dt><dd>{{ $user->details->linkedin }}</dd>
	 	<dt>Job: </dt><dd>{{ $user->details->job_status }}</dd>
	</dl>

	<h4>Send a message to {{ $user->first_name }}:</h4>

	@if ( Sentry::check() )
	{{ Form::open(array('route' => array('message'), 'class' => 'form-horizontal')) }}

		{{ Form::hidden('user_id', $user->id) }}

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
				{{ Form::submit('Send', array('class' => 'btn btn-success btn-large btn-disabled')) }}
			</div>
		</div>

	{{ Form::close() }}

	@else

		<div class="alert alert-danger alert-block">
			<h4>You must be logged on to send a message to {{ $user->first_name }}</h4>
		</div>

	@endif
	<a href="{{ URL::route('user.offers', array('id' => $user->id) )}}"><h3>View {{ $user->first_name }} {{ $user->last_name }} offers</h3></a>
	<a href="{{ URL::route('user.requests', array('id' => $user->id) )}}"><h3>View {{ $user->first_name }} {{ $user->last_name }} requests</h3></a>
@stop
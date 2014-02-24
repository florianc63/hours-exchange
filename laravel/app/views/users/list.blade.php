@extends('_layouts.default')

{{-- Web site Title --}}

@section('title')

@parent

Users

@stop

{{-- Content --}}

@section('content')

	<h2>Users</h2>

	@foreach ($users as $user)
	 	@if ($users != $user->hasAccess('admin'))
	 	
		<div class="row">
			<div class="col-lg-9">
				<h3><a href="{{ URL::route('user.profile', array('id' => $user->id)) }}">{{{ $user->first_name }}} {{{ $user->last_name }}}</a></h3>
				<h5>Member since: {{ date('Y-M-d', strtotime($user->created_at)) }} &bull;</h5>
				<dl class="dl-horizontal">
					<p><strong>City:</strong> {{ $user->details->city }}</p>
					<p><strong>Province:</strong> {{ $user->details->province }}</p>
					<p><strong>Country:</strong> {{ $user->details->country }}</p>
				 	<h5><strong>Services:</strong></h5>
				 	@foreach( $user->services as $service )
				 		<ul>{{ $service->name }}</ul>
				 	@endforeach
				</dl>			 
			</div>
		</div>

		@endif
	@endforeach

@stop
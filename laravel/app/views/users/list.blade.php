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

		<div class="row">
			<div class="col-lg-9">
				<h3><a href="{{ URL::route('user.profile', array('id' => $user->id)) }}">{{{ $user->first_name }}} {{{ $user->last_name }}}</a></h3>
				<h5>Member since {{ date('Y-M-d', strtotime($user->created_at)) }} &bull;</h5>
				<p>Service type: <strong></strong></p>
				<p>Available: <strong>{{{ $user->last_name }}}</strong></p>
				<p>Description: {{{ Str::limit($user->details->descr, 100) }}}</p>
			</div>
		</div>

	@endforeach

@stop
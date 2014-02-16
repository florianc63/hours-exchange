@extends('_layouts.default')



{{-- Web site Title --}}

@section('title')

@parent

Inbox

@stop



{{-- Content --}}

@section('content')

	<h1>Inbox</h1>

	<hr>

	@foreach ($entries as $entry)		
	<div class="col-xs-12">
		<h3><a href="{{ URL::route('admin.messages.show', $entry->id) }}">{{ $entry->subject }}</a></h3>
		<h5><a href="{{ URL::route('user.profile', $entry->user->id) }}">{{ $entry->user->first_name }} {{ $entry->user->last_name }}</a></h5>
		<p>{{ $entry->body }}</p>
		<div class="col-xs-5 col-sm-offset-4">
			<a href="{{ URL::route('admin.messages.reply', $entry->id) }}" class="btn btn-success btn-sm pull-left">Reply</a>							
			{{ Form::open(array('route' => array('admin.messages.destroy', $entry->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
			{{ Form::close() }}
		</div>
		<div class="clearfix"></div>
	</div>
	@endforeach	
	
	{{ $entries->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
	<h1>Outbox</h1>
	
	<hr>

	@foreach ($entries as $entry)

	<div class="col-xs-12">
		<h3><a href="{{ URL::route('admin.messages.show', $entry->id) }}">{{ $entry->subject }}</a></h3>
		<h5><a href="{{ URL::route('user.profile', $entry->user->id) }}">{{ $entry->user->first_name }} {{ $entry->user->last_name }}</a></h5>
		<p>{{ $entry->body }}</p>
	</div>
	@endforeach
		
@stop
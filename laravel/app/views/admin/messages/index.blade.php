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

	@foreach ($inbox as $received)
	<div class="col-xs-12">
		<dl class="dl-horizontal">
			<dt>&nbsp;</dt>
			<dd><h4><a href="{{ URL::route('admin.messages.show', $received->id) }}">{{ $received->subject }}</a></h4></dd>
			<dt>From:</dt>
			<dd><a href="{{ URL::route('user.profile', $received->user->id) }}">{{ $received->user->first_name }} {{ $received->user->last_name }}</a></dd>
			<dt>Body:</dt>
			<dd>{{ $received->body }}</dd>
		</dl>

		<div class="col-xs-5 col-sm-offset-4">
			<a href="{{ URL::route('admin.messages.reply', $received->id) }}" class="btn btn-success btn-sm pull-left">Reply</a>							
			{{ Form::open(array('route' => array('admin.messages.destroy', $received->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
				<button type="submit" class="btn btn-danger btn-sm">Delete</button>
			{{ Form::close() }}
		</div>
		<div class="clearfix"></div>
	</div>
	@endforeach	
	
	{{ $inbox->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
	<h1>Outbox</h1>
	
	<hr>

	@foreach ($outbox as $sent)

	<div class="col-xs-12">
		<dl class="dl-horizontal">
			<dt>&nbsp;</dt>
			<dd><h4><a href="{{ URL::route('admin.messages.show', $sent->id) }}">{{ $sent->subject }}</a></h4></dd>
			<dt>To:</dt>
			<dd><a href="{{ URL::route('user.profile', $sent->user_to->id) }}">{{ $sent->user_to->first_name }} {{ $sent->user_to->last_name }}</a></dd>
			<dt>Body:</dt>
			<dd>{{ $sent->body }}</dd>
		</dl>
	</div>
	@endforeach

	{{ $inbox->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
		
@stop
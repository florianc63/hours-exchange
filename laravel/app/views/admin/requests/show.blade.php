@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')

@parent
Show Request

@stop

{{-- Content --}}

@section('content')
 
    <h1>Show Request </h1>

	<dl class="dl-horizontal">
		<dt>Author</dt>
		<dd>{{{ $request->author->email }}}</dd>
		<dt>Title</dt>
		<dd>{{{ $request->title }}}</dd>
		<dt>Status:</dt>
 		<dd>{{{ $request->status }}}</dd>
		<dt>Slug</dt>
		<dd>{{{ $request->slug }}}</dd>
		<dt>Body</dt>
		<dd>{{{ $request->body }}}</dd>
		<dt>Price</dt>
		<dd>{{{ $request->price }}}</dd>
		<dt>Expires at</dt>
		<dd>{{{ $request->date_expire }}}</dd>
		<dt>Location</dt>
		<dd>{{{ $request->location }}}</dd>
		<dt>Image</dt>
		<dd>{{{ $request->image }}}</dd>
		<dt>Visible</dt>
		<dd>{{{ $request->visible }}}</dd>
		<dt>&nbsp;</dt>
		<dd>&nbsp;</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.requests.edit', $request->id) }}" class="btn btn-success btn-sm">Edit</a>		 
			<a href="{{ URL::route('admin.requests.index') }}" class="btn btn-default btn-sm">Cancel</a>
		</dd>
	</dl>

 	@foreach ($bids as $bid)
 	<div class="col-xs-9">
	 	<dl class="dl-horizontal">
	 		<dt><h4>Bid by:</h4></dt>
	 		<dd><h4><a href="{{ URL::route('user.profile', array('id' => $bid->user->id)) }}">{{ $bid->user->first_name }} {{ $bid->user->last_name }}</a></h4></dd>
		 	@if ($bid->status == 'pending')
	 		<dt>&nbsp;</dt>
	 		<dd><a href="{{ URL::route('accept.bid', $bid->id) }}" class="btn btn-success btn-sm">Accept bid</a></dd>
	 		@endif
	 		<dt>Offers to do job for:</dt>
	 		<dd>{{ $bid->value }} hours</dd>
	 		<dt>Status:</dt>
	 		<dd>{{ $bid->status }}</dd>
	 		@foreach ($bid->message_collection as $message)
		 		<dt>{{ $bid->user->first_name }} says:</dt>
		 		<dd>{{ $message->subject }}</dd>
		 		<dt>&nbsp;</dt>
		 		<dd>{{ $message->body }}</dd>
		 		<dt>&nbsp;</dt>
		 		<dt>&nbsp;</dt>
		 		<dd>&nbsp;</dd>
				<dd><a href="{{ URL::route('admin.messages.reply', $message->id) }}" class="btn btn-success btn-sm">Reply</a></dd>
	 		@endforeach
	 	</dl>
	 	</div>
 	<div class="clearfix"></div>
 	@endforeach

@stop
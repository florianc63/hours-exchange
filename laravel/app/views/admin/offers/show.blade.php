@extends('_layouts.default')

{{-- Web site Title --}}

@section('title')

@parent

Show offer

@stop

{{-- Content --}}

@section('content')

    <h1>Show offer </h1>

	<dl class="dl-horizontal">
		<dt>Author</dt>
		<dd>{{{ $offer->author->email }}}</dd>
		<dt>Title</dt>
		<dd>{{{ $offer->title }}}</dd>
		<dt>Slug</dt>
		<dd>{{{ $offer->slug }}}</dd>
		<dt>Body</dt>
		<dd>{{{ $offer->body }}}</dd>
		<dt>Price</dt>
		<dd>{{{ $offer->price }}}</dd>
		<dt>Expires at</dt>
		<dd>{{{ $offer->date_expire }}}</dd>
		<dt>Quantity available</dt>
		<dd>{{{ $offer->qty }}}</dd>
		<dt>Location</dt>
		<dd>{{{ $offer->location }}}</dd>
		<dt>Image</dt>
		<dd>{{{ $offer->image }}}</dd>
		<dt>Visible</dt>
		<dd>{{{ $offer->visible }}}</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.offers.edit', $offer->id) }}" class="btn btn-success btn-sm">Edit</a>		 
			<a href="{{ URL::route('admin.offers.index') }}" class="btn btn-default btn-sm">Cancel</a>
		</dd>
	</dl>

	@foreach ($transactions as $transaction)
 	<div class="col-xs-9">
	 	<span><strong></strong></span><span> </span>
	 	<dl class="dl-horizontal">
	 		<dt><h4>Payment by:</h4></dt>
	 		<dd><h4><a href="{{ URL::route('user.profile', array('id' => $transaction->user->id)) }}">{{ $transaction->user->first_name }} {{ $transaction->user->last_name }}</a></h4></dd>
	 		<dt>Has paid:</dt>
	 		<dd>{{ $transaction->value }} hours</dd>
	 		@foreach ($transaction->message_collection as $message)
		 		<dt>{{ $transaction->user->first_name }} says:</dt>
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
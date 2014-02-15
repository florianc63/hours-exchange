@extends('_layouts.default')



{{-- Web site Title --}}

@section('title')

@parent

My bids

@stop



{{-- Content --}}

@section('content')

	<h1>My bids</h1>

	<hr>

	@foreach ($entries as $entry)
 	<div class="col-xs-9">
	 	<span><strong>Bid for request: </strong></span><a href="{{{ URL::route('request', $entry->hx_request->slug) }}}"><span>{{ $entry->hx_request->title }}</span></a>
	 	<dl class="dl-horizontal">
	 		<dt>Bet Value:</dt>
	 		<dd>{{ $entry->value }} hours</dd>
	 	</dl>
	 	</div>
 	<div class="clearfix"></div>
 	@endforeach
	
	{{ $entries->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
@stop
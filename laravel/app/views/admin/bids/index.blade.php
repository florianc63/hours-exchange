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
	 	<dl class="dl-horizontal">
	 		<dt><h4>Bid for request:</h4></dt>
	 		<dd><h4><a href="{{{ URL::route('request', $entry->hx_request->slug) }}}">{{ $entry->hx_request->title }}</a></h4></dd>
	 		<dt>Bid Value:</dt>
	 		<dd>{{ $entry->value }} hours</dd>
	 		<dt>Status:</dt>
	 		<dd>{{ $entry->status }}</dd>
	 		<dt>Made on:</dt>
	 		<dd>{{ date('Y-M-d', strtotime($entry->created_at)) }}</dd>
	 	</dl>
	 	</div>
 	<div class="clearfix"></div>
 	@endforeach
	
	{{ $entries->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
@stop
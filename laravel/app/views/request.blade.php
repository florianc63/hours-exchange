@extends('_layouts.default')



{{-- Web site Title --}}

@section('title')

@parent

{{{ $entry->title }}}

@stop



{{-- Content --}}

@section('content')

 

	<p>&nbsp;</p>

	<h6><em>Service type: <strong>{{{ $entry->service->name }}}</strong></em></h6>
	<h2>{{{ $entry->title }}} <small>({{{ $entry->price }}} hours)</small></h2>
	<h5>Posted at {{ Carbon\Carbon::createFromTimestamp(strtotime($entry->created_at))->toFormattedDateString() }} &bull; by <a href="{{ URL::route('user.profile', array('id' => $entry->author->id)) }}">{{{ $entry->author->first_name }}} {{{ $entry->author->last_name }}}</a></h5>

	@if ($entry->image != '')
		<img src="{{{ $entry->image }}}" width="320"/>
	@endif

	<div>
		{{{ $entry->body }}}
	</div>

	@include('users.bid')

	<h3>Pending Bids:</h3>
	@foreach ($bids as $bid)
 	<div class="col-xs-9">
	 	<dl class="dl-horizontal">
	 		<dt>Bid by:</dt>
	 		<dd><a href="{{ URL::route('user.profile', array('id' => $bid->user->id)) }}">{{ $bid->user->first_name }} {{ $bid->user->last_name }}</a></dd>
	 		<dt>Offers to do job for:</dt>
	 		<dd>{{ $bid->value }} hours</dd>
	 	</dl>
	 	</div>
 	<div class="clearfix"></div>
 	@endforeach

@stop
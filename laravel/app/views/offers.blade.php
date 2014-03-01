@extends('_layouts.default')

{{-- Web site Title --}}

@section('title')

@parent

Offers

@stop

{{-- Content --}}

@section('content')

	<h2>Offers</h2>

	@foreach ($entries as $entry)

		<div class="row">
			<div class="col-lg-3">
				@if ($entry->image != '')
					<img src="{{{ $entry->image }}}" width="220"/>
				@else
					<img src="{{ asset('assets/img/hx-logo-small.png') }}" width="55"/>
				@endif
			</div>
			<div class="col-lg-9">
				<h3><a href="{{{ URL::route('offer', $entry->slug) }}}">{{{ $entry->title }}}</a> <small>({{{ $entry->price }}} hours)</small></h3>
				<h5>Posted at {{ Carbon\Carbon::createFromTimestamp(strtotime($entry->created_at))->toFormattedDateString() }} &bull; by <a href="{{ URL::route('user.profile', array('id' => $entry->author->id)) }}">{{{ $entry->author->first_name }}} {{{ $entry->author->last_name }}}</a></h5>
				<p>Service type: <strong>{{{ $entry->service->name }}}</strong></p>
				<p>Available: <strong>{{{ $entry->remaining }}}</strong></p>
				{{{ Str::limit($entry->body, 100) }}}
			</div>
		</div>
	@endforeach
		
	{{ $entries->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
 
@stop
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
 
@stop
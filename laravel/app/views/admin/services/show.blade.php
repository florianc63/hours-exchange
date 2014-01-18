@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Show service
@stop

{{-- Content --}}
@section('content')
 
    <h1>Show service </h1>
 
	<dl class="dl-horizontal">
		<dt>Name</dt>
		<dd>{{{ $service->name }}}</dd>
		<dt>Slug</dt>
		<dd>{{{ $service->slug }}}</dd>
		<dt>Place</dt>
		<dd>{{{ $service->place }}}</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.services.edit', $service->id) }}" class="btn btn-success btn-sm">Edit</a>		 
			<a href="{{ URL::route('admin.services.index') }}" class="btn btn-default btn-sm">Cancel</a>
		</dd>
	</dl>
 
@stop
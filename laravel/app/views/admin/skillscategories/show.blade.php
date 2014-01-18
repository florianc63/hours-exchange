@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Show category
@stop

{{-- Content --}}
@section('content')
 
    <h1>Show category </h1>
 
	<dl class="dl-horizontal">
		<dt>Name</dt>
		<dd>{{{ $category->name }}}</dd>
		<dt>Slug</dt>
		<dd>{{{ $category->slug }}}</dd>
		<dt>Place</dt>
		<dd>{{{ $category->place }}}</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.skillscategories.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a>		 
			<a href="{{ URL::route('admin.skillscategories.index') }}" class="btn btn-default btn-sm">Cancel</a>
		</dd>
	</dl>
 
@stop
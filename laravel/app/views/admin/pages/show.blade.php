@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Show page
@stop

{{-- Content --}}
@section('content')
 
    <h1>Show page </h1>
 
	<dl class="dl-horizontal">
		<dt>Author</dt>
		<dd>{{{ $page->author->email }}}</dd>
		<dt>Title</dt>
		<dd>{{{ $page->title }}}</dd>
		<dt>Slug</dt>
		<dd>{{{ $page->slug }}}</dd>
		<dt>Body</dt>
		<dd>{{{ $page->body }}}</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.pages.edit', $page->id) }}" class="btn btn-success btn-sm">Edit</a>		 
			<a href="{{ URL::route('admin.pages.index') }}" class="btn btn-default btn-sm">Cancel</a>
		</dd>
	</dl>
 
@stop
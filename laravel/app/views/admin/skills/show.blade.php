@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Show skill
@stop

{{-- Content --}}
@section('content')
 
    <h1>Show skill </h1>
 
	<dl class="dl-horizontal">
		<dt>Author</dt>
		<dd>{{{ $skill->author->email }}}</dd>
		<dt>Title</dt>
		<dd>{{{ $skill->title }}}</dd>
		<dt>Slug</dt>
		<dd>{{{ $skill->slug }}}</dd>
		<dt>Body</dt>
		<dd>{{{ $skill->body }}}</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.skills.edit', $skill->id) }}" class="btn btn-success btn-sm">Edit</a>		 
			<a href="{{ URL::route('admin.skills.index') }}" class="btn btn-default btn-sm">Cancel</a>
		</dd>
	</dl>
 
@stop
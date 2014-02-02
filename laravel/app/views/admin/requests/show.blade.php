@extends('_layouts.default')



{{-- Web site Title --}}

@section('title')

@parent

Show Request

@stop



{{-- Content --}}

@section('content')

 

    <h1>Show Request </h1>



	<dl class="dl-horizontal">

		<dt>Author</dt>

		<dd>{{{ $request->author->email }}}</dd>

		<dt>Title</dt>

		<dd>{{{ $request->title }}}</dd>

		<dt>Slug</dt>

		<dd>{{{ $request->slug }}}</dd>

		<dt>Body</dt>

		<dd>{{{ $request->body }}}</dd>

		<dt>Price</dt>

		<dd>{{{ $request->price }}}</dd>

		<dt>Expires at</dt>

		<dd>{{{ $request->date_expire }}}</dd>

		<dt>Location</dt>

		<dd>{{{ $request->location }}}</dd>

		<dt>Image</dt>

		<dd>{{{ $request->image }}}</dd>

		<dt>Visible</dt>

		<dd>{{{ $request->visible }}}</dd>

		<dt>&nbsp;</dt>

		<dd>

			<a href="{{ URL::route('admin.requests.edit', $request->id) }}" class="btn btn-success btn-sm">Edit</a>		 

			<a href="{{ URL::route('admin.requests.index') }}" class="btn btn-default btn-sm">Cancel</a>

		</dd>

	</dl>

 

@stop
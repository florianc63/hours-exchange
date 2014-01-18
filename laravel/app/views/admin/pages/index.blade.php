@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Admin Pages
@stop

{{-- Content --}}
@section('content')
 
	<h1>
		Pages <a href="{{ URL::route('admin.pages.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add new page</a>
	</h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>
						Title					
						<a href="{{ route('admin.pages.index', array('sort' => 'title', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.pages.index', array('sort' => 'title', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th>
						Posted					
						<a href="{{ route('admin.pages.index', array('sort' => 'created_at', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.pages.index', array('sort' => 'created_at', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th>By</th>
					<th><span class="glyphicon glyphicon-cog"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pages as $page)
					<tr>
						<td>{{ $page->id }}</td>
						<td><a href="{{ URL::route('admin.pages.show', $page->id) }}">{{ $page->title }}</a></td>
						<td>{{ $page->created_at }}</td>
						<td>{{ $page->author->email }}</td>					
						<td>
							<a href="{{ URL::route('admin.pages.edit', $page->id) }}" class="btn btn-success btn-sm pull-left">Edit</a>							
							{{ Form::open(array('route' => array('admin.pages.destroy', $page->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	{{ $pages->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
@stop
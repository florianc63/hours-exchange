@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Admin Categories for Skills
@stop

{{-- Content --}}
@section('content')
 
	<h1>
		Categories for Skills <a href="{{ URL::route('admin.skillscategories.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add new category</a>
	</h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>
						Name					
						<a href="{{ route('admin.skillscategories.index', array('sort' => 'name', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.skillscategories.index', array('sort' => 'name', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th>
						Posted					
						<a href="{{ route('admin.skillscategories.index', array('sort' => 'created_at', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.skillscategories.index', array('sort' => 'created_at', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th><span class="glyphicon glyphicon-cog"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td><a href="{{ URL::route('admin.skillscategories.show', $category->id) }}">{{ $category->name }}</a></td>
						<td>{{ $category->created_at }}</td>
						<td>
							<a href="{{ URL::route('admin.skillscategories.edit', $category->id) }}" class="btn btn-success btn-sm pull-left">Edit</a>							
							{{ Form::open(array('route' => array('admin.skillscategories.destroy', $category->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	{{ $categories->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
@stop
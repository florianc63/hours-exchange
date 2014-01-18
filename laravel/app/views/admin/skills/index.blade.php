@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Admin Skills
@stop

{{-- Content --}}
@section('content')
 
	<h1>
		Skills <a href="{{ URL::route('admin.skills.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add new</a>
	</h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>
						Name					
						<a href="{{ route('admin.skills.index', array('sort' => 'name', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.skills.index', array('sort' => 'name', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th>Category</th>
					<th>
						Posted					
						<a href="{{ route('admin.skills.index', array('sort' => 'created_at', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.skills.index', array('sort' => 'created_at', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th>By</th>
					<th><span class="glyphicon glyphicon-cog"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($skills as $skill)
					<tr>
						<td>{{ $skill->id }}</td>
						<td><a href="{{ URL::route('admin.skills.show', $skill->id) }}">{{ $skill->name }}</a></td>
						<td>{{ $skill->category->name }}</td>					
						<td>{{ $skill->created_at }}</td>
						<td>{{ $skill->author->email }}</td>					
						<td>
							<a href="{{ URL::route('admin.skills.edit', $skill->id) }}" class="btn btn-success btn-sm pull-left">Edit</a>							
							{{ Form::open(array('route' => array('admin.skills.destroy', $skill->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	{{ $skills->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
@stop
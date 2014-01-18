@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Admin Services
@stop

{{-- Content --}}
@section('content')
 
	<h1>
		Services <a href="{{ URL::route('admin.services.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add new service</a>
	</h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>
						Name					
						<a href="{{ route('admin.services.index', array('sort' => 'name', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.services.index', array('sort' => 'name', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th>
						Posted					
						<a href="{{ route('admin.services.index', array('sort' => 'created_at', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.services.index', array('sort' => 'created_at', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th><span class="glyphicon glyphicon-cog"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($services as $service)
					<tr>
						<td>{{ $service->id }}</td>
						<td><a href="{{ URL::route('admin.services.show', $service->id) }}">{{ $service->name }}</a></td>
						<td>{{ $service->created_at }}</td>
						<td>
							<a href="{{ URL::route('admin.services.edit', $service->id) }}" class="btn btn-success btn-sm pull-left">Edit</a>							
							{{ Form::open(array('route' => array('admin.services.destroy', $service->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	{{ $services->addQuery('order',$order)->addQuery('sort', $sort)->links() }}
	
@stop
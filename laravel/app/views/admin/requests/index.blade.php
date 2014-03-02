@extends('_layouts.default')

{{-- Web site Title --}}

@section('title')

@parent

Admin Requests

@stop

{{-- Content --}}

@section('content')

	<h1>
		Requests <a href="{{ URL::route('admin.requests.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Add new</a>
	</h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>#</th>
					<th>
						Name					
						<a href="{{ route('admin.requests.index', array('sort' => 'title', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.requests.index', array('sort' => 'title', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<th>Status</th>
					<th>Category</th>
					<th>
						Posted					
						<a href="{{ route('admin.requests.index', array('sort' => 'created_at', 'order' => 'asc')) }}">
							<span class="glyphicon glyphicon-chevron-up"></span>
						</a>
						<a href="{{ route('admin.requests.index', array('sort' => 'created_at', 'order' => 'desc')) }}">
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
					</th>
					<!-- <th>By</th> -->
					<th>Bids</th>
					<th><span class="glyphicon glyphicon-cog"></span> Options</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($entries as $entry)
					<tr>
						<td>{{ $entry->id }}</td>
						<td><a href="{{ URL::route('admin.requests.show', $entry->id) }}">{{ $entry->title }}</a></td>
						<td>{{ $entry->status }}</td>
						<td>{{ $entry->service->name }}</td>					
						<td>{{ $entry->created_at }}</td>
						<!-- <td>{{-- $entry->author->email --}}</td> -->
						@if ($entry->bids > 0)
						<td>{{ $entry->bids }} <a href="{{ URL::route('admin.requests.show', $entry->id) }}">(View bids)</a></td>
						@else
						<td>No bids yet</td>
						@endif
						<td>
							<a href="{{ URL::route('admin.requests.edit', $entry->id) }}" class="btn btn-success btn-sm pull-left">Edit</a>							
							{{ Form::open(array('route' => array('admin.requests.destroy', $entry->id), 'method' => 'delete', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	{{ $entries->addQuery('order',$order)->addQuery('sort', $sort)->links() }}

	

@stop
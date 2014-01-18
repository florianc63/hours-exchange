@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

  @if (Sentry::check())
  	
    @if($user->hasAccess('admin'))
	
		<h1>Current Users:</h1>
		
		<hr>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>
							User	
<!--							
							<a href="{{ route('admin.services.index', array('sort' => 'name', 'order' => 'asc')) }}">
								<span class="glyphicon glyphicon-chevron-up"></span>
							</a>
							<a href="{{ route('admin.services.index', array('sort' => 'name', 'order' => 'desc')) }}">
								<span class="glyphicon glyphicon-chevron-down"></span>
							</a>-->
						</th>
						<th>
							Status		
<!--							
							<a href="{{ route('admin.services.index', array('sort' => 'created_at', 'order' => 'asc')) }}">
								<span class="glyphicon glyphicon-chevron-up"></span>
							</a>
							<a href="{{ route('admin.services.index', array('sort' => 'created_at', 'order' => 'desc')) }}">
								<span class="glyphicon glyphicon-chevron-down"></span>
							</a>
							-->
						</th>
						<th><span class="glyphicon glyphicon-cog"></span></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($allUsers as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td><a href="{{ URL::to('admin/users/show') }}/{{ $user->id }}">{{ $user->email }}</a></td>
							<td>{{ $userStatus[$user->id] }} </td>
							<td><a href="{{ URL::to('admin/users/edit') }}/{{ $user->id }}" class="btn btn-success btn-sm pull-left">Edit</a></td>
							<td><a href="{{ URL::to('admin/users/suspend') }}/{{ $user->id }}" class="btn btn-danger btn-sm">Suspend</a></td>	
							<td>
								{{ Form::open(array('url' => array('admin/users/delete', $user->id), 'method' => 'post', 'data-confirm' => 'Are you sure?', 'class' => 'form-inline')) }}
									<button type="submit" data-token="{{ Session::getToken() }}" class="btn btn-danger btn-sm">Delete</button>
								{{ Form::close() }}
							</td>							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>		
		
    @else 
		<h1>You are not an Administrator</h1>
    @endif
	
  @else
    <h1>You are not logged in</h1>
  @endif


@stop

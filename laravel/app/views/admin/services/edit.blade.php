@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit service
@stop

{{-- Content --}}
@section('content')
 
    <h1>Edit service</h1>
 
    {{ Form::model($service, array('method' => 'put', 'route' => array('admin.services.update', $service->id), 'class' => 'form-horizontal')) }}
 
        <div class="form-group">
            {{ Form::label('name', 'Name', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('name', null, array('class' => 'form-control')) }}
				{{ ($errors->has('name') ? $errors->first('name', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
 
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				{{ Form::submit('Save', array('class' => 'btn btn-success btn-large')) }}
				<a href="{{ URL::route('admin.services.index') }}" class="btn btn-default">Cancel</a>
			</div>
		</div>         
 
    {{ Form::close() }}
 
@stop
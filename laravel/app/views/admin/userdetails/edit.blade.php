@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit member details
@stop

{{-- Content --}}
@section('content')
 
    <h1>Edit Member Details</h1>
 
    {{ Form::model($user_details, array('method' => 'put', 'route' => array('admin.userdetails.update', $user_details->id), 'class' => 'form-horizontal')) }}
 
        <div class="form-group">
            {{ Form::label('first_name', 'First Name', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('first_name', null, array('class' => 'form-control')) }}
				{{ ($errors->has('first_name') ? $errors->first('first_name', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('last_name', 'Last Name', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('last_name', null, array('class' => 'form-control')) }}
				{{ ($errors->has('last_name') ? $errors->first('last_name', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('mobile', 'Mobile', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('mobile', null, array('class' => 'form-control')) }}
				{{ ($errors->has('mobile') ? $errors->first('mobile', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>		
        <div class="form-group">
            {{ Form::label('address', 'Address', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('address', null, array('class' => 'form-control')) }}
				{{ ($errors->has('address') ? $errors->first('address', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('city', 'City', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('city', null, array('class' => 'form-control')) }}
				{{ ($errors->has('city') ? $errors->first('city', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('province', 'Province', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('province', null, array('class' => 'form-control')) }}
				{{ ($errors->has('province') ? $errors->first('province', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('postal', 'Postal', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('postal', null, array('class' => 'form-control')) }}
				{{ ($errors->has('postal') ? $errors->first('postal', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('country', 'Country', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('country', null, array('class' => 'form-control')) }}
				{{ ($errors->has('country') ? $errors->first('country', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('linkedin', 'LinkedIn Profile', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('linkedin', null, array('class' => 'form-control')) }}
				{{ ($errors->has('linkedin') ? $errors->first('linkedin', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('job_status', 'I am currently', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::select('job_status', array('employed', 'job seeker', 'student'), null, array('class' => 'form-control')); }}
				{{ ($errors->has('job_status') ? $errors->first('job_status', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>		
		<div class="form-group">
            {{ Form::label('services[]', 'Which services would you be willing to offer?', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-6">
				{{ Form::select('services[]', Service::orderBy('name', 'asc')->lists('name', 'id'), $user->services->lists('id'), array('multiple', 'style' => 'height: 200px', 'class' => 'form-control')); }}
				<p>For multiple selection in the list above, press and hold Ctrl key (or Command for Mac users)<br/></p>
				{{ ($errors->has('services') ? $errors->first('services', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		 
		<div class="form-group">
            {{ Form::label('descr', 'Something about yourself', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-6">
				{{ Form::textarea('descr', null, array('rows' => 3, 'class' => 'form-control')) }}
				{{ ($errors->has('descr') ? $errors->first('descr', '<span class="input-error block">:message</span>') : '') }}
			</div>
        </div>	 
 
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				{{ Form::submit('Save', array('class' => 'btn btn-success btn-large')) }}
				<a href="{{ URL::route('home') }}" class="btn btn-default">Cancel</a>
			</div>
		</div>         
 
    {{ Form::close() }}
 
@stop
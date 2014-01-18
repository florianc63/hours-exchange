@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Register
@stop

{{-- Content --}}
@section('content')

<h1>Register New Account</h1>

<div class="well">

    {{ Form::open(array('route' => 'admin.user.register', 'class' => 'form-horizontal')) }}
 
        <div class="form-group">
            {{ Form::label('first_name', 'First name', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-3">
				{{ Form::text('first_name', null, array('class' => 'form-control')) }}
				{{ ($errors->has('first_name') ? $errors->first('first_name', '<span class="input-error">:message</span>') : '') }}
			</div>
			{{ Form::label('last_name', 'Last name', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-3">
				{{ Form::text('last_name', null, array('class' => 'form-control')) }}
				{{ ($errors->has('last_name') ? $errors->first('last_name', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-4">
				{{ Form::text('email', null, array('class' => 'form-control')) }}
				{{ ($errors->has('email') ? $errors->first('email', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-3">
				{{ Form::password('password', array('class' => 'form-control')) }}
				{{ ($errors->has('password') ? $errors->first('password', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirm Password', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-3">
				{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
				{{ ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		
        <div class="form-group">
            {{ Form::label('services[]', 'Which services would you be willing to offer?', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-6">
				{{ Form::select('services[]', Service::orderBy('name', 'asc')->lists('name', 'id'), null, array('multiple', 'style' => 'height: 200px', 'class' => 'form-control')); }}
				<p>For multiple selection in the list above, press and hold Ctrl key (or Command for Mac users)<br/></p>
				{{ ($errors->has('services') ? $errors->first('services', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		 
		<div class="form-group">
            {{ Form::label('descr', 'Something about yourself', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-6">
				{{ Form::textarea('descr', null, array('rows' => 3, 'class' => 'form-control')) }}
				{{ ($errors->has('descr') ? $errors->first('descr', '<span class="input-error block">:message</span>') : '') }}
			</div>
        </div>		 
		
        <div class="form-group">
            {{ Form::label('city', 'City', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-3">
				{{ Form::text('city', null, array('class' => 'form-control')) }}
				{{ ($errors->has('city') ? $errors->first('city', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('postal', 'Zipcode', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-3">
				{{ Form::text('postal', null, array('class' => 'form-control')) }}
				{{ ($errors->has('postal') ? $errors->first('postal', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		
		<div class="form-group">
			<div class="col-lg-offset-3 col-lg-9">
				{{ Form::submit('Register', array('class' => 'btn btn-success btn-large')) }}
			</div>
		</div>         
 
    {{ Form::close() }}

</div>


@stop
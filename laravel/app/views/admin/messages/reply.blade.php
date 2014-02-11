@extends('_layouts.default')



{{-- Web site Title --}}

@section('title')

@parent

Reply

@stop



{{-- Content --}}

@section('content')
<h2>Send message:</h2>

{{ Form::open(array('route' => array('admin.messages.reply.send'), 'class' => 'form-horizontal')) }}

	{{ Form::hidden('id', $id) }}

	<div class="form-group">
        {{ Form::label('subject', 'Subject', array('class' => 'col-lg-3 control-label')) }}
		<div class="col-lg-6">
			{{ Form::text('subject', null, array('rows' => 3, 'class' => 'form-control')) }}
			{{ ($errors->has('subject') ? $errors->first('subject', '<span class="input-error block">:message</span>') : '') }}
		</div>
    </div>

	<div class="form-group">
        {{ Form::label('body', 'Message', array('class' => 'col-lg-3 control-label')) }}
		<div class="col-lg-6">
			{{ Form::textarea('body', null, array('rows' => 3, 'class' => 'form-control')) }}
			{{ ($errors->has('body') ? $errors->first('body', '<span class="input-error block">:message</span>') : '') }}
		</div>
    </div>
	
    <div class="form-group">
		<div class="col-lg-offset-3 col-lg-9">
			{{ Form::submit('Send', array('class' => 'btn btn-success btn-large btn-disabled')) }}
		</div>
	</div>

{{ Form::close() }}

@stop
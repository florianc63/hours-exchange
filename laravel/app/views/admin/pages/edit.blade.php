@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit page
@stop

{{-- Content --}}
@section('content')
 
    <h1>Edit page</h1>
 
    {{ Form::model($page, array('method' => 'put', 'route' => array('admin.pages.update', $page->id), 'class' => 'form-horizontal')) }}
 
        <div class="form-group">
            {{ Form::label('title', 'Title', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::text('title', null, array('class' => 'form-control')) }}
				{{ ($errors->has('title') ? $errors->first('title', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
 
        <div class="form-group">
            {{ Form::label('body', 'Content', array('class' => 'col-lg-2 control-label')) }}
			<div class="col-lg-10">
				{{ Form::textarea('body', null, array('class' => 'form-control editor')) }}
				{{ ($errors->has('body') ? $errors->first('body', '<span class="input-error block">:message</span>') : '') }}
			</div>
        </div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				{{ Form::submit('Save', array('class' => 'btn btn-success btn-large')) }}
				<a href="{{ URL::route('admin.pages.index') }}" class="btn btn-default">Cancel</a>
			</div>
		</div>         
 
    {{ Form::close() }}
 
@stop
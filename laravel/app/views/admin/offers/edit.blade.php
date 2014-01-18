@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit offer
@stop

{{-- Content --}}
@section('content')
 
    <h1>Edit offer</h1>
 
    {{ Form::model($offer, array('method' => 'put', 'route' => array('admin.offers.update', $offer->id), 'files' => true, 'class' => 'form-horizontal')) }}
 
        <div class="form-group">
            {{ Form::label('title', 'Title', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-6">
				{{ Form::text('title', null, array('class' => 'form-control')) }}
				{{ ($errors->has('title') ? $errors->first('title', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		
        <div class="form-group">
            {{ Form::label('service_id', 'Category', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-6">
				{{ Form::select('service_id', Service::orderBy('name', 'asc')->lists('name', 'id'), null, array('class' => 'form-control')); }}
				{{ ($errors->has('service_id') ? $errors->first('service_id', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		
		<div class="form-group">
            {{ Form::label('body', 'Description', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-6">
				{{ Form::textarea('body', null, array('rows' => 8, 'class' => 'form-control')) }}
				<span>Be sure to include your preferred means of communication, i.e. email. text or telephone.</span>
				{{ ($errors->has('body') ? $errors->first('body', '<span class="input-error block">:message</span>') : '') }}
			</div>
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-2">
				{{ Form::text('price', null, array('class' => 'form-control')) }}
				{{ ($errors->has('price') ? $errors->first('price', '<span class="input-error">:message</span>') : '') }}
			</div>
			<div class="col-lg-3">
				hours
			</div>
        </div>
        <div class="form-group">
            {{ Form::label('qty', 'Quantity available', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-2">
				{{ Form::text('qty', null, array('class' => 'form-control')) }}
				{{ ($errors->has('qty') ? $errors->first('qty', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		
        <div class="form-group">
            {{ Form::label('date_expire', 'Expires at', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-2">
				{{ Form::text('date_expire', null, array('class' => 'form-control')) }}
				{{ ($errors->has('date_expire') ? $errors->first('date_expire', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>

        <div class="form-group">
            {{ Form::label('location', 'Location', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-4">
				{{ Form::text('location', null, array('class' => 'form-control')) }}
				{{ ($errors->has('location') ? $errors->first('location', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		
		
		
        <div class="form-group">
            {{ Form::label('image', 'Image', array('class' => 'col-lg-3 control-label')) }}
			<div class="col-lg-4">
				@if ($offer->image != '')
					<p><img src="{{ $offer->image }}" width="300"/></p>
				@endif
				{{ Form::file('image', array('class' => 'form-control')) }}
				{{ ($errors->has('image') ? $errors->first('image', '<span class="input-error">:message</span>') : '') }}
			</div>
        </div>
		
		<div class="form-group">
			<div class="col-lg-offset-3 col-lg-9">
				{{ Form::submit('Save', array('class' => 'btn btn-success btn-large')) }}
				<a href="{{ URL::route('admin.offers.index') }}" class="btn btn-default">Cancel</a>
			</div>
		</div>        
 
    {{ Form::close() }}
 
@stop
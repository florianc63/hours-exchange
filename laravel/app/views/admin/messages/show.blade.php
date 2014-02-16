@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Message
@stop

{{-- Content --}}
@section('content')
	
	<h3><a href="{{ URL::route('admin.messages.show', $entry->id) }}">{{ $entry->subject }}</a></h3>
	<hr>
    <dl class="dl-horizontal">
    	<dt>From:</dt>
    	<dd><a href="{{ URL::route('user.profile', array('id' => $entry->user_from->id)) }}">{{{ $entry->user_from->first_name }}} {{{ $entry->user_from->last_name }}}</a></dd>
    	<dt>To:</dt>
    	<dd><a href="{{ URL::route('user.profile', array('id' => $entry->user_to->id)) }}">{{{ $entry->user_to->first_name }}} {{{ $entry->user_to->last_name }}}</a></dd>
   	</dl>
   	<hr>

	<dl class="dl-horizontal">
		<dt>Body:</dt>
		<dd>{{{ $entry->body }}}</dd>
		<dt>&nbsp;</dt>
		<dd>&nbsp;</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.messages.reply', $entry->id) }}" class="btn btn-success btn-sm">Reply</a>		 
		</dd>
	</dl>

@stop
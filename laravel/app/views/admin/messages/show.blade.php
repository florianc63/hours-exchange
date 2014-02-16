@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Message
@stop

{{-- Content --}}
@section('content')

    <h2><strong>Sent by:</strong><a href="{{ URL::route('user.profile', array('id' => $entry->user->id)) }}">{{{ $entry->user->first_name }}} {{{ $entry->user->last_name }}}</a></h2>

	<dl class="dl-horizontal">
		<dt>Subject:</dt>
		<dd>{{{ $entry->subject }}}</dd>
		<dt>Body</dt>
		<dd>{{{ $entry->body }}}</dd>
		<dt>&nbsp;</dt>
		<dd>&nbsp;</dd>
		<dt>&nbsp;</dt>
		<dd>
			<a href="{{ URL::route('admin.messages.reply', $entry->id) }}" class="btn btn-success btn-sm">Reply</a>		 
		</dd>
	</dl>

@stop
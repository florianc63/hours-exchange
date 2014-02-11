@extends('_layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Message
@stop

{{-- Content --}}
@section('content')

    <p><span><strong>Sent by:</strong></span><span>{{{ $entry->user->first_name }}} {{{ $entry->user->last_name }}}</span></p>

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
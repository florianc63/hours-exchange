@extends('_layouts.default')



{{-- Web site Title --}}

@section('title')

@parent

{{ $entry->title }}

@stop



{{-- Content --}}

@section('content')

 

    <h2>{{ $entry->title }}</h2>

	{{ $entry->body }}

 

@stop
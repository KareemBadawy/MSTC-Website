@extends('app')

@section('header')
    <li><h5>Events</h5></li>
@stop

@section('side')
    
@stop

@section('content')

    <article>
    	<h1>{{ $event->title }}</h1>
    	<div class = "body"> {{ $event->body }} </div>
    	<div>{{ $event->started_at }}</div>
    	<div>{{ $event->ended_at }}</div>
    </article>

@stop
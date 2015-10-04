@extends('app')

@section('header')
    <li><h5>Events</h5></li>
@stop

@section('side')
    
@stop

@section('content')
	<h1>Events</h1>
    @foreach($events as $event)
    <article>
    	<h2><a href="{{ action('EventsController@show' , [$event->id]) }}">{{ $event->title }}</a></h2>
    	<div class = "body"> {{ $event->body }} </div>
    </article>
    @endforeach
@stop
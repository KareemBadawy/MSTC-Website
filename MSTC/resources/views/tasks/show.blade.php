@extends('app')

@section('header')
        @include('tasks.header')
@stop

@section('side')
    @include('tasks.side')
@stop

@section('content')

    <article>
    	<h1>{{ $task->title }}</h1>
    	<div class = "body"> {{ $task->body }} </div>
    	<p>
    		<a href="{{ action('TasksController@destroy' , [$task->id]) }}"> Delete</a>|
    		<a href="{{URL::action('TasksController@edit', [$task->id])}}"> Edit</a>|
            <a href="{{ action('TasksController@edit' , [$task->id]) }}"> Edit</a>

    	</p>
    </article>

@stop
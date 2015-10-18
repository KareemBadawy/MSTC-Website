@extends('app')

@section('header')
        @include('tasks.header')
@stop

@section('side')
    <ul>
        <li><a href="{{action('TasksController@index')}}">Tasks</a></li>
        @if($currentuser->role != 'Member')
        <li><a href="{{ action('TasksController@create')}}">New Task</a></li>
        <li><a href="{{ action('TasksController@owntasks')}}">owntasks</a></li>
        @endif
        @if($currentuser->role == 'President')
        <li><a href="{{ action('TasksController@createFhead')}}">New Task For heads</a></li>
        @endif
    </ul>
@stop

@section('content')

    <article>
    	<h1>{{ $task->title }}</h1>
    	<div class = "body"> {{ $task->body }} </div>
    	<p>
            @if($currentuser->id == $task->user_id)
    		<a href="{{ action('TasksController@destroy' , [$task->id]) }}"> Delete</a>|
    		<a href="{{URL::action('TasksController@edit', [$task->id])}}"> Edit</a>|
            @endif
            @if($currentuser->role == 'Member')
            <a href="{{ action('TasksController@updatestatus' , [$task->id]) }}"> Finished</a>
            @endif
    	</p>
    </article>

@stop
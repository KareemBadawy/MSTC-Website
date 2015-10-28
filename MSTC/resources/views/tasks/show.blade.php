@extends('app')

@section('header')
        @include('tasks.header')
@stop
    

@section('content')
<ul>
        <li><a href="{{action('TasksController@index')}}">Tasks</a></li>
        <li><a href="{{action('TasksController@index')}}">Not Finished</a></li>
        <li><a href="{{ action('TasksController@finished')}}">Finished</a></li>
        @if($currentuser->hasrole('Vice Head'))
        <li><a href="{{ action('TasksController@create')}}">New Task</a></li>
        <li><a href="{{ action('TasksController@owntasks')}}">owntasks</a></li>
        @endif
        @if($currentuser->hasrole('President'))
        <li><a href="{{ action('TasksController@createFhead')}}">New Task For heads</a></li>
        @endif
    </ul>

    <article>
    	<h1>{{ $task->title }}</h1>
    	<div class = "body"> {{ $task->body }} </div>
    	<p>
            @if($currentuser->id == $task->user_id)
    		<a href="{{ action('TasksController@destroy' , [$task->id]) }}"> Delete</a>|
            <a href="{{URL::action('TasksController@edit', [$task->id])}}"> Edit</a>|
            <a href="{{URL::action('ScoresController@create', [$task->id])}}"> Set Score</a>|
    		<a href="{{URL::action('ScoresController@show', [$task->id])}}"> See Score</a>

            @endif
            @if($task->users->contains($currentuser->id))
            <a href="{{ action('TasksController@updatestatus' , [$task->id]) }}"> Finished</a>
            @endif
    	</p>
    </article>

@stop
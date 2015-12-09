@extends('app')

@section('header')
        @include('tasks.header')
@stop

@section('content')
     <ul>
        @if($currentuser->hasrole('Member') && !$currentuser->hasrole('Vice Head'))
        <li><a href="{{action('TasksController@index')}}">Tasks</a></li>
        <li><a href="{{action('TasksController@index')}}">Not Finished</a></li>
        <li><a href="{{ action('TasksController@finished')}}">Finished</a></li>
        @endif
        @if($currentuser->hasrole('Vice Head'))
        <li><a href="{{ action('TasksController@create')}}">New Task</a></li>
        <li><a href="{{ action('TasksController@owntasks')}}">owntasks</a></li>
        @endif
        @if($currentuser->hasrole('President'))
        <li><a href="{{ action('TasksController@createFhead')}}">New Task For heads</a></li>
        @endif
    </ul>
    @if($tasks != null)
        @foreach($tasks as $task)
            <article>
                <h2><a href="{{ action('TasksController@show' , [$task->id]) }}">{{ $task->title }}</a></h2>
                <div class = "body"> <strong>{{ $task->body }}</strong>   
    		        {{$task ->deadline}}  
    		        @if ($task -> status) 
    		          finished 
    		        @else
    		          Not finished Yet
    		        @endif 
                </div>
            </article>
        @endforeach
    @else
       <h1>There is no Tasks</h1>
    @endif
@stop
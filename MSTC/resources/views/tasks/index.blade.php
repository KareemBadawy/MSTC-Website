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
@extends('app')

@section('header')
        @include('tasks.header')
@stop

@section('side')
    <ul>
        <li><a href="{{action('TasksController@index')}}">Tasks</a></li>
        @if($currentuser->membershipType != 'Member')
        <li><a href="{{ action('TasksController@create')}}">New Task</a></li>
        @endif
        @if($currentuser->membershipType == 'President')
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
       There is no Tasks
    @endif
@stop
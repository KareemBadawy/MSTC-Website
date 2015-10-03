@extends('app')

@section('header')
        @include('tasks.header')
@stop

@section('side')
    @include('tasks.side')
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
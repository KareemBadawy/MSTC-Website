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
    
    @if($currentuser->id == $task->user_id)
    <h1>Edit : {!! $task-> title !!}</h1>

    {!! Form::model($task,['method'=>'PATCH', 'action'=>['TasksController@update',$task->id]]) !!}
        @include('tasks._form', ['submitButton'=>'Update Task']);
    {!! Form::close() !!}
    @include('errors.list');

    @elseif($currentuser->role != 'Member')
        <h2>You don't own a task to edit it. </h2>
    @else
        <h2>this is not your own task.</h2>
    @endif
@stop
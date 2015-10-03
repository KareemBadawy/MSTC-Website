@extends('app')

@section('header')
        @include('tasks.header')
@stop

@section('side')
    @include('tasks.side')
@stop

@section('content')
    <h1>Edit : {!! $task-> title !!}</h1>

    {!! Form::model($task,['method'=>'PATCH', 'action'=>['TasksController@update',$task->id]]) !!}
        @include('tasks._form', ['submitButton'=>'Update Task']);
    {!! Form::close() !!}

    @include('errors.list');
@stop
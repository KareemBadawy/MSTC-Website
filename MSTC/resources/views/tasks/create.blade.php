@extends('app')

@section('header')
        @include('tasks.header')
@stop

@section('side')
    @include('tasks.side')
@stop

@section('content')

    <h1>Write a New Task</h1>
    <hr/>

    {!! Form::open(['url'=>'tasks']) !!}
        @include('tasks._form',['submitButton'=>'Add New Task']);
    {!! Form::close() !!}
    
    @include('errors.list')

@stop
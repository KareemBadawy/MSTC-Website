@extends('app')

@section('header')
        @include('tasks.header')
@stop


@section('content')
    @if($currentuser->role != 'Member')
    <h1>Write a New Task</h1>
    <hr/>

    {!! Form::open(['url'=>'tasks']) !!}
        @include('tasks._form',['submitButton'=>'Add New Task'])
    {!! Form::close() !!}
    @include('errors.list')

    @else
     <h2>You are not a head or President to make a new task</h2>
    @endif

@stop
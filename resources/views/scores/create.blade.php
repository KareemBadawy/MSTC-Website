@extends('app')

@section('content')
    <h1>Write a New Post</h1>
    <hr/>

    {!! Form::open(['url'=>"scores/$task_id"]) !!}
        @include('scores/_form',['submitButton'=>'Give the score']);
    {!! Form::close() !!}
    
    @include('errors.list');

@stop
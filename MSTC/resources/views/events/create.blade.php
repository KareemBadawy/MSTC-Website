@extends('app')

@section('header')
    <li><h5>Events</h5></li>
@stop

@section('side')
    
@stop

@section('content')

    <h1>Write a New Event</h1>
    <hr/>

    {!! Form::open(['url'=>'events']) !!}
        @include('events/_form',['submitButton'=>'Add New Event']);
    {!! Form::close() !!}
    
    @include('errors.list');

@stop
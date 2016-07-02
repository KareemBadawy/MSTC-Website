@extends('app')

@section('content')
    <title>New Event</title>




    <h1>Write a New Event</h1>
    <hr/>

    {!! Form::open(['url'=>'events','files' => true]) !!}
        @include('events/_form',['submitButton'=>'Add New Event'])
    {!! Form::close() !!}

    @include('errors.list')
@stop
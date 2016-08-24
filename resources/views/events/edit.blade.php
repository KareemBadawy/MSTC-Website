@extends('app')

@section('header')
    <li><h5>Events</h5></li>
@stop

@section('side')

@stop

@section('content')
    <h1>Edit : {!! $event-> title !!}</h1>
    {!! Form::model($event,['method'=>'PATCH', 'action'=>['EventsController@update',$event->id],'files'=> true]) !!}

    @include('events/_form',['submitButton'=>'Update Event'])

    {!! Form::close() !!}
    @include('errors.list');
@stop
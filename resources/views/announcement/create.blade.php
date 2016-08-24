@extends('app')

@section('title')
    <title>New Announcement</title>
@stop

@section('content')

    <h1>Write a New Announcement</h1>
    <hr/>

    {!! Form::open(['url'=>'announcements','files' => true]) !!}
        @include('Announcement/_form',['submitButton'=>'Add New Announcement'])
    <div class = "form-group">
        {!! Form::submit('Create Announcement', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    @include('errors.list')
@stop
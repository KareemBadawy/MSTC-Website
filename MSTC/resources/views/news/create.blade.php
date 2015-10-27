@extends('app')

@section('title')
	<title>New News</title>
@stop

@section('content')

    <h1>Write a New News</h1>
    <hr/>

    {!! Form::open(['url'=>'news']) !!}
        @include('news/_form',['submitButton'=>'Add New News'])
    {!! Form::close() !!}
    
    @include('errors.list')

@stop
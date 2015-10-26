@extends('app')

@section('content')

    <h1>Write a New Post</h1>
    <hr/>

    {!! Form::open(['url'=>'posts']) !!}
        @include('posts/_form',['submitButton'=>'Add New Post'])
    {!! Form::close() !!}
    
    @include('errors.list')

@stop
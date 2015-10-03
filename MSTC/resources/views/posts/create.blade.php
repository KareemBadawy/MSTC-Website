@extends('app')

@section('header')
    <li><h5>Posts</h5></li>
@stop

@section('side')
    @include('posts.side');
@stop

@section('content')

    <h1>Write a New Post</h1>
    <hr/>

    {!! Form::open(['url'=>'posts']) !!}
        @include('posts/_form',['submitButton'=>'Add New Post']);
    {!! Form::close() !!}
    
    @include('errors.list');

@stop
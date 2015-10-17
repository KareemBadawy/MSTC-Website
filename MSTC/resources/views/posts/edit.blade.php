@extends('app')

@section('header')
    <li><h5>Posts</h5></li>
@stop

@section('side')
    @include('posts.side');
@stop

@section('content')
    @if($currentuser == $post->user_id)

    <h1>Edit : {!! $post-> title !!}</h1>

    {!! Form::model($post,['method'=>'PATCH', 'action'=>['PostsController@update',$post->id]]) !!}
        @include('posts._form', ['submitButton'=>'Update Post']);
    {!! Form::close() !!}

    @include('errors.list');
    
    @endif
@stop
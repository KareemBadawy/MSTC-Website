@extends('app')

@section('header')
    <li><h5>Posts</h5></li>
@stop

@section('side')
    @include('posts.side');
@stop

@section('content')

    <article>
    	<h1>{{ $post->title }}</h1>
    	<div class = "body"> {{ $post->body }} </div>
    	<a   href="{{ action('PostsController@destroy' , [$post->id]) }}"> Delete</a>|
    	<a   href="{{ action('PostsController@edit' , [$post->id]) }}"> Edit</a>
    </article>

@stop
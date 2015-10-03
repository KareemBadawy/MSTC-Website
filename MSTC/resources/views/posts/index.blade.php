@extends('app')

@section('header')
    <li><h5>Posts</h5></li>
@stop

@section('side')
    @include('posts.side');
@stop

@section('content')
    @foreach($posts as $post)
    <article>
    	<h2><a href="{{ action('PostsController@show' , [$post->id]) }}">{{ $post->title }}</a></h2>
    	<div class = "body"> {{ $post->body }} </div>
    </article>
    @endforeach
@stop
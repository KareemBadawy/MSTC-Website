@extends('app')

@section('content')

    <article>
    	<h1>belongs to : <STRONG>{{ App\User::findorfail($post->user_id)->username }}</STRONG></h1>
    	<h2>Vertical: {{App\Vertical::findorfail($post->vertical_id)->name}}</h2>
    	<hr>
    	<hr>
    	<h3>title :{{ $post->title }}</h3>

    	<div class = "body"> Body: {{ $post->body }} </div>
    	@if($currentuser == $post->user_id )
    	<a   href="{{ action('PostsController@destroy' , [$post->id]) }}"> Delete</a>|
    	<a   href="{{ action('PostsController@edit' , [$post->id]) }}"> Edit</a>
    	@endif
    </article>

@stop
@extends('app')

@section('title')
	<title>Vertical</title>
@stop

@section('content')

    @foreach($currentverticals as $vertical)
        @foreach($vertical->posts()->latest('id')->get() as $post)
		    <article>
		    	<h2><a href="{{ action('PostsController@show' , [$post->id]) }}">{{ $post->title }}</a></h2>
		    	<div class = "body"> {{ $post->body }} </div>
		    </article>
		@endforeach
    @endforeach

@stop
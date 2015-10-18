@extends('app')

@section('content')
    @foreach($scores as $score)
    <article>
    	<h2><a href="{{ action('ScoresController@show' , [$score->id]) }}">{{ App\User::findorfail($score->user_id)->username }}</a></h2>
    </article>
    @endforeach
@stop

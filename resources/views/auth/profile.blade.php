@extends('app')

@section('title')
	<title>{{ $user->username }}</title>
@stop

@section('content')
	<h1>{{ $user->username }}</h1>
	<h2>{{ $user->email }}</h2>
	<h4>Phone: {{ $user->phone }}</h4>
	<h4>Verticals: 
	@foreach($user->verticals as $vertical)
		<ul>{{ $vertical->name }}</ul>
	@endforeach</h4>
	<h4>Role: {{ $user->roles->first()->name }}</h4>
@stop
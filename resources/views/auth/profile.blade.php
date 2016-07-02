@extends('app')

@section('title')
	<title>{{ $user->username }}</title>
@stop

@section('content')
	<div class="row">
		<div class="col-sm-8 "  >
	<h1>{{ $user->username }}</h1>
	<h2>{{ $user->email }}</h2>
	<h4>Phone: {{ $user->phone }}</h4>
	<h4>Verticals: 
	@foreach($user->verticals as $vertical)
		<ul>{{ $vertical->name }}</ul>
	@endforeach</h4>
	<h4>Role: {{ $user->roles->first()->name }}</h4>
			</div>
		<div class="col-sm-3 ">
			@if(Storage::disk('local')->has(Auth::user()->username . '-profile-picture-' . Auth::user()->id. '.jpg'))
				<div style=" width: 100%; height: 10em;overflow: hidden;">
					<img class="img-thumbnail img-circle"  src="{{ route('profile.image', ['filename' => Auth::user()->username . '-profile-picture-' . Auth::user()->id. '.jpg']) }}" width="150px"  alt="...">
				</div>
			@else
				<div style=" width: 100%; height: 10em;overflow: hidden;">
					<img class="img-thumbnail img-circle" src="{{ asset('image/slider/19 - Copy.jpg') }}" width="150px"  alt="...">
				</div>
			@endif
		{!! Form::open(['url'=>'/profile/picture','files' => true]) !!}
	<div class= "form-group">
		{!! Form::label('Profile_Picture', 'Change profile picture:') !!}
		{!! Form::input('file', 'image', null , ['class'=>'manual-file-chooser js-manual-file-chooser js-avatar-field','id'=>'image']) !!}
	</div>
	<div class = "form-group">
		<button type="submit" class="btn btn-primary">Save Picture</button>
	</div>
	{!! Form::close() !!}

	</div>
	</div>
@stop
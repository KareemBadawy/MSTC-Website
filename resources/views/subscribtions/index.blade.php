@extends('app')

@section('content')
	<h1>Subscribtions</h1>
	@foreach ($subscribers as $subscriber)
		<article>
			<h6>{{ $subscriber->email }}</h6>
		</article>
	@endforeach
@stop
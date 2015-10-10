@extends ('app')

@section ('content')
	<h1>
	{{$question->title }}
	</h1>

	<p>
		{{$question->description}}
	</p>

	<h2>
	@if($choices->isEmpty())
		No Choices Yet 
	@else
		Choices
	</h2>
			@foreach($choices as $choice)
			<h3>
				{{$choice->title}}
			</h3>
			@endforeach
	@endif

@stop
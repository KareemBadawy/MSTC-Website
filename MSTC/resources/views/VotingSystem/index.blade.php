@extends ('app');

@section('content')
@foreach($questions as $question)

<h2>
	<a href="{{ url('/questions', $question->id) }}">{{ $question->title }}</a>
</h2>



@endforeach

@stop
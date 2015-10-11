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

	{!! Form::open(array('route' => array('questions.choices.store', $question->id), 'method' => 'post')) !!}
		{!! Form::label('title') !!}
		{!! Form::text('title',null,['class' => 'form-control']) !!}

		{!! Form::submit('Add Choice' , ['class' => 'btn-btn primary form-control']) !!}
	{!! Form::close() !!}
	</br>
	
	</hr>
	
	{!! Form::open(array('route' => array('questions.destroy', $question->id), 'method' => 'delete')) !!}
        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
    {!! Form::close() !!}

@stop
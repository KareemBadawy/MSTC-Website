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
				@foreach($votes as $vote)
					<ol>
					@if($vote->choice_id == $choice->id)
						<li>{{App\User::find($vote->user_id)->username}}</li>
						@if($vote->user_id == $userid)
							{!! Form::open(array('route' => array('questions.choices.votes.destroy', $question->id , $choice->id, $vote->id), 'method' => 'delete')) !!}
        					<button type="submit" class="btn btn-danger btn-mini">Delete Vote</button>
    						{!! Form::close() !!}
						@endif
					@endif
					</ol>
				@endforeach
				{!! Form::open(array('route' => array('questions.choices.destroy', $question->id , $choice->id), 'method' => 'delete')) !!}
        			<button type="submit" class="btn btn-danger btn-mini">Delete Choice</button>
    			{!! Form::close() !!}
    			{!! Form::open(array('route' => array('questions.choices.votes.store', $question->id , $choice->id), 'method' => 'post')) !!}
        			<button type="submit" class="btn btn-danger btn-mini">Add Vote</button>
    			{!! Form::close() !!}
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
        <button type="submit" class="btn btn-danger btn-mini">Delete Question</button>
    {!! Form::close() !!}

@stop
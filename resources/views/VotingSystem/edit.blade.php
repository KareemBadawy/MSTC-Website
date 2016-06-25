@extends ('app')

@section('content')
	{!! Form::model($question,['method'=>'PATCH', 'action'=>['QuestionsController@update',$question->id]]) !!}
		<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title',null,['class' => 'form-control']) !!}


		{!! Form::label('description') !!}
		{!! Form::textarea('description',null,['class' => 'form-control']) !!}

		<label for="deadline">Deadline</label>
		<input type="datetime-local" name="deadline" cols="50"/>
		
		{!! Form::submit('Add Question' , ['class' => 'btn-btn primary form-control']) !!}


		
		</div>
	{!! Form::close() !!}
	
@stop
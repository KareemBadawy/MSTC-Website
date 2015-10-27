<div class = "form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class = "form-group" >
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('verticals', 'Vertical:') !!}
	{!! Form::select('vertical[]', $verticals, null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
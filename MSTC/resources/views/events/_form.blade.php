<div class = "form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class = "form-group" >
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class= "form-group">
	{!! Form::label('started_at', 'Start On:') !!}
    {!! Form::input('datetime-local', 'started_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class= "form-group">
	{!! Form::label('ended_at', 'End On:') !!}
    {!! Form::input('datetime-local', 'ended_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
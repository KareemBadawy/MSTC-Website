<div class = "form-group">
    {!! Form::label('creativity', 'Creativity:') !!}
    {!! Form::text('creativity', null, ['class'=>'form-control']) !!}
</div><div class = "form-group">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class'=>'form-control']) !!}
</div><div class = "form-group">
    {!! Form::label('quality', 'Quality:') !!}
    {!! Form::text('quality', null, ['class'=>'form-control']) !!}
</div><div class = "form-group">
    {!! Form::label('numberofedits', 'Number Of Edits:') !!}
    {!! Form::text('numberofedits', null, ['class'=>'form-control']) !!}
</div><div class = "form-group">
    {!! Form::label('bouns', 'Bouns:') !!}
    {!! Form::text('bouns', null, ['class'=>'form-control']) !!}
</div>

<div class = "form-group">
	{!! Form::label('users', 'users:') !!}
	{!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
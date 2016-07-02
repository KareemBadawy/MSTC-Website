<div class = "form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class = "form-group" >
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class= "form-group">
    {!! Form::label('News_photo', 'Upload photo:') !!}
    {!! Form::input('file', 'image', null , ['class'=>'form-control','id'=>'image']) !!}
</div>

<div class= "form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::input('datetime-local', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
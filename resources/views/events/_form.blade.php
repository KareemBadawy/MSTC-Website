<div class = "form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class = "form-group" >
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class= "form-group">
    {!! Form::label('image', 'Add Cover photo:') !!}
    {!! Form::File( 'image' , ['class'=>'field','id'=>'image','accept'=>"image/*"]) !!}
</div>

<div class= "form-group">
	{!! Form::label('started_at', 'Start On:') !!}
    {!! Form::input('datetime-local', 'started_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class= "form-group">
	{!! Form::label('ended_at', 'End On:') !!}
    {!! Form::input('datetime-local', 'ended_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Present_Event', 'Upcoming Event:') !!}
    {!! Form::input('hidden', 'status', 0 ) !!}
    {!! Form::checkbox('status', 1) !!}
</div>

<div class= "form-group">
        {!! Form::label('gallery', 'Add photos to event gallery:') !!}
        {!! Form::File( 'gallery[]' , ['class'=>'field','id'=>'gallery','multiple'=>"1" ,'accept'=>"image/*"]) !!}
</div>



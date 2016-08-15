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

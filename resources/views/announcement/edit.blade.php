@extends('app')

@section('header')
    <li><h5>Events</h5></li>
@stop

@section('side')
    
@stop

@section('content')
    <h1>Edit : {!! $Announcement-> title !!}</h1>
    {!! Form::model($Announcement,['method'=>'PATCH', 'action'=>['AnnouncementsController@update',$Announcement->id],'files'=> true]) !!}
      @include('Announcement._form')
    <div class = "form-group">
        {!! Form::submit('Update Announcement', ['class' => 'btn btn-primary form-control']) !!}
    </div>
     {!! Form::close() !!}
     @include('errors.list');
 @stop
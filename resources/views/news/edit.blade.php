@extends('app')

@section('header')
    <li><h5>News</h5></li>
@stop

@section('content')
    <h1>Edit : {!! $news-> title !!}</h1>

    {!! Form::model($news,['method'=>'PATCH', 'action'=>['NewsController@update',$news->id],'files'=> true]) !!}
        @include('news._form', ['submitButton'=>'Update News']);
    {!! Form::close() !!}

    @include('errors.list');
@stop
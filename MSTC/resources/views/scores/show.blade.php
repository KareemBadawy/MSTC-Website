@extends('app')

@section('content')

    <article>
        <h1>Score of the {{ App\Task::findorfail($score->task_id)->title}} for {{App\User::findorfail($score->user_id)->username}}</h1>
        <hr>
        <h3>Creativity : {{ $score->creativity }}</h3>
        <h3>Time : {{ $score->time }}</h3>
        <h3>Quality : {{ $score->quality }}</h3>
        <h3>Number Of Edits : {{ $score->numberofedits }}</h3>
        <h3>Bouns : {{ $score->bouns }}</h3>
        <hr>
    	<h3>Total Score : {{ $score->total_score_for_a_task }}</h3>
    </article>

@stop
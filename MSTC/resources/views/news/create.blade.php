<h1>Write a new News</h1>
<hr/>

{!! Form::open(['url' => 'news']) !!}
	
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title') !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('published_at', 'Publish On:') !!}
		{!! Form::input('date', 'published_at', date('Y-m-d')) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Add News') !!}
	</div>

{!! Form::close() !!}

@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
			<li>
				{{ $error }}
			</li>
		@endforeach
	</ul>
@endif
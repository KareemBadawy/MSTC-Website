<!DOCTYPE html>
<html lang="en">
<head>
	<title>Microsoft Student Tech Club - Alexandria University</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="shortcut icon" src=icon.ico" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
<body>
<!--header-->
<div class="container ontopheader supreme-container" style="justify-content:center;align-items:center;margin-top: 20px">
	<div class="row">
		<div class="col-md-3" style="margin-bottom: 20px">
			<img class="img animated fadeInDown" src="{{ asset('image/logo-white.png') }}" alt="logo" style="max-width: 250px">
		</div>
		<div class="col-md-2 col-md-offset-7">
			@if(Auth::check())
				<img data-toggle="dropdown" src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="50" height="50"style="display : block; margin : auto;">
				<ul class="dropdown-menu">
					<li><a href="/dashboard">Dashboard</a></li>
					<li><a href="/profile">Profile</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="/auth/logout">Logout</a></li>
				</ul>
			@else
				<button type="button" class="btn1 btn1-primary1 btn1-lg1 outline1" data-toggle="modal" data-target="#myModal">Sign in</button>
			@endif
		</div>
	</div>
</div>

<h1>News</h1>

@foreach ($news as $new)
	<article>
		<h2>
			<a href="{{ url('/news', $new->id) }}">{{ $new->title }}</a>
		</h2>
		<div class="body">{{ $new->body }}</div>
	</article>
@endforeach

</body>
</html>
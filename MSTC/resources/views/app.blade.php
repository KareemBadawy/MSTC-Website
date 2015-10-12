<!doctype html>
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>MSTC</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
</head>
<body>
	@if(Auth::check())

	<header class ="navbar navbar-default" role = "navigation">
		<div class ="navbar-inner">
			<nav class = "collapse navbar-collapse navbar-ex1-collapse">
			    <ul class="nav navbar-nav navbar-right nav-tabs">
			    	@yield('header')
				    <li><a href="{{action('TasksController@index')}}">Tasks</a></li>
				    <li><a href="{{action('PostsController@index')}}">Posts</a></li>
				    <li><a href="{{action('QuestionsController@index')}}">Questions</a></li> 
				    <li><a href="{{action('Auth\AuthController@getLogout')}}">Logout</a></li>
			    </ul>
			</nav>
		</div>
	</header>

    <div>
        @yield('side');
    </div>
    @endif
    <div class = "container" >
        @yield('content')
    </div>
    <script src = "http://code.jquery.com/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <div>
    	@yield('footer')
    </div>

</body>
</html>
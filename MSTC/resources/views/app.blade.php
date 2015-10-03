<!doctype html>
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>MSTC</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<header class ="navbar navbar-default" role = "navigation">
		<div class ="navbar-inner">
			<nav class = "collapse navbar-collapse navbar-ex1-collapse">
			    <ul class="nav navbar-nav navbar-right nav-tabs">
			    	@yield('header')
				    <li><a href="{{action('TasksController@index')}}">Tasks</a></li>
				    <li><a href="{{action('PostsController@index')}}">Posts</a></li>
			    </ul>
			</nav>
		</div>
	</header>
	
        <div>
            @yield('side');
        </div>
        <div class = "container" >
		    @yield('content')
	    </div>


</body>
</html>
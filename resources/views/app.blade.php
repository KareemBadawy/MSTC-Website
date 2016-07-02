<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="{{ asset('font-awesome-4.4.0/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>

	<style>
		.brand {height:40px;
			margin-bottom: -7px;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-default no-margin navbar-fixed-top">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header fixed-brand">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
		</button>
		<div  style="padding: 10px">
			<a href="/">
			<img class="brand" src="{{ asset('image/logo.png') }}" alt="logo" >
			</a>
		</div>

	</div>
	<!-- navbar-header-->

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active" >
				<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
					<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
				</button>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">

			<li>
				<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
					<span class="fa fa-bell" aria-hidden="true"></span>
				</button>
			</li>
			<li style="padding-top: 3px;padding-right: 25px">
				@if(Storage::disk('local')->has(Auth::user()->username . '-profile-picture-' . Auth::user()->id. '.jpg'))
					<img data-toggle="dropdown" src="{{ route('profile.image', ['filename' => Auth::user()->username . '-profile-picture-' . Auth::user()->id. '.jpg']) }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="50" height="50"style="display : block; margin : auto;">
				@else
					<img data-toggle="dropdown" src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="50" height="50"style="display : block; margin : auto;">
				@endif
					<ul class="dropdown-menu">

					<li><a href="/profile">Profile</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="/auth/logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- bs-example-navbar-collapse-1 -->
</nav>

<div id="wrapper">
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav nav-pills nav-stacked" id="menu">
			<li class="activable active">
				<a href="/dashboard" class="colorable" style="border-radius: 0;background-color: #01a4f1"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
			</li>
			<?php
			$icon = array("Technical"=>"fa fa-wrench fa-stack-1x","Operations"=>"fa fa-cogs fa-stack-1x","Media & Marketing"=>"fa fa-youtube-play fa-stack-1x","H.R."=>"fa fa-server fa-stack-1x","P.R."=>"fa fa-print fa-stack-1x") ?>
			<li>
				<a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> Vertical</a>
				<ul class="nav-pills nav-stacked" style="list-style-type:none;">
					@if(Auth::check())
						@foreach(Auth::user()->verticals as $vertical)
							<li class="activable"><a class="colorable" href="{{ action('PostsController@post_vertical' , [$vertical->id]) }}"><span class="fa-stack fa-lg pull-left"><i class="{{ $icon[$vertical->name] }}"></i></span>{{ $vertical->name }}</a></li>
						@endforeach
					@endif
				</ul>
			</li>
			<li class="activable">
				<a class="colorable" href="{{ action('TasksController@index') }}"><span class="fa-stack fa-lg pull-left"><i class="fa  fa-tasks fa-stack-1x "></i></span>Tasks</a>
			</li>
			<li class="activable">
				<a href="#" class="colorable"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-pie-chart fa-stack-1x "></i></span>Polls</a>
			</li>
			<li>
				<a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus-square fa-stack-1x "></i></span>Create</a>
				<ul class="nav-pills nav-stacked" style="list-style-type:none;">
					<li  class="activable"><a  class="colorable" href="/posts/create" ><span class="fa-stack fa-lg pull-left"><i class="fa fa-pencil-square fa-stack-1x "></i></span>Post</a></li>
					<li class="activable"><a class="colorable" href="/tasks/create"><span class="fa-stack fa-lg pull-left"><i class="fa fa-tasks fa-stack-1x "></i></span>Task</a></li>
					<li class="activable"><a class="colorable" href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-bar-chart fa-stack-1x "></i></span>Poll</a></li>
					<li class="activable"><a class="colorable" href="/news/create"><span class="fa-stack fa-lg pull-left"><i class="fa fa-newspaper-o fa-stack-1x "></i></span>News</a></li>
					<li class="activable"><a class="colorable" href="/events/create" ><span class="fa-stack fa-lg pull-left"><i class="fa fa-ticket fa-stack-1x "></i></span>Event</a></li>
					<li class="activable"><a class="colorable" href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-picture-o fa-stack-1x "></i></span>Ads</a></li>
					<li class="activable"><a class="colorable" href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>User</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /#sidebar-wrapper -->

	<div id="page-content-wrapper">
		<div class="container-fluid xyz">
			<div class="row">
				<div id="pjax-container" class="col-lg-12">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<!-- /#page-content-wrapper -->
	<!-- Sidebar -->

	<!-- Page Content -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->

<script src="{{ asset('js/sidebar_menu.js') }}"></script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script>
	$(document).pjax('a', '#pjax-container')
	$(document).ready(function(){

		// does current browser support PJAX
		if ($.support.pjax) {
			$.pjax.defaults.timeout = 1000; // time in milliseconds
		}

	});
	$('.activable').click(function(){
		$('.activable').removeClass('active');
		$(this).addClass('active');
	});
	$('.colorable').click(function(){
		$('.colorable').css({"border-radius": "", "background-color": ""});
		$(this).css({"border-radius": "0", "background-color": "#01a4f1"});
	});
</script>
@yield('footer')
</body>

</html>
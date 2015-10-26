<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="{{ asset('font-awesome-4.4.0/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
	<style>
		.brand {height:40px;
			margin-bottom: -7px;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-default no-margin">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header fixed-brand">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
		</button>
		<div  style="padding: 10px">
			<img class="brand" src="{{ asset('image/logo.png') }}" alt="logo" >
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
			<li style="padding-top: 3px;padding-right: 10px">
				<img data-toggle="dropdown" src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="50" height="50"style="display : block; margin : auto;">
				<ul class="dropdown-menu">
					<li><a href="#">Profile</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- bs-example-navbar-collapse-1 -->
</nav>

<div id="wrapper">
	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav nav-pills nav-stacked" id="menu">

			<li class="active">
				<a href="#" style="border-radius: 0;background-color: #fab133"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
			</li>
			<li>
				<a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> Vertical</a>
				<ul class="nav-pills nav-stacked" style="list-style-type:none;">
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Technical</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cogs fa-stack-1x "></i></span>Operations</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>Media & Marketing</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>HR</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-print fa-stack-1x "></i></span>PR</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa  fa-tasks fa-stack-1x "></i></span>Tasks</a>
			</li>
			<li>
				<a href="#"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-pie-chart fa-stack-1x "></i></span>Polls</a>
			</li>
			<li>
				<a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus-square fa-stack-1x "></i></span>Create</a>
				<ul class="nav-pills nav-stacked" style="list-style-type:none;">
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-pencil-square fa-stack-1x "></i></span>Post</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-tasks fa-stack-1x "></i></span>Task</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-bar-chart fa-stack-1x "></i></span>Poll</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-newspaper-o fa-stack-1x "></i></span>News</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-ticket fa-stack-1x "></i></span>Event</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-picture-o fa-stack-1x "></i></span>Ads</a></li>
					<li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span>User</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /#sidebar-wrapper -->
	<!-- Page Content -->
	<div id="page-content-wrapper">
		<div class="container-fluid xyz">
			<div class="row">
				<div class="col-lg-12">
					@yield('side');
				</div>
			</div>
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{ asset('sidebar_menu.js') }}"></script>
</body>

</html>
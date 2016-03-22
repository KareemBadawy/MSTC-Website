<!DOCTYPE html>
<html lang="en">
<head>
    <title>MSP Tech Club - Alexandria University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link href="{{ asset('css/full-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/verify.notify.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/scrolling-nav.js') }}"></script>

    <style>
        @font-face{
            font-family: "Thonburi-Bold";
            src: url('{{ asset('font/segoeui.ttf') }}'),
            url('{{ asset('font/segoeui.ttf') }}'); /* IE */
        }
        body {
            font-family: Thonburi-Bold;
        }

        .form-control:focus {
            border-color: #01a4f1;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
        }
        .carousel-control.left, .carousel-control.right {
            background-image: none;
            z-index:7;
        }
        .ontopheader {
            height: 15%;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right:0;
            z-index: 999;
        }
        a {
            color: #01a4f1;
        }
        a:link {
            color: #01a4f1;
        }
        a:visited {
            color: #01a4f1;
        }
        a:hover {
            color: #01a4f1;
        }
        textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,
        .uneditable-input:focus {
            border-color: #01a4f1;

        }

        .btn2-primary2 {
            color: #fff;
            background-color: #00a651;
            border-color: #00a651;
        }
        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
        .modal {
            text-align: center;
        }

        @media screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }
        body.modal-open .supreme-container{
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
        }
        @media screen and (max-width: 990px) {
            #about {
                background: #01a4f1;
            }
        }
        @media (min-width: 990px) {
        #about{
            background: #01a4f1 url('{{ asset('image/about-bk.png') }}') left no-repeat fixed;-webkit-background-size: contain;
            -moz-background-size: contain;
            -o-background-size: contain;
            background-size: contain;
        }
        }
        .brand {height:40px;
            margin-bottom: -7px;
        }
        .modal-dialog {

        }

        .modal-content {

        }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="60">

<!--navbar-->
<nav class="navbar navbar-default navbar-fixed-top supreme-container" role="navigation">
    <div class="container">
        <div class="navbar-header fixed-brand page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

                <div style="padding: 10px">
                    <a class="page-scroll" href="#page-top">
                        <img class="brand" src="{{ asset('image/logo.png') }}" alt="logo" >
                    </a>
                </div>

        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a class="page-scroll" href="#page-top">Home</a></li>
                <li><a class="page-scroll" href="#projects">Projects</a></li>
                <li><a class="page-scroll" href="#news">News</a></li>
                <li><a class="page-scroll" href="#about">About</a></li>
                <li><a class="page-scroll" href="#contact">Contact Us</a></li>
                <li><a class="page-scroll" href="#subscribe">Subscribe</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style="padding-top: 3px;padding-right: 10px">
                    @if(Auth::check())
                    <img data-toggle="dropdown" src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="48" height="48"style="display : block; margin : auto;">
                    <ul class="dropdown-menu">
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/profile">Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                    @else
                        <ul class="nav">
                            <li><a href="#subscribe" data-toggle="modal" style="background:none;" data-target="#myModal">Sign in</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sign in -->
@include('/auth/login')
        <!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{ asset('image/slider/1.jpg') }}" alt="...">
                                    <div class="carousel-caption">
                                        ...
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('image/slider/1.jpg') }}" alt="...">
                                    <div class="carousel-caption">
                                        ...
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolore eveniet fuga laboriosam modi tempora! Dicta dolorum illo in magni, nemo qui ratione recusandae rerum sapiente sint sit tempore voluptatem?
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                <button type="button" class="btn1 btn1-primary1 btn1-lg1 outline1" data-toggle="modal" data-target="#myModal">Sign In</button>
            @endif
        </div>
    </div>
</div>

<!--Slider-->
<header id="myCarousel supreme-container" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators supreme-container">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner supreme-container" role="listbox">
        <div class="item active">
            <div class="filll" style="background-color: black; opacity: 0.6"></div>
            <div class="fill" style="background-image:url('{{ asset('image/slider/1.jpg') }}');"></div>
            <div class="carousel-caption">
                <h1>End of summer courses</h1>
                <h4>Web development , character design and windows phone.</h4>
                <br>
                <a href="#" class="btn btn-primary" role="button" style="color: white">Learn More</a>
                <br>  <br>  <br>
            </div>
        </div>

        <div class="item">
            <div class="filll" style="background-color: black; opacity: 0.6"></div>
            <div class="fill" style="background-image:url('{{ asset('image/slider/9.jpg') }}');"></div>
            <div class="carousel-caption">
                <h1>End of summer courses</h1>
                <h4>Web development , character design and windows phone.</h4>
                <br>
                <a href="#" class="btn btn-primary" role="button" style="color: white">Learn More</a>
                <br>  <br>  <br>
            </div>
        </div>

        <div class="item">
            <div class="filll" style="background-color: black; opacity: 0.6"></div>
            <div class="fill" style="background-image:url('{{ asset('image/slider/19.jpg') }}');"></div>
            <div class="carousel-caption">
                <h1>End of summer courses</h1>
                <h4>Web development , character design and windows phone.</h4>
                <br>
                <a href="#" class="btn btn-primary" role="button" style="color: white">Learn More</a>
                <br>  <br>  <br>
            </div>
        </div>

        <div class="item">
            <div class="filll" style="background-color: black; opacity: 0.6"></div>
            <div class="fill" style="background-image:url('{{ asset('image/slider/36.jpg') }}');"></div>
            <div class="carousel-caption">
                <h1>End of summer courses</h1>
                <h4>Web development , character design and windows phone.</h4>
                <br>
                <a href="#" class="btn btn-primary" role="button" style="color: white">Learn More</a>
                <br>  <br>  <br>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control supreme-container" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control supreme-container" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</header>

<!--projects-->
<div id="projects" class="container-fluid fill supreme-container" style="background-color: white">
    <div class="container">
        <div class="container-fluid" style="padding-bottom: 40px">

            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#home">Upcomming</a></li>
                <li><a data-toggle="tab" href="#menu1">Present</a></li>
                <li><a data-toggle="tab" href="#menu2">Past</a></li>
            </ul>
            <div class="tab-content">
                <!--upcomming-->
                <div class="row tab-pane fade in active" id="home">
                <div class="col-md-4 " style="padding-top: 40px" >
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                    <p style="font-size: 18px;padding-top: 40px;text-align: center">Portfolio</p>
                    <p style="font-size: 14px;padding: 40px;text-align: center">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                </div>
                <div class="col-md-4" style="padding-top: 40px" >
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                    <p style="font-size: 18px;padding-top: 40px;text-align: center">hi</p>
                    <p style="font-size: 14px;padding: 40px;text-align: center">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                </div>
                <div class="col-md-4" style="padding-top: 40px" >
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                    <p style="font-size: 18px;padding-top: 40px;text-align: center">lol</p>
                    <p style="font-size: 14px;padding: 40px;text-align: center">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>

                </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            <a style="color: white;display: block;margin: auto" class="btn btn-primary" href="/events">See More Events</a>
                        </div>
                    </div>
            </div>
                <!--present-->
                <div class="row tab-pane fade" id="menu1">
                <div class="col-md-4 " style="padding-top: 40px" >
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                    <p style="font-size: 18px;padding-top: 40px;text-align: center">Po</p>
                    <p style="font-size: 14px;padding: 40px;text-align: center">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                </div>
                <div class="col-md-4" style="padding-top: 40px" >
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                    <p style="font-size: 18px;padding-top: 40px;text-align: center">Po</p>
                    <p style="font-size: 14px;padding: 40px;text-align: center">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                </div>
                <div class="col-md-4" style="padding-top: 40px" >
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                    <p style="font-size: 18px;padding-top: 40px;text-align: center">Po</p>
                    <p style="font-size: 14px;padding: 40px;text-align: center">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            <a style="color: white;display: block;margin: auto" class="btn btn-primary" href="/events">See More Events</a>
                        </div>
                    </div>
            </div>
                <!--past-->
                <div class="row tab-pane fade" id="menu2">
                    <div class="col-md-4 " style="padding-top: 40px" >
                        <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                        <p style="font-size: 18px;padding-top: 40px;text-align: center">folio</p>
                        <p style="font-size: 14px;padding: 40px;text-align: center">
                            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                        </p>
                        <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                    </div>
                    <div class="col-md-4" style="padding-top: 40px" >
                        <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                        <p style="font-size: 18px;padding-top: 40px;text-align: center">folio</p>
                        <p style="font-size: 14px;padding: 40px;text-align: center">
                            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                        </p>
                        <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                    </div>
                    <div class="col-md-4" style="padding-top: 40px" >
                        <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                        <p style="font-size: 18px;padding-top: 40px;text-align: center">folio</p>
                        <p style="font-size: 14px;padding: 40px;text-align: center">
                            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                        </p>
                        <button type="button" class="btn btn-default" style="display : block; margin : auto;background-color: #9a9c9f;color:white">Read More</button>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            <a style="color: white;display: block;margin: auto" class="btn btn-primary" href="/events">See More Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--news-->
<div id="news" class="container-fluid fill supreme-container" style="background-color: #f1f1f1;padding-bottom: 40px">
    <!--title-->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 wow animated fadeInDown"style="text-align: center;font-size: 36px;padding-top: 40px">News</div>
                <div class="col-md-9"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid" style="padding-bottom: 40px">
            <div class="row">
                <div class="col-md-3"style="padding-top: 40px">
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                </div>
                <div class="col-md-9" style="padding-top: 40px">
                    <p style="font-size: 18px">Portfolio</p>
                    <p style="font-size: 14px">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <a href="/news/1" style="right: 0px;position: absolute;padding: 10px;">Read more</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"style="padding-top: 40px">
                    <img src="{{ asset('image/slider/19%20-%20Copy.jpg') }}" class="img-thumbnail img-circle" alt="Cinque Terre" width="200" height="200"style="display : block; margin : auto;">
                </div>
                <div class="col-md-9" style="padding-top: 40px">
                    <p style="font-size: 18px">Portfolio</p>
                    <p style="font-size: 14px">
                        This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                    </p>
                    <a href="#" style="right: 0px;position: absolute;padding: 10px;">Read more</a>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <a style="color: white" class="btn btn-primary" href="/news">More News</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--about-->
<div id="about" class="container-fluid fill supreme-container">
    <div class="container">
        <div class="container-fluid" style="padding-bottom: 40px">
            <div class="row">
                <div class="col-md-2" ></div>
                <div class="col-md-2" style="text-align: center;font-size: 36px;padding-top: 40px;color:white">About</div>
                <div class="col-md-8" ></div>
            </div>

            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-9" style="text-align: left;font-size: 24px;padding-top: 40px;color:white">
                    Microsoft Student Partners Technology Club at Alexandria University is a student
                    community program that promotes advanced technology through
                    education, practice, and innovation. It also provides students with both
                    technical and non-technical sessions needed, packing their lives
                    with high level of skills and supporting their careers with opportunities.
                </div>
            </div>

            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-9" style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                    The club is divided into 4 verticals
                </div>
            </div>

            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-2" style="padding-top: 40px">
                    <a href="default.asp">
                        <img src="{{ asset('image/vr/tech.png') }}" style="display : block; margin : auto;">
                    </a>
                    <p style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                        Technical
                    </p>
                </div>
                <div class="col-md-2" style="padding-top: 40px">
                    <a href="default.asp">
                        <img src="{{ asset('image/vr/op.png') }}" style="display : block; margin : auto;">
                    </a>
                    <p style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                        Projects
                    </p>
                </div>
                <div class="col-md-2" style="padding-top: 40px">
                    <a href="default.asp">
                        <img src="{{ asset('image/vr/mm.png') }}" style="display : block; margin : auto;">
                    </a>
                    <p style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                        Media and Marketing
                    </p>
                </div>
                <!--
                <div class="col-md-2" style="padding-top: 40px">
                    <a href="default.asp">
                        <img src="{{ asset('image/vr/pr.png') }}" style="display : block; margin : auto;">
                    </a>
                    <p style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                        PR
                    </p>
                </div>
                -->
                <div class="col-md-2" style="padding-top: 40px">
                    <a href="default.asp">
                        <img src="{{ asset('image/vr/hr.png') }}" style="display : block; margin : auto;">
                    </a>
                    <p style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                        HR
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Contact us-->
@include('/contactus')
<div id="subscribe" class="fill" style="background-color: #333">
<!--Subscribe-->
@include('/subscribtions/subscribe')

<!--footer-->
<div class="container-fluid fillo supreme-container" style="height:85%;background-color: #333">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <!--vision-->
                <div class="col-md-1" >
                    <div style="text-align: left;font-size: 18px;padding-top: 40px;color:white">Vision</div>
                    <img src="{{ asset('image/mini-logo.png') }}" style="padding-top: 10px">
                </div>

                <div class="col-md-6" >
                    <p style="text-align: left;font-size: 14px;padding-top: 70px;color:white">
                        MSP Tech Club at Alexandria university has a clear mission to help the students in the campus and to be there for any kind of support needed whether it's technical or non-technical and to help them find their most suitable career.
                    </p>
                    <p style="text-align: left;font-size: 14px;padding-top: 40px;color:#01a4f1">
                        MSP Tech Club - Alexandria University
                        </br>
                        www.mstcalex.com
                    </p>
                </div>

                <div class="col-md-1" ></div>
                <!--twitter-->
                <div class="col-md-4" >
                    <div style="text-align: left;font-size: 18px;padding-top: 40px;color:white">Latest Tweets</div>
                    <a class="twitter-timeline"
                       data-widget-id="652420821441490944"
                       href="https://twitter.com/TwitterDev"
                       data-chrome="nofooter noheader noborders"
                       data-tweet-limit="3">
                        Tweets by @TwitterDev
                    </a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>

            <!--social media-->
            <div class="row">
                <div class="col-xs-0 col-md-4" ></div>
                <div class="col-xs-1" style="margin:20px;padding-left:-10px;" >
                    <a title="Follow MSTC on Facebook" href="https://www.facebook.com/AlexUTC" target="_blank">
                        <img onmouseover="this.src='{{ asset('image/social/f-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/f.png') }}'"
                             alt="Follow MSTC on Facebook"
                             src="{{ asset('image/social/f.png') }}" /></a>
                </div>
                <div class="col-xs-1" style="margin:20px;padding-left:-10px;" >
                    <a title="Follow MSTC on Twitter" href="https://twitter.com/MSTCAlex" target="_blank">
                        <img onmouseover="this.src='{{ asset('image/social/t-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/t.png') }}'"
                             alt="Follow MSTC on Twitter"
                             src="{{ asset('image/social/t.png') }}" /></a>
                </div>
                <div class="col-xs-1" style="margin:20px;padding-left:-10px" >
                    <a title="Follow MSTC on YouTube" href="https://www.youtube.com/channel/UCJ6e8iFzj0d4loO12cD5qiA" target="_blank">
                        <img onmouseover="this.src='{{ asset('image/social/y-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/y.png') }}'"
                             alt="Follow MSTC on YouTube"
                             src="{{ asset('image/social/y.png') }}" /></a>
                </div>
                <div class="col-xs-1" style="margin:20px;padding-left:-10px;">
                    <a title="Follow MSTC on LinkedIn" href="https://www.linkedin.com/company/microsoft-student-tech-club---alexandria-university" target="_blank">
                        <img onmouseover="this.src='{{ asset('image/social/in-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/in.png') }}'"
                             alt="Follow MSTC on LinkedIn"
                             src="{{ asset('image/social/in.png') }}" /></a>
                </div>
                <div class="col-xs-4" ></div>
            </div>

            <!--copyrights-->
            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-6">
                    <p style="text-align: center;font-size: 12px;padding-top: 10px;color:white">&copy 2015 - All rights reserved <a href="#" >MSP Tech Club - Alexandria University</a></p>
                </div>
                <div class="col-md-3" ></div>
            </div>
        </div>
    </div>
</div>

</div>


<script>
    new WOW().init();
    (function ($) {
        $(document).ready(function(){

            // hide .navbar first
            $(".navbar").hide();

            // fade in .navbar
            $(function () {
                $(window).scroll(function () {
                    // set distance user needs to scroll before we fadeIn navbar
                    if ($(this).scrollTop() > 60) {
                        $('.navbar').fadeIn();
                    } else {
                        $('.navbar').fadeOut();
                    }
                });


            });

        });
    }(jQuery));
</script>
</body>
</html>
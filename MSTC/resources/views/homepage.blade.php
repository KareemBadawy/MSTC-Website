<!DOCTYPE html>
<html lang="en">
<head>
    <title>Microsoft Student Tech Club - Alexandria University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- Verify.js (with Notify.js included) -->
    <script src="{{ asset('verify.notify.min.js') }}"></script>
    <link href="{{ asset('css/full-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">
    <style>
        @font-face{
            font-family: "Thonburi-Bold";
            src: url('{{ asset('font/segoeui.ttf') }}'),
            url('{{ asset('font/segoeui.ttf') }}'); /* IE */
        }
        body {
            font-family: Thonburi-Bold;
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
            z-index: 99999;
            pointer-events:none;
        }
        a {
            color: #fab133;
        }
        a:link {
            color: #fab133;
        }
        a:visited {
            color: #fab133;
        }
        a:hover {
            color: #fab133;
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
            border-color: #fab133;

        }

        .btn2-primary2 {
            color: #fff;
            background-color: #00a651;
            border-color: #00a651;
        }
    </style>
</head>
<body>

<!--header-->
<div class="container ontopheader" style="display:flex;justify-content:center;align-items:center;">
    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive" src="{{ asset('image/logo-white.png') }}" alt="logo">
        </div>
        <div class="col-md-7"></div>
        <div class="col-md-2">
            <a href="#" class="btn1 btn1-primary1 btn1-lg1 outline1" role="button">Sign in</a>
        </div>
    </div>
</div>

<!--Slider-->
<header id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="filll" style="background-color: black; opacity: 0.6"></div>
            <div class="fill" style="background-image:url('{{ asset('image/slider/1.jpg') }}');"></div>
            <div class="carousel-caption">
                <h1>End of summer courses</h1>
                <h4>Web development , character design and windows phone.</h4>
                <br>
                <a href="#" class="btn btn-warning" role="button" style="color: white">Learn More</a>
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
                <a href="#" class="btn btn-warning" role="button" style="color: white">Learn More</a>
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
                <a href="#" class="btn btn-warning" role="button" style="color: white">Learn More</a>
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
                <a href="#" class="btn btn-warning" role="button" style="color: white">Learn More</a>
                <br>  <br>  <br>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</header>

<!--projects-->
<div class="container-fluid fill" style="background-color: white">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" style="background-color: brown">hello</div>
                <div class="col-md-4" style="background-color: black">ya</div>
                <div class="col-md-4" style="background-color: blueviolet">bashar</div>
            </div>
        </div>
    </div>
</div>

<!--news-->
<div class="container-fluid fill" style="background-color: #f1f1f1">
    <!--title-->
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"style="text-align: center;font-size: 36px;padding-top: 40px">News</div>
                <div class="col-md-9"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid">
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
        </div>
    </div>
</div>

<!--about-->
<div class="container-fluid fill" style="background: #fab133 url('{{ asset('image/about-bk.png') }}') left no-repeat;-webkit-background-size: contain;
        -moz-background-size: contain;
        -o-background-size: contain;
        background-size: contain;">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" ></div>
                <div class="col-md-2" style="text-align: center;font-size: 36px;padding-top: 40px;color:white">About</div>
                <div class="col-md-8" ></div>
            </div>

            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-9" style="text-align: left;font-size: 24px;padding-top: 40px;color:white">
                    Microsoft Student Tech Club at Alexandria University is a student
                    community program that promotes advanced technology through
                    education, practice, and innovation. It also provides students with both
                    technical and non-technical sessions needed which is packing their lives
                    with high level of skills and supporting their careers with opportunities.
                </div>
            </div>

            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-9" style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                    The club is divided into 5 verticals
                </div>
            </div>

            <div class="row">
                <div class="col-md-2" ></div>
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
                <div class="col-md-2" style="padding-top: 40px">
                    <a href="default.asp">
                        <img src="{{ asset('image/vr/pr.png') }}" style="display : block; margin : auto;">
                    </a>
                    <p style="text-align: center;font-size: 24px;padding-top: 40px;color:white">
                        PR
                    </p>
                </div>
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

<!--contact us-->
<div class="container-fluid fill" style="background-color: white">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"style="text-align: center;font-size: 36px;padding-top: 40px">Contact Us</div>
                <div class="col-md-9"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid" style="padding-top: 40px">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <form role="form">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="name" placeholder="Name">
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <form role="form">
                        <div class="form-group">
                            <input type="email" class="form-control input-lg" id="email" placeholder="Email">
                        </div>
                    </form>
                </div>
            </div>

            <div class="row"style="padding-top: 30px">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <form role="form">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" id="pwd" placeholder="Title">
                        </div>

                    </form>
                </div>
            </div>

            <div class="row"style="padding-top: 30px">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <form role="form">
                        <div class="form-group">
                            <textarea  class="form-control input-lg" rows="10" id="comment" placeholder="Message"></textarea>
                        </div>

                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <a href="#"  class="btn btn-warning btn-lg" role="button" style="color: white">Submit</a>
                </div>
                <div class="col-md-5"></div>
            </div>

        </div>
    </div>
</div>

<!--Subscribe-->
<div class="container-fluid fill" style="border-top:solid #eeeeee;border-top-width:1px;height:15%;background-color: white;display:flex;justify-content:center;align-items:center;">
    <div class="container">
        <div class="container-fluid">
            <p style="text-align: center;font-size: 16px;padding-top: 10px">
                Please write your email here so you can get our latest news via email.
            </p>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            {!! Form::open(['url' => '/']) !!}
                <div class="form-group">
                    {!! Form::text('email', null, ['class'=>'form-control input','placeholder'=>'Email','data-validate'=>'required,email']) !!}
                </div>

        </div>
        <div class="col-md-2">
            <div class = "form-group">
            {!! Form::submit('Subscribe', ['class' => 'btn btn2-primary2 form-control submit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-2"></div>
    </div>
        </div>
    </div>
</div>

<!--footer-->
<div class="container-fluid fill" style="height:85%;background-color: #333">
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
                        Microsoft Tech Club at Alexandria university has a clear mission to help the students in the campus and to be there for any kind of support needed whether it's technical or non-technical and to help them find their most suitable career.
                    </p>
                    <p style="text-align: left;font-size: 14px;padding-top: 40px;color:#fab133">
                        Microsoft Student Tech Club - Alexandria University
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
                <div class="col-md-4" ></div>
                <div class="col-md-1" >
                    <a title="Follow MSTC on Facebook" href="https://www.facebook.com/AlexUTC">
                        <img onmouseover="this.src='{{ asset('image/social/f-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/f.png') }}'"
                             alt="Follow MSTC on Facebook"
                             src="{{ asset('image/social/f.png') }}" /></a>
                </div>
                <div class="col-md-1" >
                    <a title="Follow MSTC on Twitter" href="https://twitter.com/MSTCAlex">
                        <img onmouseover="this.src='{{ asset('image/social/t-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/t.png') }}'"
                             alt="Follow MSTC on Twitter"
                             src="{{ asset('image/social/t.png') }}" /></a>
                </div>
                <div class="col-md-1" >
                    <a title="Follow MSTC on YouTube" href="https://www.youtube.com/channel/UCJ6e8iFzj0d4loO12cD5qiA">
                        <img onmouseover="this.src='{{ asset('image/social/y-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/y.png') }}'"
                             alt="Follow MSTC on YouTube"
                             src="{{ asset('image/social/y.png') }}" /></a>
                </div>
                <div class="col-md-1" >
                    <a title="Follow MSTC on LinkedIn" href="https://www.linkedin.com/company/microsoft-student-tech-club---alexandria-university">
                        <img onmouseover="this.src='{{ asset('image/social/in-c.png') }}'"
                             onmouseout="this.src='{{ asset('image/social/in.png') }}'"
                             alt="Follow MSTC on LinkedIn"
                             src="{{ asset('image/social/in.png') }}" /></a>
                </div>
                <div class="col-md-4" ></div>
            </div>

            <!--copyrights-->
            <div class="row">
                <div class="col-md-3" ></div>
                <div class="col-md-6">
                    <p style="text-align: center;font-size: 12px;padding-top: 10px;color:white">© 2015 - All rights reserved <a href="#" >Microsoft Student Tech Club - Alexandria University</a></p>
                </div>
                <div class="col-md-3" ></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
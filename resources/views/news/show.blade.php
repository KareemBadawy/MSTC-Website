<!DOCTYPE html>
<html lang="en">
<head>
    <title>Microsoft Student Tech Club - Alexandria University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="shortcut icon" src=icon.ico"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <style>
        .brand {
            height: 40px;
            margin-bottom: -7px;
        }

        .modal-dialog {

        }

        .modal-content {

        }
    </style>
</head>
<body>
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
                <a class="page-scroll" href="/#page-top">
                    <img class="brand" src="{{ asset('image/logo.png') }}" alt="logo">
                </a>
            </div>

        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="page-scroll"><a class="page-scroll" href="/#page-top">Home</a></li>
                <li><a class="page-scroll" href="/#projects">Projects</a></li>
                <li><a class="page-scroll" href="/#news">News</a></li>
                <li><a class="page-scroll" href="/#about">About</a></li>
                <li><a class="page-scroll" href="/#contact">Contact Us</a></li>
                <li><a class="page-scroll" href="/#subscribe">Subscribe</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style="padding-top: 3px;padding-right: 10px">
                    @if(Auth::check())
                        @if(Storage::disk('local')->has(Auth::user()->username . '-profile-picture-' . Auth::user()->id. '.jpg'))
                            <img data-toggle="dropdown"
                                 src="{{ route('profile.image', ['filename' => Auth::user()->username . '-profile-picture-' . Auth::user()->id. '.jpg']) }}"
                                 class="img-thumbnail img-circle" alt="Cinque Terre" width="50" height="50"
                                 style="display : block; margin : auto;">
                        @else
                            <img data-toggle="dropdown" src="{{ asset('image/slider/19%20-%20Copy.jpg') }}"
                                 class="img-thumbnail img-circle" alt="Cinque Terre" width="50" height="50"
                                 style="display : block; margin : auto;">
                        @endif
                        <ul class="dropdown-menu">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/profile">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    @else
                        <ul class="nav">
                            <li><a href="#subscribe" data-toggle="modal" style="background:none;"
                                   data-target="#myModal">Sign in</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        @if(File::exists('image/News/'.$new->title . '-new-' .$new->id. '.jpg'))
            <div style=" width: 100%; height: 10em;overflow: hidden;">
                <img src="{{asset('image/News/'.$new->title . '-new-' .$new->id. '.jpg' ) }}" width="400px" style=" min-width: 100%;
  min-height: 100%;" alt="...">
            </div>
        @else
            <div style=" width: 100%; height: 10em;overflow: hidden;">
                <img src="{{ asset('image/slider/19 - Copy.jpg') }}" width="400px" style=" min-width: 100%;
  min-height: 100%;" alt="...">
            </div>
        @endif
        <h1>{{ $new->title }}</h1>

        <h3>{{ $new->body }}</h3>

        {{ $new->published_at }}
        @if(Auth::check())
            @if(Auth::user()->hasRole('Vice Head'))
                <p><a href="{{ url('/news', $new->id.'/edit') }}" class="btn btn-primary" role="button">Edit News</a> <a
                            href="{{ url('/news', $new->id.'/destroy') }}" class="btn btn-danger" role="button">Delete
                        News</a></p>
            @endif
        @endif
    </div>
</div>
<footer>
    <!--footer-->
    <div class="container-fluid fillo supreme-container" style="height:85%;background-color: #333">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <!--vision-->
                    <div class="col-md-1">
                        <div style="text-align: left;font-size: 18px;padding-top: 40px;color:white">Vision</div>
                        <img src="{{ asset('image/mini-logo.png') }}" style="padding-top: 10px">
                    </div>

                    <div class="col-md-6">
                        <p style="text-align: left;font-size: 14px;padding-top: 70px;color:white">
                            MSP Tech Club at Alexandria university has a clear mission to help the students in the
                            campus and to be there for any kind of support needed whether it's technical or
                            non-technical and to help them find their most suitable career.
                        </p>
                        <p style="text-align: left;font-size: 14px;padding-top: 40px;color:#01a4f1">
                            MSP Tech Club - Alexandria University
                            </br>
                            www.mstcalex.com
                        </p>
                    </div>

                    <div class="col-md-1"></div>
                    <!--twitter-->
                    <div class="col-md-4">
                        <div style="text-align: left;font-size: 18px;padding-top: 40px;color:white">Latest Tweets</div>
                        <a class="twitter-timeline"
                           data-widget-id="652420821441490944"
                           href="https://twitter.com/TwitterDev"
                           data-chrome="nofooter noheader noborders"
                           data-tweet-limit="3">
                            Tweets by @TwitterDev
                        </a>
                        <script>!function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + "://platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, "script", "twitter-wjs");</script>
                    </div>
                </div>

                <!--social media-->
                <div class="row">
                    <div class="col-xs-0 col-md-4"></div>
                    <div class="col-xs-1" style="margin:20px;padding-left:-10px;">
                        <a title="Follow MSTC on Facebook" href="https://www.facebook.com/AlexUTC" target="_blank">
                            <img onmouseover="this.src='{{ asset('image/social/f-c.png') }}'"
                                 onmouseout="this.src='{{ asset('image/social/f.png') }}'"
                                 alt="Follow MSTC on Facebook"
                                 src="{{ asset('image/social/f.png') }}"/></a>
                    </div>
                    <div class="col-xs-1" style="margin:20px;padding-left:-10px;">
                        <a title="Follow MSTC on Twitter" href="https://twitter.com/MSTCAlex" target="_blank">
                            <img onmouseover="this.src='{{ asset('image/social/t-c.png') }}'"
                                 onmouseout="this.src='{{ asset('image/social/t.png') }}'"
                                 alt="Follow MSTC on Twitter"
                                 src="{{ asset('image/social/t.png') }}"/></a>
                    </div>
                    <div class="col-xs-1" style="margin:20px;padding-left:-10px">
                        <a title="Follow MSTC on YouTube"
                           href="https://www.youtube.com/channel/UCJ6e8iFzj0d4loO12cD5qiA" target="_blank">
                            <img onmouseover="this.src='{{ asset('image/social/y-c.png') }}'"
                                 onmouseout="this.src='{{ asset('image/social/y.png') }}'"
                                 alt="Follow MSTC on YouTube"
                                 src="{{ asset('image/social/y.png') }}"/></a>
                    </div>
                    <div class="col-xs-1" style="margin:20px;padding-left:-10px;">
                        <a title="Follow MSTC on LinkedIn"
                           href="https://www.linkedin.com/company/microsoft-student-tech-club---alexandria-university"
                           target="_blank">
                            <img onmouseover="this.src='{{ asset('image/social/in-c.png') }}'"
                                 onmouseout="this.src='{{ asset('image/social/in.png') }}'"
                                 alt="Follow MSTC on LinkedIn"
                                 src="{{ asset('image/social/in.png') }}"/></a>
                    </div>
                    <div class="col-xs-4"></div>
                </div>

                <!--copyrights-->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <p style="text-align: center;font-size: 12px;padding-top: 10px;color:white">&copy 2015 - All
                            rights reserved <a href="/">MSP Tech Club - Alexandria University</a></p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

</footer>

</body>
</html>


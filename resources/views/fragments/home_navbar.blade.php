<!-- first navbar -->
<nav class="navbar transparent navbar-light bg-faded container">
    <!-- Nav bar - logo -->
    <a href="#announcement">
        <img style="max-width: 300px"
             class="navbar-brand"
             src="{{ asset('image/logo-white.png') }}"
             alt="logo">
    </a>
    <!-- Nav bar -  sign in -->
    <form class="form-inline float-xs-center float-sm-right">
        <button class="btn btn-outline-primary btn-lg sign-btn" type="submit">Sign in</button>
    </form>

</nav>

<!-- navbar after scrolling -->
<nav class="navbar navbar-fixed-top navbar-light bg-faded">
    <!-- Nav bar - logo -->
    <a href="#announcement">
        <img style="max-width: 150px" class="navbar-brand" src="{{ asset('image/logo.png') }}" alt="logo">
    </a>

    <!-- Nav bar - hamburger button -->
    <button class="navbar-toggler hidden-lg-up float-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
    </button>

    <div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2">
        <!-- Nav bar - navigation -->
        <ul class="nav navbar-nav">
            <li class="nav-item active nav-first-item">
                <a class="nav-link" href="#announcement" data-value="announcement">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#events" data-value="events">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#news">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#subscribe">Subscribe</a>
            </li>
        </ul>
        <!-- Nav bar -  sign in -->
        <form class="form-inline float-xs-left float-lg-right">
            <button class="btn btn-outline-primary" type="submit">Sign in</button>
        </form>
    </div>

</nav>
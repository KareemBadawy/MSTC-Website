<section id="announcement">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- carousel-indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- carousel-items -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <!-- overlay layer ( black ) -->
                <div class="overlay"></div>
                <!-- slider image -->
                <div class="fill" style="background-image: url('{{ asset('image/slider/9.jpg') }}')"></div>
                <!-- slider description -->
                <div class="carousel-caption">
                    <!-- slider title -->
                    <h3>...</h3>
                    <!-- slider description -->
                    <p>...</p>
                    <button type="button" class="btn btn-primary">Read More</button>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <div class="fill" style="background-image: url('{{ asset('image/slider/19.jpg') }}')"></div>
                <div class="carousel-caption">
                    <h3>...</h3>
                    <p>...</p>
                    <button type="button" class="btn btn-primary">Read More</button>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <div class="fill" style="background-image: url('{{ asset('image/slider/36.jpg') }}')"></div>
                <div class="carousel-caption">
                    <h3>...</h3>
                    <p>...</p>
                    <button type="button" class="btn btn-primary">Read More</button>
                </div>
            </div>
        </div>
        <!-- carousel-controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
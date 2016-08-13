@extends('app')

@section('title')
	<title>Dashboard</title>
@stop
@section('active')
	active
	@stop
@section('content')
            <!--Posts related to the vertical-->
    <div class="col-md-7">
        <section class="posts endless-pagination"  data-next-page="{{ $posts->nextPageUrl() }}">
            @foreach($posts as $post)
                <article>
                    <h2><a href="{{ action('PostsController@show' , [$post->id]) }}">{{ $post->title }}</a></h2>
                    <div class = "body"> {{ $post->body }} </div>
                </article>
            @endforeach
        </section>
    </div>
    <div class="col-md-5">
        <div class="row">
            <!-- the first three tasks related to the user-->
        @if(count(Auth::User()->tasks)>0)
                @foreach($tasks as $task)
                    <article>
                        <h1>{{ $task->title }}</h1>
                        <div class = "body"> {{ $task->body }} </div>
                        <p>
                            <a href="{{ action('TasksController@updatestatus' , [$task->id]) }}"> Finished</a>

                        </p>
                    </article>
                @endforeach
            @else
                <h2>You have no Tasks</h2>
            @endif
        </div>
        </div>

    <script>

        $(document).ready(function() {
            $(window).scroll(function() {
                //  get the data of the next page of posts
                var page = $('.endless-pagination').data('next-page');

                if(page !== null) {
                    clearTimeout( $.data( this, "scrollCheck" ) );
                    $.data( this, "scrollCheck", setTimeout(function() {
                        //set the variable with the distance needed to start to bringing  the new posts to the page
                        //+100pixels is to start  bringing  the new posts just before the scroll reach bottom
                        var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

                        //when user scroll to the end append the new posts with the old posts and update the next-page var
                        if(scroll_position_for_posts_load >= $(document).height()) {
                            $.get(page, function(data){
                                $('.endless-pagination').append(data.posts);
                                $('.endless-pagination').data('next-page', data.next_page);
                            });
                        }
                    }, 350))
                }
            });
        });
    </script>
@stop

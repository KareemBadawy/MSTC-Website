<link href="{{ asset('css/gallery-photos.css') }}" rel="stylesheet">

<link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
<script src="{{ URL::to('js/dropzone.js') }}"></script>

<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{url('events/'.$event->id.'/images')}}"><h3>Photos attached to this Event</h3></a>
    </div>
    @if(Auth::check()&&Auth::user()->hasRole('Vice Head'))
        {!! Form::open(array('url' => Request::url(), 'method' => 'post', 'files' => true)) !!}
        <div id="myDrop" class="dropzone">
        </div>
        {{csrf_field()}}
        {!! Form:: close()!!}
    @endif

    @if(File::isDirectory('image/Events/' .$event->id)||File::exists('image/Events/'.$event->title . '-' . $event->id . '.jpg'))
        <div class="panel-footer">
            <div class="row" id="my-gallery">
                @if(File::exists('image/Events/'.$event->title . '-' . $event->id . '.jpg'))
                    <div class="col-xs-6 col-md-3" data-eventid="{{$event->id}}"
                         data-filename="{{$event->title . '-' .$event->id. '.jpg'}}">
                        <a data-toggle="modal" data-target="#image-modal" class="thumbnail"
                           onclick="set_item_active('cover_img')">
                            <img id="myimage"
                                 src="{{ asset( 'image/Events/'.$event->title . '-' .$event->id. '.jpg') }}"
                                 width="400px" style="min-width: 100%;min-height: 100%;" alt="...">
                        </a>
                        @if(Auth::check())
                            @if(Auth::user()->hasRole('Vice Head'))
                                <div class="interaction cover">
                                    <button class="btn btn-danger btn-sm delete_image">Delete photo</button>
                                </div>
                            @endif
                        @endif
                    </div>
                @endif
                @if(File::isDirectory('image/Events/' .$event->id))
                    @foreach(File::files('image/Events/' .$event->id) as $part)
                        <div class="col-xs-6 col-md-3" data-eventid="{{$event->id}}"
                             data-filename="{{basename($part)}}">
                            <a data-toggle="modal" data-target="#image-modal" class="thumbnail"
                               onclick="set_item_active('{{basename($part)}}')">
                                <img class="img-responsive" id="myimage" src="{{asset($part)}}" alt="...">
                            </a>
                            @if(Auth::check())
                                @if(Auth::user()->hasRole('Vice Head'))
                                    <div class="interaction">
                                        <button class="btn btn-primary btn-sm change_cover">use as cover</button>
                                        <button class="btn btn-danger btn-sm delete_image">Delete photo</button>
                                    </div>
                                @endif
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @else
        <div class="panel-footer">
            <div class="row" id="my-gallery">
                <h1 class="alert"> No photos attached to this event </h1>
            </div>
        </div>
    @endif
</div>

<div class="modal fade bs-example-modal-lg" id="image-modal" tabindex="-1" role="img">
    <div class="modal-dialog modal-lg" role="img">
        <div class="row">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 20px"><span
                        aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner" role="listbox" id="Event_modal_images">
                    @if(File::exists('image/Events/'.$event->title . '-' . $event->id . '.jpg'))
                        <div id="cover_img" class="item active" style="height: 500px;  background-color: black">
                            <img src="{{ asset( 'image/Events/'.$event->title . '-' .$event->id. '.jpg') }}"
                                 style="height: 100%; margin-left:auto;margin-right:auto;">
                        </div>
                    @endif
                    @foreach(File::files('image/Events/' .$event->id) as $part)
                        <div id="{{basename($part)}}" class="item" style="height: 500px;  background-color: black">
                            <img src="{{asset( $part)}}" style="height: 100%; margin-left:auto;margin-right:auto;">
                        </div>
                    @endforeach
                </div>
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
    </div>
</div>
<script>

    Dropzone.autoDiscover = false;

    $("#myDrop").dropzone({
        url: "{{url('events/'.$event->id.'/images/update')}}",

        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        },
        success: function (file, response) {
            var img_list = $('#my-gallery');
            $("h1").remove(".alert");
            $(img_list).append('<div class="col-xs-6 col-md-3" data-eventid="{{$event->id}}" data-filename="' + response + '\" > ' +
                    '              <a data-toggle="modal" data-target="#image-modal" class="thumbnail" onclick="set_item_active(\'' + response + '\')"> ' +
                    '              <img class="img-responsive" id="myimage"  src="' + '{{asset('image/Events/' . $event->id) }}' + '/' + response +"?timestamp="+new Date().getTime() +'\"' + ' alt="..."> ' +
                    '              </a> ' +
                    '              <div class="interaction"> ' +
                    '              <button  class="btn btn-primary btn-sm change_cover" >use as cover</button> ' +
                    '              <button  class="btn btn-danger btn-sm delete_image" >Delete photo</button> </div> ' +
                    '              </div>');
            img_list = $('#Event_modal_images');
            $(img_list).append('<div id="' + response + '" class="item"  style="height: 500px;  background-color: black"> <img  src="' + '{{asset('image/Events/' . $event->id) }}' + '/' + response+"?timestamp="+new Date().getTime() + '"' + '   style="height: 100%; margin-left:auto;margin-right:auto;"   > </div>');
            if (file.previewElement) {
                return file.previewElement.classList.add("dz-success");
            }
        }

    });

    $(document).ready(function () {
        var eventId = 0;
        //change the cover
        $(document).on("click", ".change_cover", function (event) {
            event.preventDefault();
            var hasBeenClicked = $(this).attr("has-been-clicked");
            if (hasBeenClicked === "yes") {
                return;
            }
            $(this).attr("has-been-clicked", "yes");
            eventId = event.target.parentNode.parentNode.dataset['eventid'];
            var file = event.target.parentNode.parentNode.dataset['filename'];

            $.ajax({
                        method: 'get',
                        url: '/events/' + eventId + '/images/' + file + '/cover'

                    })

                    .done(function (response) {
                        if ($('div.interaction.cover')[0]) {
                            $('div.interaction.cover')[0].parentNode.dataset['filename']=response+'-' +eventId+ '.jpg';
                            $('div.interaction.cover').prepend("<button class=\"btn btn-primary btn-sm change_cover\" >use as cover</button>")
                                    [0].setAttribute('class', 'interaction')
                        }
                        event.target.parentNode.setAttribute('class', 'interaction cover');
                         event.target.parentNode.parentNode.dataset['filename']='{{$event->title . '-' .$event->id. '.jpg'}}';
                        event.target.remove();
                        $("#page_cover").attr("src","{{asset('image/Events/') }}"+"/"+"{{$event->title . '-' .$event->id. '.jpg'}}"+"?timestamp="+new Date().getTime() );

                    });

        });

        //delete the image
        $(document).on("click", ".delete_image", function (event) {
            event.preventDefault();
            var hasBeenClicked = $(this).attr("has-been-clicked");
            if (hasBeenClicked === "yes") {
                return;
            }
            $(this).attr("has-been-clicked", "yes");
            var eventId = event.target.parentNode.parentNode.dataset['eventid'];
            var file = event.target.parentNode.parentNode.dataset['filename'];
            $.ajax({
                        method: 'get',
                        url: '/events/' + eventId + '/images/' + file + '/destroy'
                    })
                    .done(function () {
                        event.target.parentNode.parentNode.remove();
                    });
        });
// set the variable to the last image visited before closing the modal
        $('#image-modal').on('hidden.bs.modal', function ($event) {
            $event.preventDefault();
            lastimage = document.getElementsByClassName('item active')[0].getAttribute('id');

        });

    });
    var lastimage = null;
    // set the item active of the modal
    function set_item_active($img) {
        var cover_img = document.getElementById('cover_img');

        if (lastimage == null && cover_img != null) {
            cover_img.setAttribute('class', 'item');
            lastimage = "";
        }
        else if (lastimage != $img && lastimage != null) {
            document.getElementById(lastimage).setAttribute('class', 'item');
        }
        document.getElementById($img).setAttribute('class', 'item active');
    }
</script>


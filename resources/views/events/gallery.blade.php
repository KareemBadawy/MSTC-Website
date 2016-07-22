@if(File::isDirectory('image/Events/' .$event->id)||File::exists('image/Events/'.$event->title . '-' . $event->id . '.jpg'))
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{url('events/'.$event->id.'/images')}}"  ><h3>Photos attached to this Event</h3></a>
        </div>
        <div class="panel-footer">
            <div class="row">
                @if(File::exists('image/Events/'.$event->title . '-' . $event->id . '.jpg'))
                    <div class="col-xs-6 col-md-3">
                        <a href="# " class="thumbnail">
                            <img src="{{ asset( 'image/Events/'.$event->title . '-' .$event->id. '.jpg') }}" width="400px" style="min-width: 100%;min-height: 100%;" alt="...">
                        </a>
                        <p>
                            <a href="{{url('events/'.$event->id.'/images/'.basename(asset( 'image/Events/'.$event->title . '-' .$event->id. '.jpg')).'/destroy')}}" class="btn btn-danger btn-sm" role="button">Delete photo</a></p>
                    </div>
                @endif
                @if(File::isDirectory('image/Events/' .$event->id))
                    @foreach(File::files('image/Events/' .$event->id) as $part)
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail">
                                <img src={{asset($part)}} width="400px"  style="min-width: 100%;min-height: 100%;" alt="...">
                            </a>
                            <p><a href="{{url('events/'.$event->id.'/images/'.basename($part).'/cover')}}" class="btn btn-primary btn-sm" role="button">use as cover</a>
                                <a href="{{url('events/'.$event->id.'/images/'.basename($part).'/destroy')}}" class="btn btn-danger btn-sm" role="button">Delete photo</a></p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
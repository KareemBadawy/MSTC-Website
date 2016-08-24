<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use Image;
use File;
use App;
use Auth;
use Carbon\Carbon;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'index_upcoming', 'index_present', 'index_past', 'show_images']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::check() && Auth::user()->hasRole('Vice Head'))
            $events = Event::orderby('created_at', 'desc')->get();
        else {
            $events = Event::orderby('created_at', 'desc')
                ->where('status', '=', '0')
                ->orwhere('status', '=', '1')
                ->orwhere('ended_at', '<=', Carbon::now())
                ->where('status', '=', '0')
                ->orwhere('status', '=', '1')
                ->get();
        }

        return view('events.index', compact('events'));
    }

    /**
     * Display a listing of the present events.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_present()
    {
        if (Auth::check() && Auth::user()->hasRole('Vice Head'))
            $events = Event::orderby('created_at', 'desc')
                ->where('ended_at', '>=', Carbon::now())
                ->where('status', '=', '0')
                ->orwhere('status', '=', '2')
                ->where('ended_at', '>=', Carbon::now())
                ->get();
        else {
            $events = Event::orderby('created_at', 'desc')
                ->where('status', '=', '0')
                ->where('ended_at', '>=', Carbon::now())
                ->get();
        }
        return view('events.index', compact('events'));
    }


    /**
     * Display a listing of the past events.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_past()
    {
        if (Auth::check() && Auth::user()->hasRole('Vice Head'))
            $events = Event::orderby('ended_at', 'desc')
                ->where('ended_at', '<', Carbon::now())
                ->get();
        else {
            $events = Event::orderby('ended_at', 'desc')
                ->where('status', '!=', '2')
                ->where('status', '!=', '3')
                ->where('ended_at', '<', Carbon::now())
                ->get();
        }
        return view('events.index', compact('events'));
    }

    /**
     * Display a listing of the upcoming events.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_upcoming()
    {
        if (Auth::check() && Auth::user()->hasRole('Vice Head'))
            $events = Event::orderby('created_at', 'desc')
                ->where('status', '=', '1')
                ->where('ended_at', '>=', Carbon::now())
                ->orwhere('status', '=', '3')
                ->where('ended_at', '>=', Carbon::now())
                ->get();
        else {
            $events = Event::orderby('created_at', 'desc')
                ->where('ended_at', '>=', Carbon::now())
                ->where('status', '=', '1')
                ->get();
        }
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(EventRequest $request)
    {
        Event::create($request->all());
        if (File::exists($request->file('image'))) {
            $event = Event::where('title', '=', $request->input('title'))->first();
            $filename = $request->input('title') . '-' . $event->id . '.jpg';
            $file = Image::make($request->file('image'));
            $file->save('image/Events/' . $filename);
        }
        return redirect('events');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $event = Event::findOrFail($id);
        if (($event->status == 2 || $event->status == 3) && !(Auth::check() && Auth::user()->hasRole('Vice Head')))
            //generate 404 error if the event is hidden
            App::abort(404);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $event = Event::findOrfail($id);
        return view('events.edit', compact('event'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function update(EventRequest $request, $id)
    {
        $event = Event::where('id', '=', $id)->first();
        $new_filename = $request->input('title') . '-' . $event['id'] . '.jpg';
        $old_filename = $event['title'] . '-' . $event['id'] . '.jpg';
        $found = false; // to avoid deleting image if it is exist by same name
        Event::findOrfail($id)->update($request->all());
        $uploadedfiles_count = count($request->file('gallery')); // it will be used to check if there is a file can't be uploaded
        $count = 0;
        // gallery images

        if ($uploadedfiles_count > 0) {
            if (!File::isDirectory('image/Events/' . $id))
                File::makeDirectory('image/Events/' . $id, 0775);
            foreach ($request->file('gallery') as $part) {
                if (File::exists($part)) {
                    $file = Image::make($part);
                    while ($found == false) {
                        $count++;
                        if (!File::exists('image/Events/' . $id . '/' . ($count) . '-' . $id . '.jpg')) {
                            $file->save('image/Events/' . $id . '/' . ($count) . '-' . $id . '.jpg');
                            break;
                        }
                    }
                }

            }
        }

        //should use ecnrypt()
        //Cover Image

        if (File::exists($request->file('image'))) {
            $file = Image::make($request->file('image'));
            $file->save('image/Events/' . $new_filename);
        }
        if (!File::exists($request->file('image'))) {
            if (File::exists('image/Events/' . $old_filename)) {
                $file = Image::make('image/Events/' . $old_filename);
                $file->save('image/Events/' . $new_filename);
            }
        }
        if ($request->input('title') != $event['title']) {
            if (File::exists('image/Events/' . $old_filename))
                File::delete('image/Events/' . $old_filename);
        }
        return redirect('events');
    }


    /**
     * publish and hide the event.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function publish($event_id)
    {

        $event = Event::find($event_id);
        if (!$event) {
            return null;
        }
        if ($event) {
            if ($event->status == 0)
                //hide state for present event
                $event->status = 2;
            else if ($event->status == 1)
                //hide state for upcoming event
                $event->status = 3;
            else if ($event->status == 2)
                // publish state for present event
                $event->status = 0;
            else if ($event->status == 3)
                // publish state for upcoming event
                $event->status = 1;
        }
        $event->update();
        return null;
    }


    /**
     * upload new image
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function update_images(Request $request, $id){
        if ($request->file('file')) {
            //get the files in the event gallery
            $files=File::files('image/Events/'.$id.'/');
            //get the name of the last image and get it's id
            $count_id=  substr( basename($files[count($files)-1]),0,1)+1;
             //check if directory exist
            if (!File::isDirectory('image/Events/' . $id))
                File::makeDirectory('image/Events/' . $id, 0775);

            $file = Image::make($request->file('file'));

                if (!File::exists('image/Events/' . $id . '/' . ($count_id) . '-' . $id . '.jpg')) {
                    $file->save('image/Events/' . $id . '/' . ($count_id) . '-' . $id . '.jpg');

                }

            return response($count_id . '-' . $id . '.jpg');
            }

    }


    /**
     * Show all the Event images
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function show_images($id)
    {
        $event = Event::findOrfail($id);
        //generate 404 error if the event is hidden
        if (($event->status == 2 || $event->status == 3) && !(Auth::check() && Auth::user()->hasRole('Vice Head')))
            App::abort(404);

        return view('events.images', ['event' => $event]);
    }


    /**
     * delete a certain image
     *
     * @param  int $id ,$name of file
     * @return \Illuminate\Http\Response
     */


    public function delete_agallery_photo($id, $name)
    {   // check if the image is a gallery image
        if (File::exists('image/Events/' . $id . '/' . $name)) {
            File::delete('image/Events/' . $id . '/' . $name);
// delete the gallery directory if the deleted image is the last image in the directory
            if (count(File::files('image/Events/' . $id)) == 0)
                File::deleteDirectory('image/Events/' . $id);

        } else
            // check if the image is cover image
            if (File::exists('image/Events/' . $name))
                File::delete('image/Events/' . $name);
        return redirect()->back();
    }


    /**
     * change_cover the cover image
     *
     * @param  int $id ,$name of file
     * @return \Illuminate\Http\Response
     */


    public function change_cover($id, $name)
    {
        $event = Event::findOrfail($id);
        $cover_image_name = $event['title'] . '-' . $event['id'] . '.jpg';
        if (File::exists('image/Events/' . $cover_image_name)) {
            //get the old cover image
            $file = Image::make('image/Events/' . $cover_image_name);
            //delete the old cover image
            File::delete('image/Events/' . $cover_image_name);
        }
        //get the files in the event gallery
        $files=File::files('image/Events/'.$id.'/');
        //get the name of the last image and get it's id
        $count_id=  substr( basename($files[count($files)-1]),0,1)+1;

        if (!File::exists('image/Events/' . $id . '/' . ($count_id) . '-' . $id . '.jpg')) {
            $file->save('image/Events/' . $id . '/' . ($count_id) . '-' . $id . '.jpg');

        }
         
        if (File::exists('image/Events/' . $id . '/' . $name)) {
            $file = Image::make('image/Events/' . $id . '/' . $name);
            $file->save('image/Events/' . $cover_image_name);
            File::delete('image/Events/' . $id . '/' . $name);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $event = Event::findOrfail($id);
        $filename = $event['title'] . '-' . $event['id'] . '.jpg';
        //if the announcement has a cover image
        //  delete the image
        if (File::exists('image/Events/' . $filename))
            File::delete('image/Events/' . $filename);
        //if the announcement has gallery
        //  delete the Directory
        if (File::isDirectory('image/Events/' . $id)) {
            File::deleteDirectory('image/Events/' . $id);
        }
        $event->delete();
        return redirect('events');
    }
}

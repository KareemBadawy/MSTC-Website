<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use Image;
use File;
use Crypt;
use Carbon\Carbon;
class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show','index_state']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::orderby('created_at','desc')->get();
        return view('events.index', compact('events'));
    }
    public function index_state($state)
    {    if($state=='upcomming')
    {$events=Event::orderby('created_at','desc')->where('status','=','1')->where('ended_at', '>=',Carbon::now())->get();}
    else if($state=='present')
    {$events=Event::orderby('created_at','desc')->where('status','=','0')->where('ended_at', '>=',Carbon::now())->get();}
    else if($state=='past')
    {$events=Event::orderby('ended_at','desc')->where('ended_at', '<',Carbon::now())->get();}
    else {$events=Event::orderby('created_at','desc')->get();}

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        Event::create($request->all());
        if (File::exists($request->file('image')))
        { $event = Event::where('title', '=', $request->input('title'))->first();
        $filename = $request->input('title') . '-' . $event->id. '.jpg';
        $file =Image::make( $request->file('image'));
        $file->save('image/Events/'.$filename) ;}
        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrfail($id);
        return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $event = Event::where('id', '=', $id)->first();
        $new_filename = $request->input('title') . '-' . $event['id'] . '.jpg';
        $old_filename = $event['title'] . '-' . $event['id'] . '.jpg';
        $found=false; // to avoid deleting image if it is exist by same name
        Event::findOrfail($id)->update($request->all());
        $uploadedfiles_count = count($request->file('gallery')); // it will be used to check if there is a file can't be uploaded
        $count=0;
        // gallery images

        if( $uploadedfiles_count > 0)
        {
            if (!File::isDirectory('image/Events/' . $id) )
            File::makeDirectory('image/Events/' . $id, 0775);
        foreach ($request->file('gallery') as $part) {
            if (File::exists($part)) {
                $file = Image::make($part);
                while ($found==false) {
                    $count++;
                if(!File::exists('image/Events/' . $id . '/' . ( $count) . '-' . $id . '.jpg')) {
                    $file->save('image/Events/' . $id . '/' .   ($count ). '-' . $id . '.jpg');
                break;
                  }
                }
            }

        }
    }

        //should use ecnrypt()
        //Cover Image

        if (File::exists($request->file('image'))) {
            $file =Image::make( $request->file('image'));
            $file->save('image/Events/'.$new_filename) ;
        }
        if (!File::exists($request->file('image'))) {
            if (File::exists('image/Events/'.$old_filename)){
            $file = Image::make('image/Events/'.$old_filename);
            $file->save('image/Events/' . $new_filename);
        }
        }
        if($request->input('title')!=$event['title'])
        {
            if(File::exists('image/Events/'.$old_filename))
            File::delete('image/Events/'.$old_filename);
        }
        return redirect('events');
    }
    /**
     * Show all the Event images
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_images($id)
    { $event = Event::where('id', '=', $id)->first();
        return view('events.gallery',['event'=>$event]);
    }
    /**
     * delete a certain image
     *
     * @param  int  $id,$name of file
     * @return \Illuminate\Http\Response
     */
    public function delete_agallery_photo($id,$name)
    {
        if(File::exists('image/Events/'.$id.'/'.$name))
        File::delete('image/Events/'.$id.'/'.$name);
        else if( File::exists('image/Events/'.$name))
            File::delete('image/Events/'.$name);
        return redirect()->back();
    }
    /**
     * delete a certain image
     *
     * @param  int  $id,$name of file
     * @return \Illuminate\Http\Response
     */
    public function change_cover($id,$name)
    {$event = Event::where('id', '=', $id)->first();
        $filename = $event['title'] . '-' . $event['id'] . '.jpg';
        $found=false;
        $count=0;
        if (File::exists('image/Events/'.$filename))
        {
            $file =Image::make( 'image/Events/'.$filename);
            File::delete('image/Events/'.$filename);
            while ($found==false) {
                $count++;
                if(!File::exists('image/Events/' . $id . '/' . $count . '-' . $id . '.jpg')) {
                    $file->save('image/Events/' . $id . '/' .  $count . '-' . $id . '.jpg');
                    break;
                }
            }
        }
        if(File::exists('image/Events/'.$id.'/'.$name))
        {
            $file =Image::make( 'image/Events/'.$id.'/'.$name);
            $file->save('image/Events/'.$filename);
            File::delete('image/Events/'.$id.'/'.$name);
        }

        return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$event = Event::where('id', '=', $id)->first();
        $filename = $event['title'] . '-' . $event['id'] . '.jpg';
        if(File::exists('image/Events/'.$filename))
            File::delete('image/Events/'.$filename);
        if (File::isDirectory('image/Events/' . $id) ) {
            File::deleteDirectory('image/Events/' . $id);
        }
        Event::findOrfail($id)->delete();
        return redirect('events');
    }
}

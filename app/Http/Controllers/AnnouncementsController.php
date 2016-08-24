<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateAnnouncementRequest;
use App\Http\Controllers\Controller;
use Image;
use Auth;
use File;

class AnnouncementsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAnnouncementRequest $request)
    {//create new Announcement and get it's id
        $Announcement_id = Announcement::create($request->all())->id;
        //Check if there is uploaded image
        if (File::exists($request->file('image'))) {
            $image = Image::make($request->file('image'));
            //image name should be unique to avoid overwrite
            $image_name = $request->input('title') . '-announcement-' . $Announcement_id . '.jpg';
            $image->save('image/announcements/' . $image_name);
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Announcement = Announcement::findOrFail($id);
        return view('Announcement.show', compact('Announcement'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Announcement = Announcement::findOrFail($id);
        return view('Announcement.edit', compact('Announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAnnouncementRequest $request, $id)
    {   //get the announcement before update
        $Announcement = Announcement::where('id', '=', $id)->first();
        //update the announcement
        Announcement::findOrFail($id)->update($request->all());
        $old_image_name = $Announcement['title'] . '-announcement-' . $Announcement['id'] . '.jpg';
        //the new name for the image in case the title changed
        $new_image_name = $request->input('title') . '-announcement-' . $Announcement['id'] . '.jpg';
        //check if the user uploaded image
        if (File::exists($request->file('image'))) {
            $file = Image::make($request->file('image'));
            //save the image with the new image name
            $file->save('image/announcements/' . $new_image_name);
            //check if  the title changed
            if ($request->input('title') != $Announcement['title']) {//if there exist file with the old image name delete it
                if (File::exists('image/announcements/' . $old_image_name))
                    File::delete('image/announcements/' . $old_image_name);
            }

        }
        //check if the title changed and the user didn't upload new image
        if (!File::exists($request->file('image')) && $request->input('title') != $Announcement['title']) {
            // if there exist  image with old title name
            //// save image with the new title name
            // delete the image with old title name
            if (File::exists('image/announcements/' . $old_image_name)) {
                $file = Image::make('image/announcements/' . $old_image_name);
                $file->save('image/announcements/' . $new_image_name);
                File::delete('image/announcements/' . $old_image_name);
            }
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Announcement = Announcement::findOrfail($id);
        $filename = $Announcement['title'] . '-announcement-' . $Announcement['id'] . '.jpg';
        //if the announcement has a cover image
        //  delete the image
        if (File::exists('image/announcements/' . $filename))
            File::delete('image/announcements/' . $filename);
        //delete the announcement from the database
        $Announcement->delete();
        return redirect('/');
    }

}
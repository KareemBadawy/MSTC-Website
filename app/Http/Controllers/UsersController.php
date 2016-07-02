<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }
    public function Profile_upload(Request $request){
        $user = Auth::user();
        $file = $request->file('image');
        $filename = $user->username . '-profile-picture-' . $user->id. '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->Back();
    }
    public function getprofileImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}

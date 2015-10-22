<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }
}

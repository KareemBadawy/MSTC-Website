<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChoicesController extends Controller
{
    public function create()
    {
    	return view('choice/create');
    }

    public function store(Requests $request , $id)
    {
    	$choice = $request->all();
    	$choice['question_id'] = $id ;
    }
}

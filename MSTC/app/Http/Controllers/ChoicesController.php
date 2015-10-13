<?php

namespace App\Http\Controllers;

//use Request ;
//use Auth;
use App\Question;
use App\Choice;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChoicesController extends Controller
{
    public function create()
    {
    	return view('choice/create');
    }

    public function store($question, Request $request)
    {
    	$choice = $request->all();
    	$choice['question_id'] = $question ;
    	Choice::create($choice);
    	return back();
    }

    public function destroy($question,$choice)
    {
    	$choice = Choice::findorfail($choice);
    	$choice->delete();
    	return back();
    }
}

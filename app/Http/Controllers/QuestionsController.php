<?php

namespace App\Http\Controllers;

use Auth;
use App\Question ;
use App\Vote ;
use App\User ;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('VotingSystem.index')->with('questions' , $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
            return view('VotingSystem.create');
        else 
            return redirect('auth/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
            $user = Auth::user();
        else 
            return redirect('auth/login');
        $input = $request->all();
        $input['creator_id'] = $user->id ;
        Question::create($input);
        return redirect('questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userid = Auth::user()->id ;
        //dd($userid);
        $question = Question::findorfail($id);
        $choices = $question->getChoices()->get();
        $votes = $question->getVotes()->get();
        return view('VotingSystem/show')
            ->with('question',$question)
            ->with('choices' , $choices)
            ->with('votes' , $votes)
            ->with('userid' , $userid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $q = Question::findorfail($id);
        return view('VotingSystem.edit')->with('question' , $q);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Question::findorfail($id)->update($request->all());
        return redirect('questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check())
        {
            $question = Question::findorfail($id) ;
            $question->delete();
            return redirect('questions');
        } 
        else return redirect('auth/login');
    }
}

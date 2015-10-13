<?php

namespace App\Http\Controllers;

use Auth ;
use DB ;
use App\Question ;
use App\Choice ;
use App\Vote ;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VotesController extends Controller
{

	private function returnifexist($question_id , $choice_id , $user_id)
    {
    	$query = DB::table('votes')
    	->where('question_id' , '=' , $question_id)
    	->where('choice_id' , '=' , $choice_id )
    	->where('user_id' , '=' , $user_id)
    	->count() ;
    	dd($query);
    	if($query == 0)
    		return false ;
    	else return true ;
    }

    public function store(Request $request , $questions , $choices)
    {
    	//dd($votes);
    	//dd($request->all());
    	if(Auth::check())
    	{
    	$user = Auth::user();
    	$vote['question_id'] = $questions ;
    	$vote['choice_id'] = $choices ;
    	$vote['user_id'] = $user->id;
    	if($this->returnifexist($questions, $choices , $user->id) == true)
    	{
    	 	return 'already voted';
    	}
    	Vote::create($vote);
    	return back(); 
    	}
    	else return redirect('auth.login');
    }
    public function destroy($question , $choice , $vote , Request $request)
    {
    	
    }

    
}

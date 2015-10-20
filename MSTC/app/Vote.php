<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //mass assignment 
	protected $fillable = ['question_id' ,'user_id' ,'choice_id'];
	// relation with question
    public function getQuestion()
    {
    	return $this->belongsTo('App\Question');
    }
    // relation with choice
    public function getChoice()
    {
    	return $this->belongsTo('App\Choice');
    }

    public function getUser()
    {
        return $this->belongsTo('App\User');
    }

    
}

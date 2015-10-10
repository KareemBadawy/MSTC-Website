<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Question extends Model
{
    //mass assignment
    protected $fillable = ['title', 'description', 'deadline','creator_id'];

    public function getChoices()
    {
        return $this->hasMany('App\Choice');
    }

    public function getVotes()
    {
    	return $this->hasMany('App\Vote');
    }

    public function getUser()
    {
    	return $this->belongsTo('App\User','creator_id');
    }

    public function getValidQuestions()
    {
    	$query->where('deadline', '>', Carbon::now());
    }

    public function getRecentEndingQuestion()
    {
    	$query->where('deadline' ,'<' , Carbon::now());
    }

 }

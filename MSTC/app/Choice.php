<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
	protected $fillable = ['title'];


    public function getVotes()
    {
    	return $this->hasMany('App\Vote');
    }

    public function getQuestion()
    {
    	return $this->belongsTo('App\Question');
    }


}

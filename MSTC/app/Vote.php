<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    public function getQuestion()
    {
    	return $this->belongsTo('App\Question');
    }

    public function getChoice()
    {
    	return $this->belongsTo('App\Choice');
    }
}

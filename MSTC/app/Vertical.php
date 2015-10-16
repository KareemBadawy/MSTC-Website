<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vertical extends Model
{


	protected $fillable = ['name'];
	/**
	* Get the users associated with the given vertical.
	*
	*
	*/
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

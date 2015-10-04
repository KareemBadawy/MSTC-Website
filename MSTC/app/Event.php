<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
	protected $fillable = [
		'title', 'body', 'status', 'started_at', 'ended_at'
	];

}

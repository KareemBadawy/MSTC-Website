<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    
	protected $fillable = [
		'title', 'body', 'status', 'started_at', 'ended_at'
	];


	protected $dates = ['started_at', 'ended_at'];

	public function scopeStarted($query)
	{
		$query->where('started_at', '<=', Carbon::now());
	}

	public function scopeUnstarted($query)
	{
		$query->where('started_at', '>', Carbon::now());
	}

	public function scopeEnded($query)
	{
		$query->where('ended_at', '<=', Carbon::now());
	}

	public function scopeUnended($query)
	{
		$query->where('ended_at', '>', Carbon::now());
	}

	public function setStartedAtAttribute($date)
	{
		$this->attributes['started_at'] = Carbon::parse($date);
	}

	public function setEndedAtAttribute($date)
	{
		$this->attributes['ended_at'] = Carbon::parse($date);
	}

}

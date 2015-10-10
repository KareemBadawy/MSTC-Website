<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Task extends Model
{
    protected $fillable = [
        'title',
        'body',
        'assign_to',
        'status',      
        'deadline',
        'user_id'
    ];

    public function scopeUnfinished($query)
    {
    	$query->where('status', '=', 0)->where('deadline', '>=', Carbon::now());
    }

     public function scopeFinished($query)
    {
        $query->where('deadline', '<', Carbon::now());
    }

    public function setDeadlineAttribute($date)
    {
    	$this->attributes['deadline'] = Carbon::createFromFormat('Y-m-d',$date);
    }

    public function setStatusAttribute()
    {
    	$this->attributes['status'] = false;
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }


}
 
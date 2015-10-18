<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable =[
        'task_id',
        'user_id',
        'creativity',
        'time',
        'quality',
        'numberofedits',
        'bouns',
        'total_score_for_a_task'
    ]; 

    public function users()
    {
        return $this->belongsTo('App\User');
    } 
}

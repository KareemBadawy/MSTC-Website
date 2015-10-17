<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'vertical'
    ];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function verticals(){
    	return $this->belongsTo('App\Vertical');
    }
}

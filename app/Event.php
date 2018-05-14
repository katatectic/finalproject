<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public $fillable = ['title','event_date','event_hours', 'address','description','content','photo'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
	
}

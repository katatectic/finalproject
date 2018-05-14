<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
<<<<<<< HEAD
	public $fillable = ['title','event_date','event_hours', 'address','description','content','photo'];

=======
	public $fillable = ['title','author_id','event_date','event_hours', 'address','description','content','photo'];
>>>>>>> a67205426090817f2792af0d7600fdca5855935d
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
	
}

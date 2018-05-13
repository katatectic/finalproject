<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public $fillable = ['author_id','title', 'address', 'event_date', 'photo','content'];
    public function user() {
        return $this->belongsTo(User::class);
    }
	
}

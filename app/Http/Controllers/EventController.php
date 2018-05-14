<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use DateTime;
class EventController extends Controller
{
	public $puginationIndex = 5; 
    public $puginationEvents = 10;	
	
    public function eventsPage() {
		$all = Event::orderBy('id','DESC')->paginate($this->puginationEvents);
		return view('events')->with(['all' =>$all]);
	}
	public function oneEvent($id){
		$event=Event::select()->where('id',$id)->first();
		return view('event', compact('event'));
	}
	
}

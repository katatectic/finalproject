<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use DateTime;
class AdminEventController extends Controller
{
	public function eventView() {
        return view('admin.events.event');
    }
	
}

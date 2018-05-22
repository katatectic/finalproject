<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Event;
use App\User;
use App\Slider;
use App\Image;
use App\Album;

class IndexController extends Controller {

    public $puginNewsMain = 5; //количество новостей на главной
    public $puginEventsMain = 3; //количество событий на главной

    public function getMain() {
        $news = Article::orderby('id', 'desc')->paginate($this->puginNewsMain);
        $events = Event::orderby('id', 'desc')->paginate($this->puginEventsMain);
        $sliders = Slider::get();
        $albums = Album::with('Photos')->get();
        return view('welcome', compact('news', 'events', 'sliders', 'albums'));
    }
	public function search(Request $request) {
        $search = $request['search'];
        $events = Event::latest()
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('event_hours', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->paginate(5);
        $news = Article::latest()
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->paginate(5);
        return view('search', compact('events', 'news'));
    }

}

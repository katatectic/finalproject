<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Event;
use App\Slider;
use App\Album;
use App\Report;
use App\User;

class IndexController extends Controller {

    public $newsMain = 7; //количество новостей на главной
    public $eventsMain = 2; //количество событий на главной
    public $searchPagination = 15; 

    public function getMain() {
        $news = Article::orderby('id', 'desc')->take($this->newsMain)->get();
        $events = Event::orderby('id', 'desc')->take($this->eventsMain)->get();
        $sliders = Slider::get();
        $albums = Album::with('Photos')->get();
        return view('welcome', compact('news', 'events', 'sliders', 'albums'));
    }

    public function search(Request $request) {
        $search = $request['search'];
        $events = Event::with('user')
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhereHas('user', function($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%');
                })
                ->paginate($this->searchPagination);
        $news = Article::with('user')
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhereHas('user', function($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%');
                })
                ->paginate($this->searchPagination);
        $reports = Report::latest()
                ->where('content', 'like', '%' . $search . '%')
                 ->orWhereHas('user', function($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%');
                })
                ->paginate($this->searchPagination);
        return view('search', compact('events', 'news', 'reports'));
    }

}

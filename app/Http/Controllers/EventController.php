<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use DateTime;

class EventController extends Controller {

    public $puginationEvents = 5;

    public function index(Request $request) {
        $events = Event::orderBy('id', 'DESC')->paginate($this->puginationEvents);
        if (request()->ajax()) {
            return view('events', compact('events'));
        }
        return view('events', compact('events'));
    }

    public function show($id) {
        $event = Event::select()->where('id', $id)->first();
        return view('event', compact('event'));
    }

    public function adminEvents() {
        $events = Event::orderBy('id', 'DESC')->paginate(3);
        $eventsCount = Event::count();
        return view('admin.events.allEvents', compact('events', 'eventsCount'));
    }

    public function create() {
        return view('admin.events.addEvent');
    }

    public function store(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'title' => 'required',
                'event_date' => 'required',
                'event_hours' => 'required',
                'address' => 'required',
                'description' => 'required',
                'content' => 'required',
                'photo' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'photo.image' => 'Загруженный файл должен быть изображением',
                'photo.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            $date = new DateTime();
            $data['event_date'] = $date->format('Y-m-d');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            $create = Event::create($data);
            $id = $create->id;
            return redirect()->route('main');
        }
        return view('admin.events.addEvent');
    }

    public function addPhoto($request) {
        $file = $request->file('photo');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/events', $newfilename);
        return $newfilename;
    }

    public function edit($id, Request $request) {
        if ($request->method() == "POST") {
            $this->validate($request, [
                'title' => 'required',
                'event_date' => 'required',
                'event_hours' => 'required',
                'address' => 'required',
                'description' => 'required',
                'content' => 'required',
                'photo' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'photo.image' => 'Загруженный файл должен быть изображением',
                'photo.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            $date = new DateTime();
            $data['event_date'] = $date->format('Y-m-d');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            $editOne = Event::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminevents');
        }
        $event = Event::find($id);
        return view('admin.events.editEvent', compact('event'));
    }

    public function destroy($id) {
        if (!is_numeric($id))
            return false;
        $event = Event::find($id);
        $img = $event->photo;
        if (is_file($img)) {
            unlink(public_path() . '/images/events/' . $img);
        }
        $event->delete();
        return redirect()->route('adminevents');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use DateTime;
use App\StudentClass;

class EventController extends Controller {

    public $puginationEvents = 5;

    public function index(Request $request) {
        $events = Event::orderBy('id', 'DESC')->paginate($this->puginationEvents);
        return view('events', compact('events'));
    }

    public function show($id) {
        $event = Event::select()->where('id', $id)->first();
		$lastEvents=Event::orderBy('id', 'desc')->take(5)->get();
        return view('event', compact('event','lastEvents'));
    }

    public function adminEvents() {
        $events = Event::orderBy('id', 'DESC')->paginate(10);
        $eventsCount = Event::count();
        return view('admin.events.index', compact('events', 'eventsCount'));
    }

    public function committeeEvents($committeeId) {
        $committee = StudentClass::find($committeeId);
        $events = Event::where('student_class_id', $committeeId)->orderBy('id', 'DESC')->paginate($this->puginationEvents);
        return view('events', compact('events', 'committee'));
    }

    public function create() {
        return view('admin.events.create');
    }

    public function userEventCreate() {
        return view('user.useraddevent');
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
            return redirect()->route('adminevents');
        }
        return view('admin.events.create');
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
			$editOne = Event::find($id);
			$img = $editOne->photo;
			if (is_file(public_path() . '/images/events/' . $img)) {
				unlink(public_path() . '/images/events/' . $img);
			}
            $data = $request->all();
            $date = new DateTime();
            $data['event_date'] = $date->format('Y-m-d');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminevents');
        }
        $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }

    public function destroy($id) {
        if (!is_numeric($id))
            return false;
        $event = Event::find($id);
        $img = $event->photo;
        if (file_exists(public_path() . '/images/events/' . $img)) {
            unlink(public_path() . '/images/events/' . $img);
        }
		Event::find($id)->comments()->forceDelete();
        $event->delete();
        return redirect()->route('adminevents');
    }

}

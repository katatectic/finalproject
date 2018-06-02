<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventsRequest;
use App\Event;
use DateTime;
use App\StudentClass;

class EventController extends Controller {

    public $puginationEvents = 5;
    public $puginationEventComments = 10;
    public $lastEvents = 5;
    public $puginationAdminEvents = 15;

    public function index() {
        $events = Event::orderBy('id', 'DESC')->paginate($this->puginationEvents);
        return view('events.events', compact('events'));
    }

    public function show($id) {
        $event = Event::select()->where('id', $id)->first();
        $event->setRelation('comments', $event->comments()->paginate($this->puginationEventComments));
        $lastEvents = Event::orderBy('id', 'desc')->take($this->lastEvents)->get();
        return view('events.event', compact('event', 'lastEvents', 'comments'));
    }

    public function adminEvents() {
        $events = Event::orderBy('id', 'DESC')->paginate($this->puginationAdminEvents);
        $eventsCount = Event::count();
        return view('admin.events.index', compact('events', 'eventsCount'));
    }

    public function committeeEvents($committeeId) {
        $committee = StudentClass::find($committeeId);
        $events = Event::where('student_class_id', $committeeId)->orderBy('id', 'DESC')->paginate($this->puginationEvents);
        return view('events.events', compact('events', 'committee'));
    }

    public function create() {
        return view('admin.events.create');
    }

    public function userEventCreate() {
        return view('user.useraddevent');
    }

    public function adminEventStore(EventsRequest $request) {
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

    public function userEventStore(EventsRequest $request) {
        if ($request->method() == 'POST') {
            $data = $request->all();
            $date = new DateTime();
            $data['event_date'] = $date->format('Y-m-d');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            $create = Event::create($data);
            $id = $create->id;
            return redirect()->route('event.index');
        }
        return view('event.index');
    }

    public function addPhoto($request) {
        $file = $request->file('photo');
        $newfilename = rand(1000, 50000) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/events', $newfilename);
        return $newfilename;
    }

    public function edit($id) {
        $event = Event::find($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update($id, EventsRequest $request) {
        if ($request->method() == "POST") {
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

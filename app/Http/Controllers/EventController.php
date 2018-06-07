<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventsRequest;
use App\Event;
use DateTime;
use App\User;
use App\Birtday;
use App\StudentClass;
use Illuminate\Support\Facades\Auth;

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
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        $studentsClasses = StudentClass::get();
        return view('admin.events.create', ['user' => $user, 'studentsClasses' => $studentsClasses]);
    }

    public function userEventCreate() {
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        return view('user.useraddevent', ['user' => $user]);
    }

    public function adminEventStore(EventsRequest $request) {
        $data = $request->all();
        if ($data['student_class_id'] == 0) {
            unset($data['student_class_id']);
        }
        $date = new DateTime($data['event_date']);
        $data['event_date'] = $date->format('Y-m-d');
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->addPhoto($request);
        };
        $create = Event::create($data);
        return redirect()->route('adminevents');
    }

    public function userEventStore(EventsRequest $request) {
        if ($request->method() == 'POST') {
            $data = $request->all();
            $date = new DateTime($data['event_date']);
            $data['event_date'] = $date->format('Y-m-d');
            if ($request->hasFile('photo')) {
                $data['photo'] = $this->addPhoto($request);
            };
            if ($data['student_class_id'] == 0) {
                unset($data['student_class_id']);
            }
            $create = Event::create($data);
            return redirect()->route('event.index');
            ;
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
        $date = new DateTime($event->event_date);
        $event->event_date = $date->format('Y-m-d');
        $studentsClasses = StudentClass::get();
        return view('admin.events.edit', compact('event', 'studentsClasses'));
    }

    public function update($id, EventsRequest $request) {
        $editOne = Event::find($id);
        $img = $editOne->photo;
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->addPhoto($request);
            if (is_file(public_path() . '/images/events/' . $img)) {
                unlink(public_path() . '/images/events/' . $img);
            }
        }
        if ($data['student_class_id'] == 0) {
            $data['student_class_id'] = null;
        }
        $date = new DateTime($data['event_date']);
        $data['event_date'] = $date->format('Y-m-d');
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminevents');
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

    public function chooseEvents(Request $request) {
        $chooseEvents = $request->year . '-' . '0' . $request->month;
        $eventsDate = Event::where('event_date', 'like', '%' . $chooseEvents . '%')->paginate($this->puginationEvents);
        $lastEvents = Event::orderBy('id', 'desc')->take($this->lastEvents)->get();
        return view('events.choose', compact('eventsDate', 'lastEvents'));
    }

    public function chooseAdminEvents(Request $request) {
        $chooseAdminEvents = $request->year . '-' . '0' . $request->month;
        $eventsDate = Event::where('event_date', 'like', '%' . $chooseAdminEvents . '%')->paginate($this->puginationEvents);
        return view('admin.events.choose', compact('eventsDate'));
    }

}

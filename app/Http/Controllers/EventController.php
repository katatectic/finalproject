<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use DateTime;

class EventController extends Controller {

    public $puginationEvents = 5;

    public function eventsPage(Request $request) {
        $all = Event::orderBy('id', 'DESC')->paginate($this->puginationEvents);
        if (request()->ajax()) {
            return view('events', compact('all'));
        }
        return view('events')->with(['all' => $all]);
    }

    public function oneEvent($id) {
        $event = Event::select()->where('id', $id)->first();
        return view('event', compact('event'));
    }

    public function adminEvents() {
        $all = Event::orderBy('id', 'DESC')->paginate(3);
        $eventsCount = Event::count();
        return view('admin.events.allEvents', ['all' => $all, 'eventsCount' => $eventsCount]);
    }

    public function eventView() {
        return view('admin.events.addEvent');
    }

    public function addEvent(Request $request) {
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
        $file->move(public_path() . '/images', $newfilename);
        return $newfilename;
    }

    public function deleteEvent($id) {
        if (!is_numeric($id))
            return false;
        $all = Event::find($id);
        $img = $all->photo;
        unlink(public_path() . '/images/' . $img);
        $all->delete();
        return redirect()->route('adminevents');
    }

    public function editEvent($id, Request $request) {
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
        $all = Event::find($id);
        return view('admin.events.editEvent', ['all' => $all]);
    }

}

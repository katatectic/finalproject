<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use DateTime;

class EventController extends Controller {

    public $puginationEvents = 10;

    public function eventsPage() {
        $all = Event::orderBy('id', 'DESC')->paginate($this->puginationEvents);
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
                'content' => 'required',], [
                'title.required' => 'Введите заголовок',
				'event_date.required'=> 'Введите дату события',
				'event_hours.required'=> 'Введите время события',
				'address.required'=> 'Введите месо проведения события',
                'description.required' => 'Введите краткое описание',
                'content.required' => 'Введите полный текст статьи',]);
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
        $this->validate($request, ['photo' => 'required|image|max:2048'], ['photo.required' => 'Загрузите изображение',
            'photo.image' => 'Загруженный файл должен быть изображением',
            'photo.max' => 'Максимальный размер картинки=2048']);
        $file = $request->file('photo');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images', $newfilename);
        return $newfilename;
    }
	public function deleteEvent($id) {
        $all = Event::find($id);
        $img = $all->photo;
        unlink(public_path() . '/images/' . $img);
        $all->delete();
        return redirect()->route('adminevents');
    }
	 public function editEvent($id, Request $request) {
        if ($request->method() == "POST") {
            $data = $request->all();
            $date = new DateTime();
            $data['event_date'] = $date->format('Y-m-d');
            $data['photo'] = $this->addPhoto($request);
            $editOne = Event::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminevents');
        }
        $all = Event::find($id);
        if (!$all) {
            return view('404');
        } else {
            return view('admin.events.editEvent', ['all' => $all]);
        }
    }
}

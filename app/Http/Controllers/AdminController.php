<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Http\Requests\SettingsRequest;
use App\Article;
use App\Event;
use App\User;
use App\Report;
use App\Setting;
use Mail;
use App\Mail\MailClass;

class AdminController extends Controller {

    public $searchPagination = 15;

    public function index() {

        return view('admin.admin');
    }

    public function search(Request $request) {
        $search = $request['search'];
        if (empty($search)) {
            return redirect()->route('admin');
        } else {
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
            $users = User::latest()
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%')
                    ->orWhere('middle_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->paginate(10);
            return view('admin.search', compact('events', 'news', 'reports', 'users'));
        }
    }

    public function mailForm() {
        return view('admin.mail.form');
    }

    public function sendMail(MailRequest $request) {
        $name = $request->name;
        $email = $request->email;
        $msg = $request->message;
        Mail::to($email)->send(new MailClass($name, $email, $msg));
        return redirect()->route('admin')->with(['status' => 'Сообщение отправлено']);
    }

    public function settings() {
        $settings = Setting::first();
        return view('admin.settings.edit', compact('settings'));
    }

    public function settingsUpdate(SettingsRequest $request) {
        $editOne = Setting::first();
        $img = $editOne->logo;
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->addLogo($request);
            if (is_file(public_path() . '/images/logo/' . $img)) {
                unlink(public_path() . '/images/logo/' . $img);
            }
        }
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('admin');
    }

    public function addLogo($request) {
        $file = $request->file('logo');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/logo', $newfilename);
        return $newfilename;
    }

}

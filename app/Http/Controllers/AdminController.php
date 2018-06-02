<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Article;
use App\Event;
use App\User;
use App\Slider;
use App\Image;
use App\Album;
use Mail;
use App\Mail\MailClass;

class AdminController extends Controller {

    public function index() {
        return view('admin.admin');
    }

    public function search(Request $request) {
        $search = $request['search'];
        $events = Event::latest()
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('event_hours', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->paginate(10);
        $news = Article::latest()
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
                ->paginate(10);
        $users = User::latest()
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('surname', 'like', '%' . $search . '%')
                ->orWhere('middle_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->paginate(10);
        return view('admin.search', compact('events', 'news', 'users'));
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

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeedbacksRequest;
use App\Feedback;
use Mail;
use App\Mail\MailClass;

class FeedbacksController extends Controller {

    public function index() {
        return view('feedback.feedback');
    }

    public function addFeedback(FeedbacksRequest $request) {
        $data = $request->all();
        $create = Feedback::create($data);
        Mail::send('feedback.email', ['request' => $request], function($message) use($request) {
            $message->from([$request->email]);
            $message->to('devilchonok@gmail.com');
            $message->subject('Сообщение пользователя' . ' ' . $request->name . ' ' . 'об ошибке');
        });

        return redirect()->route('main')->with(['status' => 'Ваша заявка отправлена!']);
    }

    public function adminFeedbacks() {
        $feedbacks = Feedback::orderBy('id', 'DESC')->paginate(10);
        $feedbacksCount = Feedback::count();
        return view('admin.feedbacks.index', compact('feedbacks', 'feedbacksCount'));
    }

    public function show($id) {
        $feedback = Feedback::select()->where('id', $id)->first();
        $feedback->status = '2';
        $feedback->save();
        return view('admin.feedbacks.show', compact('feedback'));
    }

    public function destroy($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('admin.feedback.index');
    }

    public function reply($id, Request $request) {
        if ($request->method() == "POST") {
            $name = $request->name;
            $email = $request->email;
            $msg = $request->message;
            Mail::to($email)->send(new MailClass($name, $email, $msg));
            return redirect()->route('admin.feedback.index')->with(['status' => 'Сообщение пользователю отправлено!']);
        }
        $feedback = Feedback::find($id);
        return view('admin.feedbacks.reply', compact('feedback'));
    }

}

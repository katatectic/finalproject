<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use Mail;
use Session;

class FeedbacksController extends Controller {

    public function index() {
        return view('feedback.feedback');
    }

    public function addFeedback(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, ['name' => 'required|max:50',
                'email' => 'required|email',
                'message' => 'required',], ['name.required' => 'Введите Ваше имя',
                'name.max' => 'Максимум 30 символов',
                'email.required' => 'Выберите Вашу почту',
                'email.email' => 'Введите правильный email',
                'message.required' => 'Введите сообщение',]);
            $data = $request->all();
            $create = Feedback::create($data);
            Mail::send('feedback.email', ['request' => $request], function($message) use($request) {
                $message->from([$request->email]);
                $message->to('devilchonok@gmail.com');
                $message->subject('Сообщение пользователя' . ' ' . $request->name . ' ' . 'об ошибке');
            });

            return view('feedback.addFeedback');
        }
        Session::flash('message', 'This is a message!');
        return view('feedback.feedback');
    }

    public function adminFeedbacks() {
        $feedbacks = Feedback::orderBy('id', 'DESC')->paginate(10);
        $feedbacksCount = Feedback::count();
        return view('admin.feedbacks.adminFeedbacks', compact('feedbacks', 'feedbacksCount'));
    }

    public function adminFeedbacksShowOne($id) {
        $feedback = Feedback::select()->where('id', $id)->first();
        $feedback->status = '2';
        $feedback->save();
        return view('admin.feedbacks.adminOneFeedback', compact('feedback'));
    }

    public function deleteFeedback($id) {
        if (!is_numeric($id))
            return false;
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect()->route('adminfeedbacks');
    }

}

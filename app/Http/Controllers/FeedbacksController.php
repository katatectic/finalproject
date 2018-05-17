<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbacksController extends Controller {

    public function index() {
        return view('feedback.feedback');
    }

    public function addFeedback(Request $request) {
        if ($request->method() == 'POST') {
			$this->validate($request, 
                ['name' => 'required|max:50',
                'email' => 'required|email',
                'message' => 'required',], 
                ['name.required' => 'Введите Ваше имя',
				'name.max' => 'Максимум 30 символов',
                'email.required' => 'Выберите Вашу почту',
                'email.email' => 'Введите правильный email',
                'message.required' => 'Введите сообщение',]);
            $data = $request->all();
            $create = Feedback::create($data);
            $id = $create->id;
            return view('feedback.addFeedback');
        }
        return view('feedback.feedback');
    }
}

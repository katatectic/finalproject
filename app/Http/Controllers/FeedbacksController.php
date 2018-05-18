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
	public function adminFeedbacks() {
        $all = Feedback::orderBy('id', 'DESC')->paginate(10);
        $feedbacksCount = Feedback::count();
        return view('admin.feedbacks.adminFeedbacks', ['all' => $all, 'feedbacksCount' => $feedbacksCount]);
    }

    public function adminFeedbacksShowOne($id) {
        $article = Feedback::select()->where('id', $id)->first();
        $article->status = '2';
        $article->save();
        return view('admin.feedbacks.adminOneFeedback', ['article' => $article]);
    }

    public function deleteFeedback($id) {
        $all = Feedback::find($id);
        $all->delete();
        return redirect()->route('adminfeedbacks');
    }
}
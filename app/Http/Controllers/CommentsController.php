<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Event;
use App\User;
use App\Article;
use DateTime;

class CommentsController extends Controller {

    public function addComment(Request $request) {
        $comment = new Comment;
        if ($request->method() == 'POST') {
            $comment->user_id = $request->user_id;
            $comment->event_id = $request->event_id;
            $comment->news_id = $request->news_id;
            $comment->report_id = $request->report_id;
            $comment->comment = $request->comment;
            $comment->save();
            return back();
        }
        return back();
    }

    public function deleteComment($id) {
        if (!is_numeric($id))
            return view('404');
        $all = Comment::find($id);
        $all->delete();
        return back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentClass;
use App\User;
use Illuminate\Support\Facades\Auth;

class CommitteesController extends Controller
{
    /**
     * Display a listing of some committees(stusentsClasses) adn info about as
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $committees = StudentClass::has('user')->withCount('user')->get();
        $count = ($committees->count() < 5 )? $committees->count() : 5;
        return view('about', ['committees' => $committees, 'rand' => $count]);
    }
    /**
     * Display a listing of all committees(stusentsClasses).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        $pag = StudentClass::has('user')->where('year_of_issue', '>=', date('Y', time()))->count();
        $committees = StudentClass::has('user')->withCount('user')->orderBy('year_of_issue', 'desc')->paginate($pag);
        return view('committees.committees', ['committees' => $committees, 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $committee = StudentClass::with('user', 'news', 'event', 'report')->find($id);
        return view('committees.committee', ['committee' => $committee]);

    }

}

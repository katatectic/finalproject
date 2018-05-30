<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\StudentClass;
use App\Report;
use App\Event;
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
        $committees = StudentClass::has('user')->withCount('user')->get();
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
        $committee = StudentClass::with('user', 'news', 'event')->find($id);
        return view('committees.committee', ['committee' => $committee]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

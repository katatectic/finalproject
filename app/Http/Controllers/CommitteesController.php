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
     * Display a listing of all committees(stusentsClasses).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() !== null) {
            $userId = Auth::id();
            $user = User::with('studentsClasses')->find($userId);
        } else {
            $user = '';
        }

        $committees = StudentClass::withCount('user')->get();
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
        $committee = StudentClass::with('user', 'news')->find($id);
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

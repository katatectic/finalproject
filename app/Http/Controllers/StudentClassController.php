<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentClassRequest;
use App\StudentClass;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $studentClasses = StudentClass::paginate(10);
        $thisYear = date('Y', time());
        return view('admin.studentClass.index', ['studentsClasses' => $studentClasses]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentClassRequest $request)
    {
        $class = $request->all();
        unset($class['_token'], $class['page']);
        StudentClass::insert($class);
        return redirect('/admin/students-classes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentClassRequest $request)
    {

        $class = $request->all();
        unset($class['_token'], $class['page'],$class['id']);
        StudentClass::find($request->id)->update($class);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!is_numeric($id)) return false;
        StudentClass::find($id)->user()->detach();
        StudentClass::destroy($id);
        return redirect()->back();
    }
}

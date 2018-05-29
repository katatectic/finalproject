<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'letter_class' => 'required|max:2',
            'start_year' => 'required|max:2100|numeric|min:1950',
            'year_of_issue' => 'required|max:2100|numeric|min:1950'
        ],
            ['letter_class.max'=>'Максимум 2 символа',
                'letter_class.required'=>'Не должно быть пустым',
                'start_year.max'=>'максимум 2090',
                'start_year.min'=>'минимум 1950',
                'start_year.numeric'=>'Только числа',
                'start_year.required'=>'Не должно быть пустым',
                'year_of_issue.max'=>'максимум 2090',
                'year_of_issue.min'=>'минимум 1950',
                'year_of_issue.required'=>'Не должно быть пустым',
                'year_of_issue.numeric'=>'Только числа'
            ]
        );
        $class = $request->all();
        unset($class['_token'], $class['page']);
        StudentClass::insert($class);
        return redirect('/admin/students-classes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'letter_class' => 'required|max:2',
            'start_year' => 'required|max:2100|numeric|min:1950',
            'year_of_issue' => 'required|max:2100|numeric|min:1950'
        ],
            ['letter_class.max'=>'Максимум 2 символа',
                'letter_class.required'=>'Не должно быть пустым',
                'start_year.max'=>'максимум 2090',
                'start_year.min'=>'минимум 1950',
                'start_year.numeric'=>'Только числа',
                'start_year.required'=>'Не должно быть пустым',
                'year_of_issue.max'=>'максимум 2090',
                'year_of_issue.min'=>'минимум 1950',
                'year_of_issue.required'=>'Не должно быть пустым',
                'year_of_issue.numeric'=>'Только числа'
            ]
        );
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

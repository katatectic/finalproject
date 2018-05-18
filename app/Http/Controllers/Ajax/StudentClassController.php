<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentClass;
use App\UserStudentClass;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function getClasses()
    {
        $studentClasses = StudentClass::get();
        $transition = ceil((strtotime('now') - strtotime(date('Y',strtotime('now')).'-08-01'))/(60*60*24*365));
        $thisYear = date('Y', time());
        $data = ['studentsClasses'=>$studentClasses, 'transition'=>$transition, 'thisYear'=>$thisYear];
        return $data;
    }

}

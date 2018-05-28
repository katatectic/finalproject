<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use DateTime;

class ReportController extends Controller
{
    public $puginationReports = 5;

    public function getReports()
    {
        $reports = Report::orderBy('id', 'DESC')->paginate($this->puginationReports);
        return view('reports', ['reports'=>$reports]);
    }

    public function getReport($id) {
        $report = Report::select()->where('id', $id)->first();
        return view('report', compact('report'));
    }

    public function userReportsCreate() {
        return view('user.useraddreport');
    }
    
    public function store(Request $request) {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'content' => 'required',
                'date' => 'required',                
                ]);
            $data = $request->all();
            unset($data['__token']);
            $date = new DateTime();
            $data['date'] = $date->format('Y-m-d');
            if ($request->hasFile('pay_check')) {
                $data['pay_check'] = $this->addPayCheck($request);
            };
            $create = Report::create($data);
            $id = $create->id;
            return redirect()->route('home');
        }
        return view('home');
    }

    public function addPayCheck($request) {
        $file = $request->file('pay_check');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/reports', $newfilename);
        return $newfilename;
    }

    /*Ниже старые роуты, их надо убрать потом*/


    public function reportForm()
    {
        $all = Report::all();
        return view('admin.report.reportform', ['all'=>$all]);
    }
    
    public function makeReport(Request $request)
    {
         if ($request->method() == 'POST') {
            $this->validate($request, [
                'name_charge' => 'required',
                'date' => 'required',
                'value' => 'required',], [
                '*.required' => 'Поле не должно быть пустым'                
            ]);
            $data = $request->all();
            $date = new DateTime();
            $data['date'] = $date->format('Y-m-d');            
            $create = Report::create($data);
            $id = $create->id;
            return redirect()->route('reportform');
        }
        
    }
    
    public function deleteLineReport($id)
    {         
        $report =Report::find($id);
        $report->delete($id);
        return redirect('reportform');
    }
    
    public function updateForm($id){
    	$report =Report::find($id);
    	return view('admin.report.updateform', ['report'=>$report]);	
    }
    
    public function updateLineReport(Request $request, $id){    
    	$report = $news =Report::find($id);
    	$report->name_charge = $request->name_charge;
    	$report->value = $request->value;
    	$report->save();
    	return redirect('reportform');
    }
    
    
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use DateTime;

class ReportController extends Controller
{
    public function getReport()
    {
        $all = Report::all();
        return view('report', ['all'=>$all]);
    }
    
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use DateTime;

class ReportController extends Controller
{
    public $puginationReports = 5;
	public $adminPuginationReports = 10;

    public function index()
    {
        $reports = Report::orderBy('id', 'DESC')->paginate($this->puginationReports);
        return view('reports', compact('reports'));
    }
		public function adminIndex()
    {
        $reports = Report::orderBy('id', 'DESC')->paginate($this->adminPuginationReports);
		$reportsCount = Report::count();
        return view('admin.reports.index', compact('reports','reportsCount'));
    }
    public function show($id) {
        $report = Report::select()->where('id', $id)->first();
        return view('report', compact('report'));
    }

    public function userReportCreate() {
        return view('user.useraddreport');
    }
	
    public function create()
    {
        $reports = Report::all();
        return view('admin.reports.create', compact('reports'));
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
            return redirect()->route('home');
        }
        return view('home');
    }
	public function destroy($id)
    {         
        $report =Report::find($id);
        $report->delete($id);
        return redirect()->route('main');
    }
	

    public function addPayCheck($request) {
        $file = $request->file('pay_check');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/reports', $newfilename);
        return $newfilename;
    }
    /*Ниже старые роуты, их надо убрать потом*/
    
    
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

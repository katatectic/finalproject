<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportsRequest;
use App\Report;
use DateTime;

class ReportController extends Controller {

    public $puginationReports = 5;
    public $puginationReportComments = 10;
    public $lastReports = 5;
    public $puginationAdminReports = 15;

    public function index() {
        $reports = Report::orderBy('id', 'DESC')->paginate($this->puginationReports);
        return view('reports.reports', compact('reports'));
    }

    public function adminIndex() {
        $reports = Report::orderBy('id', 'DESC')->paginate($this->puginationAdminReports);
        $reportsCount = Report::count();
        return view('admin.reports.index', compact('reports', 'reportsCount'));
    }

    public function show($id) {
        $report = Report::select()->where('id', $id)->first();
        $report->setRelation('comments', $report->comments()->paginate($this->puginationReportComments));
        $lastReports = Report::orderBy('id', 'desc')->take($this->lastReports)->get();
        return view('reports.report', compact('report', 'lastReports'));
    }

    public function userReportCreate() {
        return view('user.useraddreport');
    }

    public function create() {
        $reports = Report::all();
        return view('admin.reports.create', compact('reports'));
    }

    public function store(ReportsRequest $request) {
        $data = $request->all();
        unset($data['__token']);
        $date = new DateTime();
        $data['date'] = $date->format('Y-m-d');
        if ($request->hasFile('pay_check')) {
            $data['pay_check'] = $this->addPayCheck($request);
        };
        $create = Report::create($data);
        return redirect()->route('adminReports');
    }

    public function destroy($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $report = Report::findOrFail($id);
        Report::find($id)->comments()->forceDelete();
        $img = $report->pay_check;
        if (is_file(public_path() . '/images/reports/' . $img)) {
            unlink(public_path() . '/images/reports/' . $img);
        }
        Report::find($id)->comments()->forceDelete();
        $report->delete($id);
        return redirect()->route('adminReports');
    }

    public function edit($id) {
        $report = Report::find($id);
        return view('admin.reports.edit', compact('report'));
    }

    public function update(ReportsRequest $request, $id) {
        $data = $request->all();
        if ($request->hasFile('pay_check')) {
            $data['pay_check'] = $this->addPayCheck($request);
        };
        $editOne = Report::find($id);
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminReports');
    }

    public function addPayCheck($request) {
        $file = $request->file('pay_check');
        $newfilename = rand(1000, 50000) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/reports', $newfilename);
        return $newfilename;
    }

}

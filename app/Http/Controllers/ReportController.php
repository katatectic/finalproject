<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportsRequest;
use App\Report;
use App\Check;
use DateTime;

class ReportController extends Controller {

    public $puginationReports = 5;
    public $puginationReportComments = 10;
    public $lastReports = 5;
    public $puginationAdminReports = 15;

    public function index() {
        $reports = Report::with('checks')->orderBy('id', 'DESC')->paginate($this->puginationReports);
        return view('reports.reports', compact('reports'));
    }

    public function adminIndex() {
        $reports = Report::with('checks')->orderBy('id', 'DESC')->paginate($this->puginationAdminReports);
        $reportsCount = Report::count();
        return view('admin.reports.index', compact('reports', 'reportsCount'));
    }

    public function show($id) {
		$report = Report::with('checks')->find($id);
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
        $create = Report::create($data);
        return redirect()->route('adminReports');
    }

    public function destroy($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $report = Report::with('checks')->findOrFail($id);
		$checks = $report->checks;
		foreach ($checks as $check) {
            if (is_file(public_path() . '/images/reports/checks/' . $check->image)) {
                unlink(public_path() . '/images/reports/checks/' . $check->image);
            }
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
        $editOne = Report::find($id);
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminReports');
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportsRequest;
use Illuminate\Http\Request;
use App\Report;
use App\Check;
use DateTime;
use App\StudentClass;
use Illuminate\Support\Facades\Auth;
use App\User;

class ReportController extends Controller {

    public $puginationReports = 10;
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

    public function committeeReports($committeeId) {
        $committee = StudentClass::find($committeeId);
        $reports = Report::with('checks')->where('student_class_id', $committeeId)->orderBy('id', 'DESC')->paginate($this->puginationReports);
        return view('reports.reports', compact('reports', 'committee'));
    }

    public function show($id) {
        $report = Report::with('checks')->find($id);
        $report->setRelation('comments', $report->comments()->paginate($this->puginationReportComments));
        $lastReports = Report::orderBy('id', 'desc')->take($this->lastReports)->get();
        return view('reports.report', compact('report', 'lastReports'));
    }

    public function userReportCreate() {
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        return view('user.useraddreport', compact('user'));
    }

    public function create() {
        $reports = Report::all();
        $userId = Auth::id();
        $user = User::with('studentsClasses')->find($userId);
        $studentsClasses = StudentClass::get();
        return view('admin.reports.create', compact('reports', 'user', 'studentsClasses'));
    }

    public function store(ReportsRequest $request) {
        $data = $request->all();
        unset($data['__token']);
        if ($data['student_class_id'] == 0) {
            unset($data['student_class_id']);
        }
        $date = new DateTime($data['date']);
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
        $date = new DateTime($report->date);
        $report->date = $date->format('Y-m-d');
        $studentsClasses = StudentClass::get();
        return view('admin.reports.edit', compact('report', 'studentsClasses'));
    }

    public function update(ReportsRequest $request, $id) {
        $data = $request->all();
        $editOne = Report::find($id);
        if ($data['student_class_id'] == 0) {
            $data['student_class_id'] = null;
        }
        $editOne->fill($data);
        $editOne->save();
        return redirect()->route('adminReports');
    }

    public function chooseReports(Request $request) {
        $chooseReport = $request->year . '-' . '0' . $request->month;
        $reportDate = Report::where('date', 'like', '%' . $chooseReport . '%')->paginate($this->puginationReports);
        return view('reports.choose', compact('reportDate'));
    }

    public function chooseAdminReports(Request $request) {
        $chooseAdminReport = $request->year . '-' . '0' . $request->month;
        $reportDate = Report::where('date', 'like', '%' . $chooseAdminReport . '%')->paginate($this->puginationReports);
        return view('admin.reports.choose', compact('reportDate'));
    }

}

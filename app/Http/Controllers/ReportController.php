<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use DateTime;

class ReportController extends Controller {

    public $puginationReports = 5;
    public $adminPuginationReports = 10;

    public function index() {
        $reports = Report::orderBy('id', 'DESC')->paginate($this->puginationReports);
        return view('reports', compact('reports'));
    }

    public function adminIndex() {
        $reports = Report::orderBy('id', 'DESC')->paginate($this->adminPuginationReports);
        $reportsCount = Report::count();
        return view('admin.reports.index', compact('reports', 'reportsCount'));
    }

    public function show($id) {
        $report = Report::select()->where('id', $id)->first();
		$lastReports=Report::orderBy('id', 'desc')->take(5)->get();
        return view('report', compact('report','lastReports'));
    }

    public function userReportCreate() {
        return view('user.useraddreport');
    }

    public function create() {
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
            $id = $create->id;
            return redirect()->route('adminReports');
        }
        return view('home');
    }

    public function destroy($id) {
        $report = Report::find($id);
		Report::find($id)->comments()->forceDelete();
		$img = $report->pay_check;
        if (is_file(public_path() . '/images/reports/' . $img)) {
            unlink(public_path() . '/images/reports/' . $img);
        }
        Report::find($id)->comments()->forceDelete();
        $report->delete($id);
        return redirect()->route('adminReports');
    }

    public function edit($id, Request $request) {
        if ($request->method() == "POST") {
            $this->validate($request, [
                'content' => 'required',
                'date' => 'required',
                'pay_check' => 'required|image|max:2048',], [
                '*.required' => 'Поле не должно быть пустым',
                'pay_check.image' => 'Загруженный файл должен быть изображением',
                'pay_check.max' => 'Максимальный размер изображения=2048'
            ]);
            $data = $request->all();
            if ($request->hasFile('pay_check')) {
                $data['pay_check'] = $this->addPayCheck($request);
            };
            $editOne = Report::find($id);
            $editOne->fill($data);
            $editOne->save();
            return redirect()->route('adminReports');
        }
        $report = Report::find($id);
		$id = $report->id;
        return view('admin.reports.edit', compact('report'));
    }

    public function addPayCheck($request) {
        $file = $request->file('pay_check');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/reports', $newfilename);
        return $newfilename;
    }
}

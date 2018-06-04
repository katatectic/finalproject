<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChecksRequest;
use App\Report;
use App\Check;

class CheckController extends Controller {

    public function create($id) {
        $report = Report::find($id);
        return view('reports.addcheck', compact('report'));
    }

    public function store(ChecksRequest $request) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->image($request);
        };
        $create = Check::create($data);
        return redirect()->route('adminReports');
    }

    public function deleteCheck($id) {
        if (!is_numeric($id)) {
            return false;
        }
        $check = Check::findOrFail($id);
        $img = $check->image;
        if (is_file(public_path() . '/images/reports/checks/' . $img)) {
            unlink(public_path() . '/images/reports/checks/' . $img);
        }
        $check->delete();
        return redirect()->route('reports');
    }

    public function image($request) {
        $file = $request->file('image');
        $newfilename = rand(0, 100) . "." . $file->getClientOriginalExtension();
        $file->move(public_path() . '/images/reports/checks/', $newfilename);
        return $newfilename;
    }

}
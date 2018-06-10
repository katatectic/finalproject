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

    public function store(ChecksRequest $request, $reportId) {
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->image as $check) {
                $path = $this->saveImage($check,'/images/reports/checks/');
                $images[] = ['image' => $path, 'report_id' => $reportId];
            }
        }
        Check::insert($images);
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

}

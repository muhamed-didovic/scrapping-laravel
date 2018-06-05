<?php

namespace App\Http\Controllers;

use App\Data;
use Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

class ReportsController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function store()
    {
        //todo: add error handling for dates
        $data = Data::with('Device')->forDate(request('from'), request('to'))->get();

        if (empty($data->all())) {
            //dd($data->all());
            return view('reports.index');
        }
        $data = $data->groupBy('device_id');

        $rows = [];

        //todo: simplify with collections
        foreach ($data as $chunk) {
            foreach ($chunk as $row) {
                $json = json_decode($row->data, true);
                foreach ($json as $key => $item) {
                    $rows[$row->Device->name][] = [$key, $item];
                }
            }
        }
        //dd($rows);
        Excel::create('report-' . Carbon::now(), function ($excel) use ($rows) {

            foreach ($rows as $key => $row) {
                $excel->sheet($key , function ($sheet) use ($row) {
                    $sheet->fromArray($row);
                });
            }

        })->export('xls');
    }
}

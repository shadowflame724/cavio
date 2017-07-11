<?php

namespace App\Http\Controllers\Backend\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Facades\Datatables;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
//        storage_path('app/public/excel')
        $results = Excel::load('public/excel/import.xlsx', function($reader) {
//            $reader->dd();
//            $reader->each(function($sheet) {
//                // Loop through all rows
//                $sheet->each(function($row) {
//                    $res[] = $row;
////                    dd($row);
//                });
//
//            });
//            $reader->dd();
//            $res = $reader->toArray();
            // reader methods

        });
        $resDatas = $results->skipRows(3)->get();
        $resTitles = $results->skipRows(1)->takeRows(1)->get();
//        dd($results);
        $res = [];
        $prev_key = 0;
        foreach ($resDatas as $key => $result) {
            $prod_id = (isset($result->crd_product))?(int)$result->crd_product:0;

            $prd = 0;
            if(!isset($res[$prod_id])){
                $res[$prod_id] = [];
            } else {
                $prd = count($res[$prod_id]);
            }
            foreach ($result as $name => $item) {
                $one = '';
                if(!empty($item)) {
                    $one = $item;
                } elseif(isset($res[$prev_key])) {
                    if(isset($res[$prev_key][0][$name])) {
                        $one = $res[$prev_key][0][$name];
                    } else {
                        $one = '-';
                    }
                }
                $res[$prod_id][$prd][$name] = $one;
            }
            $prev_key = $prod_id;
        }
        $tit = [];
        foreach ($resTitles as $key => $result) {
            $tit[$key] = [];
            foreach ($result as $name => $item) {
                if(!empty($item)) {
                    $tit[$key][$name] = $item;
                } else {
                    $tit[$key][$name] = '';
                }
            }
        }

//        dd($res);
//        dd('excel');
        return view('backend.excel.index',[
            'data' => $res,
            'titles' => $tit
        ]);


    }

}
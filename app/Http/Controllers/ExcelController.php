<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExportController(){
        return view('import');
    }
    public function export(){
        return Excel::download(new UserExport,'users.xlsx');
    }

    public function import(Request $request){
        Excel::import(new UserImport, $request->file('file'));
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function index()
    {
        return view('excel.index');
    }

    //Import users from Excel file
    public function userImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function userExport() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }
}

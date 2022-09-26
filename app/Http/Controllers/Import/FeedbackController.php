<?php

namespace App\Http\Controllers\Import;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\FeedbackImport;
use Maatwebsite\Excel\Facades\Excel;

class FeedbackController extends Controller
{
    //Import users from Excel file
    public function feedbackImport(Request $request) 
    {
        Excel::import(new FeedbackImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Feedback imported successfully.');
    }

}

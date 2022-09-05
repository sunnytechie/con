<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Exports\PrayersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PrayerController extends Controller
{
    public function fileExport() 
    {
        return Excel::download(new PrayersExport, 'prayer-request-collections.xlsx');
    } 
}

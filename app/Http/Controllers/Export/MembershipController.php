<?php

namespace App\Http\Controllers\Export;

use App\Exports\MembershipsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class MembershipController extends Controller
{
    public function fileExport() 
    {
        return Excel::download(new MembershipsExport, 'membership-registeration-collections.xlsx');
    } 
}

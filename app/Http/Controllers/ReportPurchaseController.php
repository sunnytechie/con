<?php

namespace App\Http\Controllers;

use App\Models\Bcppurchase;
use App\Models\Hymnalpurchase;
use Illuminate\Http\Request;

class ReportPurchaseController extends Controller
{
    public function bcp() {
        $title = "Report on B. Common Prayer Purchase";
        $bcps = Bcppurchase::orderBy('id', 'desc')->get();

        return view('reports.bcp', compact('title', 'bcps'));
    }

    public function hymnal() {
        $title = "Hymnals Purchase";
        $hymns = Hymnalpurchase::orderBy('id', 'desc')->get();

        return view('reports.hymnal', compact('title', 'hymns'));
    }
}

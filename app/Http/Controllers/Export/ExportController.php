<?php

namespace App\Http\Controllers\Export;

use App\Exports\BcpExport;
use App\Exports\BookExport;
use App\Exports\CycExport;
use App\Exports\DevotionalExport;
use Illuminate\Http\Request;
use App\Exports\DonationExport;
use App\Exports\FeedbackExport;
use App\Exports\HymnalsExport;
use App\Exports\TestimonyExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function donations(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new DonationExport($exportMethod), 'donation-payment-collections.xlsx');
    }

    public function bcp(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new BcpExport($exportMethod), 'bcp-payment-collections.xlsx');
    }

    public function books(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new BookExport($exportMethod), 'books-payment-collections.xlsx');
    }

    public function cyc(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new CycExport($exportMethod), 'cyc-payment-collections.xlsx');
    }

    public function devotions(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new DevotionalExport($exportMethod), 'devotional-payment-collections.xlsx');
    }

    public function hymnals(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new HymnalsExport($exportMethod), 'hymnal-payment-collections.xlsx');
    }

    public function testimony(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new TestimonyExport($exportMethod), 'testimony-collections.xlsx');
    }

    public function feedbacks(Request $request){
        $exportMethod = $request->tag === "thismonth" ? "thismonth" : "all";
        return Excel::download(new FeedbackExport($exportMethod), 'feedback-collections.xlsx');
    }
}

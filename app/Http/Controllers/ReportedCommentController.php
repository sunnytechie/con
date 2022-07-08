<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportedComment;

class ReportedCommentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //reported comments
        $reportedComments = ReportedComment::all();
        return view('app.reports', compact('reportedComments'));
    }

    //api store reported comment
    public function apiStoreReportedComment(Request $request)
    {
        //validate request
        $request->validate([
            'user_id' => '',
            'email' => 'required',
            'comment_id' => 'required',
            'reason' => 'required',
            'type' => '',
        ]);

        $reportedComment = new ReportedComment();
        $reportedComment->user_id = $request->user_id;
        $reportedComment->email = $request->email;
        $reportedComment->comment_id = $request->comment_id;
        $reportedComment->reason = $request->reason;
        $reportedComment->type = $request->type;
        $reportedComment->save();
        return response()->json($reportedComment);
    }
}

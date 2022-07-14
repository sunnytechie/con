<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //feedbacks
        $feedbacks = Feedback::paginate(10);;
        return view('feedback.index', compact('feedbacks'));
    }

    //api store feedback
    public function storeFeedback(Request $request)
    {
        //validate request
        $request->validate([
            'feedback_type' => 'required',
            'user_fullname' => 'required',
            'user_email' => 'required',
            'feedback_msg' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->user_id = $request->user_id;
        $feedback->feedback_type = $request->feedback_type;
        $feedback->user_fullname = $request->user_fullname;
        $feedback->user_email = $request->user_email;
        $feedback->feedback_msg = $request->feedback_msg;
        $feedback->save();
        return response()->json(['success' => 'Feedback sent successfully.']);
    }
}

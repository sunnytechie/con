<?php

namespace App\Http\Controllers\Api\V23;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //current day
    public function index()
    {
        //today date
        $calendar = \App\Models\Calendar::where('date', date('Y-m-d'))->first();
        if ($calendar) {
            return response()->json([
                'status' => true,
                'data' => $calendar
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No data found'
            ]);
        }
    }

    //search by date
    public function search(Request $request)
    {
        $calendar = \App\Models\Calendar::where('date', $request->date)->first();
        if ($calendar) {
            return response()->json([
                'status' => true,
                'data' => $calendar
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No data found'
            ]);
        }
    }
}

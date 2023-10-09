<?php

namespace App\Http\Controllers\Api\V23;

use Illuminate\Http\Request;
use App\Models\Bibleinoneyear;
use App\Http\Controllers\Controller;

class BookInAYearController extends Controller
{
    //index
    public function index()
    {
        //fetch all bible in the current year
        $bibleinoneyear = Bibleinoneyear::where('year', date('Y'))->get();

        return response()->json([
            'success' => true,
            'message' => 'List of bible in one year',
            //'data' => $bibleinoneyear
        ], 200);
    }

    //show
    public function today()
    {
        //fetch a single bible for today
        $bibleinoneyear = Bibleinoneyear::where('date', date('Y-m-d'))->first();

        if (!$bibleinoneyear) {
            return response()->json([
                'success' => false,
                'message' => 'Bible for today not found',
                'data' => ''
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Bible for today',
            'data' => $bibleinoneyear
        ], 200);
    }

    //show month
    public function month()
    {
        //fetch current month from date
        $bibleinoneyear = Bibleinoneyear::where('month', date('F'))->get();

        if (!$bibleinoneyear) {
            return response()->json([
                'success' => false,
                'message' => 'Bible for this month not found',
                'data' => ''
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Bible for this month',
            'data' => $bibleinoneyear
        ], 200);
    }

    //search by month
    public function searchByMonth($month)
    {
        //Capitalize first letter of month
        //$month = ucfirst($month);

        //fetch current month from date
        $bibleinoneyear = Bibleinoneyear::where('month', $month)->get();

        if (!$bibleinoneyear) {
            return response()->json([
                'success' => false,
                'message' => 'Bible for this month not found',
                'data' => ''
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Bible for this month',
            'data' => $bibleinoneyear
        ], 200);
    }
}

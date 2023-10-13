<?php

namespace App\Http\Controllers\Api\v23;

use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DevotionalController extends Controller
{
    public function yearsListingPrice() {
        $currentYear = Carbon::now()->year;
        $yearsWithData = [];

        for ($year = 2020; $year <= $currentYear; $year++) {
            $yearsWithData[] = [
                'year' => $year,
                'price' => 500
            ];
        }

        //reverse the array
        $yearsWithData = array_reverse($yearsWithData);

        return response()->json([
            'status' => true,
            'data' => $yearsWithData
        ], 200);
    }

    //bible study
    public function bibleStudy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required',
        ]);

        $bibleStudy = Study::orderBy('study_date', 'asc')->where('type', 2)->where('study_year', $request->year)->get();

        return response()->json([
            'status' => true,
            'data' => $bibleStudy
        ], 200);
    }

    //daily dynamite
    public function dailyDynamite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
        ]);

        $dailyDynamite = Study::where('type', 3)->where('study_date', $request->date)->first();

        return response()->json([
            'status' => true,
            'data' => $dailyDynamite
        ], 200);
    }

    //daily fountain
    public function dailyFountain(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
        ]);

        $dailyFountain = Study::where('type', 1)->where('study_date', $request->date)->first();

        return response()->json([
            'status' => true,
            'data' => $dailyFountain
        ], 200);
    }
}

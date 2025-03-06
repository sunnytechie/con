<?php

namespace App\Http\Controllers\Api\v23;

use App\Models\User;
use App\Models\Study;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\Purchasedstudy;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DevotionalController extends Controller
{
    public function yearsListingPrice($user_id, $study_id) {
        $user = User::find($user_id);
        $study = Study::findOrFail($study_id);

        $price = Price::first();
        switch ($study->type) {
                case 1:
                $priceList = [
                    'naira' => $price->daily_fountain,
                    'usd' => $price->daily_fountain_usd,
                    'euro' => $price->daily_fountain_euro,
                    'pounds' => $price->daily_fountain_pounds,
                ];
                break;
                case 2:
                $priceList = [
                    'naira' => $price->bible_study,
                    'usd' => $price->bible_study_usd,
                    'euro' => $price->bible_study_euro,
                    'pounds' => $price->bible_study_pounds,
                ];
                break;
                case 3:
                $priceList = [
                    'naira' => $price->daily_dynamite,
                    'usd' => $price->daily_dynamite_usd,
                    'euro' => $price->daily_dynamite_euro,
                    'pounds' => $price->daily_dynamite_pounds,
                ];
                break;
            default:
                $price = 1000;
                break;
        }

        if (!$study) {
            return response()->json([
                'status' => false,
                'message' => 'Study not found',
            ], 404);
        }
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        $currentYear = Carbon::now()->year;
        $yearsWithData = [];

        for ($year = 2020; $year <= $currentYear; $year++) {
            $status = Purchasedstudy::where('email', $user->email)
                ->where('study_id', $study_id)
                ->where('valid_year', $year)
                ->first();

            $access = $status ? true : false;

            $yearsWithData[] = [
                'year' => $year,
                'access' => $access,
                'price' => $price,
                'priceList' => $priceList
            ];
        }

        // Reverse the array
        $yearsWithData = array_reverse($yearsWithData);

        return response()->json([
            'status' => true,
            'data' => $yearsWithData
        ], 200);


        //find the user in the purchasedstudy table
        ////$status = Purchasedstudy::where('email', $user->email)->where('study_id', $study_id)->where('valid_year', $year)->first();

        ////$currentYear = Carbon::now()->year;
        ////$yearsWithData = [];

        ////for ($year = 2020; $year <= $currentYear; $year++) {
        ////    $yearsWithData[] = [
        ////        'year' => $year,
                //'access' => true or false
        ////        'price' => 500
        ////    ];
        ////}

        //reverse the array
        ////$yearsWithData = array_reverse($yearsWithData);

        ////return response()->json([
        ////    'status' => true,
        ////    'data' => $yearsWithData
        ////], 200);
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

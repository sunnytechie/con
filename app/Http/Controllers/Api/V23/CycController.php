<?php

namespace App\Http\Controllers\Api\V23;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CycController extends Controller
{
    //cyccategories
    public function cyccategories()
    {
        $cyccategories = \App\Models\Cyccategory::all();
        return response()->json(
            [
                'status' => true,
                'message' => 'Cyccategories',
                'data' => $cyccategories
            ],
            200
        );
    }

    //cycsubcategories with cycauthors
    public function cycsubcategories($cyccategory_id)
    {
        $cycsubcategories = \App\Models\Cycsubcategory::where('cyccategory_id', $cyccategory_id)->get();
        return response()->json(
            [
                'status' => true,
                'message' => 'Cycsubcategories',
                'data' => $cycsubcategories
            ],
            200
        );
    }
}

<?php

namespace App\Http\Controllers\Api\V23;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BcpController extends Controller
{
    //category
    public function category()
    {
        $bcpcategories = \App\Models\Bcpcategory::all();
        return response()->json([
            'status' => true,
            'message' => 'BCP category',
            'data' => $bcpcategories
        ], 200);
    }

    //subcategory
    public function subcategory($id)
    {
        $bcpsubcategories = \App\Models\Bcpsubcategory::where('bcpcategory_id', $id)
                            ->select('id', 'title')
                            ->get();

        return response()->json([
            'status' => true,
            'message' => 'BCP subcategory',
            'data' => $bcpsubcategories
        ], 200);
    }

    //search subcategory
    public function search(Request $request)
    {
        //validate incoming request
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validate->errors()
            ], 422);
        }

        $bcpsubcategories = \App\Models\Bcpsubcategory::where('title', 'LIKE', '%' . $request->title . '%')
                            ->select('id', 'title')
                            ->get();

        if (count($bcpsubcategories) > 0) {
            return response()->json([
                'status' => true,
                'message' => 'BCP subcategory',
                'data' => $bcpsubcategories
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No BCP found',
            ], 404);
        }

    }

    //bcp
    public function bcp($id)
    {
        $bcp = \App\Models\Bcpsubcategory::where('bcpsubcategory_id', $id)
                ->select('id', 'title', 'content')
                ->get();

        return response()->json([
            'status' => true,
            'message' => 'BCP',
            'data' => $bcp
        ], 200);
    }


}

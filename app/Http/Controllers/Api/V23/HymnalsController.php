<?php

namespace App\Http\Controllers\Api\V23;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HymnalsController extends Controller
{
    //index
    public function index()
    {
        $hymnals = \App\Models\Hymnal::orderBy('number', 'asc')->get();
        return response()->json(
            [
                'status' => 'success',
                'data' => $hymnals
            ]
        );
    }

    //search
    public function search(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $validate->errors()->first()
                ]
            );
        }

        $hymnals = \App\Models\Hymnal::Where('title', 'like', '%' . $request->title . '%')
            ->orderBy('number', 'asc')
            ->get();

        return response()->json(
            [
                'status' => 'success',
                'data' => $hymnals
            ]
        );
    }

    //filter
    public function filter(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'number' => 'required',
            'title' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $validate->errors()->first()
                ]
            );
        }

        $hymnals = \App\Models\Hymnal::Where('number', 'like', '%' . $request->number . '%')
            ->orWhere('title', 'like', '%' . $request->title . '%')
            ->orderBy('number', 'asc')
            ->get();

        return response()->json(
            [
                'status' => 'success',
                'data' => $hymnals
            ]
        );
    }
}

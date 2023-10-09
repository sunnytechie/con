<?php

namespace App\Http\Controllers\Api\v23;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KidsZoneController extends Controller
{
    //index
    public function index() {
        $kidzones = \App\Models\Kidzone::all();
        return response()->json([
            'status' => true,
            'message' => 'Kidzones retrieved successfully',
            'data' => $kidzones
        ]);
    }
}

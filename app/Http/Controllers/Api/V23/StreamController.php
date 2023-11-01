<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Stream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StreamController extends Controller
{
    //API for streams details
    public function index()
    {
        //get last stream
        $stream = Stream::latest()->first();

        return response()->json([
            'status' => true,
            'data' => $stream,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\v23;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //index
    public function index() {
        $messages = \App\Models\Message::all();
        return response()->json([
            'status' => true,
            'message' => 'Messages retrieved successfully',
            'data' => $messages
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cycprovince;
use Illuminate\Http\Request;

class CycProfileController extends Controller
{
    public function index() {
        $cycs = Cycprovince::orderBy('created_at', 'desc')->get();
        return response()->json([
            'province' => $cycs,
        ]);        
    }
}

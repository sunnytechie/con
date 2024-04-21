<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    public function index() {
        $price = Price::first();
        return response()->json($price);
    }
}

<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //flutter key
    public function key() {
        $settings = Settings::first();

        $flutter = $settings->flutterwave_api_key;

        return response()->json([
            'status' => true,
            'flutterwave_key' => $flutter
        ]);
    }
}

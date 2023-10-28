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

        return response()->json([
            'status' => true,
            'flutterwave_key' => $settings->flutterwave_api_key,
            'test_public_key' => $settings->test_public_key,
            'test_secret_key' => $settings->test_secret_key,
        ]);
    }
}

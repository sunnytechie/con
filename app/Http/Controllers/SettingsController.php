<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //edit settings
    public function edit()
    {
        //get the last settings
        $setting = Settings::latest()->first();
        $title = "Settings";
        $id = $setting->id;
        $fcm_server_key = $setting->fcm_server_key;
        $mail_username = $setting->mail_username;
        $mail_password = $setting->mail_password;
        $mail_smtp_host = $setting->mail_smtp_host;
        $mail_protocol = $setting->mail_protocol;
        $mail_port = $setting->mail_port;
        $facebook_page = $setting->facebook_page;
        $youtube_page = $setting->youtube_page;
        $twitter_page = $setting->twitter_page;
        $instagram_page = $setting->instagram_page;
        $phone_number = $setting->phone_number;
        $whatsapp_number = $setting->whatsapp_number;
        $ads_interval = $setting->ads_interval;
        $paystack_api_key = $setting->paystack_api_key;
        $flutterwave_api_key = $setting->flutterwave_api_key;
        $flutterwave_currency_code = $setting->flutterwave_currency_code;
        $paypal_donation_url = $setting->paypal_donation_url;

        return view('settings.edit', compact('setting', 'title', 'fcm_server_key', 'mail_username', 'mail_password', 'mail_smtp_host', 'mail_protocol', 'mail_port', 'facebook_page', 'youtube_page', 'twitter_page', 'instagram_page', 'phone_number', 'whatsapp_number', 'ads_interval', 'id', 'paystack_api_key', 'flutterwave_api_key', 'flutterwave_currency_code', 'paypal_donation_url'));
    }

    //update settings
    public function update(Request $request, $id)
    {
        //validate the request
        $request->validate([
            'fcm_server_key' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_smtp_host' => 'required',
            'mail_protocol' => 'required',
            'mail_port' => 'required',
            'facebook_page' => 'required',
            'youtube_page' => 'required',
            'twitter_page' => 'required',
            'instagram_page' => 'required',
            'phone_number' => 'required',
            'whatsapp_number' => 'required',
            'paystack_api_key' => '',
            'flutterwave_api_key' => '',
            'flutterwave_currency_code' => '',
            'paypal_donation_url' => '',
            'test_public_key' => '',
            'test_secret_key' => '',
        ]);

        //update the settings
        $setting = Settings::find($id);
        $setting->fcm_server_key = $request->fcm_server_key;
        $setting->mail_username = $request->mail_username;
        $setting->mail_password = $request->mail_password;
        $setting->mail_smtp_host = $request->mail_smtp_host;
        $setting->mail_protocol = $request->mail_protocol;
        $setting->mail_port = $request->mail_port;
        $setting->facebook_page = $request->facebook_page;
        $setting->youtube_page = $request->youtube_page;
        $setting->twitter_page = $request->twitter_page;
        $setting->instagram_page = $request->instagram_page;
        $setting->phone_number = $request->phone_number;
        $setting->whatsapp_number = $request->whatsapp_number;
        $setting->paystack_api_key = $request->paystack_api_key;
        $setting->flutterwave_api_key = $request->flutterwave_api_key;
        $setting->flutterwave_currency_code = $request->flutterwave_currency_code;
        $setting->paypal_donation_url = $request->paypal_donation_url;
        $setting->test_public_key = $request->test_public_key;
        $setting->test_secret_key = $request->test_secret_key;
        $setting->save();

        return back()->with('success', 'Settings updated successfully');
    }

    //Api to get latest settings
    public function getSettings()
    {
        $settings = Settings::latest()->first();
        return response()->json($settings);
    }

    //flutter key
    public function key() {
        $settings = Settings::first();

        $flutter = $settings->flutterwave_api_key;

        return response()->json([
            'status' => "flutter key",
            'flutterwave' => $flutter
        ]);
    }
}

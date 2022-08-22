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
        $settings = Settings::latest()->first();
        
        $id = $settings->id;
        $fcm_server_key = $settings->fcm_server_key;
        $mail_username = $settings->mail_username;
        $mail_password = $settings->mail_password;
        $mail_smtp_host = $settings->mail_smtp_host;
        $mail_protocol = $settings->mail_protocol;
        $mail_port = $settings->mail_port;
        $facebook_page = $settings->facebook_page;
        $youtube_page = $settings->youtube_page;
        $twitter_page = $settings->twitter_page;
        $instagram_page = $settings->instagram_page;
        $phone_number = $settings->phone_number;
        $whatsapp_number = $settings->whatsapp_number;
        $ads_interval = $settings->ads_interval;
        $paystack_api_key = $settings->paystack_api_key;
        $flutterwave_api_key = $settings->flutterwave_api_key;
        $flutterwave_currency_code = $settings->flutterwave_currency_code;
        $paypal_donation_url = $settings->paypal_donation_url;

        return view('settings.edit', compact('settings', 'fcm_server_key', 'mail_username', 'mail_password', 'mail_smtp_host', 'mail_protocol', 'mail_port', 'facebook_page', 'youtube_page', 'twitter_page', 'instagram_page', 'phone_number', 'whatsapp_number', 'ads_interval', 'id', 'paystack_api_key', 'flutterwave_api_key', 'flutterwave_currency_code', 'paypal_donation_url'));
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
        ]);

        //update the settings
        $settings = Settings::find($id);
        $settings->fcm_server_key = $request->fcm_server_key;
        $settings->mail_username = $request->mail_username;
        $settings->mail_password = $request->mail_password;
        $settings->mail_smtp_host = $request->mail_smtp_host;
        $settings->mail_protocol = $request->mail_protocol;
        $settings->mail_port = $request->mail_port;
        $settings->facebook_page = $request->facebook_page;
        $settings->youtube_page = $request->youtube_page;
        $settings->twitter_page = $request->twitter_page;
        $settings->instagram_page = $request->instagram_page;
        $settings->phone_number = $request->phone_number;
        $settings->whatsapp_number = $request->whatsapp_number;
        $settings->paystack_api_key = $request->paystack_api_key;
        $settings->flutterwave_api_key = $request->flutterwave_api_key;
        $settings->flutterwave_currency_code = $request->flutterwave_currency_code;
        $settings->paypal_donation_url = $request->paypal_donation_url;

        $settings->save();
        
        return back()->with('success', 'Settings updated successfully');
    }

    //Api to get latest settings
    public function getSettings()
    {
        $settings = Settings::latest()->first();
        return response()->json($settings);
    }
}

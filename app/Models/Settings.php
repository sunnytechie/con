<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fcm_server_key',
        'mail_username',
        'mail_password',
        'mail_smtp_host',
        'mail_protocol',
        'mail_port',
        'facebook_page',
        'youtube_page',
        'twitter_page',
        'instagram_page',
        'phone_number',
        'whatsapp_number',
        'ads_interval',
        'website_url',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'image_five',
        'image_six',
        'image_seven',
        'image_eight',
        'paystack_api_key',
        'flutterwave_api_key',
        'flutterwave_currency_code',
        'paypal_donation_url',
    ];
}

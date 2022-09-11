<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NotificationController extends Controller
{
    //index
    public function indexLatest() {
        $notification = Notification::latest()->first();
        return response()->json($notification);
    }

    //index
    public function indexAll() {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return response()->json($notifications);
    }

}

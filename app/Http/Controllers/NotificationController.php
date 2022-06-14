<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() {
        return view('notifications.index');
    }

    public function create() {
        return view('notifications.create');
    }
}

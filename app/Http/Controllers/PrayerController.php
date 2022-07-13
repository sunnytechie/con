<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prayers = Prayer::paginate(20);;
        return view('prayer.index', compact('prayers'));
    }
}

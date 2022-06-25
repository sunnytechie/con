<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function video()
    {
        //categories
        $categories = Category::all();
        //Videos
        $videos = Video::all();
        return view('media.video.index', compact('categories', 'videos'));
    }

    public function audio()
    {
        //Audio
        $audio = Audio::all();
        //categories
        $categories = Category::all();
        return view('media.audio.index', compact('categories', 'audio'));
    }
}

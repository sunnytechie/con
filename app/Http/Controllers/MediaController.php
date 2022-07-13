<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Video;
use App\Models\Category;
use App\Models\Media;
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
        $videos = Media::orderBy('created_at', 'desc')->where('type', 'video')->paginate(20);
        return view('media.video.index', compact('categories', 'videos'));
    }

    public function audio()
    {
        //Audio
        $audio = Media::orderBy('created_at', 'desc')->where('type', 'audio')->paginate(20);
        //categories
        $categories = Category::all();
        return view('media.audio.index', compact('categories', 'audio'));
    }
}

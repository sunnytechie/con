<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Audio;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\ReportedComment;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Total number of users
        $totalUsers = User::count();
        //Total number of regstered users today
        $totalUsersToday = User::whereDate('created_at', today())->count();
        //Total number of books
        $totalBooks = Book::count();
        //Total number of videos
        $totalVideos = Video::count();
        //Total number of Audios
        $totalAudios = Audio::count();
        //Total number of admins
        $totalAdmins = User::where('role', 'admin')->count();
        //Total number of comments
        $totalComments = Comment::count();
        //Total number of reportedcomments
        $totalReportedComments = ReportedComment::count();
        

        return view('home', compact('totalUsers', 'totalUsersToday', 'totalBooks', 'totalVideos', 'totalAudios', 'totalAdmins', 'totalComments', 'totalReportedComments'));
    }

    public function media()
    {
        return view('media');
    }

    public function notAuthorized()
    {
        return view('notAuthorized');
    }
}

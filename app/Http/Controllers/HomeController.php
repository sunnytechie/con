<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Audio;
use App\Models\Bcppurchase;
use App\Models\Media;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Hymnalpurchase;
use App\Models\Mediaimage;
use App\Models\Membership;
use App\Models\Purchasecyc;
use Illuminate\Http\Request;
use App\Models\PurchasedBook;
use App\Models\Purchasedstudy;
use Illuminate\Support\Carbon;
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
        //total number of memberships
        $totalMemberships = Membership::count();
        //Total number of books
        $totalBooks = Book::count();
        //Total number of videos
        $totalVideos = Media::where('type', 'video')->count();
        //Total number of Audios
        $totalAudios = Media::where('type', 'audio')->count();
        //Total number of admins
        $totalAdmins = User::where('role', 'admin')->count();
        //Total number of comments
        $totalComments = Comment::count();
        //Total number of reportedcomments
        $totalReportedComments = ReportedComment::count();
        //total number of books purchased based on category
        //$totalBooksByCategory = Book::selectRaw('category_id, count(*) as total')->groupBy('category')->get();

        //Count purchased books by book id that exists in purchasedbooks table
        $totalPurchaseByBookId = PurchasedBook::selectRaw('book_id, count(*) as total')->groupBy('book_id')->get();
        //dd($totalPurchaseByBookId);

        //Count PurchasedStudy where study_category_name = Daily Fountain
        $totalPurchasedDailyFountain = Purchasedstudy::where('study_id', '1')->count();
        //Count PurchasedStudy where study_category_name = Daily Dynamite
        $totalPurchasedDailyDynamite = Purchasedstudy::where('study_id', '3')->count();
        //Count PurchasedStudy where study_category_name = Bible Study
        $totalPurchasedBibleStudy = Purchasedstudy::where('study_id', '2')->count();
        //count cyc
        $totalPurchasedCyc = Purchasecyc::get()->count();

        return view('home', compact('totalPurchasedCyc', 'totalUsers', 'totalUsersToday', 'totalBooks', 'totalVideos', 'totalAudios', 'totalAdmins', 'totalComments', 'totalReportedComments', 'totalPurchaseByBookId', 'totalMemberships', 'totalPurchasedDailyFountain', 'totalPurchasedDailyDynamite', 'totalPurchasedBibleStudy'));
    }

    public function media()
    {
        return view('media');
    }

    public function notAuthorized()
    {
        return view('notAuthorized');
    }

    public function v23() {
        $users = User::get()->count();
        $books = Book::get()->count();
        $members = Membership::get()->count();
        $admins = User::where('is_admin', 1)->get()->count();
        $videos = Media::where('type', 'video')->get()->count();
        $audios = Media::where('type', 'audio')->get()->count();
        $images = Mediaimage::orderBy('id', 'desc')->get()->count();
        $reports = ReportedComment::get()->count();

        $startDate = Carbon::now()->subDays(7);

        $usersLast7Days = User::where('created_at', '>=', $startDate)->count();
        $booksLast7Days = Book::where('created_at', '>=', $startDate)->count();
        $membersLast7Days = Membership::where('created_at', '>=', $startDate)->count();
        $adminsLast7Days = User::where('is_admin', 1)->where('created_at', '>=', $startDate)->count();
        $videosLast7Days = Media::where('type', 'video')->where('created_at', '>=', $startDate)->count();
        $audiosLast7Days = Media::where('type', 'audio')->where('created_at', '>=', $startDate)->count();
        $imagesLast7Days = Mediaimage::where('created_at', '>=', $startDate)->count();
        $reportsLast7Days = ReportedComment::where('created_at', '>=', $startDate)->count();

        //Count purchased books by book id that exists in purchasedbooks table
        //$totalPurchaseByBookId = PurchasedBook::selectRaw('book_id, count(*) as total')->groupBy('book_id')->get();
        //dd($totalPurchaseByBookId);

        $totalPurchaseByBookId = PurchasedBook::selectRaw('books.id as book_id, count(*) as total')
            ->join('books', 'purchased_books.book_id', '=', 'books.id')
            ->groupBy('books.id')
            ->get();

        $hymnals = Hymnalpurchase::get()->count();
        $bcps = Bcppurchase::get()->count();
        $cycs = Purchasecyc::get()->count();

        //Count PurchasedStudy where study_category_name = Daily Fountain
        $totalPurchasedDailyFountain = Purchasedstudy::where('study_id', '1')->count();
        //Count PurchasedStudy where study_category_name = Daily Dynamite
        $totalPurchasedDailyDynamite = Purchasedstudy::where('study_id', '3')->count();
        //Count PurchasedStudy where study_category_name = Bible Study
        $totalPurchasedBibleStudy = Purchasedstudy::where('study_id', '2')->count();
        //count cyc
        $totalPurchasedCyc = Purchasecyc::get()->count();

        //dd($users);
        return view('v23', compact(
            'users',
            'books',
            'members',
            'admins',
            'videos',
            'audios',
            'images',
            'reports',
            'usersLast7Days',
            'booksLast7Days',
            'membersLast7Days',
            'adminsLast7Days',
            'videosLast7Days',
            'audiosLast7Days',
            'imagesLast7Days',
            'reportsLast7Days',
            'totalPurchaseByBookId',
            'totalPurchasedDailyFountain',
            'totalPurchasedDailyDynamite',
            'totalPurchasedBibleStudy',
            'totalPurchasedCyc',
            'hymnals',
            'bcps',
            'cycs',
        ));
    }
}

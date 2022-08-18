<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//api for user login
//Route::post('/login', 'LoginController');
//api for user register
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'registerApi']);
//api for user logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
//api for user login
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'loginApi']);

//api for categories
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'categoriesApi']);
//api for categories according to media type
Route::get('/categories/audio', [App\Http\Controllers\MediaController::class, 'categoryApiAudio']);
Route::get('/categories/video', [App\Http\Controllers\MediaController::class, 'categoryApiVideo']);
Route::get('/categories/image', [App\Http\Controllers\MediaController::class, 'categoryApiImage']);
//api for media in categories with id
Route::get('/media/category/{id}', [App\Http\Controllers\MediaController::class, 'mediaCategoryApi']);

//api for bookcategories
Route::get('/books/categories', [App\Http\Controllers\BookCategoryController::class, 'bookcategoryApi']);
//api for books in bookSubCategoriesApi with bookcategory_id
Route::get('/books/subcategories/{id}', [App\Http\Controllers\BookCategoryController::class, 'bookSubCategoriesApi']);
//api for books with bookcategory_id where type is 1
Route::get('/books/paid/{id}', [App\Http\Controllers\BookCategoryController::class, 'bookDetailsApiPaid']);
//api for books with bookcategory_id where type is 0
Route::get('/books/free/{id}', [App\Http\Controllers\BookCategoryController::class, 'bookDetailsApiFree']);
//api for bookcategoryApiFree
Route::get('/categories/free', [App\Http\Controllers\BookCategoryController::class, 'bookcategoryApiFree']);
//api for bookcategoryApiPaid
Route::get('/categories/paid', [App\Http\Controllers\BookCategoryController::class, 'bookcategoryApiPaid']);

//Api for streams details
Route::get('/livestream', [App\Http\Controllers\StreamController::class, 'streamDetailsApi']);

//Api for prayer request
Route::post('/prayer/request', [App\Http\Controllers\PrayerController::class, 'storPrayereApi']);

//Api to store membership
Route::post('/membership', [App\Http\Controllers\MembershipController::class, 'storeMembershipApi']);

//Api for testimonies
Route::post('/testimonies', [App\Http\Controllers\TestimonyController::class, 'storeTestimonyApi']);
//Api to get all testimonies
Route::get('/testimonies/index', [App\Http\Controllers\TestimonyController::class, 'getTestimoniesApi']);

//Api to get all events
Route::get('/events', [App\Http\Controllers\EventController::class, 'getEventsApi']);

//Api to get all news
Route::get('/news', [App\Http\Controllers\NewsController::class, 'getNewsApi']);

//Api to store donation
Route::post('/donation/new', [App\Http\Controllers\DonationController::class, 'storeDonationApi']);

//Api for foutain in StudyController
Route::get('/study/fountain', [App\Http\Controllers\StudyController::class, 'fountainApi']);
//Api for dynamite in StudyController
Route::get('/study/dynamite', [App\Http\Controllers\StudyController::class, 'dynamiteApi']);
//Api for biblestudy in StudyController
Route::get('/study/biblestudy', [App\Http\Controllers\StudyController::class, 'biblestudyApi']);

//apiStorePurchasedBook
Route::post('/store/purchased/book', [App\Http\Controllers\PaymentController::class, 'apiStorePurchasedBook']);
//apiGetPurchasedBooks
Route::get('/user/purchased/books', [App\Http\Controllers\PaymentController::class, 'apiGetPurchasedBooks']);
//apiStorePurchasedStudy

Route::post('/store/purchased/study', [App\Http\Controllers\PurchaseStudyController::class, 'apiStorePurchasedStudy']);
//apiGetPurchasedStudy
Route::get('/user/purchased/study', [App\Http\Controllers\PurchaseStudyController::class, 'apiGetPurchasedStudy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


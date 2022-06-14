<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routes for Media
Route::get('media/videos', [App\Http\Controllers\MediaController::class, 'video'])->name('media.video');
Route::get('media/audio', [App\Http\Controllers\MediaController::class, 'audio'])->name('media.audio');

//Routes for Categories
Route::get('section/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('section/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('section/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
Route::get('section/categories/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
Route::get('section/categories/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
Route::put('section/categories/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
Route::delete('section/categories/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');

//Routes for SubCatController
Route::get('section/subcategories', [App\Http\Controllers\SubCatController::class, 'index'])->name('subcategories.index');
Route::get('section/subcategories/create', [App\Http\Controllers\SubCatController::class, 'create'])->name('subcategories.create');
Route::post('section/subcategories', [App\Http\Controllers\SubCatController::class, 'store'])->name('subcategories.store');
Route::get('section/subcategories/{subcategory}', [App\Http\Controllers\SubCatController::class, 'show'])->name('subcategories.show');
Route::get('section/subcategories/{subcategory}/edit', [App\Http\Controllers\SubCatController::class, 'edit'])->name('subcategories.edit');
Route::put('section/subcategories/{subcategory}', [App\Http\Controllers\SubCatController::class, 'update'])->name('subcategories.update');
Route::delete('section/subcategories/{subcategory}', [App\Http\Controllers\SubCatController::class, 'destroy'])->name('subcategories.destroy');

//Routes for NewsController
Route::get('news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('news/create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
Route::post('news', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
Route::get('news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
Route::get('news/{news}/edit', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
Route::put('news/{news}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
Route::delete('news/{news}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');

//Routes for EventController
Route::get('events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
Route::post('events', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
Route::get('events/{event}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
Route::get('events/{event}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
Route::put('events/{event}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
Route::delete('events/{event}', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');

//Routes for NotificationController
Route::get('notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
Route::get('notifications/create', [App\Http\Controllers\NotificationController::class, 'create'])->name('notifications.create');
Route::post('notifications', [App\Http\Controllers\NotificationController::class, 'store'])->name('notifications.store');

//Routes for AndroidUsersController
Route::get('app/androidusers', [App\Http\Controllers\AndroidUsersController::class, 'index'])->name('androidusers.index');

//Routes for CommentController
Route::get('app/comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');

//Routes for ReportedCommentController
Route::get('app/comments/reported', [App\Http\Controllers\ReportedCommentController::class, 'index'])->name('reportedcomments.index');

//Routes for MembershipController
Route::get('memberships', [App\Http\Controllers\MembershipController::class, 'index'])->name('memberships.index');
Route::get('memberships/create', [App\Http\Controllers\MembershipController::class, 'create'])->name('memberships.create');
Route::post('memberships', [App\Http\Controllers\MembershipController::class, 'store'])->name('memberships.store');
//Route for Membership Export
Route::get('memberships/export', [App\Http\Controllers\MembershipController::class, 'export'])->name('memberships.export');

//Routes for BookController
Route::get('books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
Route::post('books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
Route::get('books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::get('books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
Route::put('books/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
Route::delete('books/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');

//Routes for DonationController
Route::get('donations', [App\Http\Controllers\DonationController::class, 'index'])->name('donations.index');
Route::get('donations/create', [App\Http\Controllers\DonationController::class, 'create'])->name('donations.create');
Route::post('donations', [App\Http\Controllers\DonationController::class, 'store'])->name('donations.store');
Route::get('donations/{donation}', [App\Http\Controllers\DonationController::class, 'show'])->name('donations.show');
Route::get('donations/{donation}/edit', [App\Http\Controllers\DonationController::class, 'edit'])->name('donations.edit');
Route::put('donations/{donation}', [App\Http\Controllers\DonationController::class, 'update'])->name('donations.update');
Route::delete('donations/{donation}', [App\Http\Controllers\DonationController::class, 'destroy'])->name('donations.destroy');

//Routes for PaymentController
Route::get('payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
Route::get('payments/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payments.create');
Route::post('payments', [App\Http\Controllers\PaymentController::class, 'store'])->name('payments.store');
Route::get('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payments.show');
Route::get('payments/{payment}/edit', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payments.edit');
Route::put('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payments.update');
Route::delete('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'destroy'])->name('payments.destroy');

//Routes for TestimonyController
Route::get('testimonies', [App\Http\Controllers\TestimonyController::class, 'index'])->name('testimonies.index');

//Routes for BibleController
Route::get('bibles', [App\Http\Controllers\BibleController::class, 'index'])->name('bibles.index');
Route::get('bibles/create', [App\Http\Controllers\BibleController::class, 'create'])->name('bibles.create');
Route::post('bibles', [App\Http\Controllers\BibleController::class, 'store'])->name('bibles.store');
Route::get('bibles/{bible}', [App\Http\Controllers\BibleController::class, 'show'])->name('bibles.show');
Route::get('bibles/{bible}/edit', [App\Http\Controllers\BibleController::class, 'edit'])->name('bibles.edit');
Route::put('bibles/{bible}', [App\Http\Controllers\BibleController::class, 'update'])->name('bibles.update');
Route::delete('bibles/{bible}', [App\Http\Controllers\BibleController::class, 'destroy'])->name('bibles.destroy');

//Routes for PrayerController
Route::get('prayers', [App\Http\Controllers\PrayerController::class, 'index'])->name('prayers.index');
//Route for Prayer Export
Route::get('prayers/export', [App\Http\Controllers\PrayerController::class, 'export'])->name('prayers.export');
//Route for Prayer Response
Route::get('prayers/{prayer}/response', [App\Http\Controllers\PrayerController::class, 'response'])->name('prayers.response');

//Routes for FeedbackController
Route::get('feedbacks', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedbacks.index');


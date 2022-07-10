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

//verified middleware
Route::get('/verified', function () {
    return view('verified');
})->middleware('verified');

Auth::routes([
    'verify' => true,
]);

//Middleware Auth
Route::middleware('auth')->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index')->middleware('is_admin');
Route::get('/notAuthorized', [App\Http\Controllers\HomeController::class, 'notAuthorized'])->name('notAuthorized');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_admin');

//Routes for Media
Route::get('media/videos', [App\Http\Controllers\MediaController::class, 'video'])->name('media.video')->middleware('is_admin');
Route::get('media/audio', [App\Http\Controllers\MediaController::class, 'audio'])->name('media.audio')->middleware('is_admin');
//Store video, edit video, update video and destroy
Route::post('media/videos/store', [App\Http\Controllers\VideoController::class, 'store'])->name('video.store')->middleware('is_admin');
Route::get('media/video/edit/{id}', [App\Http\Controllers\VideoController::class, 'edit'])->name('video.edit')->middleware('is_admin');
Route::put('media/video/update/{id}', [App\Http\Controllers\VideoController::class, 'update'])->name('video.update')->middleware('is_admin');
Route::delete('media/video/destroy/{id}', [App\Http\Controllers\VideoController::class, 'destroy'])->name('video.destroy')->middleware('is_admin');
//Store audio, edit Audio, update audio and destroy
Route::post('media/audio/store', [App\Http\Controllers\AudioController::class, 'store'])->name('audio.store')->middleware('is_admin');
Route::get('media/audio/edit/{id}', [App\Http\Controllers\AudioController::class, 'edit'])->name('audio.edit')->middleware('is_admin');
Route::put('media/audio/update/{id}', [App\Http\Controllers\AudioController::class, 'update'])->name('audio.update')->middleware('is_admin');
Route::delete('media/audio/destroy/{id}', [App\Http\Controllers\AudioController::class, 'destroy'])->name('audio.destroy')->middleware('is_admin');

//Routes for Categories
Route::get('section/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index')->middleware('is_admin');
Route::get('section/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create')->middleware('is_admin');
Route::post('section/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store')->middleware('is_admin');
Route::get('section/categories/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show')->middleware('is_admin');
Route::get('section/categories/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit')->middleware('is_admin');
Route::put('section/categories/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update')->middleware('is_admin');
Route::delete('section/categories/delete/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('is_admin');

//Routes for SubCatController
Route::get('section/subcategories', [App\Http\Controllers\SubCatController::class, 'index'])->name('subcategories.index')->middleware('is_admin');
Route::get('section/subcategories/create', [App\Http\Controllers\SubCatController::class, 'create'])->name('subcategories.create')->middleware('is_admin');
Route::post('section/subcategories', [App\Http\Controllers\SubCatController::class, 'store'])->name('subcategories.store')->middleware('is_admin');
Route::get('section/subcategories/{subcategory}', [App\Http\Controllers\SubCatController::class, 'show'])->name('subcategories.show')->middleware('is_admin');
Route::get('section/subcategories/{subcategory}/edit', [App\Http\Controllers\SubCatController::class, 'edit'])->name('subcategories.edit')->middleware('is_admin');
Route::put('section/subcategories/{subcategory}', [App\Http\Controllers\SubCatController::class, 'update'])->name('subcategories.update')->middleware('is_admin');
Route::delete('section/subcategories/delete/{subcategory}', [App\Http\Controllers\SubCatController::class, 'destroy'])->name('subcategories.destroy')->middleware('is_admin');

//Routes for NewsController
Route::get('news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index')->middleware('is_admin');
Route::get('news/create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create')->middleware('is_admin');
Route::post('news', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store')->middleware('is_admin');
Route::get('news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show')->middleware('is_admin');
Route::get('news/{news}/edit', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit')->middleware('is_admin');
Route::put('news/{news}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update')->middleware('is_admin');
Route::delete('news/{news}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy')->middleware('is_admin');

//Routes for EventController
Route::get('events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index')->middleware('is_admin');
Route::get('events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create')->middleware('is_admin');
Route::post('events', [App\Http\Controllers\EventController::class, 'store'])->name('events.store')->middleware('is_admin');
Route::get('events/{event}', [App\Http\Controllers\EventController::class, 'show'])->name('events.show')->middleware('is_admin');
Route::get('events/{event}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit')->middleware('is_admin');
Route::put('events/{event}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update')->middleware('is_admin');
Route::delete('events/{event}', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy')->middleware('is_admin');

//Routes for NotificationController
Route::get('notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index')->middleware('is_admin');
Route::get('notifications/create', [App\Http\Controllers\NotificationController::class, 'create'])->name('notifications.create')->middleware('is_admin');
Route::post('notifications', [App\Http\Controllers\NotificationController::class, 'store'])->name('notifications.store')->middleware('is_admin');

//Routes for AndroidUsersController
Route::get('app/androidusers', [App\Http\Controllers\AndroidUsersController::class, 'index'])->name('androidusers.index')->middleware('is_admin');
Route::get('app/androidusers/create', [App\Http\Controllers\AndroidUsersController::class, 'create'])->name('androidusers.create')->middleware('is_admin');
Route::post('app/androidusers', [App\Http\Controllers\AndroidUsersController::class, 'store'])->name('androidusers.store')->middleware('is_admin');
Route::get('app/androidusers/{androiduser}', [App\Http\Controllers\AndroidUsersController::class, 'show'])->name('androidusers.show')->middleware('is_admin');
Route::get('app/androidusers/{androiduser}/edit', [App\Http\Controllers\AndroidUsersController::class, 'edit'])->name('androidusers.edit')->middleware('is_admin');
Route::put('app/androidusers/{androiduser}', [App\Http\Controllers\AndroidUsersController::class, 'update'])->name('androidusers.update')->middleware('is_admin');
Route::delete('app/androidusers/{androiduser}', [App\Http\Controllers\AndroidUsersController::class, 'destroy'])->name('androidusers.destroy')->middleware('is_admin');


//Routes for CommentController
Route::get('comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index')->middleware('is_admin');
//destroy comment
Route::delete('comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy')->middleware('is_admin');

//Routes for ReportedCommentController
Route::get('comments/reported', [App\Http\Controllers\ReportedCommentController::class, 'index'])->name('reportedcomments.index')->middleware('is_admin');
//destroy reported comment
Route::delete('comments/reported/{reportedcomment}', [App\Http\Controllers\ReportedCommentController::class, 'destroy'])->name('reportedcomments.destroy')->middleware('is_admin');

//Routes for MembershipController
Route::get('memberships', [App\Http\Controllers\MembershipController::class, 'index'])->name('memberships.index')->middleware('is_admin');
Route::get('memberships/create', [App\Http\Controllers\MembershipController::class, 'create'])->name('memberships.create')->middleware('is_admin');
Route::post('memberships', [App\Http\Controllers\MembershipController::class, 'store'])->name('memberships.store')->middleware('is_admin');
Route::get('memberships/{membership}', [App\Http\Controllers\MembershipController::class, 'show'])->name('memberships.show')->middleware('is_admin');
Route::get('memberships/{membership}/edit', [App\Http\Controllers\MembershipController::class, 'edit'])->name('memberships.edit')->middleware('is_admin');
Route::put('memberships/{membership}', [App\Http\Controllers\MembershipController::class, 'update'])->name('memberships.update')->middleware('is_admin');
Route::delete('memberships/{membership}', [App\Http\Controllers\MembershipController::class, 'destroy'])->name('memberships.destroy')->middleware('is_admin');
//Route for Membership Export
Route::get('memberships/export', [App\Http\Controllers\MembershipController::class, 'export'])->name('memberships.export')->middleware('is_admin');

//Routes for BookController
Route::get('books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index')->middleware('is_admin');
Route::get('books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create')->middleware('is_admin');
Route::post('books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store')->middleware('is_admin');
Route::get('books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show')->middleware('is_admin');
Route::get('books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit')->middleware('is_admin');
Route::put('books/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update')->middleware('is_admin');
Route::delete('books/delete/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy')->middleware('is_admin');
//Route store Book Category
Route::post('books/categories', [App\Http\Controllers\BookCategoryController::class, 'store'])->name('books.categories.store')->middleware('is_admin');
//Route store Book SubCategory
Route::post('books/sub/categories', [App\Http\Controllers\BookSubCategoryController::class, 'store'])->name('books.sub.categories.store')->middleware('is_admin');

//Routes for DonationController
Route::get('donations', [App\Http\Controllers\DonationController::class, 'index'])->name('donations.index')->middleware('is_admin');
Route::get('donations/create', [App\Http\Controllers\DonationController::class, 'create'])->name('donations.create')->middleware('is_admin');
Route::post('donations', [App\Http\Controllers\DonationController::class, 'store'])->name('donations.store')->middleware('is_admin');
Route::get('donations/{donation}', [App\Http\Controllers\DonationController::class, 'show'])->name('donations.show')->middleware('is_admin');
Route::get('donations/{donation}/edit', [App\Http\Controllers\DonationController::class, 'edit'])->name('donations.edit')->middleware('is_admin');
Route::put('donations/{donation}', [App\Http\Controllers\DonationController::class, 'update'])->name('donations.update')->middleware('is_admin');
Route::delete('donations/{donation}', [App\Http\Controllers\DonationController::class, 'destroy'])->name('donations.destroy')->middleware('is_admin');

//Routes for PaymentController
Route::get('payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index')->middleware('is_admin');
Route::get('payments/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payments.create')->middleware('is_admin');
Route::post('payments', [App\Http\Controllers\PaymentController::class, 'store'])->name('payments.store')->middleware('is_admin');
Route::get('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payments.show')->middleware('is_admin');
Route::get('payments/{payment}/edit', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payments.edit')->middleware('is_admin');
Route::put('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payments.update')->middleware('is_admin');
Route::delete('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'destroy'])->name('payments.destroy')->middleware('is_admin');

//Routes for TestimonyController
Route::get('testimonies', [App\Http\Controllers\TestimonyController::class, 'index'])->name('testimonies.index')->middleware('is_admin');

//Routes for BibleController
Route::get('bibles', [App\Http\Controllers\BibleController::class, 'index'])->name('bibles.index')->middleware('is_admin');
Route::get('bibles/create', [App\Http\Controllers\BibleController::class, 'create'])->name('bibles.create')->middleware('is_admin');
Route::post('bibles', [App\Http\Controllers\BibleController::class, 'store'])->name('bibles.store')->middleware('is_admin');
Route::get('bibles/{bible}', [App\Http\Controllers\BibleController::class, 'show'])->name('bibles.show')->middleware('is_admin');
Route::get('bibles/{bible}/edit', [App\Http\Controllers\BibleController::class, 'edit'])->name('bibles.edit')->middleware('is_admin');
Route::put('bibles/{bible}', [App\Http\Controllers\BibleController::class, 'update'])->name('bibles.update')->middleware('is_admin');
Route::delete('bibles/{bible}', [App\Http\Controllers\BibleController::class, 'destroy'])->name('bibles.destroy')->middleware('is_admin');

//Routes for PrayerController
Route::get('prayers', [App\Http\Controllers\PrayerController::class, 'index'])->name('prayers.index')->middleware('is_admin');
//Route for Prayer Export
Route::get('prayers/export', [App\Http\Controllers\PrayerController::class, 'export'])->name('prayers.export')->middleware('is_admin');
//Route for Prayer Response
Route::get('prayers/{prayer}/response', [App\Http\Controllers\PrayerController::class, 'response'])->name('prayers.response')->middleware('is_admin');

//Routes for FeedbackController
Route::get('feedbacks', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedbacks.index')->middleware('is_admin');

//Routes for AdminController
Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('is_admin');
Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create')->middleware('is_admin');
Route::post('admin', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store')->middleware('is_admin');
Route::get('admin/{admin}', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.show')->middleware('is_admin');
Route::get('admin/{admin}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit')->middleware('is_admin');
Route::put('admin/{admin}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update')->middleware('is_admin');
Route::delete('admin/{admin}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy')->middleware('is_admin');

//Routes to edit and update settings
Route::get('settings', [App\Http\Controllers\SettingsController::class, 'edit'])->name('settings.index')->middleware('is_admin');
Route::put('settings/{id}', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update')->middleware('is_admin');

//Routes to edit and update stream
Route::get('stream', [App\Http\Controllers\StreamController::class, 'edit'])->name('stream.index')->middleware('is_admin');
Route::put('stream/{id}', [App\Http\Controllers\StreamController::class, 'update'])->name('stream.update')->middleware('is_admin');

//import routes
Route::get('import-export', [App\Http\Controllers\ImportController::class, 'index'])->name('import.index')->middleware('is_admin');
Route::post('user-import', [App\Http\Controllers\ImportController::class, 'userImport'])->name('user.import')->middleware('is_admin');
Route::get('user-export', [App\Http\Controllers\ImportController::class, 'userExport'])->name('user.export')->middleware('is_admin');
});
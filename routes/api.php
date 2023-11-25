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
//Api for Google Login
Route::post('/auth/google-login', [App\Http\Controllers\Api\Auth\GoogleLoginController::class, 'gooleLoginApi']);
//Api to reset password
Route::post('forgot-password', [App\Http\Controllers\Api\NewPasswordController::class, 'forgotPassword']);
//Api to send otp
Route::post('/email/verification-notification', [App\Http\Controllers\Api\SendVerificationTokenToEmailController::class, 'sendVerificationTokenToEmail'])->name('verification.send.notification');
//Api to verify email
Route::post('/email/verify', [App\Http\Controllers\Api\VerifyEmailController::class, 'verify'])->name('verify.otp');

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

//Api for purchase cyc and cyc list
Route::get('/cyc/users', [App\Http\Controllers\Api\CycController::class, 'users']);
Route::get('/cyc', [App\Http\Controllers\Api\CycController::class, 'index']);
Route::post('/store/purchased/cyc', [App\Http\Controllers\Api\CycController::class, 'store']);

//getSettings
Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'getSettings']);

//Apis for notifications
Route::get('latest/push/nofication', [App\Http\Controllers\Api\NotificationController::class, 'indexLatest']);
Route::get('all/push/nofication', [App\Http\Controllers\Api\NotificationController::class, 'indexAll']);
//APi for CYC Province
Route::get('cyc/province', [App\Http\Controllers\Api\CycProfileController::class, 'index']);

//Api get Media likes
Route::get('/media/likes/{id}', [App\Http\Controllers\Api\LikesController::class, 'getMediaLikes']);
//Api store Media likes
Route::put('/media/likes/update/{id}', [App\Http\Controllers\Api\LikesController::class, 'updateMediaLikes']);
//Api get Media Views
Route::get('/media/views/{id}', [App\Http\Controllers\Api\ViewsController::class, 'getMediaViews']);
//Api store Media Views
Route::put('/media/views/update/{id}', [App\Http\Controllers\Api\ViewsController::class, 'updateMediaViews']);
//flutter key
Route::get('/get-flutterwave-key', [App\Http\Controllers\SettingsController::class, 'key']);













//version 23
    //v23 api for login
    Route::post('/auth/v23/login', [App\Http\Controllers\Api\V23\Auth\LoginController::class, 'loginApi']);

    //v23 api for register
    Route::post('/auth/v23/register', [App\Http\Controllers\Api\V23\Auth\RegisterController::class, 'registerApi']);
    //v23 api for verify email
    Route::post('/auth/v23/verify-email', [App\Http\Controllers\Api\V23\Auth\RegisterController::class, 'verifyOtp']);
    //v23 api for resend email
    Route::post('/auth/v23/resend-email', [App\Http\Controllers\Api\V23\Auth\VerifyEmailController::class, 'resendOtp']);
    //v23 api for forgot password
    Route::post('/auth/v23/forgot-password', [App\Http\Controllers\Api\V23\Auth\ForgotPasswordController::class, 'sendOtp']);
    //v23 api for verify otp
    Route::post('/auth/v23/verify-otp', [App\Http\Controllers\Api\V23\Auth\ForgotPasswordController::class, 'verifyOtp']);
    //v23 api for reset password
    Route::post('/auth/v23/reset-password', [App\Http\Controllers\Api\V23\Auth\ForgotPasswordController::class, 'newPassword']);


//grouping api version 23 with bearer middleware
Route::middleware('bearer')->group(function () {
    //v23 api for google login
    Route::post('/auth/v23/google-login', [App\Http\Controllers\Api\V23\Auth\GoogleLoginController::class, 'gooleLoginApi']);

    //v23 api for contact us
    Route::post('/v23/contact-us/{user_id}', [App\Http\Controllers\Api\V23\ContactUsController::class, 'store']);

    //v23 api for provinces and dioceses
    Route::get('/v23/provinces', [App\Http\Controllers\Api\V23\MembershipController::class, 'provinceDiocese']);
    //membership statusCheck
    Route::get('/v23/membership/status/{user_id}', [App\Http\Controllers\Api\V23\MembershipController::class, 'statusCheck']);

    //v23 api for prayer request
    Route::post('/v23/prayer/request', [App\Http\Controllers\Api\V23\PrayerController::class, 'store']);

    //Testimonies
    //v23 api for testimonies
    Route::post('/v23/testimony/{user_id}', [App\Http\Controllers\Api\V23\TestimonyController::class, 'store']);
    //v23 api for testimonies
    Route::get('/v23/testimonies', [App\Http\Controllers\Api\V23\TestimonyController::class, 'index']);

    //bookinayear
    //v23 api for bookinayear for current year
    Route::get('/v23/bookinayear', [App\Http\Controllers\Api\V23\BookInAYearController::class, 'index']);
    //v23 api for today bookinayear
    Route::get('/v23/bookinayear/today', [App\Http\Controllers\Api\V23\BookInAYearController::class, 'today']);
    //v23 api for current month bookinayear
    Route::get('/v23/bookinayear/month', [App\Http\Controllers\Api\V23\BookInAYearController::class, 'month']);
    //search bookinayear
    Route::get('/v23/bookinayear/search/{month}', [App\Http\Controllers\Api\V23\BookInAYearController::class, 'searchByMonth']);

    //Notes
    //v23 api for notes
    Route::post('/v23/notes/{user_id}', [App\Http\Controllers\Api\V23\NoteController::class, 'store']);
    //v23 api for notes
    Route::get('/v23/notes/{user_id}', [App\Http\Controllers\Api\V23\NoteController::class, 'index']);
    //update
    Route::post('/v23/update/notes/{id}', [App\Http\Controllers\Api\V23\NoteController::class, 'update']);
    //delete
    Route::delete('/v23/delete/notes/{id}', [App\Http\Controllers\Api\V23\NoteController::class, 'destroy']);

    //donation
    //v23 api for donation
    Route::post('/v23/donation/new', [App\Http\Controllers\Api\V23\DonationController::class, 'store']);

    //v23 api for Forum
    //check membership
    Route::get('/v23/forum/membership/{user_id}', [App\Http\Controllers\Api\V23\Forum\MembershipController::class, 'checkUserInMembership']);

    //index post
    Route::get('/v23/forum/post/{user_id}', [App\Http\Controllers\Api\V23\Forum\PostController::class, 'index']);
    //selfPost
    Route::get('/v23/forum/selfpost/{user_id}', [App\Http\Controllers\Api\V23\Forum\PostController::class, 'selfPost']);
    //saved post
    Route::get('/v23/forum/saved/post/{user_id}', [App\Http\Controllers\Api\V23\Forum\SavedPostController::class, 'index']);
    //likedpost
    Route::get('/v23/forum/liked/post/{user_id}', [App\Http\Controllers\Api\V23\Forum\LikeController::class, 'index']);
    //store post
    Route::post('/v23/forum/post/{user_id}', [App\Http\Controllers\Api\V23\Forum\PostController::class, 'store']);
    //update post
    Route::post('/v23/forum/post/{user_id}/{post_id}', [App\Http\Controllers\Api\V23\Forum\PostController::class, 'update']);
    //delete post
    Route::delete('/v23/forum/delete/post/{user_id}/{post_id}', [App\Http\Controllers\Api\V23\Forum\PostController::class, 'destroy']);

    //store post image
    Route::post('/v23/forum/post/image/{user_id}/{post_id}', [App\Http\Controllers\Api\V23\Forum\ImageController::class, 'store']);
    //delete post image
    Route::delete('/v23/forum/post/image/delete/{user_id}/{post_id}/{image_id}', [App\Http\Controllers\Api\V23\Forum\ImageController::class, 'destroy']);

    //store post like
    Route::post('/v23/post/like/{user_id}/{post_id}', [App\Http\Controllers\Api\V23\Forum\PostLikeController::class, 'store']);

    //store post saved
    Route::post('/v23/forum/save/post/{user_id}/{post_id}', [App\Http\Controllers\Api\V23\Forum\PostLikeController::class, 'savePost']);

    //retrieve comments
    Route::get('/v23/forum/post/comments/{post_id}/{user_id}', [App\Http\Controllers\Api\V23\Forum\SavedPostController::class, 'store']);

    //store post comment
    Route::post('/v23/forum/post/comment/{post_id}/{user_id}', [App\Http\Controllers\Api\V23\Forum\CommentController::class, 'store']);
    //delete post comment
    Route::delete('/v23/forum/post/comment/{post_id}/{comment_id}', [App\Http\Controllers\Api\V23\Forum\CommentController::class, 'destroy']);

    //store comment like
    Route::post('/v23/post/comment/like/{user_id}/{comment_id}', [App\Http\Controllers\Api\V23\Forum\PostLikeController::class, 'storecommentlike']);

    //store reply
    Route::post('/v23/forum/post/reply/{post_id}/{comment_id}/{user_id}', [App\Http\Controllers\Api\V23\Forum\ReplyController::class, 'store']);
    //delete reply
    Route::delete('/v23/forum/post/reply/{post_id}/{reply_id}', [App\Http\Controllers\Api\V23\Forum\ReplyController::class, 'destroy']);

    //store reply like
    Route::post('/v23/post/reply/like/{user_id}/{reply_id}', [App\Http\Controllers\Api\V23\Forum\PostLikeController::class, 'storereplylike']);

    //Update membership
    Route::post('/v23/forum/membership/update/{user_id}', [App\Http\Controllers\Api\V23\Forum\MembershipController::class, 'update']);

    //pdf with tag
    Route::post('/v23/pdf/books/{user_id}', [App\Http\Controllers\Api\V23\PDFController::class, 'indexByTag']);

    //pdf without tag
    Route::get('/v23/pdf/paid', [App\Http\Controllers\Api\V23\PDFController::class, 'indexPaid']);
    Route::get('/v23/pdf/free', [App\Http\Controllers\Api\V23\PDFController::class, 'indexFree']);

    //hymnals
    //index
    Route::get('/v23/hymnals/{user_id}', [App\Http\Controllers\Api\V23\HymnalsController::class, 'index']);
    //search
    Route::post('/v23/hymnals/search/{user_id}', [App\Http\Controllers\Api\V23\HymnalsController::class, 'search']);
    //filter
    Route::post('/v23/hymnals/filter/{user_id}', [App\Http\Controllers\Api\V23\HymnalsController::class, 'filter']);
    Route::post('/v23/subscribe/user/hymnals/{user_id}', [App\Http\Controllers\Api\V23\HymnalsController::class, 'subscribe']);
    Route::get('/v23/hymnals/aceess/user/{user_id}', [App\Http\Controllers\Api\V23\HymnalsController::class, 'checkAccess']);

    //Devotional year listing price
    Route::get('/v23/devotional/year/listing/price/{user_id}/{study_id}', [App\Http\Controllers\Api\V23\DevotionalController::class, 'yearsListingPrice']);

    //bible study
    Route::post('/v23/devotional/biblestudy', [App\Http\Controllers\Api\V23\DevotionalController::class, 'bibleStudy']);
    //daily dynamite
    Route::post('/v23/devotional/dailydynamite', [App\Http\Controllers\Api\V23\DevotionalController::class, 'dailyDynamite']);
    //daily fountain
    Route::post('/v23/devotional/dailyfountain', [App\Http\Controllers\Api\V23\DevotionalController::class, 'dailyfountain']);

    //audio category
    Route::get('/v23/media/audio/category', [App\Http\Controllers\Api\V23\Media\CategoryController::class, 'audioCategory']);
    //video category
    Route::get('/v23/media/video/category', [App\Http\Controllers\Api\V23\Media\CategoryController::class, 'videoCategory']);
    //gallery category
    Route::get('/v23/media/gallery/category', [App\Http\Controllers\Api\V23\Media\CategoryController::class, 'galleryCategory']);

    //audio media
    Route::post('/v23/media/audio', [App\Http\Controllers\Api\V23\Media\MediaController::class, 'audio']);
    //video media
    Route::post('/v23/media/video', [App\Http\Controllers\Api\V23\Media\MediaController::class, 'video']);
    //gallery media
    Route::post('/v23/media/gallery', [App\Http\Controllers\Api\V23\Media\MediaController::class, 'gallery']);

    //messages
    Route::get('/v23/messages', [App\Http\Controllers\Api\V23\MessageController::class, 'index']);

    //kidszone
    Route::get('/v23/kidszone', [App\Http\Controllers\Api\V23\KidsZoneController::class, 'index']);

    //notifications
    Route::get('/v23/notifications/{user_id}', [App\Http\Controllers\Api\V23\NotificationController::class, 'index']);

    //subscribe book
    Route::post('/v23/subscribe/book/{user_id}/{book_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'subscribeBook']);
    //subscribe study
    Route::post('/v23/subscribe/study/{user_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'subscribeStudy']);
    //subscribe bcp
    Route::post('/v23/subscribe/bcp/{user_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'subscribeBcp']);
    //subscribe cyc
    Route::post('/v23/subscribe/cyc/{user_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'subscribeCyc']);

    //checkBookSubscription
    Route::get('/v23/check/book/subscription/{user_id}/{book_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'checkBookSubscription']);
    //checkStudySubscription
    Route::post('/v23/check/study/subscription/{user_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'checkStudySubscription']);
    //checkBcpSubscription
    Route::get('/v23/check/bcp/subscription/{user_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'checkBcpSubscription']);
    //checkCycSubscription
    Route::get('/v23/check/cyc/subscription/{user_id}', [App\Http\Controllers\Api\V23\SubscribeController::class, 'checkCycSubscription']);

    //bcp category
    Route::get('/v23/bcp/categories', [App\Http\Controllers\Api\V23\BcpController::class, 'category']);
    //bcp subcategory
    Route::get('/v23/bcp/subcategory/{id}', [App\Http\Controllers\Api\V23\BcpController::class, 'subcategory']);
    //bcp
    Route::get('/v23/bcp/{id}', [App\Http\Controllers\Api\V23\BcpController::class, 'bcp']);
    //bcp search
    Route::post('/v23/bcp/search', [App\Http\Controllers\Api\V23\BcpController::class, 'search']);

    //cyccategories
    Route::get('/v23/cyccategories', [App\Http\Controllers\Api\V23\CycController::class, 'cyccategories']);
    //cycsubcategories
    Route::get('/v23/cycsubcategories/cyc/{cyccategory_id}', [App\Http\Controllers\Api\V23\CycController::class, 'cycsubcategories']);

    //calendar
    //current day
    Route::get('/v23/calendar', [App\Http\Controllers\Api\V23\CalendarController::class, 'index']);
    //search by date
    Route::post('/v23/calendar/search', [App\Http\Controllers\Api\V23\CalendarController::class, 'search']);
    //settings
    Route::get('/v23/flutterwave/key', [App\Http\Controllers\Api\V23\SettingController::class, 'key']);
    //stream key
    Route::get('/v23/stream/live', [App\Http\Controllers\Api\V23\StreamController::class, 'index']);

});


//grouping api version 23 with user token middleware
Route::middleware('token')->group(function () {
    //update profile
    Route::post('/v23/profile/update/{user_id}', [App\Http\Controllers\Api\V23\ProfileUpdateController::class, 'update']);

    //v23 api for account settings
    //verifyOldPassword
    Route::post('/v23/account/verify-old-password/{user_id}', [App\Http\Controllers\Api\V23\Auth\ChangePasswordController::class, 'verifyOldPassword']);
    //changePassword
    Route::post('/v23/account/change-password/{user_id}', [App\Http\Controllers\Api\V23\Auth\ChangePasswordController::class, 'changePassword']);
    //v23 api for membership
    Route::post('/v23/membership/{user_id}', [App\Http\Controllers\Api\V23\MembershipController::class, 'store']);
    //delete account
    Route::post('/v23/deactivate/user/{user_id}', [App\Http\Controllers\Api\V23\AccountController::class, 'account']);
    Route::get('/v23/account/user/{user_id}', [App\Http\Controllers\Api\V23\AccountController::class, 'userAccount']);
});


//grouping api version 23 with sanctum middleware
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


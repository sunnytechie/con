<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;

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
    Route::get('/notAuthorized', [App\Http\Controllers\HomeController::class, 'notAuthorized'])->name('notAuthorized');
    Route::middleware('auth', 'is_all_admin')->group(function () {
    Route::get('/version23', [App\Http\Controllers\HomeController::class, 'v23'])->name('v23');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'v23'])->name('home.index');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'v23'])->name('home');
});

Route::middleware('auth', 'isICT')->group(function () {
    //Routes for Media
    Route::get('media/videos', [App\Http\Controllers\MediaController::class, 'video'])->name('media.video');
    //search
    Route::get('media/videos/search', [App\Http\Controllers\MediaController::class, 'searchVideo'])->name('media.video.search');
    Route::get('media/audio', [App\Http\Controllers\MediaController::class, 'audio'])->name('media.audio');
    //search
    Route::get('media/audio/search', [App\Http\Controllers\MediaController::class, 'searchAudio'])->name('media.audio.search');
    //Store video, edit video, update video and destroy
    Route::post('media/videos/store', [App\Http\Controllers\VideoController::class, 'store'])->name('video.store');
    Route::get('media/video/edit/{id}', [App\Http\Controllers\VideoController::class, 'edit'])->name('video.edit');
    Route::put('media/video/update/{id}', [App\Http\Controllers\VideoController::class, 'update'])->name('video.update');
    Route::delete('media/video/destroy/{id}', [App\Http\Controllers\VideoController::class, 'destroy'])->name('video.destroy');
    //Store audio, edit Audio, update audio and destroy
    Route::post('media/audio/store', [App\Http\Controllers\AudioController::class, 'store'])->name('audio.store');
    Route::get('media/audio/edit/{id}', [App\Http\Controllers\AudioController::class, 'edit'])->name('audio.edit');
    Route::put('media/audio/update/{id}', [App\Http\Controllers\AudioController::class, 'update'])->name('audio.update');
    Route::delete('media/audio/destroy/{id}', [App\Http\Controllers\AudioController::class, 'destroy'])->name('audio.destroy');

    //Galleries
    Route::get('media/galleries', [App\Http\Controllers\GalleryController::class, 'index'])->name('media.gallery');
    Route::post('media/galleries/image', [App\Http\Controllers\GalleryController::class, 'store'])->name('media.gallery.store');
    Route::delete('media/galleries/image/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('media.gallery.destroy');
});

Route::middleware('auth', 'isICT')->group(function () {
    //Routes for Categories
    Route::get('section/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('section/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('section/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('section/categories/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
    Route::get('section/categories/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('section/categories/{category}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('section/categories/delete/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');

    //Routes for SubCatController
    Route::get('section/subcategories', [App\Http\Controllers\SubCatController::class, 'index'])->name('subcategories.index');
    Route::get('section/subcategories/create', [App\Http\Controllers\SubCatController::class, 'create'])->name('subcategories.create');
    Route::post('section/subcategories', [App\Http\Controllers\SubCatController::class, 'store'])->name('subcategories.store');
    Route::get('section/subcategories/{subcategory}', [App\Http\Controllers\SubCatController::class, 'show'])->name('subcategories.show');
    Route::get('section/subcategories/{subcategory}/edit', [App\Http\Controllers\SubCatController::class, 'edit'])->name('subcategories.edit');
    Route::put('section/subcategories/{subcategory}', [App\Http\Controllers\SubCatController::class, 'update'])->name('subcategories.update');
    Route::delete('section/subcategories/delete/{subcategory}', [App\Http\Controllers\SubCatController::class, 'destroy'])->name('subcategories.destroy');

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
    Route::get('notifications/{notification}/edit', [App\Http\Controllers\NotificationController::class, 'edit'])->name('notifications.edit');
    Route::put('notifications/{notification}', [App\Http\Controllers\NotificationController::class, 'update'])->name('notifications.update');
    Route::delete('notifications/{notification}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');

    //Route Push Notification
    Route::get('notifications/push', [App\Http\Controllers\PushNotificationController::class, 'index'])->name('notifications.push.index');
    Route::post('notifications/push', [App\Http\Controllers\PushNotificationController::class, 'push'])->name('notifications.push');
});

Route::middleware('auth', 'isDataBase')->group(function () {
    //Routes for AndroidUsersController
    Route::get('app/androidusers', [App\Http\Controllers\AndroidUsersController::class, 'index'])->name('androidusers.index');
    //search for android users
    Route::get('app/androidusers/search', [App\Http\Controllers\AndroidUsersController::class, 'search'])->name('androidusers.search');
    Route::get('app/androidusers/create', [App\Http\Controllers\AndroidUsersController::class, 'create'])->name('androidusers.create');
    Route::post('app/androidusers', [App\Http\Controllers\AndroidUsersController::class, 'store'])->name('androidusers.store');
    Route::get('app/androidusers/{id}', [App\Http\Controllers\AndroidUsersController::class, 'show'])->name('androidusers.show');
    Route::get('app/androidusers/{androiduser}/edit', [App\Http\Controllers\AndroidUsersController::class, 'edit'])->name('androidusers.edit');
    Route::put('app/androidusers/{androiduser}', [App\Http\Controllers\AndroidUsersController::class, 'update'])->name('androidusers.update');
    Route::delete('app/androidusers/{androiduser}', [App\Http\Controllers\AndroidUsersController::class, 'destroy'])->name('androidusers.destroy');
});

    //Routes for CommentController
    Route::get('comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
    //destroy comment
    Route::delete('comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

    //Routes for ReportedCommentController
    Route::get('comments/reported', [App\Http\Controllers\ReportedCommentController::class, 'index'])->name('reportedcomments.index');
    //destroy reported comment
    Route::delete('comments/reported/{reportedcomment}', [App\Http\Controllers\ReportedCommentController::class, 'destroy'])->name('reportedcomments.destroy');

Route::middleware('auth', 'isDataBase')->group(function () {
    //Routes for MembershipController
    Route::get('memberships', [App\Http\Controllers\MembershipController::class, 'index'])->name('memberships.index');
    Route::post('memberships/search', [App\Http\Controllers\MembershipController::class, 'search'])->name('memberships.search');
    Route::get('memberships/create', [App\Http\Controllers\MembershipController::class, 'create'])->name('memberships.create');
    Route::post('memberships', [App\Http\Controllers\MembershipController::class, 'store'])->name('memberships.store');
    Route::get('memberships/{membership}', [App\Http\Controllers\MembershipController::class, 'show'])->name('memberships.show');
    Route::get('memberships/{membership}/edit', [App\Http\Controllers\MembershipController::class, 'edit'])->name('memberships.edit');
    Route::put('memberships/{membership}', [App\Http\Controllers\MembershipController::class, 'update'])->name('memberships.update');
    Route::delete('memberships/{membership}', [App\Http\Controllers\MembershipController::class, 'destroy'])->name('memberships.destroy');
    //Route for Membership Export
    Route::get('memberships/export', [App\Http\Controllers\MembershipController::class, 'export'])->name('memberships.export');
});

Route::middleware('auth', 'isICT')->group(function () {
    //Routes for BookController
    Route::get('books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
    Route::get('books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::post('books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
    Route::get('books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
    Route::get('books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
    Route::put('books/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
    Route::delete('books/delete/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');


    //Route Book Category
    Route::get('book/categories', [App\Http\Controllers\BookCategoryController::class, 'index'])->name('books.categories.index');
    Route::get('book/{category}/edit', [App\Http\Controllers\BookCategoryController::class, 'edit'])->name('book.category.edit');
    Route::put('book/{category}', [App\Http\Controllers\BookCategoryController::class, 'update'])->name('book.category.update');
    Route::delete('book/{category}/delete', [App\Http\Controllers\BookCategoryController::class, 'destroy'])->name('book.category.destroy');
    Route::post('books/category', [App\Http\Controllers\BookCategoryController::class, 'store'])->name('books.categories.store');

    //Route store Book SubCategory
    Route::get('book/sub/categories', [App\Http\Controllers\BookSubCategoryController::class, 'index'])->name('book.sub.categories.index');
    Route::get('book/sub/{category}/edit', [App\Http\Controllers\BookSubCategoryController::class, 'edit'])->name('book.sub.category.edit');
    Route::put('book/sub/{category}', [App\Http\Controllers\BookSubCategoryController::class, 'update'])->name('book.sub.category.update');
    Route::delete('book/sub/{category}/delete', [App\Http\Controllers\BookSubCategoryController::class, 'destroy'])->name('book.sub.category.destroy');
    Route::post('books/sub/category', [App\Http\Controllers\BookSubCategoryController::class, 'store'])->name('books.sub.categories.store');
});

Route::middleware('auth', 'isFinance')->group(function () {
    //Routes for DonationController
    Route::get('donations', [App\Http\Controllers\DonationController::class, 'index'])->name('donations.index');
    //Search
    Route::post('donations/search', [App\Http\Controllers\DonationController::class, 'search'])->name('donations.search');
    Route::get('donations/create', [App\Http\Controllers\DonationController::class, 'create'])->name('donations.create');
    Route::post('donations', [App\Http\Controllers\DonationController::class, 'store'])->name('donations.store');
    Route::get('donations/{donation}', [App\Http\Controllers\DonationController::class, 'show'])->name('donations.show');
    Route::get('donations/{donation}/edit', [App\Http\Controllers\DonationController::class, 'edit'])->name('donations.edit');
    Route::put('donations/{donation}', [App\Http\Controllers\DonationController::class, 'update'])->name('donations.update');
    Route::delete('donations/destroy/{donation}', [App\Http\Controllers\DonationController::class, 'destroy'])->name('donations.destroy');

    //Routes for PaymentController
    Route::get('payments', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
    //search
    Route::post('payments/search', [App\Http\Controllers\PaymentController::class, 'search'])->name('payments.search');
    //rangeSearch
    Route::post('payments/range/search', [App\Http\Controllers\PaymentController::class, 'rangeSearch'])->name('payments.rangeSearch');
    Route::get('payments/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payments.create');
    Route::post('payments', [App\Http\Controllers\PaymentController::class, 'store'])->name('payments.store');
    Route::get('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'show'])->name('payments.show');
    Route::get('payments/{payment}/edit', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payments.update');
    Route::delete('payments/{payment}', [App\Http\Controllers\PaymentController::class, 'destroy'])->name('payments.destroy');

    //Routes for PurchasedStudyController
    Route::get('purchase/studies', [App\Http\Controllers\PurchaseStudyController::class, 'index'])->name('purchase.studies.index');
    Route::get('purchase/study/create', [App\Http\Controllers\PurchaseStudyController::class, 'create'])->name('purchase.studies.create');
    Route::post('purchase/studies', [App\Http\Controllers\PurchaseStudyController::class, 'store'])->name('purchase.studies.store');
    Route::get('purchase/study/{purchaseStudy}', [App\Http\Controllers\PurchaseStudyController::class, 'show'])->name('purchase.studies.show');
    Route::get('purchase/study/{purchaseStudy}/edit', [App\Http\Controllers\PurchaseStudyController::class, 'edit'])->name('purchase.studies.edit');
    Route::put('purchase/study/{purchaseStudy}', [App\Http\Controllers\PurchaseStudyController::class, 'update'])->name('purchase.studies.update');
    Route::delete('purchase/study/{purchaseStudy}', [App\Http\Controllers\PurchaseStudyController::class, 'destroy'])->name('purchase.studies.destroy');

    //search
    Route::post('purchase/studies/search', [App\Http\Controllers\PurchaseStudyController::class, 'search'])->name('purchase.studies.search');
    //rangeSearch
    Route::post('purchase/studies/range/search', [App\Http\Controllers\PurchaseStudyController::class, 'rangeSearch'])->name('purchase.studies.rangeSearch');
});

Route::middleware('auth', 'isDataBase')->group(function () {
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

    //Routes for CycProvinceandDiocese
    Route::get('provinces/profiles', [App\Http\Controllers\CycprovinceController::class, 'profile'])->name('provinces.profile');
    Route::get('provinces/profiles/{profile}/edit', [App\Http\Controllers\CycprovinceController::class, 'profileEdit'])->name('province.profile.edit');
    Route::put('provinces/profile/{profile}/update', [App\Http\Controllers\CycprovinceController::class, 'profileUpdate'])->name('province.profile.update');
    Route::post('store/cyc/province', [App\Http\Controllers\CycprovinceController::class, 'store'])->name('cyc.provinces.store');
    Route::delete('provinces/cyc/{id}', [App\Http\Controllers\CycprovinceController::class, 'destroy'])->name('cyc.provinces.destroy');
    Route::get('get-diocese', [App\Http\Controllers\CycprovinceController::class, 'getDiocese'])->name('getDiocese');

    //Route for ProvinceController
    Route::get('provinces', [App\Http\Controllers\ProvinceController::class, 'index'])->name('provinces.index');
    Route::get('edit/provinces/{id}', [App\Http\Controllers\ProvinceController::class, 'edit'])->name('provinces.edit');
    Route::put('update/provinces/{id}', [App\Http\Controllers\ProvinceController::class, 'update'])->name('provinces.update');
    Route::post('store/province', [App\Http\Controllers\ProvinceController::class, 'store'])->name('provinces.store');
    Route::delete('delete/provinces/{id}', [App\Http\Controllers\ProvinceController::class, 'destroy'])->name('provinces.destroy');

    //Route for DioceseController
    Route::post('diocese', [App\Http\Controllers\DioceseController::class, 'store'])->name('diocese.store');


    //Routes for PrayerController
    Route::get('prayers', [App\Http\Controllers\PrayerController::class, 'index'])->name('prayers.index');
    Route::get('prayers/{prayer}', [App\Http\Controllers\PrayerController::class, 'show'])->name('prayers.show');
    Route::post('mail/prayer', [App\Http\Controllers\PrayerController::class, 'email'])->name('prayers.email');
    //Route for Prayer Export
    Route::get('export/prayers', [App\Http\Controllers\Export\PrayerController::class, 'fileExport'])->name('prayers.export');
    //Route for Prayer Response
    Route::get('prayers/{prayer}/response', [App\Http\Controllers\PrayerController::class, 'response'])->name('prayers.response');

    //Routes for FeedbackController
    Route::get('feedbacks', [App\Http\Controllers\FeedbackController::class, 'index'])->name('feedbacks.index');
});

Route::middleware('auth', 'is_admin')->group(function () {
    //Routes for AdminController
    Route::get('admins', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    Route::post('admin', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/{admin}', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.show');
    Route::get('admin/{admin}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/{admin}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/{admin}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::middleware('auth', 'isICT')->group(function () {
    //Routes to edit and update settings
    Route::get('settings', [App\Http\Controllers\SettingsController::class, 'edit'])->name('settings.index');
    Route::put('settings/{id}', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');

    //Routes to edit and update stream
    Route::get('stream', [App\Http\Controllers\StreamController::class, 'edit'])->name('stream.index');
    Route::put('stream/{id}', [App\Http\Controllers\StreamController::class, 'update'])->name('stream.update');
});

Route::middleware('auth', 'isICT')->group(function () {
    //Routes recources for StudyController
    Route::resource('studies', StudyController::class);

    //Routes indexFountain StudyController
    Route::get('study/daily/fountain', [App\Http\Controllers\StudyController::class, 'indexFountain'])->name('studies.fountain');
    //Routes editFountain StudyController
    Route::get('study/edit/fountain/{study}', [App\Http\Controllers\StudyController::class, 'editFountain'])->name('studies.editFountain');
    //Routes updateFountain StudyController
    Route::put('study/update/fountain/{study}', [App\Http\Controllers\StudyController::class, 'updateFountain'])->name('studies.updateFountain');

    //Routes indexBibleStudy StudyController
    Route::get('study/biblestudy', [App\Http\Controllers\StudyController::class, 'indexBibleStudy'])->name('studies.study');
    //Routes editBibleStudy StudyController
    Route::get('study/edit/biblestudy/{study}', [App\Http\Controllers\StudyController::class, 'editBibleStudy'])->name('studies.editBibleStudy');
    //Routes updateBibleStudy StudyController
    Route::put('study/update/bible/study/{study}', [App\Http\Controllers\StudyController::class, 'updateBibleStudy'])->name('studies.updateBibleStudy');

    //Routes indexDailyDynamite StudyController
    Route::get('study/daily/dynamite', [App\Http\Controllers\StudyController::class, 'indexDailyDynamite'])->name('studies.dynamite');
    //Routes editdailydynamite StudyController
    Route::get('edit/daily/dynamite/{study}', [App\Http\Controllers\StudyController::class, 'editDailyDynamite'])->name('studies.editDailyDynamite');
    //Routes updatedailydynamite StudyController
    Route::put('update/daily/dynamite/{study}', [App\Http\Controllers\StudyController::class, 'updateDailyDynamite'])->name('studies.updateDailyDynamite');

    //Routes for cyc
    Route::get('cyc', [App\Http\Controllers\CycController::class, 'index'])->name('cyc.index');
    Route::get('cyc/new', [App\Http\Controllers\CycController::class, 'create'])->name('cyc.new');
    Route::post('cyc/store', [App\Http\Controllers\CycController::class, 'store'])->name('cyc.store');
    Route::put('cyc/update/{new}', [App\Http\Controllers\CycController::class, 'update'])->name('cyc.update');
    Route::get('cyc/edit/{new}', [App\Http\Controllers\CycController::class, 'edit'])->name('cyc.edit');
    Route::delete('cyc/destroy/{new}', [App\Http\Controllers\CycController::class, 'destroy'])->name('cyc.destroy');

    //store cyccategory
    Route::get('cyc/category', [App\Http\Controllers\CycController::class, 'category'])->name('cyc.category');
    Route::post('cyc/category/store', [App\Http\Controllers\CycController::class, 'categoryStore'])->name('cyc.category.store');
    //store cycsubcategory
    Route::post('cyc/subcategory/store', [App\Http\Controllers\CycController::class, 'subcategoryStore'])->name('cyc.subcategory.store');
    Route::delete('cyc/subcategory/{id}', [App\Http\Controllers\CycController::class, 'categoryDestroy'])->name('cyc.subcategory.destroy');

    //Calendar
    Route::get('cy/calender', [App\Http\Controllers\CycController::class, 'calendar'])->name('cyc.calendar');
    Route::post('cy/calender', [App\Http\Controllers\CycController::class, 'calendarStore'])->name('cyc.calendar.store');
    Route::get('cy/calender/edit/{calendar}', [App\Http\Controllers\CycController::class, 'calendarEdit'])->name('cyc.calendar.edit');
    Route::put('cy/calender/{calendar}', [App\Http\Controllers\CycController::class, 'calendarUpdate'])->name('cyc.calendar.update');
    Route::delete('cy/calender/{calendar}', [App\Http\Controllers\CycController::class, 'calendarDestroy'])->name('cyc.calendar.destroy');

    //Bcp
    Route::get('bcp', [App\Http\Controllers\BcpController::class, 'index'])->name('bcp.index');
    Route::post('bcp/store', [App\Http\Controllers\BcpController::class, 'store'])->name('bcp.store');
    Route::get('bcp/edit/{id}', [App\Http\Controllers\BcpController::class, 'edit'])->name('bcp.edit');
    Route::put('bcp/update/{id}', [App\Http\Controllers\BcpController::class, 'update'])->name('bcp.update');
    Route::delete('bcp/destroy/{id}', [App\Http\Controllers\BcpController::class, 'destroy'])->name('bcp.destroy');

    //categories
    Route::get('bcp/categories', [App\Http\Controllers\BcpController::class, 'category'])->name('bcp.category');
    Route::post('bcp/category', [App\Http\Controllers\BcpController::class, 'categoryStore'])->name('bcp.category.store');
    Route::delete('bcp/category/{id}', [App\Http\Controllers\BcpController::class, 'categoryDestory'])->name('bcp.category.destroy');

    //Purchase cyc
    Route::get('purchased/cyc', [App\Http\Controllers\PurchasedCycController::class, 'index'])->name('purchased.cyc.index');
    Route::post('purchased/cyc/store', [App\Http\Controllers\PurchasedCycController::class, 'store'])->name('purchased.cyc.store');
    Route::delete('purchased/{id}/cyc/', [App\Http\Controllers\PurchasedCycController::class, 'destroy'])->name('purchased.cyc.destory');
});


    //import routes
    Route::get('import-export', [App\Http\Controllers\ImportController::class, 'index'])->name('import.index');
    Route::post('user-import', [App\Http\Controllers\ImportController::class, 'userImport'])->name('user.import');
    Route::get('user-export', [App\Http\Controllers\ImportController::class, 'userExport'])->name('user.export');
    //import media
    Route::post('media-import', [App\Http\Controllers\ImportController::class, 'mediaImport'])->name('media.import');
    //import testimonies
    Route::post('testimony-import', [App\Http\Controllers\ImportController::class, 'testimonyImport'])->name('testimony.import');
    //import donation
    Route::post('donation-import', [App\Http\Controllers\ImportController::class, 'donationImport'])->name('donation.import');
    //import book
    Route::post('book-import', [App\Http\Controllers\ImportController::class, 'bookImport'])->name('book.import');
    //import purchasedbook
    Route::post('purchasedbook-import', [App\Http\Controllers\ImportController::class, 'purchasedbookImport'])->name('purchasedbook.import');
    //export donation
    Route::get('donation-export', [App\Http\Controllers\ImportController::class, 'donationExport'])->name('donation.export');
    //export purchasedbook
    Route::get('purchasedbook-export', [App\Http\Controllers\ImportController::class, 'purchasedbookExport'])->name('purchasedbook.export');
    //export testimony
    Route::get('testimony-export', [App\Http\Controllers\ImportController::class, 'testimonyExport'])->name('testimony.export');
    //Route for Membership Import
    Route::post('membership-import', [App\Http\Controllers\ImportController::class, 'membershipImport'])->name('membership.import');
    //Feedback
    Route::post('feedback-import', [App\Http\Controllers\Import\FeedbackController::class, 'feedbackImport'])->name('feedback.import');
    //Membership
    Route::get('membership-export', [App\Http\Controllers\Export\MembershipController::class, 'fileExport'])->name('membership.export');

Route::middleware('auth', 'isICT')->group(function () {
    //kidzone
    Route::get('kidzone', [App\Http\Controllers\KidZoneController::class, 'index'])->name('kidzone.index');
    Route::post('kidzone/store', [App\Http\Controllers\KidZoneController::class, 'store'])->name('kidzone.store');
    Route::put('kidzone/update/{id}', [App\Http\Controllers\KidZoneController::class, 'update'])->name('kidzone.update');
    Route::delete('kidzone/destroy/{id}', [App\Http\Controllers\KidZoneController::class, 'destroy'])->name('kidzone.destroy');

    //hymnal
    Route::get('hymnal', [App\Http\Controllers\HymnalController::class, 'index'])->name('hymnal.index');
    Route::post('hymnal/store', [App\Http\Controllers\HymnalController::class, 'store'])->name('hymnal.store');
    Route::get('hymnal/edit/{id}', [App\Http\Controllers\HymnalController::class, 'edit'])->name('hymnal.edit');
    Route::put('hymnal/update/{id}', [App\Http\Controllers\HymnalController::class, 'update'])->name('hymnal.update');
    Route::delete('hymnal/destroy/{id}', [App\Http\Controllers\HymnalController::class, 'destroy'])->name('hymnal.destroy');
});

Route::middleware('auth', 'isFinance')->group(function () {
    Route::get('report/purchase/bcp', [App\Http\Controllers\ReportPurchaseController::class, 'bcp'])->name('report.bcp.purchase');
    Route::post('purchase/bcp', [App\Http\Controllers\ReportPurchaseController::class, 'storePurchasedBcp'])->name('store.bcp.purchase');

    Route::get('report/purchase/hymnal', [App\Http\Controllers\ReportPurchaseController::class, 'hymnal'])->name('report.hymnal.purchase');
    Route::post('purchase/hymnal', [App\Http\Controllers\ReportPurchaseController::class, 'purchaseHymnal'])->name('store.hymnal.purchase');
});

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
//api for media/video with category id
Route::get('/media/video/{id}', [App\Http\Controllers\MediaController::class, 'videoApi']);
//api for media/audio with category id
Route::get('/media/audio/{id}', [App\Http\Controllers\MediaController::class, 'audioApi']);
//api for media
Route::get('/media', [App\Http\Controllers\MediaController::class, 'mediaApi']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


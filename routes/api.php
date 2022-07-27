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
//api for categories according to media type
Route::get('/categories/audio', [App\Http\Controllers\MediaController::class, 'categoryApiAudio']);
Route::get('/categories/video', [App\Http\Controllers\MediaController::class, 'categoryApiVideo']);
Route::get('/categories/image', [App\Http\Controllers\MediaController::class, 'categoryApiImage']);
//api for media in categories with id
Route::get('/media/category/{id}', [App\Http\Controllers\MediaController::class, 'mediaCategoryApi']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


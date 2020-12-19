<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,"login"]);
    Route::post('logout', [AuthController::class,"logout"]);
    Route::post('refresh', [AuthController::class,"refresh"]);
    Route::post('me',  [AuthController::class,"me"]);
    Route::post("miban/{id}",[AuthController::class,"log"]);
    Route::post("signUp",[AuthController::class,"signUp"]);

});

Route::prefix('/announcment')->middleware(["auth"])->group(function () {
    Route::post("/add", [UserController::class, 'createAnnouncment']);
    Route::post("/get", [UserController::class, 'getAnnouncment']);
    Route::post("/save", [UserController::class, 'save']);
    Route::post("/delete", [UserController::class, 'delete']);

});


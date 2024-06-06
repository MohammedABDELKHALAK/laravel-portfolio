<?php

use App\Http\Controllers\Api\V1\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//i add prefix "v1" is mention for application version 1
Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::get('/status', function () {
        return response()->json(['status' => 'ok']);
    })->name('status');

    Route::apiResource('skills', SkillController::class);
});

Route::prefix('v2')->name('api.v2.')->group(function () {
    Route::get('/status', function () {
        return response()->json(['status' => true]);
    })->name('status');
});
// \Lomkit\Rest\Facades\Rest::resource('users', \App\Rest\Controllers\UsersController::class);
/*===========================
=           users           =
=============================*/

// Route::apiResource('/users', \App\Http\Controllers\API\UserController::class);

/*=====  End of users   ======*/

/*===========================
=           skills           =
=============================*/

// Route::apiResource('/skills', \App\Http\Controllers\API\SkillController::class);

/*=====  End of skills   ======*/

// this method is for if there is unexistence route will show your clear and easy spicefy error message 
// but in laravel 10, it not nesseccary to it because it bring clear error message and easy to read (optinal feature now)

// Route::fallback(function () {
//     return response()->json([
//         'message' => 'not exist'
//     ], 404);
// });
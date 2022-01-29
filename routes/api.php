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

/*==================Guest==================*/
Route::post('/register',[App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login',[App\Http\Controllers\Api\AuthController::class, 'login']);
/*==================Auth==================*/

Route::group(['middleware' => 'api'], function (){
    Route::Resource('schools', App\Http\Controllers\Api\SchoolController::class);
    Route::Resource('students', App\Http\Controllers\Api\StudentController::class);

    Route::get('/profile',[App\Http\Controllers\Api\UserController::class, 'profile']);
    Route::patch('/update_user/{user}',[App\Http\Controllers\Api\UserController::class, 'update']);
});

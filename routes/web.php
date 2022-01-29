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

/*==================Guest==================*/
Route::get('/',[App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register',[App\Http\Controllers\AuthController::class, 'register']);

/*==================Auth==================*/

Route::group(['middleware' => ['auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],'prefix' => LaravelLocalization::setLocale()], function (){
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::Resource('schools', App\Http\Controllers\SchoolController::class);
    Route::Resource('students', App\Http\Controllers\StudentController::class);

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile']);
    Route::patch('/update_user/{user}', [App\Http\Controllers\UserController::class, 'update']);
});

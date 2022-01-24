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
Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    
});

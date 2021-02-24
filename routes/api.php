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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => '/auth/'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
});

Route::group(['middleware' => ['auth:api']], function () {

    Route::group(['prefix' => '/profile/'], function () {
        Route::post('logout', 'ProfileController@logout');
        Route::get('me', 'ProfileController@me');
        Route::put('update', 'ProfileController@update');
    });
});

Route::get('home', 'HomeController@index');
Route::get('directions', 'HomeController@directions');
Route::get('static-info', 'HomeController@staticInfo');

Route::group(['prefix' => '/clinics/'], function () {
    Route::get('', 'ClinicController@index');
    Route::get('{clinic}', 'ClinicController@show');
});

Route::group(['prefix' => '/doctors/'], function () {
    Route::get('', 'DoctorController@index');
    Route::get('{doctor}', 'DoctorController@show');
});

Route::group(['prefix' => '/blog/'], function () {
    Route::get('', 'BlogController@index');
    Route::get('{blog}', 'BlogController@show');
});


<?php

use Illuminate\Http\Request;

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

Route::get('login','book\BookShelfController@login');
Route::get('test','book\BookShelfController@test');

Route::middleware('jwt.auth')->namespace('book')->group(function (){
    Route::group([], function () {
        Route::get('test','BookShelfController@test');
        Route::get('login2','BookShelfController@test');
    });
});

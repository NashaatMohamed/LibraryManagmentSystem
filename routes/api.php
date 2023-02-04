<?php

use Illuminate\Http\Request;
use App\Http\Controllers\userController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'user','middleware'=>'api'],function () {


    // to sign
    // Route::post('/register', 'App\Http\Controllers\userController@register');

    // to login
    Route::post('/login', 'App\Http\Controllers\userController@login');

    // to logout
    Route::post('/logout', 'App\Http\Controllers\userController@logout');

});

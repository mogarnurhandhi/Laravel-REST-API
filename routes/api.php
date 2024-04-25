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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login','Api\AuthController@login');

//Route::middleware('auth:api')->group(function () {
Route::get('/category','Api\CategoryController@index');
Route::post('/category','Api\CategoryController@store');
Route::put('/category/{id}','Api\CategoryController@update');
Route::get('/category/{id}','Api\CategoryController@show');
Route::delete('/category/{id}','Api\CategoryController@destroy');
//});


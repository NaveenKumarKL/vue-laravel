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

Route::post('/register','RegisterController@register');
Route::Post('/login','LoginController@Login');
Route::Post('/logout','LoginController@logout');
Route::get('/show','LoginController@index');
Route::get('edit/{id}', 'LoginController@edit');
Route::post('update/{id}', 'LoginController@update');
Route::post('delete/{id}', 'LoginController@delete');
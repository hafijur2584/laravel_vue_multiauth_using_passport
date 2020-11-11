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
// Route::middleware('auth:api')->get('/logout', function (Request $request) {
//     return $request->user()->token()->revoke();
// });

Route::post('/login','UserAuthController@login');
Route::middleware('auth:api')->get('/logout','UserAuthController@logoutApi');


Route::post('/admin/login','AdminAuthController@login');
Route::middleware('auth:api')->get('/admin/logout','AdminAuthController@logoutApi');


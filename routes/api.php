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
    
Route::group(['middleware' => ['api','cors']], function () {
    Route::post('auth/register', 'Auth\ApiRegisterController@create');
    Route::post('auth/login'   , 'Auth\ApiAuthController@login'     );
             
    Route::get ('auth/register', 'Auth\ApiRegisterController@create');
    Route::get ('auth/login'   , 'Auth\ApiAuthController@login'     );
             
});
    
Route::group(['middleware' => [ 'api', 'cors', 'jwt.auth' ]], function () {

    // what   : user | property | icos | wallet
    Route::post('get/{what}', 'ApiController@get' );
    Route::get ('get/{what}', 'ApiController@get' );
});

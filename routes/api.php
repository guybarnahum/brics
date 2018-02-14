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


// ........................................................................ ajax
// POST ajax api calls
//
// what   : user | property | icos | wallets
// uid    : me is session active user
// filter : user | accounts | facts filter by provider
//

Route::post('get/{what}/{uid?}', 'ApiController@get'       );
Route::post('get/{what}'       , 'ApiController@getActive' );

if ( false ){ // Enable GET for debugging only..
    Route::get('get/{what}/{uid?}', 'ApiController@get'      );
    Route::get('get/{what}'       , 'ApiController@getActive');
}

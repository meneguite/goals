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

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/goals', ['uses' => 'Api\\GoalsController@index']);
    Route::get('/goals/{id}', ['uses' => 'Api\\GoalsController@show']);
    Route::post('/goals', ['uses' => 'Api\\GoalsController@create']);
    Route::put('/goals/{id}', ['uses' => 'Api\\GoalsController@update']);
    Route::delete('/goals/{id}', ['uses' => 'Api\\GoalsController@delete']);
});

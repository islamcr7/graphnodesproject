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

Route::middleware('auth:api')->get('/graph', function (Request $request) {
    return $request->user();
});
Route::apiResource('nodes','NodeController');
Route::apiResource('graphs','GraphController');
Route::apiResource('relations','RelationController');

Route::get('graphs/getGraphs/{id}','GraphController@getGraphs');


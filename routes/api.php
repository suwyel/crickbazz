<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::middleware('apichick')->group(function () {

    Route::get('league/view', 'App\Http\Controllers\ApiController@league_view');
    Route::get('league/find/{id}', 'App\Http\Controllers\ApiController@league_find');
    Route::delete('league/delete/{id}', 'App\Http\Controllers\ApiController@league_delete');
    Route::put('league/edite/{id}', 'App\Http\Controllers\ApiController@league_edite');

    // league add
    Route::get('league', 'App\Http\Controllers\ApiController@league');


});

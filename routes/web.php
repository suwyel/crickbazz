<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PremeierLeagueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.layoute.app');
});
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('live/view', [App\Http\Controllers\PremeierLeagueController::class, 'line_view'])->name('live_view');
Route::get('mass/select{id}', [App\Http\Controllers\PremeierLeagueController::class, 'mass_select'])->name('live_view');


Route::get('/getState/{id}', [PremeierLeagueController::class, 'getState']);
Route::post('/getCity', [WebsiPremeierLeagueControllerte::class, 'getCity']);
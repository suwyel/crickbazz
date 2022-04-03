<?php

use App\Models\PoingTable;
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
Route::get('live/view', [App\Http\Controllers\PremeierLeagueController::class, 'live_view'])->name('live_view');
Route::get('mass/select{id}', [App\Http\Controllers\PremeierLeagueController::class, 'mass_select']);
Route::get('leg/live/view', [App\Http\Controllers\PremeierLeagueController::class, 'leg_view']);
Route::get('/leg/select/{id}', [App\Http\Controllers\PremeierLeagueController::class, 'let_select']);
Route::get('/point/table', [App\Http\Controllers\PremeierLeagueController::class, 'point_table']);
Route::post('/point/save', [App\Http\Controllers\PremeierLeagueController::class, 'point_save']);
Route::get('/point/view', [App\Http\Controllers\PremeierLeagueController::class, 'point_view']);
Route::get('/add/select/{id}', [App\Http\Controllers\PremeierLeagueController::class, 'add_select']);


Route::get('/getState/{id}', [PremeierLeagueController::class, 'getState']);
// Route::post('/getCity', [WebsiPremeierLeagueControllerte::class, 'getCity']);
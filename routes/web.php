<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DateIndexController;
use App\Http\Controllers\GroupClassesController;
use App\Http\Controllers\MasterClassesController;
use App\Http\Controllers\MasterStatusController;
use App\Http\Controllers\StudentController;

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

Route::get('/', [AuthenticateController::class, 'index'])->middleware('guest')->name('login');
Route::get('/login', [AuthenticateController::class, 'index'])->middleware('guest');
Route::post('/login', [AuthenticateController::class, 'authenticator'])->middleware('guest');
Route::get('/register', [AuthenticateController::class, 'register']);
Route::post('/register', [AuthenticateController::class, 'storeAcc']);
Route::get('/logout', [AuthenticateController::class, 'logout'])->middleware('auth');

Route::resource('/dashboard', DateIndexController::class)->middleware('auth')->except(['edit', 'update', 'create']);
Route::resource('/groupclasses', GroupClassesController::class)->middleware('auth');
Route::resource('/studentabsence', StudentController::class)->middleware('auth');
Route::resource('/master_classes', MasterClassesController::class)->middleware('auth');
Route::resource('/master_status', MasterStatusController::class)->middleware('auth');
